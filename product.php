<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/submenu.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/footer.css">
    
</head>
<body style="overflow-x: hidden;">
    <!-- Modal -->
    <div class="modal fade" id="addtocart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add this Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="addthisItemToCart">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="addThisProductToCart" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg header">
        <div class="container-fluid ms-5">
            <div class="row d-flex justify-content-between ms-auto">
                <div class="col-lg-2">
                    <div class="ecoLogo">
                        <a class="navbar-brand me-5 ms-5" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-basket2-fill" viewBox="0 0 16 16">
  <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1z"/>
</svg>                            EchoShop
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-2">
                    <div class="searchInbox">
                        <div class="input-group input-group-sm">
                            <input type="search" class="form-control" name="searchProduct" id="searchProduct" placeholder="Search here...">
                            <button class="btn btn-outline-success" id="btnSearch">Search</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 d-flex justify-content-end align-items-end">
                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active mt-1" aria-current="page" href="dashboard.php">Home</a>
                            <a class="nav-link active mt-1" href="product.php">Product</a>
                            <a class="nav-link active mt-1" href="dashCartTable.php"><i class="fa fa-shopping-cart" aria-hidden="true"><sup id="cartNumber"></sup></i></a>
                            <a class="nav-link active" href="#"><div class="profilePic"></div></a>
                            <nav>
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
            </div>
        </div>
    </nav>
    <section class="home" id="home">
        <div class="content">
            <h3>
                Show your <span>handmade</span>
                products in here             
            </h3>
            <p>Lets become a nature lover by recycling our gabages and show the world how beautiful recycable handmade product is. .</p>
        </div>
    </section>
    <div class="container">
        <section class="categories" id="categories">
            <div class="forNavbar">
                <!-- For navbar sticky only class="ms-2 mt-2-->
            </div>
            <h1 class="ecoCategoriesHeader " >
                ECO CATEGORIES<hr>
          
            </h1>
            <div class="getCategory d-flex justify-content-center align-items-center">
                <div class="row d-flex justify-content-center align-items-center" id="getCategory">
                    <!-- Get Catergory -->
                </div>
            </div>
        </section>
        <section class="categories">
            <div class="row border">
                <div class="col-lg-12">
                    <div class="forNavbar">
                        <!-- For navbar sticky only -->
                    </div>
                    <h1 class="ecoProduct" class="ms-5 mt-5">
                        Eco Products
                    </h1><hr>
                    <div class="getCategory d-flex justify-content-center align-items-center">
                        <div class="row d-flex justify-content-center align-items-center" id="getProducts">
                            <!-- Get Catergory -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <section>
        <?php
            include './includes/footer.php';
        ?>
    </section>
    <!-- Jquery -->
    <script src="javaScript/jquery.js"></script>
    <script src="javaScript/toggle.js"></script>
    <script src="javaScript/dashboard.js"></script>
    <script src="javaScript/userInformation.js"></script>
    <script src="javaScript/UserLogout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>