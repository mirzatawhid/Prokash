<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Prokash</title>
  </head>
  <body>
    <!--Navigation Bar-->

    <header>
      <img
        class="logo"
        src="images/logo.png"
        alt="logo"
        width="141px"
        height="57px"
      />
      <nav class="nav_bar">
        <ul class="nav_links">
          <li class="home"><a href="#">Home</a></li>
          <li class="features"><a href="#feature">Features</a></li>
          <li class="about_us"><a href="#about_sec">About Us</a></li>
          <li class="faq"><a href="#faq_sec">FAQ</a></li>
          <li class="contact"><a href="#contact">Contact</a></li>
        </ul>
      </nav>
      <div class="btn">
        <a class="login" href="login.php"><button>Login</button></a>
        <a class="register" href="register.php"><button>Register</button></a>
      </div>
    </header>

    <main>
      <!--Banner-->

      <div class="banner" style="min-height: 960px">
        <div>
          <img class="banner_logo" src="images/banner_logo.png" alt="logo" />
          <p class="banner_txt">
            Collaboration and Co-Ordination<br />with Mass People
          </p>
        </div>
      </div>
      <!-- Features -->

      <div class="features_section" id="feature">
        <h1>Features</h1>
        <div class="features_container">
          <div class="box complaint">
            <img
              class="box_img"
              src="images/complaint.png"
              style="width: 60%; height: auto"
            />
            <p class="box_title">Complaints Submission</p>
            <p class="box_desc">
              User-friendly platform to Submit any social complaint easily in
              one place
            </p>
          </div>

          <div class="box mapping">
            <img
              class="box_img"
              src="images/mapping.png"
              style="width: 50%; height: auto"
            />
            <p class="box_title">Complaints Mapping</p>
            <p class="box_desc">
              Gives transparency of social problems and track the complaints
            </p>
          </div>

          <div class="box forum">
            <img
              class="box_img"
              src="images/forum.png"
              style="width: 60%; height: auto"
            />
            <p class="box_title">Discussion Forum</p>
            <p class="box_desc">
              Gives a room for discussion about solving the social problems
            </p>
          </div>
        </div>
      </div>
    </div>

      <!--About us-->
      <section class="about_sec" id="about_sec">
        <h1>About Us</h1>
        <div class="wrapper">
          <img src="images/about.png" alt="about logo">
          <div class="text_box">
            <h2>The PROKASH Platform</h2>
            <p>
              This is a social or community based problem solving platform.This
              Platform helps communities turn information into action with an
              intuitive and accessible crowdsourcing and mapping tool. By
              enabling collection, management and analysis of crowdsourced
              information, 'প্রকাশ' empowers everyone—individuals, community
              groups, organizations—to create meaningful change.
            </p>
          </div>
        </div>
      </section>

      <!--FAQ Section -->
      <section class="faq_section" id="faq_sec">
        <h1>FAQs</h1>
        <div class="faq_container">
          <div class="faq_box">
            <p class="ques">What is the website about?</p>
            <p class="icon">+</p>
          </div>
          <div class="faq_box">
            <p class="ques">What is the mapping system in "Prokash"?</p>
            <p class="icon">+</p>
          </div>
          <div class="faq_box">
            <p class="ques">What is the benefit of this platform?</p>
            <p class="icon">+</p>
          </div>
          <div class="faq_box">
            <p class="ques">How to use this platform?</p>
            <p class="icon">+</p>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <section class="footer" id="contact">
        <div class="footer_logo">
          <img
            src="images/footer_logo.png"
            alt="footer logo"
            width="141px"
            height="57px"
          />
        </div>

        <ul class="list">
          <li>
            <a href="#">HOME</a>
          </li>
          <li>
            <a href="#feature">FEATURES</a>
          </li>
          <li>
            <a href="#about_sec">ABOUT</a>
          </li>
          <li>
            <a href="#faq_sec">FAQ</a>
          </li>
        </ul>
        <br />
        <div class="social">
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-facebook-f"></i></a>
          <a href="#"><i class="fa fa-snapchat"></i></a>
        </div>

        <p class="copyright">
          Terms & condition Privacy Policy
          <br />
          copyright@2022 প্রকাশ All Right reseved Site credit
        </p>
      </section>
    </footer>
  </body>
</html>
