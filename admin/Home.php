<?php
    include('../bootstrap.php');
    session_start();
    if(empty($_SESSION['name']))
        header("location: index.php");
    echo $_SESSION['name'];

    //logout handle
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: index.php");
    }
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