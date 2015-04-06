<?php
	// for hosting
	// define("DB_SERVER", "104.131.92.112");
	// define("DB_USER", "INSERT_NONROOT_HERE");  // this shouldn't be root, just a user w/ access to the db
	// define("DB_PASS", "INSERT_PASSWORD_HERE"); // hide in the push to GitHub
	// define("DB_NAME", "mini_weebly");

	// for local testing
	define("DB_SERVER", "localhost");
	define("DB_USER", "INSERT_NONROOT_HERE");
	define("DB_PASS", "INSERT_PASSWORD_HERE");
	define("DB_NAME", "weeblytrial");

	$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	if(mysqli_connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() .
			" (" .mysqli_connect_errno() . ")"
		);
	}
?>