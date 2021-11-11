<?php
    include('bootstrap.php');
    session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php 
        if(empty($_SESSION['student'])){

      ?>
      <li class="nav-item">
        <a class="nav-link" href="./Login.php">Login</a>
      </li>
      <li class="nav-item">
        <a href="./Signup.php" class="nav-link">Create Account</a>
      </li>
      <?php } else{ ?>
        <li class="nav-item">
          <a href="./profile.php" class="nav-link">Profile</a>
        </li>
        <li class="nav-item">
          <a href="./logout.php" class="nav-link">Logout</a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>