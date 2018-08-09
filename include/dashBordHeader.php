
<?php include("../include/bootstrap.php");?>
<?php //include("../include/functionData.php");?>
<?php session_start(); ?>



<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard Template</title>

    

    <!-- Custom styles for this template -->
<!--     <link href="/BLOG_PROJECT/dashboard.css" rel="stylesheet">-->
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">CMS Admin</a>
      <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
   
           
           <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="/BLOG_PROJECT/index.php">Home Page</a>
           
        </li>
          </ul>
          <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">LOG OUT</a>
           
        </li>
          </ul>
        <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="index.php">User Online:  <?php echo user_online(); ?></a>
            
        </li>
           
          
      </ul>
          
          
           
          
            
        
          
    
        
        
      <li class="nav-item dropdown text-white"  style="margin-right:40px">
            <a class="dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php echo $_SESSION['firstname'] .$_SESSION['lastname'] ?></a>
           <ul class="dropdown-menu">
              <a class="dropdown-item"style="margin-right:80px" href="#"><i class="fa fa-fw fa-user"></i>Profile</a>
              
               <a class="dropdown-item" style="margin-right:80px" href="#"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
            </ul>
          </li>

        
    </nav>
 
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/BLOG_PROJECT/dashBord.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
                
<!--
                <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown link
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
-->
                
                
                <li class="nav-item">
                <a class="nav-link" href="Post.php">
                  <span data-feather="home"></span>
                  View Posts<span class="sr-only"></span>
                </a>
        
                    
              </li>
                 <li class="nav-item">
                <a class="nav-link" href="Post.php?source=addPost">
                  <span data-feather="home"></span>
                  Add Post<span class="sr-only"></span>
                </a>
        
                    
              </li>
                
                
              <li class="nav-item">
                <a class="nav-link" href="DashCategories.php">
                  <span data-feather="file"></span>
                  Catgories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="commentsPost.php">
                  <span data-feather="shopping-cart"></span>
                  Comments
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="User.php">
                  <span data-feather="users"></span>
                  Users
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="User.php?source=addUser">
                  <span data-feather="bar-chart-2"></span>
                  Add User
                </a>
              </li>
                 <li class="nav-item">
                <a class="nav-link" href="Profile.php">
                  <span data-feather="users"></span>
                  Profile
                </a>
              </li>
<!--
              <li class="nav-item">
                <a class="nav-link" href="User.php?source=editUser">
                  <span data-feather="layers"></span>
                  Edit User
                </a>
              </li>
-->
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
          </div>
        </nav>


          </body>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        
    <script>
       
        
        
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
       
          
          
