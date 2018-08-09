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
if(isset($_SESSION['username'])){
    

$userName= $_SESSION['username'];
    $query2="SELECT * FROM `users` WHERE `username`='$userName'";
    $select_user_session=mysqli_query($conn,$query2);
    while($row=mysqli_fetch_assoc($select_user_session)){
        $userId=$row['user_id'];
                $userName=$row['username'];
                $fn=$row['firstName'];
                $ln=$row['lastName'];
                $password=$row['user_password'];
                $email=$row['email'];
                $image=$row['user_image'];
                $role=$row['user_role'];
                $randsalt=$row['randSalt'];
    }
}
                   
    if(isset($_POST['profile_update'])){
     $fns=$_POST['firstName'];
    $lns=$_POST['LastName'];
    $sus=$_POST['userType'];
    $uns=$_POST['userName'];
    $eis=$_POST['mails'];
    $passs=$_POST['pass'];
    
    $imageData=$_FILES['imageData']['name'];
    $imgTemp=$_FILES['imageData']['tmp_name'];
    
    
    
   move_uploaded_file($imgTemp,"../images/$imageData");
    if(empty($imageData)){
        $queryImage="SELECT `user_image` from `users` WHERE `username`='$userName'";
        $res=mysqli_query($conn,$queryImage);
        while($row=mysqli_fetch_assoc($res)>0){
            $imageData=$row['user_image'];
        }
    }
    $query="UPDATE `users` SET `username`='$uns',`user_password`='$passs',`firstName`='$fns',`lastName`='$lns',`email`='$eis',`user_image`='$imageData',`user_role`='$sus' WHERE `username`='$userName'";
    $res4=mysqli_query($conn,$query);
    confirmQuery($res4);


    
}

?>
                   
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="fn">First Name</label>
    <input value="<?php echo $fn ?>" type="text" class="form-control" name="firstName" id="fn"required autofocus>    
    </div>
    
    <div class="form-group">
    <label for="ln">Last Name</label>
    <input value="<?php echo $ln ?>" type="text" class="form-control" name="LastName"id="ln">    
    </div>
    <div class="form-group">
    <select name="userType">
    <option value="<?php echo $role ?>"><?php echo $role ?></option> 
        <?php
        if($role=='Admin'){
         echo "<option value='subscriber''>Subscriber</option>
    </select>";   
        }else{
         echo "<option value='admin'>Admin</option>" ;  
        }
        ?>
        
    </select>
    </div>
    
    <div class="form-group">
    <label for="un">User Name</label>
    <input value="<?php echo $userName ?>" type="text" class="form-control" name="userName"id="un">    
    </div>
    
    <div class="form-group">
        <label for="im">Profile Pic</label>
    <input value="<?php echo $image ?>" type="file" name="imageData" id="im">
    </div>
    
    <div class="form-group">
    <label for="ei">Email ID</label>
    <input value="<?php echo $email ?>" type="email" class="form-control" name="mails" id="ei">    
    </div>
    
    <div class="form-group">
    <label for="pass">Password</label>
    <input value="<?php echo $password ?>" type="password" class="form-control" name="pass" id="pass">    
    </div>
    
   <div class="form-group">
                
    <input type="submit"  class="form-control btn btn-danger" name="profile_update" value="Edit Profile">
    </div>



</form>
         
               </div>
</div>
    </div>
    </div>
    </div>

  