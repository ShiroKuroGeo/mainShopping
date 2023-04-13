<?php
include "includes/db_con.php";
include "functions/index_function.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop</title>
        <link rel="stylesheet" href="./css/style.css">
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
    <body>
        <!-- header navbar start here-->
        <div class="header">
            <div class="container-fluid p-0">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <!--                                     <img src="./images/logo.png" class="logo" > -->
                        <a href="index.php" class="logo">
                            <i class="fas fa-shopping-basket"></i>
                            Ecoshop 
                        </a>
                        <!-- search area -->
                        <form class="d-flex" role="search" method="get">
                            <input class="form-control  me-2" name="search" type="search" placeholder="Search here..." aria-label="Search">
                            <!-- <button class="btn btn-outline-white bg-light" type="submit"> <i class="fa fa-search" aria-hidden="true"></i></button>-->
                            <input type="submit" name="search_now" value="search" class="button">
                        </form>
                        <!--<a href="#" class="logo"> <i class="fas fa-shopping-basket"></i>Ecoshop </a>-->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product.php">Products</a>
                                </li>
                                <a class="nav-link active mt-1" href="dashCartTable.php"><i class="fa fa-shopping-cart" aria-hidden="true"><sup id="cartNumber"></sup></i></a>
                                </li>
                                <!--   <li class="nav-item">
                                    <a class="nav-link" href="#"> total price: 100</a>
                                    </li> -->
                            </ul>
                            <nav>
                            <div class="profilePic"></div>
                                <div class="sub-menu-wrap" id="subMenu">
                                    <div class="sub-menu">
                                        <div class="user-info">
                                            <div class="profilePic"></div>
                                            <h3 id="nameOfUserES"></h3>
                                        </div>
                                        <hr>
                                        <a href="./eco-post/home.php" class="sub-menu-link">
                                            <div class="profilePic"></div>
                                            <p>profile</p>
                                            <span>></span>
                                        </a>
                                        <a href="./user_dashboard/index.php" class="sub-menu-link">
                                            <img src="./images/logo.png" width="100px">
                                            <p>My dashboard</p>
                                            <span>></span>
                                        </a>
                                        <a class="sub-menu-link" >
                                            <img src="./images/logout.png " width="100">
                                            <button type="button"class="logout" id="btnLogout">Log out</button>
                                            <span>></span>
                                        </a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
            </div>
</nav></div>
<!-- header navbar end here-->
<?php
cart();
                                    ?>
<!-- text diri -->
<section class="home" id="home">
    <div class="content">
        <h3>
            Show your <span>handmade</span>
            products in here
        </h3>
        <p>Lets become a nature lover by recycling our gabages and show the world how beautiful recycable handmade product is. .</p>
        <!--                                     <a href="#" class="btn">shop now &#8594;</a>
 -->
    </div>
</section>
<!-- login  diri start here-->
<!-- login  diri end here->

<!sidenav categories section start here -->
<!--   <section class="categories" id="categories">
                                        <h1 class="heading"> ECO CATEGORIES</h1>                                    
                                        <hr>

                                        <?php

                                        getcategory();
                                        ?>
                                                                                                  
                                    </section> -->
<!--sidenav categories section end here -->
<!-- Product start here -->
<section>
    <div class="row">
        <div class="col-md-20 ">
            <!-- first row -->
            <div class="row">
                <h1 class='heading'>Search Result...</h1>
                <?php
                    getsearch();
                    getcategory_name();  
                ?>
</section>
<!-- Product end here -->
<!--footer start here-->
<?php
include './includes/footer.php';
?>
<!--footer end here-->
<!-- bootstrap js -->
<script src="./includes/script.js"></script>

    <script src="javaScript/jquery.js"></script>
    <script src="javaScript/toggle.js"></script>
    <script src="javaScript/dashboard.js"></script>
    <script src="javaScript/userInformation.js"></script>
    <script src="javaScript/UserLogout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body></html>
