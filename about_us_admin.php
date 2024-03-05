<html>
    <head>
        <script src="https://kit.fontawesome.com/c6f49c35e4.js" crossorigin="anonymous"></script>
        <style>
            * {
        font-family: Nunito, sans-serif;
        margin: 0;
            padding: 0;
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
        .text-blk {
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        line-height: 20px;
        color: white;
        font-size: 14px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 40px;
        margin-left: 0px;
        }

        .responsive-container-block {
        min-height: 75px;
        height: fit-content;
        width:97.3%;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        display: flex;
        flex-wrap: wrap;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
        justify-content: flex-start;
        }

        .responsive-container-block.bigContainer {
        background-image: initial;
        background-position-x: initial;
        background-position-y: initial;
        background-size: initial;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color: black;
        padding-top: 10px;
        padding-right: 20px;
        padding-bottom: 10px;
        padding-left: 20px;
        margin: 0 0 0 0;
        }

        .responsive-container-block.Container {
        max-width: 1320px;
        align-items: center;
        justify-content: center;
        margin-top: 80px;
        margin-right: auto;
        margin-bottom: 80px;
        margin-left: auto;
        padding-top: 10px;
        padding-right: 0px;
        padding-bottom: 10px;
        padding-left: 0px;
        }

        .responsive-container-block.leftSide {
        width: auto;
        align-items: flex-start;
        padding-top: 10px;
        padding-right: 0px;
        padding-bottom: 10px;
        padding-left: 0px;
        flex-direction: column;
        position: static;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
        max-width: 300px;
        }

        .text-blk.heading {
        font-size: 40px;
        line-height: 55px;
        font-weight: 900;
        color: brown;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 30px;
        margin-left: 0px;
        }

        .text-blk.btn {
        color: rgb(0, 178, 235);
        background-image: initial;
        background-position-x: initial;
        background-position-y: initial;
        background-size: initial;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color: rgb(255, 255, 255);
        box-shadow: rgba(160, 121, 0, 0.2) 0px 12px 35px;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        padding-top: 20px;
        padding-right: 50px;
        padding-bottom: 20px;
        padding-left: 50px;
        cursor: pointer;
        }

        .responsive-container-block.rightSide {
        width: 675px;
        position: relative;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        display: flex;
        height: 700px;
        min-height: auto;
        }

        .number1img {
        transition:1s;
        margin-top: 39%;
        margin-right: 80%;
        margin-bottom: 29%;
        margin-left: 5px;
        height: 27%;
        width: 20%;
        position: absolute;
        cursor:pointer;
        }

        .number2img {
        transition:1s;
        margin-top: 15%;
        margin-right: 42%;
        margin-bottom: 42%;
        margin-left: 23%;
        width: 35%;
        height: 35%;
        position: absolute;
        cursor:pointer;
        }

        /* .number3img {
        transition:1s;
        width: 13%;
        height: 21%;
        position: absolute;
        margin-top: 62%;
        margin-right: 64%;
        margin-bottom: 30%;
        margin-left: 23%;
        cursor:pointer;
        } */

        .number4vid {
        transition:1s;
        width: 34%;
        height: 33%;
        position: absolute;
        margin-top:54%;
        margin-right: 27%;
        margin-bottom: 0px;
        margin-left: 28%;
        cursor:pointer;
        }
        .number4vid:hover,
        .number1img:hover,
        .number2img:hover,
        .number3img:hover,
        .number5img:hover,
        .number6img:hover,
        .number7img:hover{
            transform: scale(1.2);
            z-index:2;
        }

        /* .number5img {
        transition:1s;
        position: absolute;
        width: 13%;
        height: 21%;
        margin-top: 38%;
        margin-right: 27%;
        margin-bottom: 41%;
        margin-left: 60%;
        cursor:pointer;
        } */

        .number6img {
        transition:1s;
        position: absolute;
        margin-top: 2%;
        margin-right: 3%;
        margin-bottom: 67%;
        margin-left: 60%;
        width: 35%;
        height: 44%;
        cursor:pointer;
        }

        .number7img {
        transition:1s;
        transition:
        position: absolute;
        width: 37%;
        margin-top: 50%;
        margin-right: 0px;
        margin-bottom: 18%;
        margin-left: 64%;
        height: 49%;
        cursor:pointer;
        }

        .text-blk.subHeading {
        font-size: 14px;
        line-height: 25px;
        }

        @media (max-width: 1024px) {
        .responsive-container-block.Container {
            flex-direction: column-reverse;
        }

        .text-blk.heading {
            text-align: center;
            max-width: 370px;
        }

        .text-blk.subHeading {
            text-align: center;
        }

        .responsive-container-block.leftSide {
            align-items: center;
            max-width: 480px;
        }

        .responsive-container-block.rightSide {
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 100px;
            margin-left: auto;
        }

        .responsive-container-block.rightSide {
            margin: 0 auto 70px auto;
        }
        }

        @media (max-width: 768px) {
        .responsive-container-block.rightSide {
            width: 450px;
            height: 450px;
        }

        .responsive-container-block.leftSide {
            max-width: 450px;
        }
        }

        @media (max-width: 500px) {
        .number1img {
            display: none;
        }

        .number2img {
            display: none;
        }

        .number3img {
            display: none;
        }

        .number5img {
            display: none;
        }

        .number6img {
            display: none;
        }

        .number7img {
            display: none;
        }

        .responsive-container-block.rightSide {
            width: 100%;
            height: 250px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 100px;
            margin-left: 0px;
        }

        .number4vid {
            position: static;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
            width: 100%;
            height: 100%;
        }

        .text-blk.heading {
            font-size: 25px;
            line-height: 40px;
            max-width: 370px;
            width: auto;
        }

        .text-blk.subHeading {
            font-size: 14px;
            line-height: 25px;
        }

        .responsive-container-block.leftSide {
            width: 100%;
        }
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
        <div class="responsive-container-block bigContainer">
        <div class="responsive-container-block Container">
            <div class="responsive-container-block leftSide">
                <p class="text-blk heading">
                    Meet Our Creative Team
                </p>
                <p class="text-blk subHeading">
                Welcome to Blue Wheels, a premier online destination designed to cater to the diverse needs of automotive enthusiasts and consumers alike. With a passion for automobiles at the core of our platform, we aim to create a space that mirrors your love for cars and motorcycles. Our platform is more than just a website; it's a thriving community where enthusiasts come together to discuss, share, and connect. Whether you're a seasoned car aficionado or a curious beginner, Blue Wheels provides a welcoming environment for all.
                </p>
            </div>
            <div class="responsive-container-block rightSide">
                <img class="number1img" src="wasam_pic.jpg">
                <img class="number2img" src="sufi_pic.jpg">
                <!-- <img class="number3img" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/Customer supports.png"> -->
                <!-- <img class="number5img" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/Customer supports.png"> -->
                <img class="number4vid" src="zain_pic.jpg">
                
                <img class="number7img" src="haider_pic.jpg">
                <img class="number6img" src="anees_pic.jpg">
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
    </body>
</html>
