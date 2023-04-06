<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css" />
    <title>Login</title>
</head>
<body>
  <div class="container">
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
              <span class="detail">Email:</span>
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
              <lebel><a href="#" style="text-decoration: none"class="link">Forgot password</a></lebel>
            </div>
          </div>
          
          <div class="button">
            <input type="submit" value="Sign Up" />
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
 
  
         