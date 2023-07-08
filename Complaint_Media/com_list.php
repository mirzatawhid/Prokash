<?php 
session_start();
error_reporting(0);
include('includes/connection.php');
if(strlen($_SESSION['user'])==0)
  { 
header('location:login.php');
}
else{
  require '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Pending Complaint list</title>

    <!-- Bootstrap core CSS -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">
   


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
  <link rel="stylesheet" href="../side_bar.css">
  <link rel="stylesheet" href="complaint_mapping.css">
  </head>

  <body>

  <nav>
    <div class="logo-name">
      <div class="logo-image">
        <img src="../images/footer_logo.png" alt="logo">
      </div>
    </div>

    <div class="menu-items">
      <ul class="nav-links">
        <li><a href="../dashboard.php">
            <i class="uil uil-estate"></i>
            <span class="link-name">Dahsboard</span>
          </a></li>
        <li><a href="../User_Profile/user_profile.php">
            <i class="uil uil-user"></i>
            <span class="link-name">User Profile</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-file-check"></i>
            <span class="link-name">Pending Verification List</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-file-check-alt"></i>
            <span class="link-name">Pending Approved List</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-paperclip"></i>
            <span class="link-name">Submission List</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-check-circle"></i>
            <span class="link-name">Verification List</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-file-search-alt"></i>
            <span class="link-name">Reviewed List</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-share"></i>
            <span class="link-name">Share</span>
          </a></li>
      </ul>

      <ul class="logout-mode">
        <li><a href="../logout.php">
            <i class="uil uil-signout"></i>
            <span class="link-name">Logout</span>
          </a></li>
        </li>
      </ul>
    </div>
  </nav>

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("sidebar.php");?>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Your pending Complaint list</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>SL_Number</th>
                                  <th>prb_datetime</th>
                                  <th >prb_address</th>
                                  <th>media</th>
                                  <th>Action</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
  <?php $query=mysqli_query($conn, "select * from complaint_list where user_id='".$_SESSION['user']."'");
while($row=mysqli_fetch_array($query))
{
  ?>
                              <tr>
                                  <td align="center"><?php echo htmlentities($row['prb_id']);?></td>
                                  <td align="center"><?php echo htmlentities($row['prb_datetime']);?></td>
                                  <td align="center"><?php echo htmlentities($row['prb_address']);?></td>
                                  <td align="center"><?php echo htmlentities($row['prb_mediapath']);?></td>

                                 

                                 </td>
                                  <td align="center"><?php 
                                    $status=$row['status'];
                                    if($status=="" or $status=="NULL")
                                    { ?>
                                     
                                     <div class="radio-button">
                                       <input type="radio" name="option" id="option1">
                                       <label for="option1" class="checkmark">✓</label>
                                       <input type="radio" name="option" id="option2">
                                       <label for="option2" class="crossmark">✕</label>
                                      </div>
                                    
                                   <?php } 
 if($status=="in process"){ ?>
<button type="button" class="btn btn-warning">in process</button>
<?php }
if($status=="closed") {
?>
<button type="button" class="btn btn-success">Closed</button>
<?php } ?>
                                   <td align="center">
                                   <a href="complaint_submission.php?cid=<?php echo htmlentities($row['prb_id']);?>">
<!--<button type="button" class="btn btn-primary">View Details</button></a>-->
                                   </td>

                                </tr>
                                      </td>
                           <?php } ?>
                            
                              </tbody>
                          </table>
                          </section>

                          <!--approved list-->
                          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Your verified Complaint list </h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>SL_Number</th>
                                  <th >prb_status</th>
                                  <th>prb_datetime</th>
                                  <th>media</th>
                                  
                                  
                              </tr>
                              </thead>
                              <tbody>
  <?php $query=mysqli_query($conn, "select * from verified_list where user_id='".$_SESSION['user']."'");
while($row=mysqli_fetch_array($query))
{
  ?>
                              <tr>
                                  <td align="center"><?php echo htmlentities($row['prb_id']);?></td>
                                  <td align="center"><?php echo htmlentities($row['is_verified']);?></td>
                                  <td align="center"><?php echo htmlentities($row['verify_date']);?></td>
                                  <td align="center"><?php echo htmlentities($row['prb_mediapath']);?></td>

                                 

                                 </td>
                                  <td align="center"><?php 
                                    $status=$row['status'];
                                    if($status=="" or $status=="NULL")
                                    { ?>
                                      <button type="button" class="btn btn-theme04">pending</button>
                                   <?php }
   
 if($status=="in process"){ ?>
<button type="button" class="btn btn-warning">in process</button>
<?php }
if($status=="closed") {
?>
<button type="button" class="btn btn-success">Closed</button>
<?php } ?>
                                   <td align="center">
                                   <a href="complaint_submission.php?cid=<?php echo htmlentities($row['prb_id']);?>">
                                   </td>
                                </tr>
                               </td>
                           <?php } ?>
                            
                              </tbody>
                          </table>
                          </section>

                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		  	

		  </section> 
  </section>
</section>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    

  </body>
</html>
<?php } ?>