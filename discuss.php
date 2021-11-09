<?php
    include('nav.php');
    include('./db.php');
    

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "select * from content where id = $id";
        $res = mysqli_query($con,$query);
        while($arr = mysqli_fetch_assoc($res)){

?>
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p class="lead"><?php echo $arr['ques']; ?></p>
  </div>
</div>
<?php
    } } else{
     header("location: index.php");   
    }
?>
<hr>

<?php
if(isset($_POST['submit'])){
        if($_POST['email'] != "" and $_POST['name'] != "" and $_POST['comment'] != ""){
            $quesid = $id;
            $email = $_POST['email'];
            $name = $_POST['name'];
            $comment = $_POST['comment'];
            $query = "insert into comment (quesid,name,email,comment) values
            ('$id','$name','$email','$comment')";
            $res = mysqli_query($con,$query);
            if($res){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Comment Added</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Something Went Wrong</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            }
        }
        else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Fields Cannot Be Empty</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    }
?>
<form method="POST" >
  <div class="form-row">
    <div class="col-md-1"></div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-5">
      <label for="name">Name</label>
      <input type="input" name="name" class="form-control" id="name" required>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="form-row">
      <div class="col-md-1"></div>
  <div class="form-group col-md-6">
    <label for="discuss">Discuss</label>
    <textarea class="form-control" name="comment" id="discuss" rows="3"></textarea>
  </div>
  <div class="col-md-1"></div>
</div>
<div class="form-row">
    <div class="col-md-1"></div>
<button type="submit" name="submit" class="btn btn-primary">Comment</button>
</div>
</form>


<?php
    $query = "select * from comment where quesid=$id";
    $res = mysqli_query($con,$query);
    while($arr = mysqli_fetch_assoc($res)){

?>

<hr>
<div class="media">
  <img src="data:image/png;base64,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" class="align-self-center mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0"><?php echo $arr['name']; ?></h5>
    <p><?php echo $arr['comment']; ?></p>
  </div>
</div>
<hr>

<?php  }?>