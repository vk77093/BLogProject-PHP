<?php ob_start(); ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['role'])){
    header("Location:/BLOG_PROJECT/index.php");
 //session_destroy();
}


          
            ?>