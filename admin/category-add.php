<?php include('header.php');

if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['category_title'])) {
        $valid = 0;
		$_SESSION['success'] = 'Category Name can not be empty.';
        $_SESSION['success_code'] = "error";

	} else {
    	// Duplicate Category checking
    	$statement = $pdo->prepare("SELECT * FROM category WHERE category_title=?");
    	$statement->execute(array($_POST['category_title']));
    	$total = $statement->rowCount();
    	if($total)
    	{
    		$valid = 0;
			$_SESSION['success'] = 'Category name already exists..';
            $_SESSION['success_code'] = "error";
    	}
    }

    if($valid == 1) {

		// Saving data into the main table category
		$statement = $pdo->prepare("INSERT INTO category (category_title,show_on_menu) VALUES (?,?)");
		$statement->execute(array($_POST['category_title'],$_POST['show_on_menu']));
		$_SESSION['success'] = 'Category is add successfully..';
        $_SESSION['success_code'] = "success";
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Category</h1>
	</div>
	<div class="content-header-right">
		<a href="category.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<form class="form-horizontal" action="" method="post">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Category Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="category_title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Menu? <span>*</span></label>
							<div class="col-sm-4">
								<select name="show_on_menu" class="form-control" style="width:auto;">
									<option value="0">No</option>
									<option value="1">Yes</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>
<?php 
include('../includes/script.php');
include('footer.php'); ?>