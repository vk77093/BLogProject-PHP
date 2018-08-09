<?php include("include/db_connect.php");?>
<aside class="col-md-4 blog-sidebar">
    <?php
          if(isset($_POST['submit'])){
         $search=$_POST['search'];
              //$search=$row['post_tag'];
              //echo $search;
              
              $query_Select="SELECT * FROM posts WHERE post_tag LIKE '%$search%'";
            $result=mysqli_query($conn,$query_Select);

               if(!$result){
                   die("Query Failed".mysqli_error($conn));
               }
              $count=mysqli_num_rows($result);
              if($count == 0){
                  echo "No resulst Found";
              }else{
                  //echo "some record got";
              }
              
          }
          
          ?>
    <div class="p-3 mb-3 bg-light rounded">
    <form class="form-inline my-2 my-lg-0" action="searchEngine.php" method="post">
        
       <h2 class="blog-post-title">Blog Search</h2>
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
        </form>
    </div>
    
<div class="well">
    <form method="post" action="include/login.php"> 
<div class="form-group">
   <input type="text" class="form-control" name="userName" placeholder="Enter UserName" required autofocus>  
    </div>
        <div class="form-group">
   <input type="password" class="form-control" name="userPass" placeholder="Enter Password" > 
    <span class="form-group">
    <button class="btn btn-primary" type="submit" name="login" value="LogIn">LogIn</button>       
            </span>        
    </div>
        </form>
</div>
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>

          <div class="p-3">
            <h4 class="font-italic">BLog Categories</h4>
            <ol class="list-unstyled mb-0">
                <?php   
          $query="SELECT * FROM `categorytable` WHERE 1";
          $res=mysqli_query($conn,$query);
          if(mysqli_num_rows($res)>0){
          while($row=mysqli_fetch_assoc($res)){
              $cat_title=$row['cat_title'];
              $cat_id=$row['cat_id'];
              echo '<li><a href="categoryCondClick.php?catGet='.$cat_id.'">'.$cat_title.' </a></li>';
          }
          }else{
              echo "sorry No Data Found";
          }
          ?>
<!--
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
-->
            </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
    
    
        </aside><!-- /.blog-sidebar -->

    