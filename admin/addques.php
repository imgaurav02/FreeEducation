<?php
    include('../bootstrap.php');
    include('../db.php');
    session_start();
    if(empty($_SESSION['name']))
        header("location: index.php");
    if(isset($_POST['add'])){
        if($_POST['question'] != NULL and $_POST['answer'] != NULL and $_POST['class'] != "..." and $_POST['subject'] != "..."){
            $question = $_POST['question'];
            $answer = $_POST['answer'];
            $c = $_POST['class'];
            $subject = $_POST['subject'];
            $query = "insert into content (ques,answer,class,subject) values ('$question','$answer','$c','$subject')";
            $res = mysqli_query($con,$query);
            if($res){
                echo '<div class="alert alert-success" role="alert">
                    Question is Added
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
        <label for="question">Question</label>
        <textarea class="form-control" name="question" id="question" rows="3"></textarea>
    </div>
    <div class="form-group col-md-4">
        <label for="answer">Answer</label>
        <textarea class="form-control" name="answer" id="answer" rows="3"></textarea>
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
