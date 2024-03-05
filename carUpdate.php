<?php
// carUpdate.php
$db_name = "mysql:host=localhost;dbname=multi_vender_db";
$username = "root";
$password = "";
$conn = new PDO($db_name, $username, $password);

if (isset($_GET['id'])) {
    $getID = $_GET['id'];
    $sql = $conn->prepare('SELECT * FROM cars_details WHERE carID = ?');
    $sql->execute([$getID]); // Pass the id directly in execute
    $data = $sql->fetch();

    if (!$data) {
        echo "Car not found!";
        exit;
    }
}

if (isset($_POST['save'])) {
    // Retrieve the car ID from the form submission
    $carID = $_POST['carID'];

    // Create an associative array to hold the updated car information
    $update_Data = array(
        'carID' => $carID,
        'carName' => $_POST['carName'],
        'carPrice' => $_POST['carPrice'],
        'carCity' => $_POST['carCity'],
        'carModel' => $_POST['carModel'],
        'carMilage' => $_POST['carMilage'],
        'carFuel' => $_POST['carFuel'],
        'carCc' => $_POST['carCc'],
        'carTransmission' => $_POST['carTransmission'],
        'carUpdatetime' => $_POST['carUpdatetime']
    );
    
    $fields = array('carName', 'carPrice', 'carCity', 'carModel', 'carMilage', 'carFuel', 'carCc', 'carTransmission', 'carUpdatetime', 'carImage');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $update_Data[$field] = $_POST[$field];
        }
    }
    
    // Handle image upload
    if ($_FILES['carImage']['name']) {
        $targetDir = 'uploads/'; // Specify the directory where you want to store the images
        $imageName = basename($_FILES['carImage']['name']);
        $targetPath = $targetDir . $imageName;
        if (move_uploaded_file($_FILES['carImage']['tmp_name'], $targetPath)) {
            // Update the image path in the database
            $update_Data['carImage'] = $imageName; // Store only the filename in the database
        }
    }

    // Prepare the SQL query to update the car information in the database
    $sql = "UPDATE cars_details SET ";
    foreach ($update_Data as $key => $value) {
        $sql .= "$key = :$key, ";
    }
    $sql = rtrim($sql, ', ') . " WHERE carID = :carID";

    $stmt = $conn->prepare($sql);

    // Execute the SQL query with the updated values
    $stmt->execute($update_Data);
        // Success, do something
   
    
    // Redirect back to the page where the car details are displayed (e.g., index.php)
    header("Location: admin_site.php");
    exit();
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
                height:100%;
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
            <form action="carUpdate.php" method="post"  enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <input type="text" name="carID" class="form-control" placeholder="Enter Car Id..."value="<?php echo $data[0]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carName" class="form-control" placeholder="Enter Car Name" value="<?php echo $data[2]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carPrice" class="form-control" placeholder="Enter Car Price" value="<?php echo $data[3]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carCity" class="form-control" placeholder="Enter Location" value="<?php echo $data[4]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carModel" class="form-control" placeholder="Enter Car Model" value="<?php echo $data[5]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carMilage" class="form-control" placeholder="Enter Milages" value="<?php echo $data[6]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carFuel" class="form-control" placeholder="Enter Engine Type" value="<?php echo $data[7]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carCc" class="form-control" placeholder="Enter Car Cc" value="<?php echo $data[8]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carTransmission" class="form-control" placeholder="Enter Car Transmission" value="<?php echo $data[9]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="carUpdatetime" class="form-control" placeholder="Enter Upload Time" value="<?php echo $data[10]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="file" name="carImage" id="carImage" class="form-control" value="<?php echo $data[1]; ?>">
                </div>
            </div>

                <center>
                    <br>
                    <br>
                    <input class="btn btn-primary" type="submit" name="save"value="Update My Ad" onclick="showAlert()" >
                </center>
                </form>
            </div>
        </div>
            <div class="right-container">
                <font style="color:skyblue; letter-spacing: 6.2px; text-shadow: 0 0 10px #3498db, 0 0 20px #3498db, 0 0 40px #3498db">Edit Your</font>
                <div class="right-container-edit">
                <div class="linee"><hr></div>
                    <div class="us">
                    <font style="color:#B0B4DE;  text-shadow:  0 0 10px brown, 0 0 20px brown, 0 0 40px brown,0 0 40px brown">Car</font>
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
                    <font>SUFI WHEELS</font>
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
                <p>Copyright © 2023. All Rights Reserved. Sufi Wheels.</p>
                <p></p>
                <p>Updated Aug, 2023</p>
            </div>
        </div>
        <script>
            // Function to show the alert
            function showAlert() {
                alert('Ad Updated!');
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>