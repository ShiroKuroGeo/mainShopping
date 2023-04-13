
<?php
include "../includes/db_con.php";


  if(isset($_POST['submit'])){  
/* 
    $select="SELECT * FROM tbl_user";
    $result=mysqli_query($conn,$select);
    while($row_data=mysqli_fetch_assoc($result)){
        $id=$row_data['user_id'];
        $name=$row_data['username']; */
      
            
        if(isset($_FILES['images'])) {
          // Connect to your database (replace with your own database connection code)
          $conn = new mysqli('localhost', 'username', 'password', 'dbname');
      
          // Loop through each file
          $uploadedFiles = $_FILES['images'];
          $fileCount = count($uploadedFiles['name']);
      
          for($i = 0; $i < $fileCount; $i++) {
              $fileName = $uploadedFiles['name'][$i];
              $fileTmpName = $uploadedFiles['tmp_name'][$i];
      
              // Read file data
              $fileData = file_get_contents($fileTmpName);
      
              // Prepare and execute an SQL query to insert file data into the database
              $stmt = $conn->prepare("INSERT INTO images (image_1, countDataImage) VALUES (?, ?)");
              $stmt->bind_param("ss", $fileName, $fileData);
              $stmt->execute();
      
              echo 'File ' . $fileName . ' has been uploaded and inserted into the database successfully.<br>';
          }
      }

    
    $title=$_POST['title'];
  $price=$_POST['price'];
  $cat=$_POST['cat'];
  $description=$_POST['description'];
  $status='true';

   if( $title=='' or $price=='' or $cat==''  or $description==''){
   echo "<script>alert('Please fill all the fields!')</script>";
   exit();
   }else{
    move_uploaded_file($temp_file1,"./product_uploads/$image1");
      
   $insert = "INSERT INTO `products` (title,price,category,description,status,date,image_1)
   VALUES ('$title','$price','$cat','$description','$status',NOW())";
   $result=mysqli_query($conn,$insert);
   if ($result) {
   echo "<script>alert('Product has been created successfully.')</script>";
   echo "<script>window.open('index.php','_self')</script>";
   } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
   }
   }
/*   } */
   $conn->close();
   } 
   ?>    

                             <form action="" method="post" enctype = "multipart/form-data" >
                             <div class="create_listing text-center ">   
                             <h2>Create new Listing</h2>
                             <input type="file" name="images[]" multiple> 
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