<?php 
if(isset($_GET['p_id'])) {
$thePostEdit_Id=$_GET['p_id'];
    //echo $thePostEdit_Id;
        $queryGetPost_id="SELECT * FROM `posts` WHERE `post_id`='$thePostEdit_Id'";
$result=mysqli_query($conn,$queryGetPost_id);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                   // $id=$row['post_id'];
                     $Author=$row['post_author'];
                     $title=$row['post_title'];
                     $category=$row['post_cat'];
                     $status=$row['post_status'];
                     $image=$row['psot_image'];
                     $tags=$row['post_tag'];
                    $content=$row['post_content'];
                    $comments=$row['post_comment_count'];
                }
            }
}


         if(isset($_POST['updatePost'])){
   // echo "yaa i am clicked";
                $title=$_POST['title'];
                $author=$_POST['author'];
                $category_id=$_POST['catTitleID'];
                $content=$_POST['content'];
                $tag=$_POST['tag'];
                //$dateData=date('d-m-y');
                
                $imageData=$_FILES['imageData']['name'];
                $imgTemp=$_FILES['imageData']['tmp_name'];
                
                //$comment=$_POST['comment'];
                $status=$_POST['status'];
                
                // image upload in local Drive as server
                move_uploaded_file($imgTemp,"../images/$imageData");
             if(empty($imageData)){
                 $queryImage="select 'post_img' from posts where 'post_id'='$thePostEdit_Id'";
                 $getImage=mysqli_query($conn,$queryImage);
                 while($imageRow=mysqli_fetch_assoc($getImage)>0){
                     $imageData=$imageRow['post_image'];
                 }
             }
    
    $query="UPDATE `posts` SET `post_cat`='$category_id',`post_title`='$title',`post_author`='$author',`post_date`=now(),`psot_image`='$imageData',`post_content`='$content',`post_tag`='$tag',`post_status`='$status' WHERE post_id='$thePostEdit_Id'";
                
    $updatePost=mysqli_query($conn,$query);
    confirmQuery($updatePost);
        echo '<div class="alert alert-success" role="alert">Your Post Got Updated'.' '.'<a href="Post.php">View POST</a>'.'</div>';
  


      }


 
      


?>




<form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <label for="title">Post Title</label>
                <input value="<?php echo $title; ?>" type="text" class="form-control" name="title" required autofocus>
                </div>
                
            <div class="form-group">
                <label for="author">Post Author</label>
                <input value="<?php echo $Author; ?>"  type="text" class="form-control" name="author">
                </div>
                

          <div class="form-group">
              <select name="catTitleID" id="">Slect your
              
              
              
              <?php 
              $queryData="SELECT * FROM `categorytable` WHERE 1";
              
              $res=mysqli_query($conn,$queryData);
          if(mysqli_num_rows($res)>0){
          while($row=mysqli_fetch_assoc($res)){
              $cat_title=$row['cat_title'];
              $cat_id=$row['cat_id'];
              echo "<option value='$cat_id'>$cat_title</option>";
          }
          }
                  
         
              ?>
                </select>  

    </div>      
                
            <div class="form-group">
                <label for="content">Post Content</label>
                <textarea class="form-control" cols="30" rows="10" name="content"><?php echo $content; ?>" </textarea>
                </div>
                
                <div class="form-group">
                <label for="tag">Post Tag</label>
                <input value="<?php echo $tags; ?>"  type="text" class="form-control" name="tag">
                </div>
                
<!--
                <div class="form-group">
                <label for="dateData">Post Date</label>
                <input type="date" class="form-control" name="dateData">
                </div>
-->
<!--
    <div class="form-group">
                <label for="imageData">Post Image</label>
                <input type="file" class="form-control" name="imageData">
                </div>
-->
                
                <div class="form-group">
                <label for="imageData">Post Image</label>
                <input type="file" class="form-control" name="imageData">
                    
                <img width="50" name="imageData" src="../images/<?php echo $image; ?>" alt="ImageData"
                </div>
                
<!--
                <div class="form-group">
                <label for="comment">Post Comment</label>
                <input value="<?php echo $comments; ?>"  type="text" class="form-control" name="comment">
                </div>
-->
          
                    <div class="form-group">
                    <select name="status" id="">
                   <option value="<?php  echo $status; ?>"><?php  echo $status; ?></option>     
                     <?php
                        if($status=='published'){
         echo "<option value='draft'>Draft</option>";
                        }else{
                echo "<option value='published'>Published</option>";            
                        }
                        ?>
                        
                        </select>
                    </div>
                
<!--
                <div class="form-group">
                <label for="satus">Post Status</label>
                <input value="<?php echo $status; ?>"  type="text" class="form-control" name="status">
                </div>
-->
                
                <div class="form-group">
                
                <input type="submit"  class="form-control btn btn-danger" name="updatePost" value="UpDate Post">
                </div>
                
                </form>