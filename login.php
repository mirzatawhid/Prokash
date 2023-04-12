<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css"/>
    <title>Login</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <div class="login_container">
    <div class="side_image">
      <img src="images/register_pic.jpg" alt="Side Image" class="side_pic" />
    </div>
    <div class="side_form">
      <div class="form_container">
        <img class="top_logo" src="images/banner_logo.png" alt="logo">
        <div class="title">Login</div>
        <form action="process.php" method="post">
          <div class="user_detail">
            
            <div class="input_box">
              <span class="detail">Username:</span>
              <input
                type="text"
                name = "username" 
                placeholder="Enter Your User Name"
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

            <div class="form-button">
              <div class="left">
                <input type="checkbox" class="check">
                <lebel for="check">Remember me</lebel>
              </div>
            <div class="right">
              <lebel><a href="#" style="text-decoration: none"class="link">Forgot password?</a></lebel>
            </div>
          </div>
          
          <div>
            <input class="signin_button" type="submit" value="Sign In" />
          </div>
        </form>
      </div>
      
      <div class="bottom-reg">
        Not yet a User?<a href="register.php" style="text-decoration: none"> Register here </a>
      </div>

    </div>
  </div>
</body>
</html>
 
  
         