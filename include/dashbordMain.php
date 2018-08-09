<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

  <!-- Header -->
   
      <div class="row"style="margin-left:5px" >
          
        <div class="col-lg-12">
    <h1 class="page-header">Welcome to Admin  <small><?php echo $_SESSION['username']; ?></small></h1>
           <br>
          
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-list-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php 
            $query="SELECT * FROM `posts` WHERE 1";
            
            $count=mysqli_query($conn,$query);
            $postCount=mysqli_num_rows($count);
            echo "<h3>$postCount</h3>";
            ?>
<!--          <div class="w3-right">fnwbdfbvbbhy</div>-->
        </div> 
        <div class="w3-clear"></div>
        <h4>Posts</h4>
          <hr>
          <a href="include/Post.php">
            <div class="panel-footer">
            <div class="w3-left"
            >View Details</div>
                <div class="w3-right"><i class="fa fa-forward w3-large"></i></div>
                <div class="clear"></div>
            </div> 
                        </a>
      </div>
        
           
        
        
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-comments w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php
        $query="SELECT * FROM `comments` "; 
            $count2=mysqli_query($conn,$query);
            $commentsCount=mysqli_num_rows($count2);
            echo "<h3>$commentsCount</h3>";
            ?>    
          
        </div>
        <div class="w3-clear"></div>
        <h4>Comments</h4>
          <hr>
          <a href="include/commentsPost.php">
            <div class="panel panel-default">
            <div class="w3-left"
            >View Details</div>
                <div class="w3-right"><i class="fa fa-forward w3-large"></i></div>
                <div class="clear"></div>
            </div> 
                        </a>
      </div>
        
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
            <?php 
            $query2="SELECT * FROM `users` WHERE 1";
            $result=mysqli_query($conn,$query2);
            $userCount=mysqli_num_rows($result);
            echo"<h3>$userCount</h3>";
            ?>
          
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
           <hr>
          <a href="include/User.php">
            <div class="panel panel-default">
            <div class="w3-left"
            >View Details</div>
                <div class="w3-right"><i class="fa fa-forward w3-large"></i></div>
                <div class="clear"></div>
            </div> 
                        </a>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-th-list w3-xxxlarge"></i></div>
        <div class="w3-right">
            <?php 
            $query3="SELECT * FROM `categorytable` WHERE 1";
            $res=mysqli_query($conn,$query3);
            $categoryCount=mysqli_num_rows($res);
            echo "<h3>$categoryCount</h3>";
            ?>
          
        </div>
        <div class="w3-clear"></div>
        <h4>Categories</h4> <hr>
          <a href="include/DashCategories.php">
            <div class="panel panel-default">
            <div class="w3-left"
            >View Details</div>
                <div class="w3-right"><i class="fa fa-forward w3-large"></i></div>
                <div class="clear"></div>
            </div> 
                        </a>
      </div>
    </div>
  </div>

        <div class="w3-row-padding w3-margin-bottom">
            <?php 
            $query1="SELECT * FROM `comments` WHERE `comment_status`='unapprove'";
            $res=mysqli_query($conn,$query1);
            $UnApproveComments=mysqli_num_rows($res);
            
             $query2="SELECT * FROM `users` WHERE `user_role`='subscriber' ";
            $res=mysqli_query($conn,$query2);
            $Subscriber_count=mysqli_num_rows($res);
            
        $query3="SELECT * FROM `posts` WHERE `post_status`='draft' ";
            $res=mysqli_query($conn,$query3);
            $Draft_count=mysqli_num_rows($res);
            
            ?>
            
    <!--- charts from Google----->        
            <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['DATA', 'COUNT'],
           <?php
            $elementText=['POST','Draft','COMMENTS','UnApproved','USERS','Subscriber','CATEGORIES'];
    $elemetCount=[$postCount,$Draft_count,$commentsCount,$UnApproveComments,$userCount,$Subscriber_count,$categoryCount];
           for($i=0; $i< 7; $i++){
              echo "['$elementText[$i]' " . "," ."$elemetCount[$i]],";
           //echo "'[$elementText[$i]'" . "," . "$elemetCount[$i]],";
               //echo "['$elementText[$i]' " ."," . "$elemetCount[$i]],";
           }
            
            
            
            
           ?>
          
//         ['POST', 400],
//            ['CAT', 700],
//             
//            ['USER', 200],
      
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
 

    <div id="columnchart_material" style="width:'auto'; height: 500px;"></div>
  
            </div>
    <!--- another pannel---->        

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Regions</h5>
        <img src="/BLOG_PROJECT/images/region.jpg" style="width:100%" alt="Google Regional Map">
      </div>
      <div class="w3-twothird">
        <h5>Feeds</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td>New record, over 90 views.</td>
            <td><i>10 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
            <td>Database error.</td>
            <td><i>15 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
            <td>New record, over 40 users.</td>
            <td><i>17 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
            <td>New comments.</td>
            <td><i>25 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>Check transactions.</td>
            <td><i>28 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
            <td>CPU overload.</td>
            <td><i>35 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>New shares.</td>
            <td><i>39 mins</i></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
    <hr>
  <div class="w3-container">
    <h5>General Stats</h5>
    <p>New Visitors</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
    </div>

    <p>New Users</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>

    <p>Bounce Rate</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
    </div>
  </div>
  <hr>

    <div class="w3-container">
    <h5>Countries</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="w3-button w3-dark-grey">More Countries &nbsp;<i class="fa fa-arrow-right"></i></button>
  </div>
          </div>
    </div>
    <head><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>

    </body>
</html>