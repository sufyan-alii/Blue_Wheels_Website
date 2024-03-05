<?php
if (isset($_POST["save"])) {
    // Set the target directory where you want to store the uploaded images
    $targetDir = "uploads/";

    // Get the file name and temporary location of the uploaded image
    $imageName = basename($_FILES["carImage"]["name"]);
    $imageTmpPath = $_FILES["carImage"]["tmp_name"];

    // Move the uploaded image to the target directory
    $targetFilePath = $targetDir . $imageName;
    if (move_uploaded_file($imageTmpPath, $targetFilePath)) {
        // Database connection details
        $dbHost = "localhost"; // Change this to your database host
        $dbName = "multi_vender_db"; // Change this to your database name
        $dbUser = "root"; // Change this to your database username
        $dbPass = ""; // Change this to your database password

        // Connect to the database using PDO
        try {
            $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $car_data = array(
                $_POST["carName"],
                $_POST["carPrice"],
                $_POST["carCity"],
                $_POST["carModel"],
                $_POST["carMilage"],
                $_POST["carFuel"],
                $_POST["carCc"],
                $_POST["carTransmission"],
                $_POST["carUpdatetime"]
            );

            // Prepare and execute the SQL query to insert car details into the database
            $sql = "INSERT INTO cars_details (carImage, carName, carPrice, carCity, carModel, carMilage, carFuel, carCc, carTransmission, carUpdatetime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$imageName, ...$car_data]);

            // Close the database connection
            $pdo = null;

            // Redirect back to the page where the car details are displayed (e.g., index.php)
            header("location:admin_site.php");
            exit();
        } catch (PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        }
    } else {
        echo "File upload failed.";
    }
}
?>



<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/c6f49c35e4.js" crossorigin="anonymous"></script>
        <style>
            *{
                margin:0px;
                padding:0px;
                box-sizing: border-box;
            }
            body{
                padding-top: 80px;
            }
            .header{
                background-color:black;
                height: 80px;
                width:100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: fixed;
                top: 0;
                z-index:1000;   
            }
            .logo-name{
            padding-left:30px;
            cursor:pointer;
            }
            .logo-name img{
            height:110px;
            width:170px;
            }
            .logo-name font{
                color:white;
                font-size:26px;
                font-family: "Helvetica Neue", Arial, sans-serif;
                letter-spacing: 1px; 
                font-weight: 500; 
            }
            ul{
                padding-right:30px;
                list-style:none;
                color:lightgray;
                display: flex;
                flex-direction:row;
                gap:28px;
                font-size:13px;
                font-family: Arial, Helvetica, sans-serif;   
            }
            li{
                transition: 0.5s;
            }
            ul:hover li{
                filter: blur(5px);
            }
            ul li:hover{
                filter: blur(0px);
            }
            li a{
                text-decoration:none;
                color:lightgray;
            }
            li a:hover{
                color:brown;
                cursor:pointer;             
            }
            .main-img img{
                height:100%;
                width:100%;
                object-fit:cover;
                position:absolute;
            }
            .main-container{
                height:100%;
                width: 100%;
                position:relative;
                display: flex;
                align-items: center;
                justify-content: center;
                
            }
            .left-container{
                height:80%;
                width: 52%;
                margin-left:100px;
                margin-top:40px;
                margin-bottom:50px;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transform: translateX(-100%);
                animation: fadeLeftAnimation 1.5s forwards;
            }
            @keyframes fadeLeftAnimation {
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
                        .inner-left-container{
                height: calc(100vh - 150px);
                overflow-y: auto;
                padding-right: 15px; 
                scrollbar-width: thin; /* Firefox */
                scrollbar-color: rgba(255, 255, 255, 0.5) rgba(0, 0, 0, 0.2); /* Firefox */
            }

            /* WebKit (Chrome, Safari) */
            .inner-left-container::-webkit-scrollbar {
                width: 8px;
            }

            .inner-left-container::-webkit-scrollbar-thumb {
                background-color: rgba(0, 0, 0, 0.2);
                border-radius: 4px;
            }

            .inner-left-container::-webkit-scrollbar-thumb:hover {
                background-color: rgba(0, 0, 0, 0.4);
            }

            .inner-left-container::-webkit-scrollbar-track {
                background-color: rgba(255, 255, 255, 0.5);
                border-radius: 4px;
            }

            .inner-left-container::-webkit-scrollbar-track:hover {
                background-color: rgba(255, 255, 255, 0.7);
            }

            .right-container{
                height:100%;
                width: 48%;
                display: flex;
                flex-direction:column;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transform: translateX(100%);
                animation: fadeRightAnimation 1.5s forwards;
            }
            @keyframes fadeRightAnimation {
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            .right-container font{
                font-family: 'Georgia', Times, serif;
                letter-spacing: 2px; 
                font-weight: bold; 
                font-size:65px;
                color:white;
            }
            .row{
                margin-top:60px;
            }
            .mb-3{
                margin-top:50px;
                margin-right:230px;
            }
            .btn-primary{
                display:flex;
                align-items: center;
                justify-content: center;
               
            }
            .footer-container {
            margin-top:80px;
            height: 400px;
            width: 100%;
            z-index: 1;
            
            }

            .footer-detail-block {
            background-color: rgb(32, 32, 32);
            height: 80%;
            display: flex;
            flex-direction:column;
            align-items: center;
            justify-content: center;
            }

            .footer-small-line {
            background-color: FD3635;
            height: 3px;
            width: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            margin-top: 16px;
            margin-left: 67px;
            margin-bottom: 30px;
            }

            .footer-icon {
            display: flex;
            margin-top: 5px;
            padding: 10px;
            gap: 10px;
            }

            .facebook-icon:hover,
            .twitter-icon:hover,
            .linkdin-icon:hover,
            .youtube-icon:hover{
                color:brown;
                background-color:brown
            }
            .facebook-icon,
            .twitter-icon,
            .linkdin-icon,
            .youtube-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            width: 50px;
            background-color: rgb(96, 95, 95);
            border-radius: 30px;
            cursor: pointer;
            }

            .facebook-icon i,
            .twitter-icon i,
            .linkdin-icon i,
            .youtube-icon i {
            font-size: 17px;
            }

            .footer-copyright-block {
            background-color: #191919;
            height: 20%;
            display: flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
            }

            .footer-copyright-block p {
            font-weight: bold;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            color: rgb(135, 132, 132);
            cursor: pointer;
            margin-bottom:3px;
            }
            .footer-name {
                padding-bottom:10px;
            }
            .footer-name font{
                color:white;
                font-size:26px;
                font-family: "Helvetica Neue", Arial, sans-serif;
                letter-spacing: 1px;
                font-weight: 500; 
            }

            .footer-details ul{
                padding-bottom:10px;
                gap:60px;
                font-size:13px;
            }

            .footer-details ul a{
                color:gray;
            }
            .form-control{
                background-color:transparent;
                transition: background-color 0.3s;
                width:600px;
                color:white;
            }
            .form-control::placeholder {
                color:white;
            }
            .form-control:focus {
                background-color: transparent;
                color:white;
            }
            .right-container-edit{
                display: flex;
                flex-direction:row;
                justify-content: center;
                align-items: center;
                gap:15px;
            }
            .line{
                height:4px;
                width:105px;
                background-color:skyblue;  
                box-shadow: 0 0 7px 4px #3498db; 
            }
            .linee{
                height:4px;
                width:230px;
                background-color:skyblue; 
                box-shadow: 0 0 7px 4px #3498db;
            }
            .footer-details ul li a:hover{
                color:brown;
            }
            
        </style>
    </head>
    <body>
        <div class="header">
            <div class="logo-name">
            <img src="logo.png" alt="">
            </div>
            <ul>
                <li><a href="admin_site.php">HOME</a></li>
                <li><a href="orders.php">VIEW ORDERS</a></li>
                <li><a href="about_us_admin.php">ABOUT US</a></li>
                <li><a href="request_page.php">REQUESTS</a></li>
                <li><a href="pakwheel_insert_form.php">SELL CAR</a></li>
                <li><a href="login.php">LOG OUT</a></li>
            </ul>
        </div>
        <div class="main-img">
            <img src="https://cdn.pixabay.com/photo/2013/08/25/14/40/wall-175686_1280.jpg" alt="">
        </div>
        <div class="main-container">
            <div class="left-container">
                <div class="inner-left-container">
                <form action="pakwheel_insert_form.php" method="post"  enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <input type="text" name="carName" class="form-control" placeholder="Enter Car Name">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carPrice" class="form-control" placeholder="Enter Car Price">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carCity" class="form-control" placeholder="Enter Location">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carModel" class="form-control" placeholder="Enter Car Model">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carMilage" class="form-control" placeholder="Enter Milages">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carFuel" class="form-control" placeholder="Enter Engine Type">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carCc" class="form-control" placeholder="Enter Car Cc">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carTransmission" class="form-control" placeholder="Enter Car Transmission">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carUpdatetime" class="form-control" placeholder="Enter Upload Time" id="dateTime" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="file" name="carImage" id="carImage" class="form-control" placeholder="Upload Car Image">
                </div>
            </div>
                <center>
                    <br>
                    <br>
                    <input class="btn btn-primary" type="submit" name="save"value="Post My Ad">
                </center>
                </form>
            </div>
            </div>
            <div class="right-container">
                <font style="color:skyblue; letter-spacing: 1px;  text-shadow: 0 0 10px #3498db, 0 0 20px #3498db, 0 0 40px #3498db">Enter Your</font>
                <div class="right-container-edit">
                <div class="linee"><hr></div>
                    <div class="us">
                    <font style="color:#B0B4DE;  text-shadow:  0 0 10px brown, 0 0 20px brown, 0 0 40px brown,0 0 40px brown;">Car</font>
                    </div>
                </div>
                <div class="right-container-edit">
                <div class="line"><hr></div>
                    <div class="us">
                    <font style="color:#B0B4DE;  text-shadow:  0 0 10px brown, 0 0 20px brown, 0 0 40px brown,0 0 40px brown">Details</font>
                    </div>
                </div>
                
            </div>
        </div>
            
        <div class="footer-container">
            <div class="footer-detail-block">
                <div class="footer-name">
                    <font>BLUE WHEELS</font>
                        <div class="footer-small-line">
                            <hr>
                        </div> 
                </div>
                <div class="footer-details">
                <ul>
                    <li><a href="admin_site.php">HOME</a></li>
                    <li><a href="orders.php">VIEW ORDERS</a></li>
                    <li><a href="about_us_admin.php">ABOUT US</a></li>
                    <li><a href="request_page.php">REQUESTS</a></li>
                    <li><a href="pakwheel_insert_form.php">SELL CAR</a></li>
                    <li><a href="login.php">LOG OUT</a></li>
                </ul>
                </div>
                <div class="footer-icon">
                    <div class="facebook-icon"><i class="fa-brands fa-facebook-f" style="color: white;"></i></div>
                    <div class="twitter-icon"><i class="fa-brands fa-twitter" style="color: white;"></i></div>
                    <div class="linkdin-icon"><i class="fa-brands fa-linkedin-in" style="color: white;"></i></div>
                    <div class="youtube-icon"><i class="fa-brands fa-youtube" style="color: white;"></i></div>
                </div>
            </div>
            <div class="footer-copyright-block">
                <p>Copyright © 2023. All Rights Reserved. Blue Wheels.</p>
                <p></p>
                <p>Updated Aug, 2023</p>
            </div>
        </div>
        <script>
            // Function to update the displayed date and time
            function updateDateTime() {
                const currentDateAndTime = new Date();
                const formattedDateTime = `${currentDateAndTime.getFullYear()}-${currentDateAndTime.getMonth() + 1}-${currentDateAndTime.getDate()}`;

                // Update the value of the input with id "dateTime"
                document.getElementById('dateTime').value = formattedDateTime;
            }

            // Call the function initially
            updateDateTime();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>