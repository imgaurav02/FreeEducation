<?php
    include('../nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
<ul class="list-group">
    <li class="list-group-item">Available Pdf for Classes</li>

  <a href="subject.php?class=3"><li class="list-group-item list-group-item-primary">class 3</li></a>
  <a href="subject.php?class=4"><li class="list-group-item list-group-item-secondary">class 4</li></a>
  <a href="subject.php?class=5"><li class="list-group-item list-group-item-success">class 5</li></a>
  <a href="subject.php?class=6"><li class="list-group-item list-group-item-danger">class 6</li></a>
</ul>
</body>
</html>