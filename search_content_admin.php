<?php
$db_name = "mysql:host=localhost;dbname=multi_vender_db";
$username = "root";
$password = "";
$conn = new PDO($db_name, $username, $password);

if (isset($_GET["search"])) {
    $searchTerm = $_GET["search"];
    $stmt = $conn->prepare("SELECT * FROM cars_details WHERE carName LIKE :searchTerm");
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
    $stmt->execute();
    $result = $stmt->fetchAll();
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/c6f49c35e4.js" crossorigin="anonymous"></script>
        <style>
    *{
        margin:0px;
        padding:0px;
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
    .main-container {
        height: 11rem;
        width: 60%;
        background-color: white;
        display: flex;
        margin: 30px;
        border: 2px solid #E5E5E5;
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .left-container {
        background-color: whitesmoke;
        height: 100%;
        width: 25%;
        display: flex;
        align-items: center;
        justify-content: center;
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }

    .left-container img {
        height: 130px;
        width: 200px;
    }

    .right-container {
        background-color: whitesmoke;
        height: 100%;
        width: 75%;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .product-block {

        height: 25%;
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .product-name {

        width: 70%;
        display: flex;
        justify-content: space-between;
        padding-top:10px;
    }

    .product-name p {
        font-weight: bold;
        color: darkblue;
        font-size: 22px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .product-cost {
        width: 28%;
        margin-top:25px;
        padding:10px;
    }

    .product-cost p {
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        color: rgb(54, 54, 54);
        font-size: 20px;
    }

    .city-block {

        height: 16%;
        display: flex;
        align-items: center;
    }

    .city-block p {
        font-weight: bold;
        font-size: 18px;
        color: rgb(111, 111, 111);

    }

    .spec-block {
        gap:10px;
        height: 25%;
        display: flex;
        align-items: center;
        
    }
   

    .spec-block p {
        font-size: 18px;
        color: rgb(111, 111, 111);
    }

    .phone-block {

        height: 25%;
        display: flex;
        justify-content: space-between;
    }

    .post-time {

        width: 50%;
        display: flex;
        align-items: center;
    }

    .post-time p {
        font-size: 15px;
        color: rgb(111, 111, 111);
    }

    .contact {
        margin-right:35px;
        margin-bottom:15px;
        gap:15px;
        width: 22%;
        display: flex;
        align-items: center;
        justify-content: center;
        
    }

    .contact-no button {
        background-color: #3CB549;
        height: 30px;
        width: 140px;
        cursor:pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        border: 1px solid green;
    }
    .contact-no button {
        color: white;
    }
    .products-details {
        font-size: 30px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 70px;
        margin-right: 165px;
    }

    .small-line {
        background-color: FD3635;
        height: 5px;
        width: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        margin-top: 25px;
        margin-right: 70px;
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
        letter-spacing: 1px; /* Example: Adjust letter spacing */
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
    .footer-details ul li a:hover{
        color:brown;
    }
    .update-button,
    .delete-button{
        background-color: #3CB549;
        height: 27px;
        width: 72px;
        cursor:pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        border: 1px solid green;
        text-align: center;
        
    }
    .update-button a{
        color: white;
        text-decoration: none;
        padding:10px;
        margin-bottom:3px;
    }
    .delete-button a{
        color: white;
        text-decoration: none;
        padding:10px;
        margin-top:13px;

    }
    .btn {
            /* float: right; */
            color: #333;
            background-color: #fff;
            border-radius: 3px;
            border: none;
            outline: none !important;
            margin-left: 765px;
        }

        .btn:hover {
            color: #333;
            background: #f2f2f2;
        }

        .btn.btn-primary {
            color: #fff;
            background: #03A9F4;
        }

        .btn.btn-primary:hover {
            background: #03a3e7;
        }
        .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .btn span {
            float: left;
            
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
    <center>
        <br>
        <br>
        <br>
       
        <div class="products-details">
            <font>Following Results Are Shown From Related Search:</font>
        </div>
        <center>
            <div class="small-line"></div>
        </center>
          <br>  
            <div class="col-sm-8">
                <a href="admin_site.php" class="btn btn-primary"><i
                    class="material-icons">&#xE5C8;</i> <span>Back To Home</span></a>
            </div>
        <center>
        <?php foreach($result as $row){ ?>
        <div class="main-container">
            <div class="left-container"><img src="uploads\<?php echo $row["carImage"]; ?>" ></div>
            <div class="right-container">
                <div class="product-block">
                    <div class="product-name"><p><?php echo $row["carName"] ?></p></div>
                    <div class="product-cost"><p><?php echo $row["carPrice"] ?></p></div>
                </div>
                <div class="city-block"><p><?php echo $row["carCity"] ?></p></div>
                <div class="spec-block">
                    <div class="model"><p><?php echo $row["carModel"] ?></p></div>
                    <div class="milage"><p><?php echo $row["carMilage"] ?></p></div>
                    <div class="fuel"><p><?php echo $row["carFuel"] ?></p></div>
                    <div class="cc"><p><?php echo $row["carCc"] ?></p></div>
                    <div class="transmission"><p><?php echo $row["carTransmission"] ?></p></div>
                </div>
                <div class="phone-block">
                    <div class="post-time"><p><?php echo $row["carUpdatetime"] ?></p></div>
                    <div class="contact">
                        <div class="update-button"><a href=<?php echo "carUpdate.php?id=$row[0]";?>>Update</a></div>
                        <div class="delete-button"><a href=<?php echo "carDelete.php?id=$row[0]";?>><p>Delete</p></a></div>
                </div></div>
            </div>
        </div>
            <?php } ?>
        </center>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>  
    </body>
</html>