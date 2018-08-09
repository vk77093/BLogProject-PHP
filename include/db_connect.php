<?php 


$server="localhost";
$username="root";
$password="vijay123";
$db="blogpost";

$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn){
    die("connection failed".mysqli_connect_error);
}else{
    //echo "we are connected successfully <br> best of luck ";
}
?>
