<?php
if(isset($_POST['add_user'])){
    $fn=$_POST['firstName'];
    $ln=$_POST['LastName'];
    $su=$_POST['userType'];
    $un=$_POST['userName'];
    $ei=$_POST['mails'];
    $pass=$_POST['pass'];
    
    $imageData=$_FILES['imageData']['name'];
    $imgTemp=$_FILES['imageData']['tmp_name'];
    
    
    
   move_uploaded_file($imgTemp,"../images/$imageData");
    
    $query="INSERT INTO `users`(`username`, `user_password`, `firstName`, `lastName`, `email`, `user_image`, `user_role`) VALUES('$un','$pass','$fn','$ln','$ei','$imageData','$su')";
    $AddUser=mysqli_query($conn,$query);
    if($AddUser){
        echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-thumbs-up'>you suceesfully Added the User</span>"."  ". "<a href='User.php'>VIEW USER</a>". "</div>";
    }else{
        die("queryFialed".mysqli_error());
    }
}
?>


<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="fn">First Name</label>
    <input type="text" class="form-control" name="firstName" id="fn"required autofocus>    
    </div>
    
    <div class="form-group">
    <label for="ln">Last Name</label>
    <input type="text" class="form-control" name="LastName"id="ln">    
    </div>
    <div class="form-group">
    <select name="userType">
    <option value="subscriber">Select User</option> 
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
    </div>
    
    <div class="form-group">
    <label for="un">User Name</label>
    <input type="text" class="form-control" name="userName"id="un">    
    </div>
    
    <div class="form-group">
        <label for="im">Profile Pic</label>
    <input type="file" name="imageData" id="im">
    </div>
    
    <div class="form-group">
    <label for="ei">Email ID</label>
    <input type="email" class="form-control" name="mails" id="ei">    
    </div>
    
    <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" name="pass" id="pass">    
    </div>
    
   <div class="form-group">
                
    <input type="submit"  class="form-control btn btn-danger" name="add_user" value="ADD USER">
    </div>



</form>