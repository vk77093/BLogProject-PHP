<!doctype html>

<?php include("include/bootstrap.php");?>
<?php include("include/db_connect.php");?>
<?php include("include/functionData.php");?>




<html lang="en">
  <head>
    

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <!--- NAV BAR hERE----->
<?php include("include/header.php");?>
        <br>
        <br>
        <br>
        
      <div class="nav-scroller bg-black box-shadow">
      <nav class="nav nav-underline ">
<!--          <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">-->
          <!---- First Php Query for DB from Categories Table--->
          <?php   
          $query="SELECT * FROM `categorytable` WHERE 1";
          $res=mysqli_query($conn,$query);
          if(mysqli_num_rows($res)>0){
          while($row=mysqli_fetch_assoc($res)){
              $cat_title=$row['cat_title'];
              $cat_id=$row['cat_id'];
              echo '<li><a class="nav-link" href="categoryCondClick.php?catGet='.$cat_id.'">'.$cat_title.'</a></li>';
          }
          }else{
              echo "sorry No Data Found";
          }
          
          ?>

      </nav>
    </div>
<!--- starting page---->
        
      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
          <p class="lead mb-0"><a href="#" class="text-red font-weight-bold">Continue reading...</a></p>
        </div>
      </div>
        <?php
    
        
        $query="SELECT * FROM `posts`";
        $res=mysqli_query($conn,$query);
        $countPost=mysqli_num_rows($res);
        $count=ceil($countPost/4);
        if(isset($_GET['page'])){
            $page=$_GET['page'];
            
        }else{
            $page="";
        }
        if($page==""|| $page==1){
           $page1=0; 
        }else{
           $page1=($page*4)-4; 
        }
        
        ?>
        
        <?php
        
        $queryPost="SELECT * FROM `posts` LIMIT $page1,4";
        $res1=mysqli_query($conn,$queryPost);
        if(mysqli_num_rows($res1)>0){
            while($row1=mysqli_fetch_assoc($res1)){
                $id=$row1['post_id'];
                $post_title=$row1['post_title'];
                $post_author=$row1['post_author'];
                $post_date=$row1['post_date'];
               $post_content=substr($row1['post_content'],0,100);
                $post_image=$row1['psot_image'];
                $post_status=$row['post_status'];
//                if($post_status !=='published'){
//                    echo "<h3 class='text-center'> Sorry Currentle No Post</h3>";
//                
//                }
                ?>
        <?php //echo "<h1>$count</h1>" ?>
        <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <a href="aurhorPostCond.php?author=<?php echo $post_author ?>&a_id=<?php echo $id ?>"><strong class="d-inline-block mb-2 text-primary"><?php echo $post_author ?></strong></a>
              <h3 class="mb-0">
                <a class="text-dark" href="postCondClick.php?p_id=<?php echo $id?>"><?php echo $post_title ?></a>
              </h3>
              <div class="mb-1 text-muted"><?php echo $post_date ?></div>
              <p class="card-text mb-auto"><?php echo $post_content ?></p>
                
               <p class="lead mb-0"><a href="postCondClick.php?p_id=<?php echo $id?>" class="text-red font-weight-bold">Continue reading...</a></p>
            </div>
              <a href="postCondClick.php?p_id=<?php echo $id?>">
            <img class="card-img-right flex-auto d-none d-md-block" src="images/<?php echo $post_image; ?>" alt="<?php echo $post_image; ?>"></a>
<!--
              <hr>
              <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="<?php echo $post_image; ?>"
-->
          </div>
        </div>
      <div class="col-md-6">
           
        </div>
   
     
      
         </div>
        
        
    
            <?php   }
              }else{
            echo "Sorry No data found some error";
            }  ?>
        
      </div>
      
      
<!--//<?php echo $search;?>-->
       <nav aria-label="Page navigation example center">
  <ul class="pagination pagination-lg justify-content-center">
    <?php 
      for($i=1;$i<=$count;$i++){
          if($i==$page){
              echo'<li class="page-item active"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
          }else{
              echo'<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
          }
        
      }
      ?>
    
    
  </ul>
</nav>
  <!---- mAIN bLOG section---->
      <?php include("include/BlogSection.php");?>
      
    
      
    
<!---- SideBar Section  inside MBlog section--------> 
       
   <!---- footer ----->
      <?php include("include/footer.php");?>
    

   
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>

