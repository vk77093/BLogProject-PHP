
             <?php
            if(isset($_POST['post_ADD'])){
                $title=$_POST['title'];
             $author=$_POST['author'];
                $category_id=$_POST['catTitleID'];
                $content=$_POST['content'];
                $tag=$_POST['tag'];
                $dateData=date('d-m-y');
                
                $imageData=$_FILES['imageData']['name'];
                $imgTemp=$_FILES['imageData']['tmp_name'];
                
                //$comment=$_POST['comment'];
                $status=$_POST['status'];
                
                // image upload in local Drive as server
                move_uploaded_file($imgTemp,"../images/$imageData");
                
//                if(!move_uploaded_file($imgTemp,"BLOG_PROJECT\include\serverImage/$imageData")){
//
//                    echo "some error";
//           }
    $query="INSERT INTO `posts`(`post_id`,`post_cat`, `post_title`, `post_author`, `post_date`, `psot_image`, `post_content`, `post_tag`,  `post_status`) VALUES('',$category_id,'$title','$author',now(),'$imageData','$content','$tag','$status')";  
                $addPostQuery=mysqli_query($conn,$query);
                confirmQuery($addPostQuery);
               
               echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-thumbs-up'>you suceesfully Add the Post</span></div>";
//            }
           }
            
            ?>
               
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" name="title" required autofocus>
                </div>
                
            <div class="form-group">
                <label for="author">Post Author</label>
                <input type="text" class="form-control" name="author">
                </div>
                
<!--
                <div class="form-group">
                <label for="category">Post categoryId</label>
                <input type="Number" class="form-control" name="category">
                </div>
-->
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
                <textarea class="form-control" cols="30" rows="10" name="content"></textarea>
                </div>
                
                <div class="form-group">
                <label for="tag">Post Tag</label>
                <input type="text" class="form-control" name="tag">
                </div>
                
<!--
                <div class="form-group">
                <label for="dateData">Post Date</label>
                <input type="date" class="form-control" name="dateData">
                </div>
-->
                
                <div class="form-group">
                <label for="imageData">Post Image</label>
                <input type="file" class="form-control" name="imageData">
                </div>
                
<!--
                <div class="form-group">
                <label for="comment">Post Comment</label>
                <input type="text" class="form-control" name="comment">
                </div>
-->
                
                <div class="form-group">
                <label for="satus">Post Status</label>
                <input type="text" class="form-control" name="status">
                </div>
                
                <div class="form-group">
                
                <input type="submit"  class="form-control btn btn-danger" name="post_ADD" value="addPost">
                </div>
                
                </form>
           
            
        
    