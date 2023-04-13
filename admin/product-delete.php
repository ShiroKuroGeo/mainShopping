<?php include('header.php');

if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM products WHERE product_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}

	// Getting photo ID to unlink from folder
	$statement = $pdo->prepare("SELECT * FROM products WHERE product_id=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$p_featured_photo = $row['image_1'];
		unlink('../images/'.$image_1);
	}

	// Delete from tbl_photo
	$statement = $pdo->prepare("DELETE FROM products WHERE product_id=?");
	$statement->execute(array($_REQUEST['id']));

\
	header('location: product.php');
?>