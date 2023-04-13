<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- custom css file link  -->
</head>
<body>
<header class="header">
  <div class="logo">
    <i class="fas fa-shopping-basket"></i>
    Ecoshop Log In
  </div>
</header>
<div class="container">
<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
  <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
</svg> 
    <h1>Show your <span>TALENT</span> by creating a <br>handmade products in here  </h1>
  <form method="post">
    <div class="form" id="form">
      <h2>Log In</h2>
        <input type="text" id="email" name="email" placeholder="Email@" >
        <input type="password" id="password" name="password" placeholder="Type your password here"><br>
        <a href="newuser.php"><i aria-hidden="true">Dont have an account?</i></a><br>
        <button type="button" class="loginUser" id="btnLogin">Log In</button>
    </div>
  </form>
</div>
<!-- footer section starts  -->
<section class="footer">
  <div class="box-container">
    <div class="box">
        <h3>Eco Rules</h3>
        <a href="#" class="links"> <i class="fas fa-arrow-right"></i>About Us </a>
        <a href="#" class="links"> <i class="fas fa-arrow-right"></i>Thing to follow</a>
        <a href="#" class="links"> <i class="fas fa-arrow-right"></i>How to </a>
    </div>
  </div>
  <div class="credit">
    created by
    <span> 
      Group bungogon 
    </span>
    | all rights reserved
  </div>
</section>

  <!-- scrit for Jquery -->
  <script src="javaScript/jquery.js"></script>
  <!-- footer section ends -->
  <!-- <script src="js/sweetalert/dist/sweetalert.min.js"></script> -->
  <!-- script for login js -->
  <script src="javaScript/UserLogin.js"></script>
</body>
</html>