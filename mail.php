<?php
if(isset($_POST['send'])){

    if(isset( $_POST['name']))
    $name = $_POST['name'];
    if(isset( $_POST['email']))
    $email = $_POST['email'];
    if(isset( $_POST['message']))
    $message = $_POST['message'];
    if(isset( $_POST['subject']))
    $subject = $_POST['subject'];
    
    $content="From: $name \n Email: $email \n Message: $message";
    $recipient = "huterabh1@gmail.com";
    $mailheader = "From: $email \r\n";
    $res = mail($recipient, $subject, $content, $mailheader);
    if($res){
        
        header("location: contact.php?success=true");
    }
    else{
        header("location: contact.php?success=false");
    }
    
}
    
    ?>