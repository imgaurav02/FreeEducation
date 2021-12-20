<?php
    include("../db.php");
    include("../bootstrap.php");

    session_start();
    if(empty($_SESSION['name']))
        header("location: index.php");


    // checking admin type
    $email = $_SESSION['name'];
    $query = "select * from admin where email = '$email'";
    $res = mysqli_query($con,$query);
    $res = mysqli_fetch_array($res);
    if($res['adminType'] == 0){
        header("location: index.php");
    }

    $query = "select link from meet where id = 1";
    $res = mysqli_query($con,$query);
    $link = mysqli_fetch_array($res);

    if(isset($_POST['update'])){
        $link = $_POST['meetlink'];
        $query = "update meet set link = '$link' where id = 1";
        $res = mysqli_query($con,$query);
        if($res){
            header("location: update_class.php?success=true");
        }
        else{
            header("location: update_class.php?success=false");
        }
    }

    if(isset($_GET['success']) and $_GET['success'] == 'true'){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Meet Link Updated Successfully!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }
    else if(isset($_GET['success']) and $_GET['success'] == 'false'){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Something went wrong</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }
?>

<form method="post">
  <div class="form-group">
    <label for="meetlink">Meet Link</label>
    <input type="text" name="meetlink" class="form-control" id="meetlink" value="<?php echo $link['link'] ?>">
  </div>
  <button type="submit" name="update" class="btn btn-primary">Submit</button>
</form>

<a href="index.php" class="btn btn-link center mt-5">Go back</a>