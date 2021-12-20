<?php
    include("../nav.php");
    include("../db.php");

    if(isset($_GET['class']) and isset($_GET['subject'])){
        if($_GET['class'] != "" and $_GET['subject'] != ""){
            $class = $_GET['class'];
            $subject = $_GET['subject'];
            $query = "select * from pdf where class = '$class' and subject = '$subject' and isVisible = 1";
            $res = mysqli_query($con,$query);
            $count = mysqli_num_rows($res);
            if($count){

            
?>
  <h1>PDF's</h1>
<?php
  while($arr = mysqli_fetch_assoc($res)){
?>
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
  <?php echo $arr['name'] ?>
    <a href ="<?php echo $arr['link'] ?>" target="_"><span class="btn btn-primary">Download</span></a>
  </li>
  
</ul>

<?php }?>
<?php
    }else{
      echo '<h1>No Data Found</h1>';

    }
    }else{
        echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Error</h4>
        <p>Hey You Do Not Play With URLS</p>
        <hr>
        <p>Understand?</p>
      </div>'; 

    }
}
    else{
        echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Error</h4>
        <p>Hey You Do Not Play With URLS</p>
        <hr>
        <p>Understand?</p>
      </div>'; 
    }
?>