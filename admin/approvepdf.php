<?php
    include "../bootstrap.php";
    include "../db.php";  
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
      
    
      
?>
<?php
    if(isset($_POST['approve']) and $_POST['aid'] != ""){
        $id = $_POST['aid'];
        $query = "update pdf set isVisible = 1 where id = $id";
        $res = mysqli_query($con,$query);
        if($res){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>PDF Approve Successfully</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Something went wrong</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    if(isset($_POST['delete']) and $_POST['did'] != ""){
        $id = $_POST['did'];
        $query = "delete from pdf where id = $id";
        $res = mysqli_query($con,$query);
        if($res){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>PDF Deleted Successfully</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Something went wrong</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }

    $query = "select * from pdf where isVisible = 0";
    $res = mysqli_query($con,$query);
    $count = mysqli_num_rows($res);
    $i = 1;
    if($count > 0){
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Name</th>
      <th scope="col">PDF Link</th>
      <th scope="col">Subject</th>
      <th scope="col">Class</th>
      <th scope="col">Approve</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php while($arr = mysqli_fetch_assoc($res) ) { ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $arr['name'] ?></td>
      <td><a href="<?php echo $arr['link'] ?>" target="blank" >PDF</a></td>
      <td><?php echo $arr['subject'] ?></td>
      <td><?php echo $arr['class'] ?></td>
      <td>
        <form method="post"> 
            <input type="text" name="aid" value="<?php echo $arr['id']; ?>" hidden>
            <button type="submit" name="approve" class="btn btn-success">Approve</button>
        </form>
     </td>
      <td>
        <form method= "post">
            <input type="text" name="did" value="<?php echo $arr['id']; ?>" hidden>
            <button type="submit" name="delete" class="btn btn-danger">Delete</button> 
        </form>
    </td>
    </tr>
<?php }?>
  </tbody>
</table>
<?php 
    }
    else{
        echo '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>There Is No PDF Available for approval</p>
      </div>';
    }
?>
<a href="index.php" class="btn btn-link">Go back</a>