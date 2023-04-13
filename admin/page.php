<?php include('header.php');

if(isset($_POST['form_about'])) {
    
    $valid = 1;

    if(empty($_POST['about_title'])) {
        $valid = 0;
        echo "<script>alert('Title can not be empty.')</script>";
    }

    if(empty($_POST['about_content'])) {
        $valid = 0;
        echo "<script>alert('Content can not be empty.')</script>";
    }

    $path = $_FILES['about_title']['name'];
    $path_tmp = $_FILES['about_title']['tmp_name'];

    if($path != '') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            echo "<script>alert('You must have to upload jpg, jpeg, gif or png file.')</script>";
        }
    }

    if($valid == 1) {

        if($path != '') {
            // removing the existing photo
            $statement = $pdo->prepare("SELECT * FROM page WHERE id=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
            foreach ($result as $row) {
                $about_banner = $row['about_title'];
                unlink('../images/'.$about_title);
            }

            // updating the data
            $final_name = 'about-banner'.'.'.$ext;
            move_uploaded_file( $path_tmp, '../images/'.$final_name );

            // updating the database
            $statement = $pdo->prepare("UPDATE page SET about_title=?,about_content=? WHERE id=1");
            $statement->execute(array($_POST['about_title'],$_POST['about_content']));
        } else {
            // updating the database
            $statement = $pdo->prepare("UPDATE page SET about_title=?,about_content=?WHERE id=1");
            $statement->execute(array($_POST['about_title'],$_POST['about_content']));
        }
        $_SESSION['success'] = 'About Page Information is updated successfully.';
        $_SESSION['success_code'] = "success";
   }
    
}

?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Page Settings</h1>
    </div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
foreach ($result as $row) {
    $about_title = $row['about_title'];
    $about_content = $row['about_content'];
   
 

}
?>

<section class="content">

    <div class="row">
        <div class="col-md-12">
                            
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">About Us</a></li>
                    </ul>

                    <!-- About Us Page Content -->

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Title * </label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="about_title" value="<?php echo $about_title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Content * </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="about_content" id="editor1"><?php echo $about_content; ?></textarea>
                                        </div>
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_about">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
            </form>
        </div>
    </div>

</section>
<?php
include('../includes/script.php');
include('footer.php'); ?>