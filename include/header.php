<?php //ob_start(); ?>
    <?php include("include/db_connect.php");?>
<?php //include("include/admin_header.php");?>




    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">HOME PAGE</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
<!--
<!--
            <?php   
//          $query="SELECT * FROM `categorytable` WHERE 1";
//          $res=mysqli_query($conn,$query);
//          if(mysqli_num_rows($res)>0){
//          while($row=mysqli_fetch_assoc($res)){
//              $cat_title=$row['cat_title'];
//              $cat_id=$row['cat_id'];
//              echo '<a class="nav-link" href="categoryCondClick.php?catGet='.$cat_id.'">'.$cat_title.'</a>';
//          }
//          }else{
//              echo "sorry No Data Found";
//          }
          ?>
-->
-->
<!--
          <li class="nav-item active">
            <a class="nav-link" href="dashBord.php">Dashboard <span class="sr-only">(current)</span></a>
          </li>
-->
          <li class="nav-item">
            <a class="nav-link" href="#">Notifications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
            <?php
//if(!isset($_SESSION['role'])){
//    header("Location:/BLOG_PROJECT/index.php");
//}else{
//   echo '<li class="nav-item">
//            <a class="nav-link" href="dashbord.php">Admin</a>
//          </li>';
//}


          
            ?>
            <li class="nav-item">
            <a class="nav-link" href="dashbord.php">Admin</a>
          </li>
            
        
<!--
            <?php 
//            if(isset($_SESSION['username'])){
//                if(isset($_GET['p_id'])){
//                   $thePostEdit_Id=$_GET['p_id'];
//                    echo '<li class="nav-item">'.
//                   '<a class="nav-link" href="Post.php?source=editPost&p_id='$thePostEdit_Id'">Edit Post</a>'.
//                    '</li>';
//                   
//                }
//            }
            ?>
-->
            
              
            
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
            
             <li class="nav-item">
            <a class="nav-link" href="include/registration.php">Registration</a>
          </li>
        </ul>
          
          
          
          
          
        <form class="form-inline my-2 my-lg-0" action="index.php" method="post">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
        </form>
      </div>
    </nav>

<!--
<?php
          if(isset($_POST['submit'])){
         $search=$_POST['search'];
              echo $search;
          }
          
          ?>
-->
    

   

    
     