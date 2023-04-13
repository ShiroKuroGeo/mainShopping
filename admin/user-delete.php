<?php require_once('header.php'); 

if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM user WHERE user_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}




	// Delete from user
	$statement = $pdo->prepare("DELETE FROM user WHERE user_id=?");
	$statement->execute(array($_REQUEST['id']));

	/* // Delete from tbl_rating
	$statement = $pdo->prepare("DELETE FROM rating WHERE id=?");
	$statement->execute(array($_REQUEST['id'])); */

	header('location: user.php');
?>