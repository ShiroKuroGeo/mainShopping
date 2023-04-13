<?php include('header.php');?>

<section class="content-header">
	<h1>Dashboard</h1>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM category");
$statement->execute();
$total_top_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM category");
$statement->execute();
$total_post = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM products");
$statement->execute();
$total_product = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM user WHERE status='1'");
$statement->execute();
$total_user = $statement->rowCount();

?>

<section class="content">
<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $total_product; ?></h3>

                  <p>Products</p>
                </div>
                <div class="icon">
				<a href="product.php"><i class="ionicons ion-android-cart"></i></a>
                </div>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3><?php echo $total_post; ?></h3>

                  <p>Post</p>
                </div>
                <div class="icon">
				<a href="product.php"><i class="ionicons ion-clipboard"></i></a>
                </div>
                
              </div>
            </div>
 
			  <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
				  <div class="inner">
					<h3><?php echo $total_user; ?></h3>
  
					<p>Active User</p>
				  </div>
				  <div class="icon">
				  <a href="user.php"><i class="ionicons ion-person-stalker"></i></a>
				  </div>				  
				</div>
			  </div>

			  <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-olive">
				  <div class="inner">
					<h3><?php echo $total_top_category; ?></h3>
  
					<p> Categories List</p>
				  </div>
				  <div class="icon">
				  <a href="category.php"><i class="ionicons ion-arrow-up-b"></i></a>
				  </div>
				  
				</div>
			  </div>
		  </div>
		  
</section>

<?php include('footer.php'); ?>