<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Submission</title>
    <link rel="stylesheet" href="complaint_submission.css">
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
                <li><a href="#">
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

    <section class="submission">
        <div class="top">
            
            <img src="images/user.png" alt="">
        </div>


        <div class="form_content">
            <h1>Complaint Submission</h1>

            <div class="form_container">
                <form action="complaint_submission.php" method="post">
                  <div class="user_detail">
                    <div class="input_box full_box">
                      <span class="detail">Title:</span>
                      <input type="text" name="fullName" placeholder="Enter the title" required />
                    </div>
                    <div class="input_box">
                      <span class="detail">Category:</span>
                      <input type="text" name="userName" placeholder="Enter the Category" required />
                    </div>
                    <div class="input_box">
                      <span class="detail">Sub-Category:</span>
                      <input type="email" name="email" placeholder="Enter the Sub-Category" required />
                    </div>
                    <div class="input_box full_box">
                      <span class="detail">Address:</span>
                      <input type="text" name="mobile" placeholder="Enter the Detailed Address" required />
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
                      <!-- switch -->
                    <div class="input_box switch">
                      <span class="detail">Post as Anonymous:</span>
                      <div class="switch_container">
                        <input type="checkbox" name="anonymous" id="switcher"/>
                        <label for="switcher" class="switch_button"></label>
                      </div>
                    </div>
                    <div class="input_box full_box">
                      <span class="detail">Address:</span>
                      <textarea type="text" name="address" placeholder="Write your Complaint..." required ></textarea>
                    </div>
                  </div>
                  <div class="attachment">Attach Files as Proof: 
                    <a href="dashboard.php">
                    <i class="uil uil-paperclip"></i>
                    <span class="link-name">Attachment</span>
                </a></div>
                  <div class="button">
                    <input type="submit" value="Sign Up" name="submit" />
                  </div>
                </form>
        
              </div>
        </div>

    </section>

</body>
</html>