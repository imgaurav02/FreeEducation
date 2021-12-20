<?php
    include('db.php');
    include('nav.php');
    if(empty($_SESSION['student'])){
        header("location: Login.php");
    }
    $email = $_SESSION['student'];
    $query = "select * from student where email = '$email'";
    $res = mysqli_query($con,$query);

    $arr = [];
    while($row = mysqli_fetch_array($res)){
        $arr = $row;
    }

    $query = "select link from meet where id = 1";
    $res = mysqli_query($con,$query);
    $link = mysqli_fetch_array($res);

?>


<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Welcome <?php echo ($arr['first_name'] ." " . $arr['last_name']); ?></h1>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Download Pdf</h5>
        
        <a href="./downloads/classes.php" class="btn btn-primary">Click Here</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Live Classes</h5>
        <a href="<?php echo $link['link'] ?>" target="_blank" class="btn btn-primary">Click Here</a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Youtube Classes</h5>
        <a href="#" class="btn btn-primary">Click Here</a>
      </div>
    </div>
</div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Games</h5>
        <a href="./games" class="btn btn-primary">Click Here</a>
      </div>
    </div>
  </div>
</div>