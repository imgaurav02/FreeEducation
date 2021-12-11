<?php
    include('../bootstrap.php');
    include('../db.php');
    session_start();
    if(empty($_SESSION['name']))
        header("location: index.php");
    echo $_SESSION['name'];

    //logout handle
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: index.php");
    }

    $email = $_SESSION['name'];
    $query = "select * from admin where email = '$email'";
    $res = mysqli_query($con,$query);
    $res = mysqli_fetch_array($res);

?>


<form method="post">
<button type="submit" class="btn btn-dark" name="logout"> logout</button>
</form>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Add Questions</h5>
    <a href="./addques.php" class="btn btn-primary">Click Here</a>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Add Pdf's</h5>
    <a href="./addpdf.php" class="btn btn-primary">Click Here</a>
  </div>
</div>
 <?php
  if($res['adminType'] == 1){
?> 
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Approve Content</h5>
    <a href="./approveContent.php" class="btn btn-primary">Click Here</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Approve Comment</h5>
    <a href="./approveComent.php" class="btn btn-primary">Click Here</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Approve PDF's</h5>
    <a href="./approvepdf.php" class="btn btn-primary">Click Here</a>
  </div>
</div>

<?php } ?>