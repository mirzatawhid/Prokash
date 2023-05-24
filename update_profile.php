<?php

include 'connection.php';
session_start();
$user_id = $_SESSION['user'];

if (!isset($user_id)) {
   header("Location: login.php");
};

if (isset($_POST['update_profile'])) {

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user_details` SET full_name = '$update_name', email = '$update_email' WHERE user_id = '$user_id'") or die('query failed');


   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'User_DP/' . $update_image;

   if (!empty($update_image)) {
      if ($update_image_size > 25 * 1024 *1024) {
         $message[] = 'Image is too large(Max 25MB)';
      } else {
         $image_update_query = mysqli_query($conn, "UPDATE `user_details` SET user_medianame = '$update_image' WHERE user_id = '$user_id'") or die('query failed');
         if ($image_update_query) {
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'Image Updated Succssfully!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="user.css">
   <link rel="stylesheet" href="side_bar.css">
   <!----===== Iconscout CSS ===== -->
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body>


   <!-- side nav bar -->
   <nav>
      <div class="logo-name">
         <div class="logo-image">
            <img src="images/footer_logo.png" alt="logo">
         </div>
      </div>
      <div class="menu-items">
         <ul class="nav-links">
            <li><a href="dashboard.php">
                  <i class="uil uil-estate"></i>
                  <span class="link-name">Dahsboard</span>
               </a></li>
            <li><a href="user_profile.php">
                  <i class="uil uil-user"></i>
                  <span class="link-name">User Profile</span>
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
            <li><a href="logout.php">
                  <i class="uil uil-signout"></i>
                  <span class="link-name">Logout</span>
               </a></li>
            </li>
         </ul>
      </div>
   </nav>




   <section class="space">
      <div class="top">
         <img src="images/user.png" alt="">
      </div>



      <div class="container">
      <h1 class="profile_title">Update Profile</h1>






         <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_details` WHERE user_id = '$user_id'") or die('query failed');
         if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
         }
         ?>

         <form action="" method="post" enctype="multipart/form-data">
            <?php
            if ($fetch['user_medianame'] == '') {
               echo '<img src="images/user.png">';
            } else {
               echo '<img src="User_DP/' . $fetch['user_medianame'] . '">';
            }
            if (isset($message)) {
               foreach ($message as $message) {
                  echo '<div class="message">' . $message . '</div>';
               }
            }
            ?>
            <div class="flex">
               <div class="inputBox">
                  <span>Full Name :</span>
                  <input type="text" name="update_name" value="<?php echo $fetch['full_name']; ?>" class="box">
                  <span>your email :</span>
                  <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                  <span>update your pic :</span>
                  <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                  <input type="submit" value="Update Profile" name="update_profile" class="btn">
               </div>
            </div>
            
            <a href="user_profile.php" class="delete-btn">Go Back</a>
         </form>

      
   </div>

   </section>


   

</body>

</html>