<?php include('header.php');

// Preventing the direct access of this page.
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM category WHERE category_title=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: category.php');
		exit;
	}
}
	
	$statement = $pdo->prepare("SELECT * FROM category WHERE category_title=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$cat_ids[] = $row['category_title'];
	}

	// Delete from tbl_top_category
	$statement = $pdo->prepare("DELETE FROM category WHERE category_title=?");
	$statement->execute(array($_REQUEST['id']));

	header('location: category.php');
?>