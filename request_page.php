<?php
$db_name="mysql:host=localhost;dbname=multi_vender_db";
$username="root";
$password="";
$conn= new PDO($db_name,$username,$password);
$sql=$conn->query("SELECT * FROM request_data ORDER BY id DESC");
$result= $sql-> fetchall();
?>

<html>
    <head>
        <script src="https://kit.fontawesome.com/c6f49c35e4.js" crossorigin="anonymous"></script>
        <style>
    *{
        margin:0px;
        padding:0px;
    }
    body{
        background-color:white;  
    }
    .header{
        background-color:black;
        height: 80px;
        width:100%;
        top: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position:fixed;
        z-index:1000;
    }
    .logo-name{
       margin-left:30px;
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
    .main-img {
        padding-top: 80px;
    }
    .main-img img{
        height:100%;
        width:100%;
        object-fit:cover;
        position:absolute;
    }
    .main-container{
        height:100%;
        width:100%;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .left-container{
        background-color:black;
        height:51rem;
        width:30%;
        display: flex;
        flex-direction:column;
        justify-content: center;
        align-items: center;
        margin-bottom:70px;
    }
    .left-container font{
        font-family: 'Georgia', Times, serif;
        letter-spacing: 2px; 
        font-weight: bold; 
        font-size:55px;
        color:white;
    }
    .right-container{
        height:100%;
        width:75%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    table{
        font-family: Arial, Helvetica, sans-serif;
        overflow:hidden;
        height:40px;
        background-color:transparent;
        color:whitesmoke;
        border: solid gray;
        border-collapse:collapse;
        margin-right:30px;
        margin-left:20px;
    }
    td{
        padding:15px;
    }
    h2{
        color:brown;
    }
    .footer-container {
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
    margin-top:10;px;
    margin-bottom:1px;
    text-decoration:none;
    }
    .footer-name {
        padding-bottom:10px;
        display: flex;
        flex-direction:column;
        justify-content: center;
        align-items: center;
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
    .right-container-edit{
        margin-bottom:10px;
        display: flex;
        flex-direction:row;
        justify-content: center;
        align-items: center;
        gap:15px;
    }
    .line{
        height:4px;
        width:205px;
        background-color:skyblue;   
        box-shadow: 0 0 7px 4px #3498db;
    }
    .linee{
        height:4px;
        width:35px;
        background-color:skyblue; 
        box-shadow: 0 0 7px 4px #3498db;
    }       
    .lineee{
        height:4px;
        width:165px;
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
            <img src="https://img.freepik.com/premium-photo/metallic-background-simple-few-lines_494423-6250.jpg" alt="">
        </div>

            <div class="main-container">
                <div class="left-container">
                <font style="color:skyblue; text-shadow: 0 0 10px #3498db, 0 0 20px #3498db, 0 0 40px #3498db; letter-spacing: 6px;">Welcome</font>
                <br>
                <div class="right-container-edit">
                    <div class="line"><hr></div>
                    <div class="us">
                    <font style="color:#B0B4DE;  text-shadow:  0 0 10px brown, 0 0 20px brown, 0 0 40px brown,0 0 40px brown">To </font>
                    </div>
                </div>
                <div class="right-container-edit">
                    <div class="linee"><hr></div>
                    <div class="us">
                    <font style="color:#B0B4DE;  text-shadow:  0 0 10px brown, 0 0 20px brown, 0 0 40px brown,0 0 40px brown">Request </font>
                    </div>
                </div>
                <div class="right-container-edit">
                <div class="lineee"><hr></div>
                    <div class="us">
                    <font style="color:#B0B4DE;  text-shadow:  0 0 10px brown, 0 0 20px brown, 0 0 40px brown,0 0 40px brown">Site</font>
                    </div>
                </div>
                </div>
                <div class="right-container">
                    <table border=1px>
                    <tr>
                        <td><h2>First Name</h2></td>
                        <td><h2>Last Name</h2></td>
                        <td><h2>Email</h2></td>
                        <td><h2>Request Description</h2></td>
                    </tr>
                    <?php foreach($result as $row){ ?>
                    <tr>
                        <td><p><?php echo $row["first_name"] ?></p></td>
                        <td><p><?php echo $row["last_name"] ?></p></td>
                        <td><p><?php echo $row["email"] ?></p></td>
                        <td><p><?php echo $row["request_desc"] ?></p></td>
                        <td><a href=<?php echo "requestDelete.php?id=$row[0]";?>><p><i class="fa-solid fa-trash" style="color: #1b56bb;"></i></p></a></td>
                    </tr>
                    <?php } ?>
                    </table>
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
                <p>Copyright © 2023. All Rights Reserved. Sufi Wheels.</p>
                <p></p>
                <p>Updated Aug, 2023</p>
                </div>
            </div>
    </body>
</html>