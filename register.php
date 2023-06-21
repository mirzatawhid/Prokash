<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="register.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">



  <!-- Country_city_state dropdown code -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Load states on page load
      $.ajax({
        url: 'get_states.php',
        type: 'POST',
        success: function(data) {
          $('#state').html(data);
        }
      });

      // Load districts on state change
      $('#state').on('change', function() {
        var stateId = $(this).val();
        if (stateId) {
          $.ajax({
            url: 'get_districts.php',
            type: 'POST',
            data: {
              state_id: stateId
            },
            success: function(data) {
              $('#district').html(data);
              $('#city').html('<option value="">Select City</option>');
            }
          });
        } else {
          $('#district').html('<option value="">Select District</option>');
          $('#city').html('<option value="">Select City</option>');
        }
      });

      // Load cities on district change
      $('#district').on('change', function() {
        var districtId = $(this).val();
        if (districtId) {
          $.ajax({
            url: 'get_cities.php',
            type: 'POST',
            data: {
              district_id: districtId
            },
            success: function(data) {
              $('#city').html(data);
            }
          });
        } else {
          $('#city').html('<option value="">Select City</option>');
        }
      });
    });
  </script>


</head>

<body>
  <div class="reg_container">

    <div class="side_image" style="background-image:url(images/reg_pic.jpg)">

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
        $state = $_POST["state"];
        $city = $_POST["city"];
        $district = $_POST["district"];
        $id = '';

        $errors = array();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          array_push($errors, "Email is not valid");
        }
        if (strlen($password) < 8) {
          array_push($errors, "Password must be at least 8 charactes long");
        }
        if ($password !== $rpassword) {
          array_push($errors, "Password does not match");
        }

        //Duplicate Email Check
        $sql = "SELECT * FROM user_details WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
          array_push($errors, "Email already exists!");
        }

        //Duplicate Username Check
        $sql = "SELECT * FROM user_details WHERE user_name = '$username'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
          array_push($errors, "Username already exists!");
        }

        //Duplicate NID No Check
        $sql = "SELECT * FROM user_details WHERE nid = '$nid'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
          array_push($errors, "NID Number already exists!");
        }

        //Duplicate Mobile No Check
        $sql = "SELECT * FROM user_details WHERE mobile_no = '$mobile'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
          array_push($errors, "Mobile Number already exists!");
        }

        if (count($errors) > 0) {
          foreach ($errors as $error) {
            echo "<div class='alertbox alert alert-danger'>$error</div>";
          }
        } else {


          $sql = "INSERT INTO user_details VALUES (?,?,?,?,?,?,?,?,?,?,?,NULL)";
          if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "issssssssss", $id, $fullname, $username, $email, $mobile, $password, $address, $nid, $state, $city, $district);

            if (mysqli_stmt_execute($stmt)) {
              echo "<div class='alertbox alert alert-success'>Registration Successful!</div>";
            } else {
              echo "Somehing went Wrong!";
            }
            mysqli_stmt_close($stmt);
          }
          mysqli_close($conn);
        }
      }
      ?>
    </div>


    <div class="side_form">

      <div class="form_container">

        <div class="home_button">
          <a href="index.html"><i class="fa fa-home"></i> Return to the Home</a>
        </div>
        <br>
        <br>
        <img class="top_logo" src="images/banner_logo.png" alt="logo">
        <div class="title">Registration</div>
        <form action="register.php" method="post">
          <div class="user_detail">
            <div class="input_box">
              <span class="detail">Full Name:</span>
              <input type="text" name="fullName" placeholder="Enter Your Full Name" required />
            </div>
            <div class="input_box">
              <span class="detail">User Name:</span>
              <input type="text" name="userName" placeholder="Enter Your User Name" required />
            </div>
            <div class="input_box">
              <span class="detail">Email:</span>
              <input type="email" name="email" placeholder="Enter Your Email" required />
            </div>
            <div class="input_box">
              <span class="detail">Mobile No:</span>
              <input type="text" name="mobile" placeholder="Enter Your Mobile Number" required />
            </div>
            <div class="input_box">
              <span class="detail">Password:</span>
              <input type="password" name="password" placeholder="Enter Your Password" required />
            </div>
            <div class="input_box">
              <span class="detail">Confirm Password:</span>
              <input type="password" name="rpassword" placeholder="Confirm Your Password" required />
            </div>
            <div class="input_box address_box">
              <span class="detail">Address:</span>
              <input type="text" name="address" placeholder="Enter Your Address" required />
            </div>
            <div class="input_box">
              <span class="detail">NID No:</span>
              <input type="number" name="nid" placeholder="Enter Your NID Number" required />
            </div>
            <div class="input_box">
              <span class="detail">State:</span>
              <select class="state" name="state" id="state">
                <option value="">Select State</option>
              </select>
            </div>
            <div class="input_box">
              <span class="detail">District:</span>
              <select class="district" name="district" id="district">
                <option value="">Select District</option>
              </select>
            </div>
            <div class="input_box">
              <span class="detail">Area:</span>
              <select class="city" name="city" id="city">
                <option value="">Select Area</option>
              </select>
            </div>
          </div>
          <div class="terms">By filling this form up you agree to our <a href="#">Terms & Policies</a></div>
          <div class="button">
            <input type="submit" value="Sign Up" name="submit" />
          </div>
        </form>

      </div>
    </div>
  </div>
  </div>
</body>

</html>