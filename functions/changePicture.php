<?php

function uploadPost(){
    $target_dir = "../images/";
    $picture = $target_dir . basename($_FILES["photo"]["name"]);
    $videos = $target_dir . basename($_FILES["videos"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($picture,PATHINFO_EXTENSION));
    $imageFileType = strtolower(pathinfo($videos,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);

        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $picture) && move_uploaded_file($_FILES["videos"]["tmp_name"], $videos)) {
          echo "<script>window.location = 'http://localhost/shopping-main/eco-post/'</script>";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
    }
}
uploadPost();

?>