<?php

include_once("connection.php");
if(isset($_POST['query'])){
    $query = $_POST['query'];
}

if(isset($_POST['selectQuery'])){
    $query = $_POST['selectQuery'];
}

if ($query == "") {
    header("Location: http://localhost/Project/adminPage.php?fail=1");
    exit();
}

$result = mysqli_query($connection, $query);

if(!$result) {
    mysqli_free_result($result);
    if(isset($_POST['query'])){        
        header("Location: http://localhost/Project/adminPage.php?fail=1");
    }
    else {
        header("Location: http://localhost/Project/adminPage.php?fail=1&select=1");
    }
    die();
    exit();
}

else {
    if(isset($_POST['selectQuery'])){
        mysqli_free_result($result);
        header("Location: http://localhost/Project/adminPage.php?select=1&querytext=".rawurlencode($query));
        exit();
    }
    if(isset($_POST['query'])){
        mysqli_free_result($result);
        header("Location: http://localhost/Project/adminPage.php?query=1");
        exit();
    }
}
?>