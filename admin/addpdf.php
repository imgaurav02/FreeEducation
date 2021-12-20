<?php
    include('../bootstrap.php');
    include('../db.php');
    session_start();
    if(empty($_SESSION['name']))
        header("location: index.php");
    if(isset($_POST['add'])){
        if($_POST['pdfname'] != NULL and $_POST['link'] != NULL and $_POST['class'] != "..." and $_POST['subject'] != "..."){
            $pdfname = $_POST['pdfname'];
            $link = $_POST['link'];
            $c = $_POST['class'];
            $subject = $_POST['subject'];
            $query = "insert into pdf (name,link,class,subject) values ('$pdfname','$link','$c','$subject')";
            $res = mysqli_query($con,$query);
            if($res){
                echo '<div class="alert alert-success" role="alert">
                    Pdf is Added
                 </div>';
            }
            else{
                echo '<div class="alert alert-warning" role="alert">
                    Try After Some Time
                 </div>';
            }
        }
        else{
            echo '<div class="alert alert-warning" role="alert">
                    Please Fill All Fields
                 </div>';
        }
    }
?>


<form method="POST">
    <div class="form-group col-md-4">
        <label for="pdfname">PDF Name to Display</label>
        <textarea class="form-control" name="pdfname" id="name" rows="3"></textarea>
    </div>
    <div class="form-group col-md-4">
        <label for="link">Link</label>
        <textarea class="form-control" name="link" id="link" rows="3"></textarea>
    </div>
    <div class="form-group col-md-4">
      <label for="class">Class</label>
      <select id="class" name="class" class="form-control">
        <option selected>...</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="subject">Subject</label>
      <select id="subject" name="subject" class="form-control">
        <option selected>...</option>
        <option>math</option>
        <option>science</option>
        <option>english</option>
        
      </select>
    </div>
  <button type="submit" name="add" class="btn btn-primary">Add</button>
</form>

<a href="index.php" class="btn btn-link">Go back</a>