<?php
	//define parameters
	$host = "localhost";
	$port;
	$login = "root";
	$password = '';
	$database = "prutor";
	$tblMovies = "movies";
	$tblUsers = "users";
	$tblReviews = "reviews";
	// $tblfeedback ="feedback";
  
	//Connect to the mysql server
	$conn = @new mysqli($host, $login, $password, $database, $port);

	//Handle connection errors 
	if (mysqli_connect_errno() != 0) {
	    $errno = mysqli_connect_errno();
 
	    die("Connect Failed with: ($errno) $errmsg<br/>\n");
	}
?>

