<?php
session_start();
include "db.sql.php";
include "header.php";

$existingUser = $_SESSION['username'];

$sql = "SELECT * FROM customers WHERE customer_name = '$existingUser';";
        $result = mysqli_query($conn,$sql);
        $user = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['datecreated'] = $user['date_created'];
            
        }

        

echo "Name: ".$_SESSION['username'] ."<br>";
echo "Date created: ".$_SESSION['datecreated'] ."<br>";




include "footer.php";
?>