<?php 
if(isset($_GET['edit_id'])){
    $the_User_id=$_GET['edit_id'];
    $query3="SELECT * FROM `users` WHERE `user_id`='$the_User_id'";
    $res2=mysqli_query($conn,$query3);
    if(mysqli_num_rows($res2)>0){
        while($row=mysqli_fetch_assoc($res2)){
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
}
// thats from form data TYpe entered 
if(isset($_POST['update_User'])){
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
        $queryImage="select 'user_image' from `users where 'user_id'='$the_User_id'";
        $res=mysqli_query($conn,$queryImage);
        while($row=mysqli_fetch_assoc($res)>0){
            $imageData=$row['user_image'];
        }
    }
    $query="UPDATE `users` SET `username`='$uns',`user_password`='$passs',`firstName`='$fns',`lastName`='$lns',`email`='$eis',`user_image`='$imageData',`user_role`='$sus' WHERE `user_id`='$the_User_id'";
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
         echo "<option value='subscriber'>Subscriber</option>
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
                
    <input type="submit"  class="form-control btn btn-danger" name="update_User" value="UPDATE USER">
    </div>



</form>
