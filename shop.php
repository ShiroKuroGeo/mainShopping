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
        <link rel="stylesheet" href="./css/shop.css">
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
                <a href="index.php" class="logo">
                    <i class="fas fa-shopping-basket"></i>
                    Ecoshop 
                </a>
                <!-- search area start -->
                <form class="d-flex" role="search" action="search.php" method="get">
                    <input class="form-control  me-2" name="search" type="search" placeholder="Search in this Shop..." aria-label="Search">
                    <input type="submit" name="search_now" value="search" class="button">
                </form>
                <!-- search area end -->
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
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart_table.php">
                                <i class="fa fa-shopping-cart" aria-hidden="true">
                                    <sup>
                                    <!-- <?php
                                      cart_num();
                                    ?> -->
                                    </sup>
                                </i>
                            </a>
                        </li>
                        <!--  <li class="nav-item">
                              <a class="nav-link" href="#">Total Price:<?php  total_price();?></a>
                            </li> -->
                    </ul>
                    <!-- Profile dropdown start -->
                    <nav>
                        <img src="./images/bag.jpg" class="profile" width="70" onclick="toggleMenu()">
                        <div class="sub-menu-wrap" id="subMenu">
                            <div class="sub-menu">
                                <div class="user-info">
                                    <img src="./images/profile.png">
                                    <h3>name</h3>
                                </div>
                                <hr>
                                <a href="" class="sub-menu-link">
                                    <img src="./images/background.jpg" class="profile">
                                    <p>profile</p>
                                    <span>></span>
                                </a>
                                <a href="./user_dashboard/index.php" class="sub-menu-link">
                                    <img src="./images/logo.png">
                                    <p>My dashboard</p>
                                    <span>></span>
                                </a>
                                <a href="logout.php" class="sub-menu-link">
                                    <img src="./images/logout.png " width="50">
                                    <p>logout</p>
                                    <span>></span>
                                </a>
                            </div>
                        </div>
                    </nav>
                    <!-- Profile dropdown end -->
                </div>
            </div>
          </nav>
        </div>
      </div>
<!-- header navbar end here-->
<?php
cart();

                                    ?>
<!-- user profile start here -->
<section>
    <div class="container text-center">
        <img src="./images/background.jpg" class="image">
        <h3>Wylene Shop</h3>
        <div class="row align-items-end">
            <div class="col">
                <a href="#" class="text">Home</a>
            </div>
            <div class="col">
                <a href="#" class="text">All Products</a>
            </div>
            <div class="col">
                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown">Categories
                                      </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="">Eco bag</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">dress</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">shoes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- user profile end here -->
<!-- category section start here -->
<section class="categories" id="categories">
    <h1 class="heading">CATEGORIES</h1>
    <hr>
    <?php
      getcategories();
    ?>
</section>
<!-- categories section end here -->
<!-- Product start here -->
<section>
    <div class="row">
        <div class="col-md-20 ">
            <div class="row">
                <h1 class="headings">PRODUCTS</h1>
                <?php
                  getproducts();
                  getcategory_name();                              
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Product end here -->
<!--footer start here-->
<?php
  include './includes/footer.php';
?>
<!--footer end here-->
<!-- bootstrap js -->
<script src="./includes/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body></html>
