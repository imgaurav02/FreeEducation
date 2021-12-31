<?php
    include('../db.php');
    include('../bootstrap.php');
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
    $record = mysqli_num_rows(mysqli_query($con,"select * from student"));

    $per_page = 10;
    $start = 0;
    if(isset($_GET['start'])){
        $start = $_GET['start'];
        if($start <= 0)
            $start = 0;
        else{
            $start--;
            $start = $start*$per_page;
        }

    }

    $query = "select * from student limit $start,$per_page";
    $res = mysqli_query($con,$query);
    $page = ceil($record/$per_page);
    if($start > $page){
        header("location: Registered_students.php");
    }

?>

<table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Class</th>
            </tr>
        </thead>
        <?php 
            while($arr = mysqli_fetch_assoc($res)){
        ?>
        <tbody>
            <tr>
                <td>1</td>
                <td><?php echo $arr['first_name']; ?></td>
                <td><?php echo $arr['last_name']; ?></td>
                <td><?php echo $arr['email']; ?></td>
                <td><?php echo $arr['class']; ?></td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>

<hr>
<div class="container">
  <ul class="pagination pagination-sm">
      <?php for($i = 1;$i<= $page;$i++){ ?>
    <li class="page-item active"><a href="Registered_students.php?start=<?php echo $i;?>"><span class="page-link"><?php echo $i; ?></span></li></a>
    <?php }?>
  </ul>

</div>

<hr>

<a href="index.php" class="btn btn-link">Go back</a>