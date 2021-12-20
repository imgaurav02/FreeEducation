<?php
    include('nav.php');
    include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
</head>
<body>
    <?php
        if(isset($_GET['class']) and isset($_GET['subject'])){
            if($_GET['class'] != NULL and $_GET['subject'] != NULL){
                $id = $_GET['class'];
                $subject = $_GET['subject'];
                $record = mysqli_num_rows(mysqli_query($con,"select * from content where class = '$id' and subject = '$subject'  and isVisible = 1"));
                $per_page = 5;
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
                $query = "select * from content  where class = '$id' and subject = '$subject'  and isVisible = 1 limit $start,$per_page";
                $res = mysqli_query($con,$query);
                $page = ceil($record/$per_page);
                while($arr = mysqli_fetch_assoc($res)){

    ?>
    <div class="card mb-5">

    <div class="card-body">
        <h5 class="card-title"><?php echo $arr['subject'] ?></h5>
        <p class="card-text"><?php echo $arr['ques'] ?></p>
        <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Hello<?php echo $arr['id']; ?>" aria-expanded="false">See Answer</button>
        <a class="btn btn-warning" href="discuss.php?id=<?php echo $arr['id']; ?>" >Discuss</a>
        </p>
        <div class="row">
        <div class="col">
            <div class="collapse multi-collapse" id="Hello<?php echo $arr['id']; ?>">
            <div class="card card-body">
                <?php echo $arr['answer']; ?>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
<?php } 
    ?>
    <div class="container">
  <ul class="pagination pagination-sm">
      <?php for($i = 1;$i<= $page;$i++){ ?>
    <li class="page-item active"><a href="content.php?class=<?php echo $id; ?>&subject=<?php echo $subject; ?>&start=<?php echo $i;?>"><span class="page-link"><?php echo $i; ?></span></li></a>
    <?php }?>
  </ul>

</div>

    <?php

} else{
    echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Error</h4>
        <p>Hey You Do Not Play With URLS</p>
        <hr>
        <p>Understand?</p>
      </div>';
}} else{
        echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Error</h4>
        <p>Hey You Do Not Play With URLS</p>
        <hr>
        <p>Understand?</p>
      </div>';    
    
    }
?>

</body>
</html>