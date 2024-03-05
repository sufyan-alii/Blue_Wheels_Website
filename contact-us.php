<?php
session_start();
if (isset($_POST["save"])) {
$db_name="mysql:host=localhost;dbname=multi_vender_db";
$username = "root";
$password = "";
$conn= new PDO($db_name,$username,$password);


$req_data= array(
    $_POST["first_name"],
    $_POST["last_name"],
    $_POST["email"],
    $_POST["request_desc"]
);

$sql="INSERT INTO request_data(first_name,last_name,email,request_desc) VALUE(?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute($req_data);

}
?>
<html>
    <head>
    <script src="https://kit.fontawesome.com/c6f49c35e4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <style>
            *{
                margin:0px;
                padding:0px;
                box-sizing: border-box;
            }
            .header{
                background-color:black;
                height: 80px;
                width:100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                position:fixed;
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
            form button{
        
            background-color:transparent;
            outline:none;
            border:none;
            list-style:none;
            color:lightgray;
            display: flex;
            cursor:pointer;
            flex-direction:row;
            gap:28px;
            font-size:13px;
            font-family: Arial, Helvetica, sans-serif;   
            }
            form button li{
                color:brown;
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
                width: 41%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-left:160px;
                margin-top:70px;
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

            .right-container{
                margin-left:30px;
                height:100%;
                width: 35%;
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
                margin-top:60px;
                margin-right:230px;
            }
            .btn-primary{
                margin-left:200px;
                margin-top:25px;
            }
            .footer-container {
            height: 400px;
            width: 100%;
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
                width:305px;
                background-color:skyblue;   
                box-shadow: 0 0 7px 4px #3498db;
            }
            .linee{
                height:4px;
                width:130px;
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
                <li><a href="employee_site.php">HOME</a></li>
                <li><a href="about_us_emp.php">ABOUT US</a></li>
                <li><a href="user-profile.php">USER PROFILE</a></li>
                <li><a href="contact-us.php">CONTACT US</a></li>
                <form method="post" action="destroy_session.php">
                    <button type="submit" name="logout"><li>LOG OUT</li></button>
                </form>
            </ul>
        </div>
        <div class="main-img">
            <img src="https://cdn.pixabay.com/photo/2013/08/25/14/40/wall-175686_1280.jpg" alt="">
        </div>
        <div class="main-container">
            <div class="left-container">
                <form action="contact-us.php" method="post">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="first_name" class="form-control" placeholder="First name">
                        </div>
                    <div class="row">
                        <div class="col"> 
                            <input type="text" name="last_name" class="form-control" placeholder="Last name">
                        </div>
                    </div> 
                    </div>
                    <div class="mb-3">
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                    <textarea class="form-control" name="request_desc" id="exampleFormControlTextarea1" rows="4" placeholder="Enter your text here..."></textarea>
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" name="save"value="Submit My Request">
                </form>
            </div>
            <div class="right-container">       
                <font style="color:skyblue; letter-spacing: 1px;  text-shadow: 0 0 10px #3498db, 0 0 20px #3498db, 0 0 40px #3498db">Feel Free To</font>
                <div class="right-container-edit">
                <div class="linee"><hr></div>
                    <div class="us">
                    <font style="color:#B0B4DE;  text-shadow:  0 0 10px brown, 0 0 20px brown, 0 0 40px brown,0 0 40px brown">Contact</font>
                    </div>
                </div>
                <div class="right-container-edit">
                <div class="line"><hr></div>
                    <div class="us">
                    <font style="color:#B0B4DE;  text-shadow:  0 0 10px brown, 0 0 20px brown, 0 0 40px brown,0 0 40px brown">Us</font>
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
                    <li><a href="employee_site.php">HOME</a></li>
                    <li><a href="about_us_emp.php">ABOUT US</a></li>
                    <li><a href="user-profile.php">USER PROFILE</a></li>
                    <li><a href="contact-us.php">CONTACT US</a></li>
                    <form method="post" action="destroy_session.php">
                    <button type="submit" name="logout"><li>LOG OUT</li></button>
                    </form>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>