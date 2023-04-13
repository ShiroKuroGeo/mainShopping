
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecopost</title> 
    <link rel="stylesheet" href="../css/timeline.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
                        
</head>
<body>

<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php"><svg xmlns="http://www.w3.org/2000/svg"fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
  <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
</svg>Ecopost</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="input-group input-group-sm">
          <input type="search" name="searchProduct" id="searchUser" placeholder="Search here...">
          <button class="btn btn-outline-success" id="btnSearchUser">Search</button>
      </div>
    </div>
  </div>
</nav>
<div class="containers">
    <div class="card mt-5">
      <div id="appendChangeProfile"></div>
    <div class="card-body">
      <h5 class="card-title" id="nameOfUser"></h5>
    <button type="button" class="btn btn-tertiary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
      </svg>
    </button>
    <div class="">
      <div class="text-center" id="linkMessage"></div>
      <div class="input-group mt-3">
        <input type="url" name="updateLinkMessage" class="form-control" id="updateLinkMessage" placeholder="Change Message Link">
        <button type="button" class="btn btn-info col-4 btn-sm" id="btnSaveLink">Save Link</button>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../functions/changeProfile.php" method="post" enctype="multipart/form-data">
          Select image to upload:
          <input type="file" name="photo" id="photo" class="form-control">
          <input type="submit" class="form-control bg-primary mt-3" value="Update Profile" id="btnChangeProfile" name="submit">
        </form>
      </div>
    </div>
  </div>
  </div>
</div>
</div>
<div class="title col-7"><h3><div id="profName"></div>ACTIVITIES</h3>
</div>
<div class="container mt-5 vh-100">
  <div class="row">
      <div class="prof">
        <div class="group">
          <div class="row mx-auto">
            <div class="col-1">
              <div class="profile"></div>
            </div>
            <div class="col-9 pt-4">
              <pre id="profName"></pre>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div id="mgaPostTime">
        </div>
      </div>
  </div>
</div>                          
  <script src="../includes/script.js"></script>
  <script src="../javaScript/jquery.js"></script>
  <script src="../javaScript/ecoPost.js"></script>
  <script src="../javaScript/searchUser.js"></script>
  <script src="../javaScript/userInformation.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>