<?php
//start session
@session_start();
require_once ('includes/database.php');

//check to see if a user if logged in
$login = '';
$name = '';
$role = 0;
$profilePicturePath = '';
if (isset($_SESSION['login'])){
	$login = $_SESSION['login'];
}
// $_SESSION['redirected_to_registration'];
if (isset($_SESSION['login'])) {
    // Check if the session variable 'profilePicturePath' is set
    if (isset($_SESSION['profilePicturePath']) && ($_SESSION['profilePicturePath'] !== NULL)) {
        $profilePicturePath = "assets/userimg/" . $_SESSION['profilePicturePath'];
    } else {
		$profilePicturePath = "assets/userimg/default.jpg";
    }
}
//  else if( !$_SESSION['redirected_to_registration'] ) {
	// Set the redirection flag to avoid multiple redirects
// 	$_SESSION['redirected_to_registration']= true;
		// header("Location: registration.php");
// }
if (isset($_SESSION['name'])) {
	$name = $_SESSION['name'];
}

if (isset($_SESSION['role'])){
	$role = $_SESSION['role'];
}

if (isset($_SESSION['id'])) {
	$session_id = $_SESSION['id'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css"/>

	<style>/* Existing styles background-image: linear-gradient(to bottom, #4FACFE, #00F2FE);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
/* Additional style for the profile image */
.profile-image {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 15px; /* Adjusted margin for better alignment */
    margin-top: -10px;
    transition: background-color 0.3s ease;
}

/* Custom styles for the dropdown menu background color on hover */
.navbar-nav > li.dropdown:hover > .dropdown-menu,
.profile-image:hover {
    background-color: #f9f194;
	transition: background-color 1s ease, border-color 1s ease, color 1s ease;
	/* background-image: linear-gradient(to bottom, #4FACFE, #00F2FE); */
    /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
}

/* Custom styles for the navbar */
.navbar {
    background-color: #333; /* Dark background color */
    padding: 10px 0; /* Adjusted padding for top and bottom */
}

/* Custom styles for the navbar text */
.navbar-nav > li > a {
    color: white;
}

/* Custom styles for the active link in the navbar */
.navbar-nav > li.active > a,
.navbar-nav > li.active > a:hover,
.navbar-nav > li.active > a:focus {
    color: #f9f194; /* Set the active link text color to a light color */
}

/* Additional styles for the right-aligned elements in the navbar */
.navbar-right {
    margin-right: 15px; /* Adjusted the right margin */
}

/* Additional styles for the logo and text on the left */
/* Additional styles for the logo */
/* Additional styles for the logo image */


/* Additional styles for the Movix text beside the logo */
.navbar-brand span {
    color: #f9f194;
    font-weight: bold;
    font-size: 20px;
    margin-left: 5px;
    display: inline-block; /* Ensure the text stays beside the logo */
    vertical-align: middle; /* Align the text vertically with the logo */
}

/* Adjusted the margin for the navbar-header to accommodate the logo */
.navbar-header {
    margin-left: 15px; /* Adjusted the left margin */
}
/* Additional styles for the logo image */
/* Center the logo within the navbar-middle */
.navbar-middle {
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 100%; /* Ensure the div takes the full height of the navbar */
}
/* Additional styles for the logo image */
.logo-image {
    display: flex;
    vertical-align: middle;
    margin-right: 10px; /* Adjusted the right margin as needed */
    width: 60px; /* Set a fixed width */
    height: 60px; /* Set a fixed height */
    border-radius: 50%; /* Add a border-radius for a circular shape */
}


/* Adjusted the margin for the navbar-header to accommodate spacing */
/* .container-fluid { */
    /* padding-right: 15px; Adjusted the right padding */
    /* padding-left: 15px; Adjusted the left padding */
/* } */


/* Additional styles for the logo */
/* .navbar-brand img {
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px; /* Adjust the right margin as needed */
} */
/* .logo-image { */
	/* margin-right: 20px; Adjust the right margin as needed */
    /* margin-left: 20px; */
    /* display: block; Change from inline-block to block to set a width and height */
    /* margin-top: 20%; Adjust the percentage to center the image vertically */
     /* transform: translateY(-100%); Center the image precisely using translateY and a negative percentage */
/* } */

</style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">
    <span style="display: inline-block; vertical-align: middle;">Movix</span>
</a>




		<div class=" navbar-middle">
    <img src="assets/logoimg/logo4.jpg" alt="Logo" class="logo-image"></div> 
	<!-- this is part to be done again  -->
</div>		
		<div class="navbar-right">
			<div id="navbar" class="navbar-collapse collapse">
				<?php
				if ($role == 1) : ?>
					<ul class="nav navbar-nav">
						<li><a href="addtoaccount.php" class="text-capitalize">Welcome, 
					<?php ?>!</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false"> Navigation <i class="fa fa-caret-down"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php">HOME</a></li>
								<li><a href="registration.php">REGISTER</a></li>
								<li><a href="movies.php">MOVIES</a></li>
								<li><a href="reviews.php">REVIEWS</a></li>
								<li><a href="addmovie.php">ADD MOVIE</a></li>
								<li><a href="logout.php">LOGOUT</a></li>
							</ul>
						</li>						
					</ul>
					<div class=" navbar-brand mr-4" >
			<?php $profilePicturePath = "assets/userimg/" . $_SESSION['profilePicturePath']; ?>
			<img src="<?php echo $profilePicturePath; ?>" alt="Profile Image" class="profile-image">
			

		</div>
				<?php
				endif;
				if ($role == 2) : ?>
					<ul class="nav navbar-nav">
						<li><a href="addtoaccount.php" class="text-capitalize">Welcome, <?php print_r($name); ?>!</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false">  
			<?php
			// Assuming $profilePicturePath contains the path to the selected image
			$profilePicturePath = "assets/userimg/" . $_SESSION['profilePicturePath'];
		?>
			<img src="<?php echo $profilePicturePath; ?>" alt="Profile Image" class="profile-image">
		 <i class="fa fa-caret-down"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php">HOME</a></li>
								<li><a href="registration.php">REGISTER</a></li>
								<li><a href="movies.php">MOVIES</a></li>
								<li><a href="reviews.php">REVIEWS</a></li>
								<li><a href="liked_reviews.php">Liked Reviews</a></li>
								<li><a href="logout.php">LOGOUT</a></li>
							</ul>
						</li>
					</ul>
				<?php
				endif;
				if (empty($login)) : ?>
					<form class="navbar-form navbar-right" role="form" action="login.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Username" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<button type="submit" class="btn btn-success">
    <img src="assets\img\signin.jpg" alt="Your Image Alt Text" style="height: 20px; width: 20px;">
</button>

					</form>
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false"> Navigation <i class="fa fa-caret-down"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php">HOME</a></li>
								<li><a href="registration.php">REGISTER</a></li>
								<li><a href="movies.php">MOVIES</a></li>
								<li><a href="reviews.php">REVIEWS</a></li>
							</ul>
						</li>
					</ul>
				<?php endif; ?>

			</div>
		</div><!--/.navbar-right -->
	</div> 

</nav>
