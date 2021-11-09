<?php
    include('../bootstrap.php');
    include('../db.php');
    session_start();
?>


<?php
    if(isset($_POST['login']))
    {
        if($_POST['email'] != NULL and $_POST['password'] != NULL){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "select * from admin where email = '$email' and password = '$password' ";
            $res = mysqli_query($con,$query);
            if(mysqli_fetch_row($res)){
                $_SESSION['name']=$email;
                header("location: Home.php");
            }
            else{
                echo "email or password is incorrect";
            }
        }
        else
            echo "Username And password Can't be empty";
    }
?>
<?php
    if(!empty($_SESSION['name'])){
        header("location: Home.php");
    }
?>
<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
</form>
