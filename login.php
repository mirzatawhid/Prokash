<?php
// session_start();
// if (isset($_SESSION["user"])) {
//   header("Location: dashboard.html");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Login</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>


  <div class="login_container">
    <div class="side_image" style="background-image:url(images/register_pic.jpg)">



    </div>


    <div class="side_form">

      <div class="form_container">

        <div class="home_button">
          <a href="index.php"><i class="fa fa-home"></i> Return to the Home</a>
        </div>
        <br>
        <br>
        <img class="top_logo" src="images/banner_logo.png" alt="logo">
        <div class="title">Login</div>
        <form action="login.php" method="post">
          <div class="user_detail">

            <div class="input_box">
              <span class="detail">Username/Email:</span>
              <input type="text" name="username" placeholder="Enter Your Username/Email" required />
            </div>


            <div class="input_box">
              <span class="detail">Password:</span>
              <input type="password" name="password" placeholder="Enter Your Password" required />
            </div>

          </div>

          <!-- Remember me section -->

          <div class="form-button">
            <!-- <div class="left">
              <input type="checkbox" class="check">
              <lebel for="check">Remember me</lebel>
            </div> -->
            <div class="right">
              <lebel>Forget Password? <a href="#" style="text-decoration: none" class="link">Click Here!</a></lebel>
            </div>
          </div>


          <div class="button">
            <input type="submit" value="Sign in" name="submit" />
          </div>
        </form>
        <div class="bottom-reg" style="margin-top: 3%; margin-bottom:3%">
          Not yet a User?<a href="register.php" style="text-decoration: none"> Register here </a>
        </div>


        <?php

        if (isset($_POST["submit"])) {
          $username = $_POST["username"];
          $password = $_POST["password"];
          require_once "connection.php";
          $sql = "SELECT * FROM user_details WHERE user_name = '$username' OR email = '$username'";
          $result = mysqli_query($conn, $sql);
          $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
          if ($user) {

            if ($password == $user["password"]) {
              session_start();
              $_SESSION["user"] = "yes";
              header("Location: dashboard.php");
              die();
            } else {
              echo "<div class='alert alert-danger'>Password does not match</div>";
            }
          } else {
            echo "<div class='alert alert-danger'>Username/Email does not match</div>";
          }
        }

        ?>

      </div>

    </div>
  </div>

</body>

</html>