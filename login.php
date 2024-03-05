<?php
session_start();
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "multi_vender_db";

if (isset($_POST["save"])) {
    $getData = array(
        $_POST["username"],
        $_POST["password"]
    );
    try {
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM login_data WHERE username = ? AND password = ?");
        $stmt->execute($getData);
        $result = $stmt->fetch();

        if ($stmt->rowCount() > 0) { // Check if a valid result was fetched
            $_SESSION['isLogin'] = $result[0];
            echo " LOGIN";
        } else {
            $_SESSION['loginFailed'] = true;
            header("Location: login.php");
            exit();
        }
        
        if ($stmt->rowCount() > 0) {
            if ($result["role"] === "admin") {
                header("Location: admin_site.php");
            } else if ($result["role"] === "employee") {
                header("Location: employee_site.php");
            }
        }
        exit();

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>


<html>
<style>
    *{
        margin:0%;
        padding:0%;
    }
    body {
        /* display: flex;
        justify-content: center;
        align-items: center; */
    }
    .main-img img{
                height:100%;
                width:100%;
                object-fit:cover;
                position:absolute;
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
        margin-left:80px;
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
        height: 600px;
        width: 480px;
        border-radius: 10px;
        /* border: 1px solid white; */
        box-shadow: inset 2.5px 2.5px 6px 2px #666666;
        position: relative;
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

        height: 50px;
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
        height: 30;
        width: 180px;
        border: none;
        outline: none;
        background-color:transparent;
        color:white;
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
        margin-top: 30px;
        
    }
    .sign-up-block a{
        text-decoration:none;
    }

    .sign-up-block p{
        color: gray;
        font-size: 14;
    }
    .forget-block p {
        color: gray;
        font-size: 14;
        cursor: pointer;
    }
    .sign-up-block font{
        color: brown;
        font-size: 17;
        cursor: pointer;
        font-weight:bold;
        font-family: Arial, Helvetica, sans-serif;
        text-decoration: underline;
    }

    .forget-block {
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
        margin-right: 70px;
    }

    i {
        font-size: 35px;
        padding: 7px;
        cursor: pointer;
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
            <!-- <img src="https://cdn.pixabay.com/photo/2021/07/15/11/15/woman-6468147_1280.jpg" alt=""> -->
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
                    <font style="color:#B0B4DE;  text-shadow:  0 0 10px brown, 0 0 20px brown, 0 0 40px brown,0 0 40px brown" >To Blue</font>
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
    <!-- onsubmit="event.preventDefault(); std()" -->
        <form  action="login.php" method="post">
            <div class="main-container">
                <div class="header">
                    <br>
                    <br>
                    <h1>SIGN IN</h1>
                </div>
                <div class="username">
                    <div class="left-username">
                        <p>Email Address</p>
                    </div>
                </div>
                <div class="type-user">
                    <div class="right-username"><input type="text" name="username" id="username"
                            placeholder="Type your email address" required>
                    </div>
                    <hr>
                </div>
                <div class="pass">
                    <div class="left-pass">
                        <p>Password</p>
                    </div>
                </div>
                <div class="type-pass">
                    <div class="right-pass"><input type="password" name="password" id="passWord"
                            placeholder="Type your password" required></div>
                </div>
                <hr>
                <br>
                <div class="forget-block">
                    <p>Forget password?</p>
                </div>
                <div class="blank-user" id="blackUser">
                    <p>* Please Enter Username</p>
                </div>
                <div class="blank-pass" id="blackPass">
                    <p>* Please Enter Password</p>
                </div>
                <div class="pass-error" id="error">
                    <p>* Please Enter Valid Username and Password</p>
                </div>
                <br>
                <br>
                <div class="login-btn">
                    <button type="submit" id="login" name="save">Login</button>
                </div>
                <br>
                <div class="sign-up-block">
                    <p>
                        If you don't have an account, please register first,</p>
                        <p>and then proceed to log in.</p>
                        <br>
                    <a href="register.php"><font>Sign Up</font></a>
                </div>
                <!-- <div class="sign-up-block">
                    <p>Or Sign Up Using</p>
                </div>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-google-plus"></i>
                <i class="fa-brands fa-square-twitter"></i> -->
                
                
            </div>
    </center>
        </div>
    </div>
    <script>
         <?php
    if (isset($_SESSION['loginFailed']) && $_SESSION['loginFailed']) {
        echo 'alert(" Please Enter Valid Username or Password!");';
        unset($_SESSION['loginFailed']); // Reset the session variable
    }
    ?>
    </script>
    <script>
        function std() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("passWord").value;
            var blankUser = document.getElementById("blackUser");
            var blankPass = document.getElementById("blackPass");
            var errorDiv = document.getElementById("error");


            if (username === "") {
                blankUser.style.display = "block";
                errorDiv.style.display = "none";
                blankPass.style.display = "none";
            } else if (password === "") {
                blankPass.style.display = "block";
                errorDiv.style.display = "none";
                blankUser.style.display = "none";
            // } else if (username === "sufi" && password === "0000") {

            //     blankUser.style.display = "none";
            //     errorDiv.style.display = "none";
            //     blankPass.style.display = "none";
            }
            else {
                blankUser.style.display = "none";
                blankPass.style.display = "none";
                errorDiv.style.display = "block";
            }
        }
    </script>
</body>

</html>

