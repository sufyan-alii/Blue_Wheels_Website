<?php

session_start();
if (isset($_SESSION["isLogin"])) {
$userId = $_SESSION['isLogin'];

$db_name="mysql:host=localhost;dbname=multi_vender_db";
$username="root";
$password="";
$conn= new PDO($db_name,$username,$password);

$makeArray = array($userId);
$sql = $conn->prepare('SELECT * FROM login_data WHERE id = ?');
$sql->execute($makeArray);
$result = $sql->fetch(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
}
?>

<html>
<head>
    <script src="https://kit.fontawesome.com/c6f49c35e4.js" crossorigin="anonymous"></script>
  <style>
        *{
            padding:0px;
            margin:0px;
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
        .material-icons {
        font-family: 'Material Icons';
        font-weight: normal;
        font-style: normal;
        font-size: 24px;
        line-height: 1;
        letter-spacing: normal;
        text-transform: none;
        display: inline-block;
        white-space: nowrap;
        word-wrap: normal;
        direction: ltr;
        -webkit-font-feature-settings: 'liga';
        -webkit-font-smoothing: antialiased;
        }

        .profile-page .page-header {
        height: 380px;
        background-size: cover;
        background-position: center;
        margin: 0;
        padding: 0;
        border: 0;
        display: flex;
        align-items: center;
        }

        .header-filter:before {
        position: absolute;
        z-index: 1;
        width: 100%;
        height: 100%;
        display: block;
        left: 0;
        top: 0;
        content: "";
        background: rgba(0, 0, 0, 0.5);
        }

        .main-raised {
        margin: -60px 30px 0;
        border-radius: 6px;
        box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
        }

        .main {
        background: #FFF;
        position: relative;
        z-index: 3;
        height:400px;
        }
       
        .profile-page .profile {
        text-align: center;
        }
       

        .profile-page .profile img {
       
        height:147px;
        width: 147px;
        margin: 0 auto;
        -webkit-transform: translate3d(0, -50%, 0);
        -moz-transform: translate3d(0, -50%, 0);
        -o-transform: translate3d(0, -50%, 0);
        -ms-transform: translate3d(0, -50%, 0);
        transform: translate3d(0, -50%, 0);
        }

        .img-raised {
        height:165px;
        box-shadow: 0 5px 15px -8px rgba(0, 0, 0, 0.24), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
        }

        .rounded-circle {
        border-radius: 80px !important;
        }

        .title {
        margin-top: 30px;
        margin-bottom: 25px;
        min-height: 32px;
        color: #3C4858;
        font-weight: 700;
        font-family: "Roboto Slab", "Times New Roman", serif;
        }

        .profile-page .description {
        margin: 1.071rem auto 0;
        max-width: 600px;
        color: #999;
        font-weight: 300;
        }
        .name{
            margin-top: -80px;
            margin-left:14px;
        }
        .profile-page .profile .name {
        margin-top: -85px;
        }
        .footer-container {
        height: 400px;
        width: 100%;
        margin-top:77px
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
        margin-left: 65px;
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
        .upload{
        width: 125px;
        position: relative;
        margin: auto;
        }

        .upload img{
        border-radius: 50%;
        border: 8px solid #DCDCDC;
        }

        .upload .round{
        position: absolute;
        bottom: 68px;
        right: 0;
        background: #00B4FF;
        width: 32px;
        height: 32px;
        line-height: 33px;
        display:flex;
        align-items:center;
        justify-content:center;
        cursor:pointer;
        text-align: center;
        border-radius: 50%;
        overflow: hidden;
        }

        .upload .round input[type = "file"]{
        position: absolute;
        transform: scale(2);
        opacity: 0;
        cursor:pointer;
        }

        input[type=file]::-webkit-file-upload-button{
            cursor: pointer;
        }
        .user-name h4{
            color:gray;
            font-family: Arial, Helvetica, sans-serif; 
            margin-right:100px;
            margin-bottom:7px;
            letter-spacing:1px;
        }
        .user-name p{
            letter-spacing:0.6px;
            color:darkgray;
            margin-left:100px;
            margin-bottom:4px;
            font-family: Arial, Helvetica, sans-serif; 
            font-size:14px;
        }
        .contact_no h4{
            color:gray;
            font-family: Arial, Helvetica, sans-serif; 
            margin-right:102px;
            margin-bottom:7px;
            letter-spacing:1px;
        }
        .contact_no p{
            letter-spacing:0.6px;
            color:darkgray;
            margin-left:100px;
            margin-bottom:4px;
            font-family: Arial, Helvetica, sans-serif; 
            font-size:14px;
        }
    </style>
</head>
<body class="profile-page sidebar-collapse">
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
  <div class="page-header header-filter" data-parallax="true"
    style="background-image:url('https://demos.creative-tim.com/bs3/material-kit/assets/img/examples/city.jpg');">
  </div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
                    <div class="upload">
                        <?php
                        $id = $result["id"];
                        $name = $result["username"];
                        $image = $result["Image"];
                        ?>
                        <?php 
                            if($image == ""){
                                ?>
                                   <img src="img/noprofil.jpg" width="125" height="125">
                                <?php
                            }else{
                                ?>
                                   <img src="img/<?php echo $image; ?>" width="125" height="125">
                                <?php
                            }
                        ?>
                     
                        <div class="round">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="username" value="<?php echo $name; ?>">
                            <input type="file" name="Image" id="Image" accept=".jpg, .jpeg, .png">
                            <i class="fa fa-camera" style="color: #fff;"></i>
                        </div>
                    </div>
                </form>
                
              </div>
              <div class="name"><h3 class="title"><?php echo $result["full_name"] ?></h3></div>
                         <div class="user-name">
                            <h4>USERNAME :</h4>
                            <p><?php echo $result["username"] ?></p>
                         </div>
                         <div class="user-name">
                            <h4>PASSWORD :</h4>
                            <p><?php echo $result["password"] ?></p>
                         </div>
                         <div class="contact_no">
                            <h4>Contact No. :</h4>
                            <p><?php echo $result["contact_number"] ?></p>
                         </div>
                <div class="description text-center">
                    <p>Welcome to Blue Wheels - Your Ultimate Destination for Everything Automotive!</p>
                    <p>If you encounter any issues or have questions, feel free to reach out to us. Our dedicated support team is here to assist you. Just like cruising on an open road, navigating our website is a breeze. Join us at Blue Wheels and experience the automotive world like never before!</p>
                </div>
            </div>  
          </div>
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
    <script type="text/javascript">
    document.getElementById("Image").onchange = function () {
    document.getElementById("form").submit();
};

</script>
<?php
if (isset($_FILES["Image"]["name"])) {
    $id = $_POST["id"];
    $name = $_POST["username"];

    $imageName = $_FILES["Image"]["name"];
    $imageSize = $_FILES["Image"]["size"];
    $tmpName = $_FILES["Image"]["tmp_name"];

    // Image validation
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = 'user-profile.php';
        </script>
        ";
    } elseif ($imageSize > 1200000) {
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = 'user-profile.php';
        </script>
        ";
    } else {
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;

        $query = "UPDATE login_data SET Image = :newImageName WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":newImageName", $newImageName, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        move_uploaded_file($tmpName, 'img/' . $newImageName);
        echo
        "
        <script>
        document.location.href = 'user-profile.php';
        </script>
        ";
    }
}
?>
</body>

</html>