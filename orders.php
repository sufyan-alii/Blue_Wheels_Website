<?php

    // Include your database connection and helper functions if needed
    $db_name="mysql:host=localhost;dbname=multi_vender_db";
    $username="root";
    $password="";
    $conn= new PDO($db_name,$username,$password);

    // Fetch order details
    $orderQuery = $conn->query("SELECT * FROM order_details ORDER BY id DESC");
    $orderData = $orderQuery->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Order Details Table with Search Filter</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/c6f49c35e4.js" crossorigin="anonymous"></script>
   <style>
            *{
        margin:0px;
        padding:0px;
    }
    body{
        background-color:FFFFFF;
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
        color:lightgray;
        text-decoration:none;
    }
    li a:hover{
        color:brown;
        cursor:pointer;             
    }
    body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 30px auto;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            opacity: 0;
                transform: translateX(-100%);
                animation: fadeRightAnimation 1.7s forwards;
            }
            @keyframes fadeRightAnimation {
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

        .table-wrapper .btn {
            float: right;
            color: #333;
            background-color: #fff;
            border-radius: 3px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-wrapper .btn:hover {
            color: #333;
            background: #f2f2f2;
        }

        .table-wrapper .btn.btn-primary {
            color: #fff;
            background: #03A9F4;
        }

        .table-wrapper .btn.btn-primary:hover {
            background: #03a3e7;
        }

        .table-title .btn {
            font-size: 13px;
            border: none;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        .table-title {
            color: #fff;
            background: #4b5366;
            padding: 16px 25px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }



        .table-filter .filter-group {
            float: right;
            margin-left: 15px;
        }

        .table-filter input,
        .table-filter select {
            height: 34px;
            border-radius: 3px;
            border-color: #ddd;
            box-shadow: none;
        }

        .table-filter {
            padding: 5px 0 15px;
            border-bottom: 1px solid #e9e9e9;
            margin-bottom: 5px;
        }

        .table-filter .btn {
            height: 34px;
        }

        .table-filter label {
            font-weight: normal;
            margin-left: 10px;
        }

        .table-filter select,
        .table-filter input {
            display: inline-block;
            margin-left: 5px;
        }

        .table-filter input {
            width: 200px;
            display: inline-block;
        }

        .filter-group select.form-control {
            width: 110px;
        }

        .filter-icon {
            float: right;
            margin-top: 7px;
        }

        .filter-icon i {
            font-size: 18px;
            opacity: 0.7;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 80px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.view {
            width: 30px;
            height: 30px;
            color: #2196F3;
            border: 2px solid;
            border-radius: 30px;
            text-align: center;
        }

        table.table td a.view i {
            font-size: 22px;
            margin: 2px 0 0 1px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }

        .text-success {
            color: #10c469;
        }

        .text-info {
            color: #62c9e8;
        }

        .text-warning {
            color: #FFC107;
        }

        .text-danger {
            color: #ff5b5b;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
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
    background-color: #FD3635;
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
   </style>
</head>
<body>
        <div class="header">
            <div class="logo-name">
            <img src="logo.png" alt="">
                <!-- <font>SUFI WHEELS</font> -->
            </div>
            <ul>
                <li><a href="admin_site.php" style="text-decoration:none;">HOME</a></li>
                <li><a href="orders.php" style="text-decoration:none;">VIEW ORDERS</a></li>
                <li><a href="about_us_admin.php" style="text-decoration:none;">ABOUT US</a></li>
                <li><a href="request_page.php" style="text-decoration:none;">REQUESTS</a></li>
                <li><a href="pakwheel_insert_form.php" style="text-decoration:none;">SELL CAR</a></li>
                <li><a href="login.php" style="text-decoration:none;">LOG OUT</a></li>
            </ul>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
        <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Order <b>Details</b></h2>
                </div>
                <div class="col-sm-8">
                        <a href="admin_site.php" class="btn btn-primary"><i
                                class="material-icons">&#xE5C8;</i> <span>Back To Home</span></a>
                </div>
            </div>
        </div>
        <div class="table-filter">
            <div class="row">
                <div class="col-sm-9">
                    <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    <div class="filter-group">
                        <label>Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="filter-group">
                        <label>Location</label>
                        <select class="form-control">
                            <option>All</option>
                            <option>Berlin</option>
                            <option>London</option>
                            <option>Madrid</option>
                            <option>New York</option>
                            <option>Paris</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Status</label>
                        <select class="form-control">
                            <option>Any</option>
                            <option>Delivered</option>
                            <option>Shipped</option>
                            <option>Pending</option>
                            <option>Cancelled</option>
                        </select>
                    </div>
                    <span class="filter-icon"><i class="fa fa-filter"></i></span>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                    <th>Complete</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($orderData as $order): ?>
            <?php
                // Fetch product data based on the productID from the order
                $productQuery = $conn->prepare("SELECT * FROM cars_details WHERE carID = ?");
                $productQuery->execute([$order['productID']]);
                $productData = $productQuery->fetch(PDO::FETCH_ASSOC);

                // Fetch user data based on the userID from the order
                $userQuery = $conn->prepare("SELECT * FROM login_data WHERE id = ?");
                $userQuery->execute([$order['userID']]);
                $userData = $userQuery->fetch(PDO::FETCH_ASSOC);
            ?>
                <tr>
                    <td><?php echo $userData['id']; ?></p></td>
                    <td><p><?php echo $userData['full_name']; ?></p></td>
                    <td><p><?php echo $userData['username']; ?></p></td>
                    <td><p><?php echo $userData['password']; ?></p></td>
                    <td><p><?php echo $userData['contact_number']; ?></p></td>
                    <td><a href="order_details.php?id=<?php echo $order['id']; ?>" class="view" title="View Details" data-toggle="tooltip"><i
                                class="material-icons">&#xE5C8;</i></a></td>
                    <td>
                        <a href=<?php echo "orderDelete.php?id=$order[0]";?> class="view" title="Order Complete" data-toggle="tooltip" >
                        <i class="fa-sharp fa-solid fa-check"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="footer-container">
            <div class="footer-detail-block">
                <div class="footer-name">
                    <font>BLUE WHEELS</font>
                    <center>
                        <div class="footer-small-line">
                            <hr>
                        </div> 
                        </center>
                </div>
                <div class="footer-details">
                <ul>
                    <li><a href="admin_site.php" style="text-decoration:none;">HOME</a></li>
                    <li><a href="orders.php" style="text-decoration:none;">VIEW ORDERS</a></li>
                    <li><a href="about_us_admin.php" style="text-decoration:none;">ABOUT US</a></li>
                    <li><a href="request_page.php" style="text-decoration:none;">REQUESTS</a></li>
                    <li><a href="pakwheel_insert_form.php" style="text-decoration:none;">SELL CAR</a></li>
                    <li><a href="login.php" style="text-decoration:none;">LOG OUT</a></li>
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
        <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>
