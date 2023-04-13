<?php
    include "../functions/searchUser.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/submenu.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg header">
        <div class="container-fluid">
            <div class="row d-flex ms-5 justify-content-between mx-auto">
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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="input-group input-group-sm">
                        <input type="search" name="searchProduct" id="searchUser" placeholder="Search here...">
                        <button class="btn btn-outline-success" id="btnSearchUser">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- body of search is here -->
    <div class="container">
        <div class="navbarArea" style="height: 100px;">
            <!-- Area of navbar -->
        </div>
        <div class="row">
            <?php
                getsearch();
            ?>
            <!-- Area of the user searched -->
        </div>
    </div>
</body>
    <!-- Scripts javascript -->
    <script src="../javaScript/jquery.js"></script>
    <script src="../javaScript/toggle.js"></script>
    <script src="../javaScript/UserLogout.js"></script>
    <script src="../javaScript/searchUser.js"></script>
    <script src="../javaScript/userInformation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>