<?php
$db_name="mysql:host=localhost;dbname=multi_vender_db";
$username="root";
$password="";
$conn= new PDO($db_name,$username,$password);
$sql=$conn->query("SELECT * FROM cars_details ORDER BY carID DESC");
$result= $sql-> fetchall();

if (isset($_POST["search"])){
    $searchTerm = $_POST["search"];
    $stmt = $conn->prepare("SELECT * FROM cars_details WHERE carName = :searchTerm");
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
     if ($stmt->execute()) { 
        
        if ($stmt->rowCount() > 0) {
            header("Location: search_content_admin.php");
            exit();
        } else {
            echo "No results found.";
        }
    } 
}
?>

<style>
    body{
     
    }
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
    .logo-name font{
        color:white;
        font-size:26px;
        font-family: "Helvetica Neue", Arial, sans-serif;
        letter-spacing: 1px;
        font-weight: 500; 
    }
    .logo-name img{
       height:110px;
       width:170px;
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
        width: 85%;
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
        margin-right:15px;
        margin-bottom:35px;
        gap:10px;
        width: 22%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact-no input {
        background-color: #4CAF50;
        height: 30px;
        width: 140px;
        cursor:pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        border:none;
        color: #fff;
    }
    .contact-no input:hover{
        background-color:#45a049;
    }
    .add-car-btn{
        position:relative;
        height:50px;
        width:150px;
        background-color:green;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 25px;
    }
    .add-car-btn a{
       color: white;
       text-decoration: none;
    }
    .update-button,
    .delete-button{
        background-color: #4CAF50;
        height: 33px;
        width: 82px;
        cursor:pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        border:none;
        outline:none;
        text-align: center;
        
    }
    .update-button:hover,
    .delete-button:hover{
        background-color:#45a049;
    }
    .update-button a{
        color: #fff;
        text-decoration: none;
        padding:10px;
        margin-bottom:3px;
    }
    .delete-button a{
        color: #fff;
        text-decoration: none;
        padding:10px;
        margin-top:13px;
    }
    .carousel{
        height: calc(100vh - 80px);
    }
    .slide{
        height: calc(100vh);
    }
    .carousel-item img{
        object-fit:cover; 
        height: calc(100vh);
        width:100%;
    }
    .products-details {
        background-color:rgb(32, 32, 32);
    width: 100%;
    height:150px;
    font-size: 50px;
    font-weight: bold;
    color:white;
    font-family: Arial, Helvetica, sans-serif;
    display: flex;
    align-items: center;
    justify-content: start;
    }
    .products-details font{
        margin-left:120px;
    }

    .small-line {
        background-color: FD3635;
        height: 5px;
        width: 75px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        margin-top: 10px;
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
    .footer-details ul li a:hover{
        color:brown;
    }
    .row{
        
        display: flex;
        justify-content:center;
        align-items:center;
        position:relative;
        width:800px;

    }
    .col{
        background-color:transparent;
        border:2px solid white;
        padding:08px;
        border-radius:30px; 
        padding-left:30px;
        display: flex;
        align-items:center;
        position:relative;
        bottom:405px;
    }

    .col button {
        padding:7px;
        background-color:transparent;
        outline:none;
        border:none;
        font-size:23px;
    }

    .form-control {
        background-color: transparent !important;
        width: 650px;
        height: 36px;
        color: brown !important;
        border: none !important;
        outline: none !important;
        transition: background-color 0.3s;
}
    .form-control::placeholder {
        font-size:17px;
        color:white !important;
    }
    .form-control:focus{
        background-color: transparent !important;
        color:white !important;
    }
    .col input:focus{
        outline:none;
        box-shadow: none;
    }
    .form-control:-webkit-autofill {
        -webkit-box-shadow: 0 0 0px 1000px white inset; /* Set the background color to white */
        -webkit-text-fill-color: brown !important; /* Adjust the text color */
        transition: background-color 5000s ease-in-out 0s; /* Override the autofill background transition */
    }
    section {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between; /* Align testimonials in a row */
            flex-wrap: wrap; /* Allow wrapping to the next line on smaller screens */
        }

        .testimonial {
            width: calc(33.333% - 20px); /* 33.333% width for each testimonial with some margin */
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
        }

        .testimonial img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .testimonial p {
            font-size: 16px;
            line-height: 1.5;
        }
</style>

<html>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/c6f49c35e4.js" crossorigin="anonymous"></script>
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
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
            <img src="https://cdn.pixabay.com/photo/2018/06/28/22/14/car-3504910_1280.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
            <img src="https://cdn.pixabay.com/photo/2017/04/10/14/36/mercedes-2218688_960_720.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
            <img src="https://cdn.pixabay.com/photo/2019/11/02/19/23/car-4597205_1280.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://cdn.pixabay.com/photo/2018/01/23/04/33/autohandel-3100637_960_720.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <center>
        <form action="search_content_admin.php" method="get" id="searchForm">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="search" placeholder="Search Products" id="searchInput">
                    <button type="submit" name="submit"><a href="#"><i class="fa-solid fa-magnifying-glass"></i></a></button>
                </div>
            </div>
        </form>
        </center>
        <div class="products-details">
            <font>TOP RATED PRODUCTS</font>
        </div>
        <!-- <center>
            <div class="small-line"></div>
        </center> -->
          <br> 
        <center>
        <?php foreach($result as $row){ ?>
        <div class="main-container"
                data-aos="fade-right"
                data-aos-offset="100"
                data-aos-easing="ease-in-sine">
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
                        <div class="delete-button" onclick="showAlert()"><a href=<?php echo "carDelete.php?id=$row[0]";?>><p>Delete</p></a></div>
                    </div>
                </div>
            </div>
        </div>
            <?php } ?>
            <br>
        <br>   
    <br>
    <br>
    <div class="products-details">
            <font>TESTIMONIALS</font>
        </div>
    <section>
        <div class="testimonial">
            <img src="https://media.istockphoto.com/id/1438969575/photo/smiling-young-male-college-student-wearing-headphones-standing-in-a-classroom.jpg?s=612x612&w=0&k=20&c=yNawJP9JGXU6LOL262ME5M1U2xxNKQsvT7F9DZhZCh4=" alt="User 1">
            <p>"I had a fantastic experience with Blue Wheel. Their services are top-notch, and the team is incredibly professional."</p>
            <p style="font-weight:bold;">- Jonny Butter</p>
        </div>

        <div class="testimonial">
            <img src="https://media.istockphoto.com/id/1460864291/photo/beautiful-middle-aged-woman.jpg?s=612x612&w=0&k=20&c=kwh0LZKIE8tWHDItsFsYHcReQtcxN_ARXexwYn1HnuQ=" alt="User 2">
            <p>"Blue Wheel exceeded my expectations. The quality of their work and attention to detail are commendable."</p>
            <p style="font-weight:bold;">- Freya Allen</p>
        </div>
       
        <div class="testimonial">
            <img src=" https://media.istockphoto.com/id/1490764451/photo/headshot-portrait-of-confident-handsome-mature-middle-age-businessman-at-office.jpg?s=612x612&w=0&k=20&c=bIuouYY6uqzrXqFT9zAorjB3RKF38DirBavAahVfX38=" alt="User 3">
            <p>"Highly satisfied with the results! Blue Wheel delivers excellence with a personal touch."</p>
            <p style="font-weight:bold;">- Alex Parker</p>
        </div>
    </section>
<br>
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
    </center>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('searchForm').addEventListener('submit', function (event) {
            var searchTerm = document.getElementById('searchInput').value.trim();
            if (searchTerm === '') {
                event.preventDefault(); // Prevent form submission
                alert('Search term is required.');
            }
        });
    });
    </script>
     <script>
            // Function to show the alert
            function showAlert() {
                alert('Ad Deleted!');
            }
        </script>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
    </body>
</html>