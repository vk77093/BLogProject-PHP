<?php
if(isset($_POST['apply'])){
    echo "i clicked";
    

if(isset($_POST['checkBoxesArray'])){
    $theCheckBox=$_POST['checkBoxesArray'];
foreach($theCheckBox as $checkBoxSeletedId){
    $selected=$_POST['selectOptions'];
    //echo $selected; 
    switch($selected){
        case'published':
        $query1="UPDATE `posts` SET `post_status`='$selected' WHERE `post_id`='$checkBoxSeletedId'";  
        $updatePostStatus=mysqli_query($conn,$query1); 
            confirmQuery($updatePostStatus);
            break;
            
        case 'draft':
            $query1="UPDATE `posts` SET `post_status`='$selected' WHERE `post_id`='$checkBoxSeletedId'";  
        $updatePostStatus=mysqli_query($conn,$query1); 
            confirmQuery($updatePostStatus);
            break;
            
             case 'delete':
            $query1="DELETE FROM `posts` WHERE `post_id`='$checkBoxSeletedId'";  
        $updatePostStatus=mysqli_query($conn,$query1); 
            confirmQuery($updatePostStatus);
            break;
             default:
    echo "not Done";
    }
   
}
}
}
?>

<form action="" method="post">


         

<table class="table table-bordered table-hover">
    <div id="bulkoptionContainer" class="col-xs-4">
    <select class="form-control col xs-4" name="selectOptions" id="">
<option value="">Selecte Options</option>
    <option value="draft">Draft</option>
    <option value="published">Publish</option>
    <option value="delete">Delete</option>
    
    
    </select>    

    
    <div class="col-xs-4 form-control">
    <button class="btn btn-success form-group" type="submit" name="apply" value="Add">Apply</button>
        <button class="btn btn-success form-group" type="submit" value="Add">Add New<a href="Post.php?source=addPost"></a></button>
    </div>
        
                       <thead>
                       <tr>
                <th><input class="checkBoxes" type="checkbox" id="slectedCheckBoxs"></th>           
                <th>Id</th>
               <th>Author</th>
               <th>Title</th>
               <th>Category</th>
               <th>Status</th>
               <th>Image</th>
               <th>Tags</th>
               <th>Cmn</th>
                <th>Date</th>
            <th>Edit</th>
                           <th>Delete</th>
                           
                       
                       </tr>
                       
                       
                       </thead>
                  
                   <tbody>
                       <?php
  $queryGetPost="SELECT * FROM `posts` WHERE 1";
$result=mysqli_query($conn,$queryGetPost);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row['post_id'];
                     $Author=$row['post_author'];
                     $title=$row['post_title'];
                     $category=$row['post_cat'];
                     $status=$row['post_status'];
                     $image=$row['psot_image'];
                     $tags=$row['post_tag'];
                     $comments=$row['post_comment_count'];
                     $date=$row['post_date'];
                    echo "<tr>";
                    ?>
    <td><input class="checkBoxes" type="checkbox" name="checkBoxesArray[]" value="<?php $id ?>"></td>                  
                       <?php
                    echo "<td>$id</td>";
                     echo "<td>$Author</td>";
                     echo "<td>$title</td>";
                    
 $queryData="SELECT * FROM `categorytable` WHERE `cat_id`='$category'";
              
              $res=mysqli_query($conn,$queryData);
          if(mysqli_num_rows($res)>0){
          while($row=mysqli_fetch_assoc($res)){
              $cat_title=$row['cat_title'];
              $cat_id=$row['cat_id'];
              echo "<td>$cat_title</td>";  
              //echo "<td>$cat_title</td>";
          }
          }
    
                     echo "<td>$status</td>";
                     echo "<td><img width=50 class='img-responsive' src='../images/$image' alt='image'></td>";
                     echo "<td width=40>$tags</td>";
                     echo "<td>$comments</td>";
                     echo "<td>$date</td>";
                    echo "<td><a href='Post.php?source=editPost&p_id=$id'>Edit</a></td>";
                    echo "<td><a onclick=\"javascript:return confirm('Do you really want to delete ?');\" href='Post.php?delete=$id'>Delete</a></td>";
                    echo "</tr>";
                    
                }
            } 
                                  
             ?>                
                           
                   </tbody>
                        </table>
</form> 
<?php
if(isset($_GET['delete'])){
    $deletePost=$_GET['delete'];
    $queryDelete="DELETE FROM `posts` WHERE `post_id`='$deletePost'";
    $res=mysqli_query($conn,$queryDelete);
    header("Location:Post.php");
    //confirmQuery($res);
}
?>

                       
            



