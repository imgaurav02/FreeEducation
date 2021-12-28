<?php

    include('../db.php');
    session_start();
    $err = "";
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if(true){

        if($name != "" and $email != "" and $password != "" and $confirm_password != ""){
            if($confirm_password == $password){
                $query = "select * from admin where email = '$email'";
                $res = mysqli_query($con,$query);
                $row = mysqli_num_rows($res);
                if($row > 0){
                    $err = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>You Seems To already registered With Us. Please Login</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';    
                }
                else{
                    $query = "insert into admin(username,email,password)
                    values ('$name','$email','$password')";
                    $res = mysqli_query($con,$query);
                    if($res){
                        $err = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Congratulations.. You Are registered Successfull With Us</strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';    
                    }
                    else{
                        $err = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Something Went Wrong.. Please Try Again</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';    
                    }
                }
            }
            else{
                $err = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Please Enter Same Password In Both Fields..</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';    
            }
        }
        else{
            $err = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>All Fields Are Required...</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }
        }
    }

?>
<?php
    if(!empty($_SESSION['name'])){
        header("location: Home.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Registration Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../style/register.css">
</head>
<body>
<div class="signup-form">
    <?php echo $err;?>
    <form  method="post">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
        	<input type="text" class="form-control" name="name" placeholder="Full Name" required="required">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
        </div>        
		<div class="form-group">
            <button type="submit" name="register"  class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="./index.php">Sign in</a></div>
</div>
</body>
</html>