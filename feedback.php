<?php
    session_start();
    include 'db.sql.php';
    $existingUser = $_SESSION['username'];
    $newName = $_POST['newName'];

    $sql = "UPDATE customers SET customer_name = '$newName' WHERE customer_name = '$existingUser'";
    mysqli_query($conn, $sql);
    $_SESSION['username'] = $newName;

    echo "Successfully updated";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="profile.php" method='post'>
        <button type="submit" name="submit" value="Go back">Go Back</button>
    </form>
</body>
</html>