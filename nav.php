<?php
    include('bootstrap.php');
    session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost/freeEducation/index.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/freeEducation/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php 
        if(empty($_SESSION['student'])){

      ?>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/freeEducation/Login.php">Login</a>
      </li>
      <li class="nav-item">
        <a href="http://localhost/freeEducation/Signup.php" class="nav-link">Create Account</a>
      </li>
      <?php } else{ ?>
        <li class="nav-item">
          <a href="http://localhost/freeEducation/profile.php" class="nav-link">Profile</a>
        </li>
        <li class="nav-item">
          <a href="http://localhost/freeEducation/logout.php" class="nav-link">Logout</a>
        </li>
      <?php } ?>
      <li class="nav-item active">
        <a class="nav-link" href="./games">Games <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>