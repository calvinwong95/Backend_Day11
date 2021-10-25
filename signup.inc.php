<?php 
session_start();
if (isset($_POST['register-submit'])) {

    require 'db.sql.php';

    //need variables to retreieve from sign up

    $customerName = $_POST['customerName'];
    $customerContact = $_POST['customerNumber'];
    $_SESSION['tac'] = rand(100000,999999);
    $tac = $_SESSION['tac'];
    print_r($tac);
    print_r($conn);
    


    if (empty($customerName) || empty($customerContact)) {
        header("Location: signup.php?error=emptyfields");
        exit();
    }

    else {
        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM customers WHERE customer_name='$customerName';";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);
  
        // if user exists
        if ($user['customer_name'] === $customerName) {
        header("location: signup.php?error=userexists");
            
        }
    
        else  {
            // insert variables into database
            $sql = "INSERT INTO customers (customer_name) VALUES ('$customerName');";
            mysqli_query($conn,$sql);

            $sql = "INSERT INTO checkin (checkin_phone) VALUES ('$customerContact');";
            mysqli_query($conn,$sql);

            $sql = "INSERT INTO tac (tac_tac) VALUES ('$tac');";
            mysqli_query($conn,$sql);
            print_r('hello');
        
            header('Location: tac.php?signup=success');
        }


    }
}
else {
    header("Location: login.php");
    exit();
}