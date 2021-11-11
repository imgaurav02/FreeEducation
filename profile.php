<?php
    include('db.php');
    include('nav.php');
    if($_SESSION['student'] == NULL){
        header("location: Login.php");
    }

?>