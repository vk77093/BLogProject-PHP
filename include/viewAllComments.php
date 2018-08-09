          <table class="table table-bordered table-hover">
                       <thead>
                       <tr>
                <th>Id</th>
               <th>Author</th>
               <th>Comments</th>
               <th>Email</th>
               <th>Status</th>
               <th>InResponse To</th>
               <th>date</th>
               <th>Approve</th>
                <th>UnApprove</th>
<!--            <th>Edit</th>-->
            <th>Delete</th>
                           
                       
                       </tr>
                       
                       
                       </thead>
                  
                   <tbody>
                       <?php
  $queryGetPost="SELECT * FROM `comments` WHERE 1";
$result=mysqli_query($conn,$queryGetPost);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row['comment_id'];
                     $Author=$row['comment_author'];
                    $content=$row['comment_content'];
                     $emails=$row['comment_email'];
                     $status=$row['comment_status'];
 $comment_post_id=$row['comment_post_id'];
         $comment_date=$row['comment_date'];
                    echo "<tr>";
                    echo "<td>$id</td>";
                     echo "<td>$Author</td>";
                     echo "<td width=1>$content</td>";   
                     echo "<td style='width:10'>$emails</td>";
                     echo "<td style='width:10'>$status</td>";
                    
        $query2="SELECT `post_id`,`post_title` FROM `posts` WHERE `post_id`='$comment_post_id'";   
                    $select_post_Data=mysqli_query($conn,$query2);
        if(mysqli_num_rows($select_post_Data)>0){
    while($row=mysqli_fetch_assoc($select_post_Data)){
        $post_title=$row['post_title'];
         $post_id=$row['post_id'];
         echo "<td><a href='../postCondClick.php?p_id=$post_id'>$post_title</a></td>";
    }
}
          
     echo "<td>$comment_date</td>";

     echo "<td><a href='commentsPost.php?approve=$id'>Approve</a></td>";
     echo "<td><a href='commentsPost.php?unapprove=$id'>UnApprove</a></td>";
//    echo "<td><a href='Post.php?source=editPost&p_id=$id'>Edit</a></td>";
    echo "<td><a href='commentsPost.php?delete=$id'>Delete</a></td>";
    echo "</tr>";

}
} 
                                  
             ?>                
                           
                   </tbody>
                        </table>

<?php
if(isset($_GET['approve'])){
    $approvePost=$_GET['approve'];
    $queryApprove="UPDATE `comments` SET `comment_status`='approve' WHERE `comment_id`='$approvePost' ";
    $res=mysqli_query($conn,$queryApprove);
    header("Location:commentsPost.php");
    //confirmQuery($res);
}
?>

<?php
if(isset($_GET['unapprove'])){
    $UnapprovePost=$_GET['unapprove'];
    $queryUnApprove="UPDATE `comments` SET `comment_status`='unapprove' WHERE `comment_id`='$UnapprovePost'";
    $res=mysqli_query($conn,$queryUnApprove);
    header("Location:commentsPost.php");
    //confirmQuery($res);
}
?>

<?php
if(isset($_GET['delete'])){
    $deletePost=$_GET['delete'];
    $queryDelete="DELETE FROM `comments` WHERE `comment_id`='$deletePost'";
    $res=mysqli_query($conn,$queryDelete);
    header("Location:commentsPost.php");
    //confirmQuery($res);
}
?>

                       
            



