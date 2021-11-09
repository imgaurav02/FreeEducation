<?php
    include('nav.php');
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

  <a href="content.php?class=<?php echo $id ?>&subject=math"><li class="list-group-item list-group-item-primary">Maths</li></a>
  <a href="content.php?class=<?php echo $id ?>&subject=science""><li class="list-group-item list-group-item-secondary">Science</li></a>
  <a href="content.php?class=<?php echo $id ?>&subject=english""><li class="list-group-item list-group-item-success">English</li></a>
</ul>
<?php } else{
        echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
      </div>';    
    
    }
?>
</body>
</html>