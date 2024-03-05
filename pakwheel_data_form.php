<?php
$db_name="mysql:host=localhost;dbname=pakwheel_db";
$username="root";
$password="";
$conn= new PDO($db_name,$username,$password);
$sql=$conn->query("SELECT * FROM cars_details");
$result= $sql-> fetchall();
?>




<style>
    body {
        background-color: #F3F5F3;
    }

    .main-container {
        height: 10rem;
        width: 60%;
        background-color: rgb(104, 15, 15);
        display: flex;
        margin: 30px;
        border: 3px solid E5E5E5;

    }

    .left-container {
        background-color: white;
        height: 100%;
        width: 25%;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .left-container img {
        height: 130px;
        width: 200px;
    }

    .right-container {
        background-color: white;
        height: 100%;
        width: 75%;
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
    }

    .product-name p {
        font-weight: bold;
        color: darkblue;
        font-size: 22px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .product-cost {
        width: 22%;

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
        gap:10px;
        width: 35%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact-no button {
        background-color: 3CB549;
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

    .add-car-btn{
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
</style>




<html>
    <body>
    <center>
    <?php foreach($result as $row){ ?>
        <div class="main-container">
            <div class="left-container"><img src=<?php echo $row["carImage"]; ?> ></div>
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
                    <div class="cc"><p><?php echo $row["CarCc"] ?></p></div>
                    <div class="transmission"><p><?php echo $row["carTransmission"] ?></p></div>
                </div>
                <div class="phone-block">
                    <div class="post-time"><p><?php echo $row["carUpdatetime"] ?></p></div>
                    <div class="contact">
                        <div class="update-button"><a href=<?php echo "carUpdate.php?id=$row[0]";?>>Update</a></div>
                        <div class="delete-button"><a href=<?php echo "carDelete.php?id=$row[0]";?>>Delete</a></div>
                        <div class="contact-no">
                        <button onclick="openWhatsApp('<?php echo $row['carPhonenumber']; ?>')">Contact Number</button></div>
                    </div>
                </div>
            </div>
        </div>
            <?php } ?>
            <div class="add-car-btn"><a href="pakwheel_insert_form.php">ADD CAR DATA</a></div>
         
            <script>
                function openWhatsApp(phoneNumber) {
                var message = encodeURIComponent("Hi, I'm interested in the <?php echo $row['carName']; ?>. Please provide more information.");
                var url = "https://web.whatsapp.com/send?phone=" + phoneNumber + "&text=" + message;
                window.open(url);
            }
            </script>
        
    </center>    
    </body>
</html>