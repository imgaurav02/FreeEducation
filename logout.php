<?php
    session_start();
    if(!empty($_SESSION['student'])){
        unset($_SESSION['student']);
        header("location: Login.php");
    }
    else{
        header("location: index.php");
    }
?>