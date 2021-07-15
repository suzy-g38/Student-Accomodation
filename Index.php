<?php
session_start();
?>
<?php
      $error="";
      if(isset($_POST["st_log_btn"])){
      $st_email = $_POST["st_email"];
      $st_password = $_POST["st_password"];
      $st_data = file_get_contents("Database/data.json");
      $st_data = json_decode($st_data, true);

      foreach ( $st_data as $item) {
      if($item["st_email"]!=$st_email){
        $error.= "<div>Invalid email.</div>";
      }
    }
      }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Accomodation</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="favicon.ico?char=<?php if(isset($_POST['char'])) { echo $_POST['char']; } ?>" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js" integrity="sha384-3Nqiqht3ZZEO8FKj7GR1upiI385J92VwWNLj+FqHxtLYxd9l+WYpeqSOrLh0T12c" crossorigin="anonymous"></script>
</head>

<body>

  <section class="total" id="title">

    <div class="box hideform">

    </div>
    <!--Login Options-->

  <div class="form-div hideform">
    <div class="option hideform" id="options">
      <a href="#" id="ad-login"> Login as Admin</a>
      <p id="or-class">OR</p>
      <a href="#" id="st-login">Login as Student</a>
      </div>




    <!--Admin-Login-->
    <div class="admin hideform">
    <form class="form" id="form1" action="Admin-Home.php" method="post">
      <div class="form-group">
        <p class="form-ele">Login For Admin</p>
        <input type="email" class="form-control" id="admin-email" name="admin_email" placeholder="Enter Your Email">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="admin-password" name="admin_password" placeholder="Enter Your Password">
      </div>
      <div id="admin-error"></div>
      <div class="form-group">
      <button type="submit" name="admin_btn" class="btn btn-outline-dark admin-log-btn"> Log In </button>
    </div>
    </form>
  </div>
  <!--Student Login-->
  <div class="" id="forms">
    <div class="student hideform">

    <form class="form"  action="resource/session.php" method="post">
      <div class="form-group">
        <p class="form-ele">Login For Students</p>
        <input type="email" name="st_email" class="form-control" id="st-email"  placeholder="Enter Your Email">
      </div>
      <div class="form-group">
        <input type="password" name="st_password" class="form-control" id="st-password"  placeholder="Enter Your Password">
      </div>

      <div id="st-error"><? echo $error; ?></div>
      <div class="form-group">
      <button type="submit" name="st_log_btn" class="btn btn-outline-dark st-log-btn">Log In</button>
      </div>
      <p>Don't have an account?<span><a href="#register" id="st-reg">&nbsp;Register<a></span></p>
    </form>
  </div>

  <!--Student Registration-->
  <div class="register hideform">

  <form class="form" id="form3" action="Index.php" method="post">
    <div class="form-group">
      <p class="form-ele">Register For Students</p>
      <input type="text"  class="form-control" id="reg-name" name="reg_name" placeholder="Enter Your Name">
    </div>
    <div class="form-group">
      <input type="email" class="form-control" id="reg-email" name="reg_email" placeholder="Enter Your Email ID">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="reg-password" name="reg_password" placeholder="Enter Your Password">
    </div>
    <div id="reg-error"></div>
    <div class="form-group">
    <button type="submit" class="btn btn-outline-dark reg-log-btn">Create</button>
    </div>
    <p>Already have an account?<span><a href="#form2" id="st-log">&nbsp;Login<a></span></p>
  </form>
  <?php

  if($_POST){
    if(file_exists("Database/data.json")){
      $current_data = file_get_contents('Database/data.json');
      $array_data = json_decode($current_data, true);
      $extra = array(
           'st_name'  =>  $_POST['reg_name'],
           'st_email'  =>  $_POST['reg_email'],
           'st_password'  =>  $_POST['reg_password']

      );
      $array_data[] = $extra;
      $final_data = json_encode($array_data);
      file_put_contents('Database/data.json', $final_data);
  }
  }

  ?>
  </div>
  </div>
  <button class="btn btn-light index-close">X</button>
  <img src="images/form-background.jpg" class="form-background-img " alt="">


    </div>

    <div class="container-fluid">

    <!-- Nav Bar -->
    <section class="heading-section" id="title">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
       <a class="navbar-brand icon" href="Index.php">Acomo</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#features">Features</a>
             </li>
             <li class="nav-item">
              <a class="nav-link" href="#footer">Contact</a>
             </li>
             <li class="nav-item">
              <a class="nav-link login-index" id="show" href="#options">Login</a>
            </div>
           </li>
       </ul>
     </div>
  </nav>
  <script type="text/javascript">
  $(".login-index").click(function myalert(e) {
    e.preventDefault();
  });
  </script>


    <!-- Title -->

  <div class="container">
      <div class="heading">
        <h1 class="heading-text">Home away from Home</h1>
        <p class="heading-para">Book your student accommodation near your university.</p>
      </div>

      <div class="input-group search">
    <input type="search" class="form-control search-text" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
    <button type="button" class="btn btn-danger search-btn">search</button>
    </div>

</section>

  <!-- Features -->

<section class="middle-section" id="features">
  <div class="middle">
    <h1 class="middle-text">Book your <span><b>accommodation</b></span>  fast</h1>
  </div>
  <div class="row">
    <div class="feature-box col-lg-4">
      <img src="images/features_1.svg" class="img-svg" alt="">
      <h3 class="middle-text">Right Place at Right Price</h3>
      <p class="middle-para">We help you find the exact accommodation to fit your needs. Choose from lots of quality accommodations.</p>
    </div>
    <div class="feature-box col-lg-4">
      <img src="images/features_2.svg" class="img-svg" alt="">
      <h3 class="middle-text">End-to-End Support</h3>
      <p class="middle-para">We will help you in sourcing, booking and the paperwork required in the process. No need to worry about a thing!</p>
    </div>
    <div class="feature-box col-lg-4">
      <img src="images/features_3.svg" class="img-svg" alt="">
      <h3 class="middle-text">Roommate Search. Done</h3>
      <p class="middle-para">Incase you want to share accommodation, we help you find roommates through our extensive community.</p>
    </div>

  </div>

</section>

  <!-- Testimonials -->
<section class="testimonial-section" id="testimonials">
  <h1 id="testimonial-heading">See what students say</h1>
  <div id="testimonial-carousel" class="carousel slide" data-ride="false">
 <div class="carousel-inner">
   <div class="carousel-item active ">
     <h2 class="testimonial-text">“It was an amazing experience with acomo. The work they do is really appreciable.”</h2>
     <img class="testimonial-image"src="images/coursel-img.jpg" alt="dog-profile">
     <em>Pebbles, Delhi</em>
   </div>
   <div class="carousel-item ">
     <h2 class="testimonial-text">“Experience was amazing!! Great prices & the rent durations are negotiable. Thanks to Acomo for a great facility”</h2>
    <img class="testimonial-image" src="images/lady-img.jpg" alt="lady-profile">
    <em>Suzy, Kolkata</em>
   </div>

 </div>
 <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
   <span class="carousel-control-prev-icon" ></span>

 </a>
 <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
   <span class="carousel-control-next-icon" ></span>

 </a>
</div>

</section>


  <!-- Footer -->
  <footer class="footer-section" id="footer">

    <i class="social-icon fab fa-facebook-f"></i>
    <i class="social-icon fab fa-twitter"></i>
    <i class="social-icon fab fa-instagram"></i>
    <i class="social-icon fas fa-envelope"></i>
    <i class="social-icon fab fa-linkedin"></i>
    <p>© Copyright  Acomo</p>

  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="javascript/index.js" charset="utf-8"></script>

</body>

</html>
