<table class="table table-bordered table-hover">
<thead>
    <tr>
        <th>ID</th>
        <th>UserName</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Profile Pic</th>
        <th>Role</th>
        <th>Delete</th>
        <th>Admin</th>
        <th>Subscriber</th>
        <th>Edit</th>
         </tr>
</thead>
    <tbody>
        <?php
$queryUser="SELECT * FROM `users` WHERE 1";  
        $result=mysqli_query($conn,$queryUser);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
              $userId=$row['user_id'];
                $userName=$row['username'];
                $fn=$row['firstName'];
                $ln=$row['lastName'];
                $password=$row['user_password'];
                $email=$row['email'];
                $image=$row['user_image'];
                $role=$row['user_role'];
                $randsalt=$row['randSalt'];
       
echo "<tr>";
         echo "<td>$userId</td>"; 
        echo "<td>$userName</td>"; 
        echo "<td>$fn</td>"; 
        echo "<td>$ln</td>";
                echo "<td>$email</td>"; 
        echo "<td><img width=50 class='img-responsive' src='../images/$image' alt='Profile'></td>";
        
        echo "<td>$role</td>"; 
    echo "<td><a href='User.php?delete=$userId'>Delete</a></td>"; 
     echo "<td><a href='User.php?change_to_admin=$userId'>Admin</a></td>";
        echo "<td><a href='User.php?change_to_sub=$userId'>Subscriber</a></td>";
                echo "<td><a href='User.php?source=editUser&edit_id=$userId'>Edit</a></td>";
        
echo"</tr>";
     }
    }
     ?>
    
    </tbody>

</table>
<?php 
if(isset($_GET['delete'])){
   
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role']=='admin'){
    $del_id=$_GET['delete'];
      $del_ids=mysqli_real_escape_string($conn,$del_id);      
    $queryDel="DELETE FROM `users` WHERE `user_id`='$del_ids'";
    $res=mysqli_query($conn,$queryDel);
    header("Location:User.php");
}
 }
        
    }
if(isset($_GET['change_to_admin'])){
    $admin_id=$_GET['change_to_admin'];
    $queryUpdate="UPDATE `users` SET `user_role`='Admin' WHERE `user_id`='$admin_id'";
    $res=mysqli_query($conn,$queryUpdate);
     header("Location:User.php");
}

   
if(isset($_GET['change_to_sub'])){
    $subscriber_id=$_GET['change_to_sub'];
     $queryUpdate2="UPDATE `users` SET `user_role`='Subscriber' WHERE `user_id`='$subscriber_id'";
    $res=mysqli_query($conn,$queryUpdate2);
     header("Location:User.php");
}
?>
