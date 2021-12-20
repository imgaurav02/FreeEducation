<?php
    include('../nav.php');
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
        if(isset($_GET['class'])){
            $id = $_GET['class'];
    ?>
<ul class="list-group">
    <li class="list-group-item">Available Subjects</li>

  <a href="downloads.php?class=<?php echo $id ?>&subject=math"><li class="list-group-item list-group-item-primary">Maths</li></a>
  <a href="downloads.php?class=<?php echo $id ?>&subject=science"><li class="list-group-item list-group-item-secondary">Science</li></a>
  <a href="downloads.php?class=<?php echo $id ?>&subject=english"><li class="list-group-item list-group-item-success">English</li></a>
</ul>
<?php } else{
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