<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="register.css" />
  </head>
  <body>
    <div class="container">
      <div class="side_image">
        <img src="images/reg_pic1.png" alt="Side Image" class="side_pic" />
      </div>
      <div class="side_form">
        <div class="form_container">
          <?php

          require 'connection.php';
            if (isset($_POST["submit"])) {
              $fullname = $_POST["fullName"];
              $username = $_POST["userName"];
              $email = $_POST["email"];
              $password = $_POST["password"];
              $rpassword = $_POST["rpassword"];
              $mobile = $_POST["mobile"];
              $address = $_POST["address"];
              $nid = $_POST["nid"];
              $location = $_POST["location"];
              $city = $_POST["city"];
              $district = $_POST["district"];
            
              $query = "INSERT INTO user_details VALUES ('','$fullname','$username','$email','$mobile','$password','$address','$nid','$location','$city','$district')";
              mysqli_query($conn,$query);
            }
          ?>
          <br>
          <img class="top_logo" src="images/banner_logo.png" alt="logo">
          <div class="title">Registration</div>
          <form action="register.php" method="post">
            <div class="user_detail">
              <div class="input_box">
                <span class="detail">Full Name:</span>
                <input
                  type="text"
                  name="fullName"
                  placeholder="Enter Your Full Name"
                  required
                />
              </div>
              <div class="input_box">
                <span class="detail">User Name:</span>
                <input
                  type="text"
                  name="userName"
                  placeholder="Enter Your User Name"
                  required
                />
              </div>
              <div class="input_box">
                <span class="detail">Email:</span>
                <input
                  type="email"
                  name="email"
                  placeholder="Enter Your User Name"
                  required
                />
              </div>
              <div class="input_box">
                <span class="detail">Mobile No:</span>
                <input
                  type="text"
                  name="mobile"
                  placeholder="Enter Your Mobile Number"
                  required
                />
              </div>
              <div class="input_box">
                <span class="detail">Password:</span>
                <input
                  type="password"
                  name="password"
                  placeholder="Enter Your Password"
                  required
                />
              </div>
              <div class="input_box">
                <span class="detail">Confirm Password:</span>
                <input
                  type="password"
                  name="rpassword"
                  placeholder="Confirm Your Password"
                  required
                />
              </div>
              <div class="input_box address_box">
                <span class="detail">Address:</span>
                <input type="text" name="address" placeholder="Enter Your Address" required />
              </div>
              <div class="input_box">
                <span class="detail">NID No:</span>
                <input
                  type="number"
                  name="nid"
                  placeholder="Enter Your NID Number"
                  required
                />
              </div>
              <div class="input_box">
                <span class="detail">Location:</span>
                <input type="text" name="location" placeholder="Enter Your Location" required />
              </div>
              <div class="input_box">
                <span class="detail">City:</span>
                <input type="text" name="city" placeholder="Enter Your City" required />
              </div>
              <div class="input_box">
                <span class="detail">District:</span>
                <input type="text" name="district" placeholder="Enter Your District" required />
              </div>
            </div>
            <!-- <div class="gender_detail">
              <div class="gender_title">Gender:</div>
              <div class="gender_category">
                <label for="">
                  <span class="dot one"></span>
                  <span class="gender">Male</span>
                </label>
                <label for="">
                  <span class="dot one"></span>
                  <span class="gender">Female</span>
                </label>
                <label for="">
                  <span class="dot one"></span>
                  <span class="gender">Prefer not to Say</span>
                </label>
              </div>
            </div> -->
            <div class="button">
              <input type="submit" value="Sign Up" name="submit"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
