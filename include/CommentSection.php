<?php 
if(isset($_POST['create_comment'])){
    $post_id=$_GET['p_id'];
    $author= $_POST['comment_author'];
    $emails=$_POST['comment_emails'];
    $comment=$_POST['comment_content'];
    //$post_count=['post_comment_count'];
    
    $query="INSERT INTO `comments`(`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES('',$post_id,'$author','$emails','$comment','unapproved',now())";
        $commentInsert=mysqli_query($conn,$query);
    if(!$commentInsert){
    die("queryFiled".mysqli_error());

    }
   
   
    else{
        echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-ok'>Thanks for giving Comments</span>
    </div>"; 
    }
     
     $query2="UPDATE `posts` SET `post_comment_count`=`post_comment_count`+ 1 WHERE `post_id`='$post_id' ";
        $updateQuery=mysqli_query($conn,$query2);
}
?>

<div class="well well-lg">
    <h4>Leave a Comment</h4>
<form role="form" method="post" action="">
    <div class="form-group">
        <label for="comment_author">Author</label>
        <input type="text" class="form-control" name="comment_author" id="comment_author" required autofocus> 
    </div>
     <div class="form-group">
        <label for="comment_emails">Emails</label>
        <input type="email"  class="form-control" name="comment_emails" id="comment_emails" aria-describedby="emailHelp" > 
    </div>
    
<div class="form-group">
    <label for="exampleFormControlTextarea1">Comment</label>
    <textarea name="comment_content" class="form-control"width="40" id="exampleFormControlTextarea1" rows="4" cols="10"></textarea>
    </div>
    <div class="form-group">
    <button type="submit" name="create_comment" class="btn btn-primary">Comment</button>
        
        </div>
    
  
</form>
    </div>


<?php 
 $post_id=$_GET['p_id'];
$query3="SELECT * FROM `comments` WHERE `comment_post_id`='$post_id' AND `comment_status`='approve' ORDER BY `comment_id` DESC"; 
$approvedComments=mysqli_query($conn,$query3);
if(mysqli_num_rows($approvedComments)>0){
      while($row=mysqli_fetch_assoc($approvedComments)){
    $date=$row['comment_date'];
    $author=$row['comment_author'];
    $content=$row['comment_content'];
    ?>

<ul class="list-unstyled">
  <li class="media">
    <img class="mr-3" src="serverImage/images%20(1).jpg" alt="Generic
">
    <div class="media-body">
      <h4 class="mt-0 mb-1"><?php echo $author; ?>
        
        </h4>
        <small><?php echo $date; ?></small><br>
      <?php echo $content; ?>
    </div>
  </li>
</ul>
<?php  }
} else{
     //die("queryFailed".mysqli_error());
    echo "<h3>sorry No Comments is still May be admin Not approved your comments</h3>";
}?>

  







