<?php
include "includes/db_con.php";
 
if(isset($_POST['submit'])){

    $imageCount = count($_FILES['image']['name']);
    for($i=0;$i<$imageCount;$i++){
        $imageName = $_FILES['image']['name'][$i];
        $imageTempName = $_FILES['image']['tmp_name'][$i];

        if ($imageCount>50000){
            echo "Sorry your file is too large.";
          }else
          {
            echo "File uploaded successfully.";
        
          }
        
        $targetPath = "./products_upload".$imageName;
        if(move_uploaded_file($imageTempName, $targetPath)){
            $insert = "INSERT INTO images(image) VALUES('$imageName')";
            $result = mysqli_query($conn, $insert);
        }
    }
    /* if($result){
    header('location: index.php?msg=ins');
} */
}


  ?>

   <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

  </head>
  <body>
  <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <form action="" method="post"  enctype = "multipart/form-data">
        <input type="file" name="image[]" multiple>
        <br>
        <input type="submit" name="submit" value="upload now">
    </form>
  </body>
  </html>  




  <?php
include "../includes/db_con.php";


  if(isset($_POST['submit'])){  
/* 
    $select="SELECT * FROM tbl_user";
    $result=mysqli_query($conn,$select);
    while($row_data=mysqli_fetch_assoc($result)){
        $id=$row_data['user_id'];
        $name=$row_data['username']; */
      
        

    
  $title=$_POST['title'];
  $price=$_POST['price'];
  $cat=$_POST['cat'];
  $description=$_POST['description'];
  $status='true';
  
  $imageCount = count($_FILES['image']['name']);
  for($i=0;$i<$imageCount;$i++){
      $imageName = $_FILES['image']['name'][$i];
      $imageTempName = $_FILES['image']['tmp_name'][$i];

      if ($imageCount>50000){
          echo "Sorry your file is too large.";
        }else
        {
          echo "File uploaded successfully.";
      
        }
        if( $title=='' or $price=='' or $cat==''  or $description=='' or $imageCount==''){
          echo "<script>alert('Please fill all the fields!')</script>";
          exit();
          }
      
     move_uploaded_file($imageTempName,"./product_uploads/$imageCount" );
     /*     $insert = "INSERT INTO images(image) VALUES('$imageName')";
          $result = mysqli_query($conn, $insert);
      } 
 */
  
   $insert = "INSERT INTO `products` (title,price,category,description,status,date,image_1)
   VALUES ('$title','$price','$cat','$description','$status',NOW(),'$imageTempName')";
   $result=mysqli_query($conn,$insert);
   if ($result) {
   echo "<script>alert('Product has been created successfully.')</script>";
   } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
   }
   }
/*    $conn->close();
 */   } 
  
   ?>    

                             <form action="" method="post" enctype = "multipart/form-data" >
                             <div class="create_listing text-center ">   
                             <h2>Create new Listing</h2>
                             <input type="file" name="image[]" multiple>

                            <!--  <input type="file" name="file1"  class="files"placeholder="file"><br>
                             <input type="file" name="file2"  class="files"placeholder="file"><br>
                             <input type="file" name="file3"  class="files"placeholder="file"><br> -->
                             <input type="text" name="title"id="name" placeholder="Title"><br>
                             <input type="number" name="price" id="name" placeholder="Price"><br>
                             <select name="cat" id="options">
                             <option value=""id="pick">Choose Categories</option> 
                             <?php
                              
                             $select = "SELECT * FROM `category`"; 
                             $result_query = mysqli_query($conn, $select);
                             while($row=mysqli_fetch_assoc($result_query)){
                             $category_title=$row['category_title'];
                             $id=$row['id'];
                             echo " <option value='$id'>$category_title</option>";
                             }
                             ?>
                     

                             </select><br>
                              
                             <textarea name="description" id="text" cols="30" rows="3" placeholder="Description"></textarea><br>
                             <a href=""><button type="submit" name="submit" >Post</button></a>
                             </div>
                             </form>

    </div>
  
  



    $sql = "INSERT INTO tbl_receiver (customer_id,first_name,last_name,email,phone,address,created,modified) VALUES (?,?,?,?,?,?,NOW(),NOW())";


    <div class='card'>
        <img src='./user_dashboard/product_uploads/$image_1' class='card-img-top' alt='...'>
        <div class='card-body'>
        </div>                                        
        </div> 
     