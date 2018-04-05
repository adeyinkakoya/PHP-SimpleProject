<?php
    include_once("connection.php");
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    if($username == "" || $password == ""){
        header("Location: http://localhost/Project/main.php?flag=1");
        exit();
    }
    
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $query = "SELECT * FROM users WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Database query failed");
    }

    $row = mysqli_fetch_assoc($result);
    if($row['Username'] == $username && $row['Password'] == $password && $row['isAdmin'] == 0) {
        header("Location: http://localhost/Project/regularUser.php");
        exit();
    }
    else if ($row['Username'] == $username && $row['Password'] == $password && $row['isAdmin'] == 1) {
        header("Location: http://localhost/Project/adminPage.php");
        exit();
    }
    else {
        header("Location: http://localhost/Project/main.php?flag=1");
        exit();
    }
?>