<?php include('db_connect.php');?>
<?php include('bootstrap.php');?>

<?php 
if(isset($_POST['reg'])){
   $fn=$_POST['fn'];
    $ln=$_POST['ln'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $userName=$_POST['userName'];
        
    
    if(!empty($fn) && !empty($ln) && !empty($email) && !empty($password) && !empty($userName)){
        
        $fn=mysqli_real_escape_string($conn,$fn);
    $ln=mysqli_real_escape_string($conn,$ln);
    $email=mysqli_real_escape_string($conn,$email);
    $password=mysqli_real_escape_string($conn,$password);
     $userName= mysqli_real_escape_string($conn,$userName);  
    $passwordHash=Password_hash("$password",PASSWORD_BCRYPT,array('coast'=>8)); 
        //echo $password;
        
$query="INSERT INTO `users`(`firstName`,`lastName`,`username`,`user_password`, `email`,`randSalt`) VALUES('$fn','$ln','$userName','$passwordHash','$email','$password')";        
   $register=mysqli_query($conn,$query);
        if($register){
           // $message="You got Suceesfully Registered";
        
        }else{
            die("Query Failed".mysqli_error());
        }
        
        $message="You got Suceesfully Registered";
        
    }else{
        $message="you cant leave the form Empty";
    }
    
    
}else{
    $message="";
}

?>

<body class="text-center">
    <div class="container text-center">
        <div class="row center">
    <form action="" method="post">
      <div class="text-center mb-4">
          <h1 class="display-4">Registration Form</h1>
      </div>
         <h1 class="display-4"><?php echo $message; ?></h1>
       <div class="form-label-froup">
        <input type="name" name="fn" placeholder="Enter First Name" class="form-control" required autofocus>
        
        </div> 
        <br>
        <div class="form-label-froup">
        <input type="name" name="ln" placeholder="Enter last Name" class="form-control">
        
        </div>
        <br>
        
        <div class="form-label-froup">
        <input type="text" class="form-control" name="userName" placeholder="enter desired username">  
        
        </div>
        <br>
        
        
        <div class="form-label-froup">
        <input type="email" name="email" placeholder="Enter some Email" class="form-control">
        
        </div> 
        <br>
        <div class="form-label-froup">
        <input type="password" name="pass" placeholder="Enter some Password" class="form-control">
        
        </div> 
        <br>

      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="reg">Register Your Self</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>
            </div>
        </div>
  </body>