<?php
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

    $db_name="mysql:host=localhost;dbname=multi_vender_db";
    $username = "root";
    $password = "";
    $conn= new PDO($db_name,$username,$password);

    //MAke databas ssql delete query
    $postID = array($_GET['id']);
    $sql = $conn->prepare("DELETE FROM cars_details WHERE carID = ?");
    $sql->execute($postID);

    if($sql->rowCount()>0){
        echo "ITEMS DELETED";
    }else{
        echo "ITEMS NOT DELETED";
    }
    // Redirect back to the page where the car details are displayed (e.g., index.php)
    header("Location: admin_site.php");
    exit(); 
?>