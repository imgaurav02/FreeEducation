<?php
    include('db.php');
    include('nav.php');
    $err = "";
    if(isset($_POST['login'])){
        if($_POST['email'] != "" and $_POST['password'] != ""){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "select * from student where email = '$email'";
            $res = mysqli_query($con,$query);
            $row = mysqli_num_rows($res);
            if($row > 0){
                $query = "select * from student where email = '$email' and password = '$password'";
                $res = mysqli_query($con,$query);
                $row = mysqli_num_rows($res);
                if($row){
                    session_start();
                    $_SESSION['student'] = $email;
                    header("location: profile.php");
                }
                else{
                    $err = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Email or Password incorrect</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';   
                }
            }
            else{
                $err = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Account Does not exist</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
            }
        }
        else{
            $err = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>All Fields are required..</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';   
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Login Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./style/register.css">
</head>
<body>
<div class="signup-form">
    <?php echo $err;?>
    <form  method="post">
		<h2>Login</h2>
		<p class="hint-text">Login into your account to access free classes. It's free and only takes a minute.</p>

        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <button type="submit" name="login"  class="btn btn-success btn-lg btn-block">Login</button>
        </div>
    </form>
	<div class="text-center">Don't have an account? <a href="./Signup.php">Create Account</a></div>
</div>
</body>
</html>