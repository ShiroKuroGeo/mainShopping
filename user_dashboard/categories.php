
<?php
include "../includes/db_con.php";


if(isset($_POST['submit_cat'])){
    $cat=$_POST['category'];
    $image=$_FILES['file']['name'];
    $temp_file=$_FILES['file']['tmp_name'];

if($cat=='' or $image==''){
    echo "<script>alert('Please fill all the fields')</script>";
    exit();
    }else{
    move_uploaded_file($temp_file,"./uploads/$image");
   }

/* diri ang kato dili na mabalik ang category na naa sa database */

    $select = "SELECT category_title FROM category WHERE category_title = '$cat'";
    $result =$conn->query($select);
    $num=mysqli_num_rows($result);
if($num> 0)
  {
    echo "<script>alert('This Category has been already in the Database!')</script>";
  } else{
    $sql = "INSERT INTO category (category_title,image)VALUES ('$cat','$image')";
    $result=mysqli_query($conn,$sql);
if ($result) {
  echo "<script>alert('Category has been added successfully')</script>";
  } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  }
  }
}
$conn->close();
?>

              <form action="" method="post" enctype = "multipart/form-data" >
              <div class="insert_category text-center ">
              <p>Create Category</p>
              <input type="file" name="file"  class="files"placeholder="file"><br>
              <input type="text" class="cat" name="category" placeholder="Create Category">
              <br>
              <input type="submit"class="button" name="submit_cat" value="Submit">
              </div>           
              </form>