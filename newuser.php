<!DOCTYPE html>
<html lang="">
<head>
    <title>new user</title>
    <!-- favicon -->
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<header class="header">
    <div class="logo">
        <i class="fas fa-shopping-basket"></i>
        Ecoshop Sign Up
    </div>
</header>
    <div class="container"> 
    <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
  <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
</svg>     <h1>Show your <span>TALENT</span> by creating a <br>handmade products in here</h1>
    <form action="" method="POST">
        <div class="form" id="form">
            <h2>Sign Up</h2>
            <input type="text" class="form-control" name="Firstname" id="Firstname" required placeholder="First Name"><br>                               
            <input type="text" class="form-control" name="Lastname" id="Lastname" required placeholder="Last Name"><br>                                  
            <input type="email" class="form-control" name="Email" id="Email" required placeholder="Email"><br>                         
            <input type="text" class="form-control" name="Username" id="Username" required placeholder="User Name" autocomplete="off"><br>
            <input type="text" class="form-control" name="Address" id="Address" required placeholder="Home address">   
            <input type="text" class="form-control" name="phone" id="phone" required  placeholder="Mobile Number">                   
            <input type="password"name="Password" id="Password" placeholder="Password" required/>
            <input type="password" name="retypePassword" id="retypePassword" placeholder="Re-type Password"><br>
            <a href="index.php">
                <i aria-hidden="true" class="text" >Already have an acount?</i>
            </a><br>
            <button type="button" id="btnRegister">Sign Up</button>
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

<script src="./javaScript/jquery.js"></script>
<script src="./javaScript/UserRegister.js"></script>
</body> 
</html>