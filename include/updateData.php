  <form action="" method="post">
    <div class="form-group">
    <label for="exampleInputEmail1">Update a Categories</label>
        
         <?php
        if(isset($_GET['edit'])){
            $edit_Data=$_GET['edit'];
             $query2="SELECT * FROM `categorytable` WHERE `cat_id`='$edit_Data'";
          $resEdit=mysqli_query($conn,$query2);
          if(mysqli_num_rows($resEdit)>0){
          while($row=mysqli_fetch_assoc($resEdit)){
              $cat_title=$row['cat_title'];
              $cat_id=$row['cat_id'];
              ?>
        <input type="name" name="catTitles" class="form-control"  placeholder="Enter name" required autofocus value="<?php if(isset($cat_title))echo $cat_title ?>";>
          

    
  </div>
   <div class="form-group">
    <button type="submit" name="catAdd" class="btn btn-primary">Update</button>
    </div>
    

     <?php   }
              }else{
            echo "Sorry No data found some error";
        }}?>
        <?php
        if(isset($_POST['catAdd'])){
             $Cat_Title=$_POST['catTitles'];
//                    $queryUpdate="UPDATE `categorytable` SET `cat_title`=' $Cat_Title' WHERE `cat_id`='$cat_id' ";
            $queryUpdate="UPDATE `categorytable` SET `cat_title`='$Cat_Title' WHERE `cat_id`='$cat_id'";
                    $update_query=mysqli_query($conn,$queryUpdate);
            if(!$update_query){
                die("query Failed".mysqli_error($conn));
            }else{
                 header("Location: DashCategories.php");
            }
                    
                
        }
        ?>
        
    </form>