<?php include('db_connect.php'); ?>
<?php session_start(); ?>
<?php
if(isset($_POST['login'])){
 $username=$_POST['userName'];
 $password=$_POST['userPass'];
    
$Check_username=mysqli_real_escape_string($conn,$username);
$Check_password=mysqli_real_escape_string($conn,$password);

$query="SELECT * FROM `users` WHERE `username`='$Check_username'";
    $res=mysqli_query($conn,$query);
  
        while($row=mysqli_fetch_assoc($res)){
             $db_user_id=$row['user_id'];
             $db_user_name=$row['username'];
            $db_user_pass=$row['user_password'];
            $db_user_role=$row['user_role'];
            $db_fn=$row['firstName'];
            $db_ln=$row['lastName'];
            
        }
    if(password_verify($password,$db_user_pass)){
         header("Location:/BLOG_PROJECT/dashBord.php");
        //assign session Variable
            $_SESSION['username']=$db_user_name;
            $_SESSION['firstname']=$db_fn;
            $_SESSION['lastname']=$db_ln;
            $_SESSION['role']=$db_user_role;
    }else{
         header("Location:/BLOG_PROJECT/index.php");
     }

        
//   $query2="SELECT * FROM `user_password` WHERE `username`='$Check_username'"; 
//    $res=mysqli_query($conn,$query2);
//    while($rows=mysqli_fetch_assoc($res)){
//       $db_user_pass=$rows['user_password']; 
//        
//    }
//    
//    if(password_verify($password,$db_user_pass)){
//        
//    
//         if($Check_username!==$db_user_name && $Check_password!==$db_user_pass){
//           header("Location:/BLOG_PROJECT/index.php");
//       }else if($Check_username==$db_user_name && $Check_password==$db_user_pass){
//         
//         //assign session Variable
//            $_SESSION['username']=$db_user_name;
//            $_SESSION['firstname']=$db_fn;
//            $_SESSION['lastname']=$db_ln;
//            $_SESSION['role']=$db_user_role;
//        
//
//         
//         
//           header("Location:/BLOG_PROJECT/dashBord.php");
//         
//       }else{
//         header("Location:/BLOG_PROJECT/index.php");
//     }
//    }else{
//        echo "no worked";
//    }
    
    
    
}

?>