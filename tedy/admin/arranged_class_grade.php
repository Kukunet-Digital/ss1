<?php
//session_start();
error_reporting(0);
include'controller/auth.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

 // for  System Assesment php code  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Addresses</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
     <?php
        include('left_nav_bar.php');
     ?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Class and Grade Arrangement </h3>
            
				<div class="row">
				<?php
                                 $me = "SELECT * FROM admin where username = '".$_SESSION['admin']."'";
                                 $rme = mysqli_query($con, $me);
                                 $row_me = mysqli_fetch_assoc($rme);
                     
                                 $school_branch_id = $row_me['school_branch_id'];
                                 $school_id = $row_me['school_id'];
                     
                                 $sn = "SELECT * FROM school_basic_info where school_id='$school_id'";
                                 $rsn = mysqli_query($con, $sn);
                                 $row_sn = mysqli_fetch_assoc($rsn);
                     
                                 $branchn = "SELECT * FROM school_branches where school_branch_id = '$school_branch_id'";
                                 $rbranch = mysqli_query($con, $branchn);
                                 $row_b = mysqli_fetch_assoc($rbranch);
                     
                                 echo '<div style="float:left; width: 1300px" align="center">';
                                 echo '<font size="5">';
                                 echo $row_sn['school_name'];
                                 echo ' | ';
                                 echo $row_b['branch_name'];
                                 echo '</font></div>';
                           ?>
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">

                      
                           <form class="form-horizontal style-form" name="" method="post" action="class_grade_allocation.php">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                           
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> 
                                <div style="float:left">
                                <div style="float:right">
                                
                                    <a href="arranged_class_grade.php">Click here to see CLASS vs GRADES</a><br><br><br>
                                    <?php
                                        
                                       // $rep = "SELECT * FROM  teachers_registration ";
                                      //  $rrep = mysqli_query($con, $rep);
                                      //  $crep = mysqli_num_rows($rrep);
                                        echo 'Total Classes in the school: ';
                                        echo $crep;
                                    ?>
                                </div></div>
                                    <?php
                                        include('class_grade_report.php');
                                    ?>
                                    </div>
                                </div><br>
                                
                              
                              </label>
                              
                          </div>
                          
                             
                          </form>
                      </div>
                  </div>
              </div>
		</section>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
