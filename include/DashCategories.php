 <?php ob_start(); ?>
<?php include("../include/bootstrap.php");?>

<?php include("../include/db_connect.php"); ?>
<?php include("../include/functionData.php"); ?>


<html lang="en">
   


    

    <!-- Custom styles for this template -->
    <link href="/BLOG_PROJECT/dashboard.css"rel="stylesheet">
 
    <?php include("../include/dashBordHeader.php"); ?>
   
<div class="row">
    <div class="col-lg-12">
<h1 class="page-header">Welcome to Admin  <small><?php echo $_SESSION['username']; ?></small></h1>


        
<div class="col-xs-6">
    
    <?php

    
    inserData();
    ?>
    
    
<form action="" method="post">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Add a Categories</label>
    <input type="name" required autofocus class="form-control"  placeholder="Enter name" name="catTitle">
    
  </div>
   <div class="form-group">
    <button type="submit" name="catAdd" class="btn btn-primary">Add It</button>
    </div>
    </form>
    
    
  
    </div>
        <!----update form---->
    <?php
   if(isset($_GET['edit'])){
       $cat_id=$_GET['edit'];
       include("../include/updateData.php");
   }
       ?>
      
        
         <div class="col-xs-6">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
            <th>Id</th>
            <th>Categories</th>
                <th>DELETE</th>
                <th>UPDATE</th>
            </tr>
            </thead>
            <tbody>
            <?php 

               findAllCategories(); 
             ?>
                <?php
                deletedata();
            ?>
            
            
                </tbody>
        </table>
    
    
    </div>
    
        
    </div>
   
    
    
    </div>
    