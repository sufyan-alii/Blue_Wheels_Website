<?php
if (isset($_POST["save"])) {
$db_name="mysql:host=localhost;dbname=multi_vender_db";
$username = "root";
$password = "";
$conn= new PDO($db_name,$username,$password);


$store_data= array(
    $_POST["full_name"],
    $_POST["username"],
    $_POST["password"],
    $_POST["contact_number"],
    $_POST["role"]
);

$sql="INSERT INTO login_data(full_name,username,password,contact_number,role) VALUE(?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute($store_data);

header("location:login.php");
exit();

}
?>
<html>
<style>
     *{
        margin:0%;
        padding:0%;
    }
    .main-img img{
                height:100%;
                width:100%;
                object-fit:cover;
                position:absolute;
            }
    body {
        /* display: flex;
        justify-content: center;
        align-items: center; */
    }
    .main-body{
        /* background-color: red; */
        width: 100%;
        height: 100%;
        display:flex;
        position:relative;
    }
    .left-container{
        /* background-color: yellow; */
        width: 37%;
        height: 100%;
        display: flex;
        margin-left:85px;
        flex-direction:column;
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
    .left-container font{
        font-family: 'Georgia', Times, serif;
        letter-spacing: 2px; 
        font-weight: bold; 
        font-size:65px;
        color:white;
    }
    .left-container-edit{
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
                width:97px;
                background-color:skyblue; 
                box-shadow: 0 0 7px 4px #3498db;
            }    
            .right-container{
        /* background-color: purple; */
        width: 63%;
        height: 100%;
        display:flex;
        justify-content:center;
        align-items:center;
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

    
    .main-container {
        background-color: transparent;
        height: 670px;
        width: 630px;
        box-shadow: inset 2.5px 2.5px 6px 2px #666666;
        border-radius: 10px;
        overflow: auto;
    }
    .header h1 {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bolder;
        /* color:white; */
        color:#B0B4DE;
        text-shadow:  0 0 10px #3498db, 0 0 20px #3498db, 0 0 40px #3498db;
    }

    .username,
    .pass {

        height: 20px;
        width: 80%;
        display: flex;
        align-items: center;
        flex-direction: row;
        margin: 15px;

    }

    .left-username p,
    .left-pass p {
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
        font-size: 18px;
    }

    .right-username,
    .right-pass {
        margin-right: 100px;
    }
    .right-username input:-webkit-autofill,
    .right-pass input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0px 1000px white inset; /* Set the background color to white */
        -webkit-text-fill-color: black !important; /* Adjust the text color */
        transition: background-color 5000s ease-in-out 0s; /* Override the autofill background transition */
    }

    .right-username input,
    .right-pass input {
        background-color:transparent;
        height: 16;
        width:auto;
        color:white;
        border: none;
        outline: none;
    }
    hr {
        width: 70%;

    }

    .forget-pass-block {
        display: flex;
        align-items: end;
        justify-content: flex-end;
        margin-right: 65px;
    }

    .login-btn button {
        height: 35px;
        width: 300px;
        background-color: rgb(186, 51, 51);
        color: white;
        border: none;
        border-radius: 20px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        font-size: 20px;
        margin-top: 10px;
        cursor: pointer;
    }

    .login-btn button:hover {
        background-color: brown;
    }

    .pass-error,
    .blank-user,
    .blank-pass {
        display: none;
    }

    .pass-error p,
    .blank-user p,
    .blank-pass {
        color: red;

    }

    .sign-up-block {
        margin-top: 35px;
    }
    .sign-up-block a{
        text-decoration:none;
    }

    .sign-up-block p{
        color: gray;
        font-size: 14;
    }
    .sign-up-block font{
        color: brown;
        font-size: 17;
        cursor: pointer;
        font-weight:bold;
        font-family: Arial, Helvetica, sans-serif;
        text-decoration: underline;
    }

    i {
        font-size: 35px;
        padding: 7px;
        cursor: pointer;
    }
     /* Hide the default radio button */
     input[type="radio"] {
      display: none;
    }

    /* Style the custom radio button container */
    .custom-radio {
      display: inline-block;
      width: 16px;
      height: 16px;
      background-color: white; /* Change this to your desired color */
      border-radius: 50%;
      margin-right: 5px;
    }

    /* Style the custom radio button when selected */
    input[type="radio"]:checked + .custom-radio {
      background-color: #e74c3c; /* Change this to your desired color when selected */
    }
    .radio-btn{
        margin-right:110px;
        margin-bottom:5px;
        color:white;
    }
    .note p{
        color:gray;
        font-size: 14;
        margin-top:12px;
        margin-right:27px;
    }
    .text-blk.subHeading {
            font-size: 15px;
            line-height: 25px;
            color:gray;
            margin-top:13px;
            margin-left:72px;
            opacity: 0.8;
            
        }
    
</style>
<script src="https://kit.fontawesome.com/c6f49c35e4.js" crossorigin="anonymous"></script>

<body>
<div class="main-img">
            <img src="background1.jpg" alt="">
        </div>
    <div class="main-body">
        <div class="left-container">
        <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        <font style="color:skyblue; letter-spacing: 13px; text-shadow: 0 0 10px #3498db, 0 0 20px #3498db, 0 0 40px #3498db ">Welcome</font>
<br>
                <div class="left-container-edit">
                <div class="linee"><hr></div>
                    <div class="us">
                        <br>
                    <font style="color:#B0B4DE;  text-shadow:  0 0 10px brown, 0 0 20px brown, 0 0 40px brown,0 0 40px brown">To Blue</font>
                    </div>
                </div>
                <div class="left-container-edit">
                <div class="line"><hr></div>
                    <div class="us">
                        <br>
                    <font style="color:#B0B4DE;  text-shadow:  0 0 10px brown, 0 0 20px brown, 0 0 40px brown,0 0 40px brown">Wheels</font>
                    </div>
                </div>
                <p class="text-blk subHeading">
                Welcome to Blue Wheels, a premier online destination designed to cater to the diverse needs of automotive enthusiasts and consumers alike. With a passion for automobiles at the core of our platform, we aim to create a space that mirrors your love for cars.
                </p>
        </div>
        <div class="right-container">
        <center>
        <form action="register.php" method="post">
            <div class="main-container">
                <div class="header">
                    <br>
                    <br>
                    <h1>SIGN UP</h1>
                </div>
                <div class="username">
                    <div class="left-username">
                        <p>Full Name</p>
                    </div>
                </div>
                <div class="type-user">
                    <div class="right-username"><input type="text" name="full_name" placeholder="Enter your full name" required>
                    </div>
                    <hr>
                </div>
                <div class="username">
                    <div class="left-username">
                        <p>Email Address</p>
                    </div>
                </div>
                <div class="type-user">
                    <div class="right-username"><input type="text" name="username" placeholder="Enter your email address" required>
                    </div>
                    <hr>
                </div>
                <div class="pass">
                    <div class="left-pass">
                        <p>Password</p>
                    </div>
                </div>
                <div class="type-pass">
                    <div class="right-pass"><input type="password" name="password" placeholder="Enter your password"></div>
                </div>
                <hr>
                <div class="pass">
                    <div class="left-pass">
                        <p>Contact Number</p>
                    </div>
                </div>
                <div class="type-pass">
                    <div class="right-pass"><input type="text" name="contact_number" placeholder="Enter your contact number" required></div>
                </div>
                <hr>
                <div class="pass">
                    <div class="left-pass">
                        <p>Role</p>
                    </div>
                </div>
                <div class="type-pass">
                    <div class="radio-btn">
                        <label>
                            <input style="background-color: white;;" type="radio" class="radio" name="role" value="employee" required>
                            <span class="custom-radio"></span>Register as a Buyer!
                        </label>
                    </div>
                </div>
                <hr>
                <div class="note">
                    <p>
                    Note: "Kindly mark the employee block."
                    </p>
                </div>
                <div class="login-btn">
                    <br>
                    <br>
                    <button type="submit" name="save">Sign Up</button>
                </div>
                <div class="sign-up-block">
                <p>
                If you've already registered, please </p>
                        <p>proceed to sign in.</p>
                        <br>
                    <a href="login.php"><font>Sign In</font></a>
                </div>
            </div>
            </form>
    </center>
        </div>
    </div>
</body>

</html>