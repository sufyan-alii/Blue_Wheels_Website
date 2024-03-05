<?php


$db_name = "mysql:host=localhost;dbname=multi_vender_db";
$username = "root";
$password = "";
$conn = new PDO($db_name, $username, $password);



$getID = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : null;

$sql = $conn->prepare('SELECT * FROM login_data WHERE id = ?');
$sql->execute([$getID]);
$data = $sql->fetch();


if (isset($_POST['save'])) {
    // Retrieve the car ID from the form submission
    $id = $_POST['id'];

    // Create an associative array to hold the updated car information
    $update_Data = array(
        'id' => $id,
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'role' => $_POST['role']
    );

    // Prepare the SQL query to update the car information in the database
    $sql = "UPDATE login_data 
            SET username = :username, password = :password, role = :role 
            WHERE id = :id";

    $stmt = $conn->prepare($sql);

    // Execute the SQL query with the updated values
    $stmt->execute($update_Data);

    // Redirect back to the page where the car details are displayed (e.g., index.php)
    header("Location: user-profile.php");
    exit();
}
?>


<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <style>
              *{
        margin:0px;
        padding:0px;
        box-sizing: border-box;
    }
    body {
        background-color: gray;
     
        
    }
    .header{
        background-color:black;
        height: 80px;
        width:100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    ul{
        list-style:none;
        color:white;
        display: flex;
        flex-direction:row;
        gap:28px;
        font-size:14px;
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
        color:white;
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
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .info-container{
        background-color:whitesmoke;
        width:470px;
        height:580px;
        display: flex;
        align-items: center;
        flex-direction:column;
        justify-content: center;
        margin-top:40px;
        border-radius:50px;
        border: 1px solid gray;
        position: relative;
    }
    .top-block{
      
        height:18%;
        display: flex;
        justify-content: center;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        margin-bottom:20px;
        margin-top:25px;
    }
    .top-block h1{
        margin-top:25px;
        font-weight:bold;
        font-family: Arial, Helvetica, sans-serif;
    }
    .user-block{
        height:10%;
        display: flex;
        flex-direction:column;
        margin-top:30px;
    }
    .user-name{
        height:50%;
        display: flex;
        align-items:center;
        margin-left:30px;
    }
    .user-pass{
        height:50%;
        margin-right:110px;
        display: flex;
        align-items:center;
        justify-content:center;
    }
    .edit-block{
        display: flex;
        align-items:center;
        justify-content:center;
        border-radius:9px;
        margin-bottom:20px;
        margin-top:20px;
    }
   
    .footer-details ul li a:hover{
        color:brown;
    }

        </style>
        </head>
        <body>
        <div class="header">
        <ul>
                <li><a href="employee_site.php">HOME</a></li>
                <li><a href="about_us_emp.php">ABOUT US</a></li>
                <li><a href="user-profile.php">USER PROFILE</a></li>
                <li><a href="contact-us.php">CONTACT US</a></li>
                <li><a href="login.php">LOG OUT</a></li>
            </ul>
        </div>
        <div class="main-img">
            <img src="https://img.freepik.com/premium-photo/metallic-background-simple-few-lines_494423-6250.jpg" alt="">
        </div>
        <form action="edit_profile.php" method="post">
        <div class="main-container">
            <div class="info-container">
                <div class="top-block">
                <h1>USER PROFILE</h1>
                </div>
                <div class="col">
                <label for="exampleFormControlTextarea1" class="form-label">ID</label>
                    <input type="text" name="id" class="form-control" placeholder="Id" value="<?php echo $data[0]; ?>"> 
                </div>
                <div class="col">
                <label for="exampleFormControlTextarea1" class="form-label">USERNAME</label>
                    <input type="text" name="username" class="form-control" placeholder="First name" value="<?php echo $data[1]; ?>"> 
                </div>
                <div class="col">
                <label for="exampleFormControlTextarea1" class="form-label">PASSWORD</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $data[2]; ?>"> 
                </div>
                <div class="col">
                <label for="exampleFormControlTextarea1" class="form-label">ROLE</label>
                    <input type="text" name="role" class="form-control" placeholder="Role" value="<?php echo $data[3]; ?>"> 
                </div>    
                <div class="edit-block">
                <input class="btn btn-primary" type="submit" name="save" value="EDIT">
                </div>
                </form>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        </body>
    
</html>