<?php

// Host Name
$dbhost = 'localhost';

// Database Name
$dbname = 'eco_shop';

// Database Username
$dbuser = 'root';

// Database Password
$dbpass = '';


try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
}
catch( PDOException $exception ) {
	echo "Connection error :";
}
?>