<?php 

function inserData(){
    global $conn;
    if(isset($_POST['catAdd'])){
        $cat_title=$_POST['catTitle'];
        if($cat_title==""|| empty($cat_title)){
            echo "Please add Some text in the filed";
        }else{
            $AddQuery="INSERT INTO `categorytable`(`cat_title`) VALUES ('$cat_title')";
            $create=mysqli_query($conn,$AddQuery);
            if(!$create){
                die("Query Failed".mysqli_error($conn));
            }
        }
    }
}

function deletedata(){
    global $conn;
    if(isset($_GET['delete'])){
                    $cat_del=$_GET['delete'];
                    $queryDel="DELETE FROM `categorytable` WHERE `cat_id`='$cat_del'";
                    $del_query=mysqli_query($conn,$queryDel);
                    header("Location: DashCategories.php");
                }
    
} 
function findAllCategories(){
    global $conn;
       $query="SELECT * FROM `categorytable` WHERE 1";
          $res=mysqli_query($conn,$query);
          if(mysqli_num_rows($res)>0){
          while($row=mysqli_fetch_assoc($res)){
              $cat_title=$row['cat_title'];
              $cat_id=$row['cat_id'];
             // echo '<li><a href="#">'.$cat_title.'</a></li>';
              echo "<tr>";
              echo "<td>$cat_id</td>";
               echo "<td>$cat_title</td>";
              echo "<td><a href='DashCategories.php?delete=$cat_id'>Delete</a></td>";
              
              echo "<td><a href='DashCategories.php?edit=$cat_id'>Update</a></td>";
              echo "</tr>";
          }
          }else{
              echo "sorry No Data Found";
          }
    
}
function confirmQuery($result){
     global $conn;
    if(!$result){
        die('Query Failed'.mysqli_error());
    } else{
//        echo '<div class="alert alert-success" role="alert">
//  This is a success alert—check it out!
//</div>';
    }
}

function selectingNavbar(){
    global $conn;
    $query="SELECT * FROM `categorytable` WHERE 1";
          $res=mysqli_query($conn,$query);
          if(mysqli_num_rows($res)>0){
          while($row=mysqli_fetch_assoc($res)){
              $cat_title=$row['cat_title'];
              echo '<a class="nav-link" href="#">'.$cat_title.'</a>';
          }
          }else{
              echo "sorry No Data Found";
          }
}

function user_online(){
    global $conn;
    $session=session_id();
$time=time();
$time_out_in_seconds=60;
$time_out=$time_out_in_seconds-$time;

$query1="SELECT * FROM `user_online` WHERE `session`='$session'";
$send_query=mysqli_query($conn,$query1);
$count=mysqli_num_rows($send_query);
if($count==NULL){
    $query2="INSERT INTO `user_online`(`session`, `time`) VALUES('$session','$time')";
    $insertData=mysqli_query($conn,$query2);
}else{
    $query3="UPDATE `user_online` SET `time`='$time' WHERE `session`='$session'";
    $updateData=mysqli_query($conn,$query3);
    
}
$query4="SELECT * FROM `user_online` WHERE `time`>='$time'";
$online_count=mysqli_query($conn,$query4);
$count_user=mysqli_num_rows($online_count);
    return $count_user;
}


?>