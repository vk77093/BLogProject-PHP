<?php ob_start(); ?>

<?php include("../include/bootstrap.php");?>

<?php include("../include/db_connect.php"); ?>
<?php include("../include/functionData.php"); ?>

    

    <!-- Custom styles for this template -->
    <link href="/BLOG_PROJECT/dashboard.css" rel="stylesheet">
   <?php include("../include/dashBordHeader.php"); ?>
       <div id="page-wrapper">
           <div class="container-fluid">
           <div class="row" >
        <div class="col-lg-12">
    <h1 class="page-header">Welcome to Admin  <small><?php echo $_SESSION['username']; ?></small></h1>
           <br>
               <div class="col-xs-6">
                   
                   <?php 
                   if(isset($_GET["source"])){
                       $source=$_GET["source"];
                   }else{
                       $source="";
                   }
                   switch($source){
                           
                    case 'addPost';
                       include("addPost.php");  
                           //echo "yaa iam there find me";
                           break;
                           
                      case 'editPost';
                           include("editPost.php");
                           break;
                       default:
                           
                            include("viewAllPost.php");     
                   }
                   
                   
                   
                   ?>
         
               </div>
</div>
    </div>
    </div>
    </div>

  