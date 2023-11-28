<?php
$page_title = "Create new user";

include ('includes/header.php');
?>
<style>
    /* Gradient background for form sections */
    .form-section {
        background: linear-gradient(to left, #4b6cb7, #182848); /* Adjust colors as needed */
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        color: #fff; /* Adjust text color for readability */
    }

    /* Add style for input fields on focus */
    .form-control:focus {
        border-color: #4b6cb7; /* Adjust the border color on focus */
        box-shadow: 0 0 5px rgba(75, 108, 183, 0.5); /* Add a subtle shadow on focus */
    }
/* Custom styles for input fields */
.form-control {
        border: 1px solid #ccc; /* Default border color */
        transition: border-color 0.3s ease; /* Smooth transition on border color change */
        position: relative;
    }

    .form-control:focus {
        border-color: #5cb85c; /* Highlight color on focus */
    }

    /* Icon styles */
    .input-group-addon {
        background-color: #fff; /* Background color for the icon container */
        border: 1px solid #ccc; /* Border color for the icon container */
        padding: 8px; /* Adjust padding as needed */
        border-radius: 4px; /* Adjust border-radius for a rounded look */
    }

    .input-group-addon i {
        color: #555; /* Icon color */
	}

	.btn-rounded {
    border-radius: 20px; /* Adjust the border-radius as needed for rounded corners */
}

.btn-success {
    background-image: linear-gradient(to bottom, #4FACFE, #00F2FE);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}



    /* Custom styles for form labels */
    .form-horizontal label {
        opacity: 0%; /* Initially set label opacity to 0 */
        transform: translateY(20px); /* Initially move label down by 20px */
        transition: opacity 3s ease, transform 3s ease; /* Smooth transition on opacity and transform */
    }

    /* Custom styles for form labels when they are in focus */
    .form-group.focus label {
        opacity: 100%; /* Make label fully visible */
        transform: translateY(0); /* Move label back to its original position */
    }
 /* Center the button */
 .form-group.center {
        text-align: center;
    }

    /* Custom styles for the button */
    .btn-rounded {
        border-radius: 20px; /* Adjust the border-radius as needed for rounded corners */
        transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for hover effect */
    }

    .btn-success {
        background-image: linear-gradient(to bottom, #4FACFE, #00F2FE);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        color: #fff; /* Set text color to white */
        border: none; /* Remove border for a cleaner look */
    }

    /* Hover effect for the button */
    .btn-success:hover {
        background-image: linear-gradient(to bottom, #0099FF, #0066CC); /* Adjust hover background color */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Adjust hover box shadow */
    }


    /* Style for the grid container */
    .profile-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* Each row will have 4 columns */
        gap: 20px; /* Adjust the gap between items */
        text-align: center;
    }

    /* Style for the small images in the grid */
    .profile-card {
        position: relative;
        perspective: 1000px; /* Define the depth of the 3D effect */
    }

    .profile-card img {
        width: 100px; /* Adjust as needed */
        height: 100px; /* Adjust as needed */
        border-radius: 50%;
        transform-style: preserve-3d;
        transition: transform 0.5s ease; /* Smooth transition for the flip effect */
    }

    .profile-card:hover img {
        transform: rotateY(180deg); /* Flip the card on hover */
    }

  

    /* Style for the grid container */
    .profile-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* Each row will have 4 columns */
        gap: 20px; /* Adjust the gap between items */
        text-align: center;
    }

    /* Style for the profile card */
    .profile-card {
        position: relative;
        width: 100%;
        text-align: center;
    }

    .profile-card img {
        width: 100px; /* Adjust as needed */
        height: 100px; /* Adjust as needed */
        border-radius: 50%;
    }

    .username {
        margin-top: 10px; /* Adjust the margin as needed */
    }
     
	.breadcrumb {
        background-color: #f8f9fa; /* Light background color */
        padding: 10px;
        border-radius: 5px;
        /* margin-bottom: 20px; */
        margin-top: 20px;
        display: flex;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }

    .breadcrumb li {
        list-style: none;
        display: inline;
        font-size: 16px;
    }

    .breadcrumb a {
        text-decoration: none;
        color: #007bff; /* Blue color */
        transition: color 0.3s ease-in-out;
    }

    .breadcrumb a:hover {
        color: #0056b3; /* Darker blue on hover */
    }

    .breadcrumb .separator {
        margin: 0 10px;
        color: #6c757d; /* Gray color for separator */
    }

    .breadcrumb .active {
        color: #495057; /* Dark gray color for active/last item */
    }
    


</style>

<div class="container wrapper">
	<ul class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li class="active">Register</li>
	</ul>

    <h1 class="text-center">REGISTER</h1>
    <p class="lead text-center">Please register your account</p>
	<div class="col-xs-8 col-xs-offset-2">
		<form class="form-horizontal" role="form" action="register.php" method="get" enctype="text/plain">
			<div class="form-group focus form-section" >
				<label for="newUserName" class="col-sm-2 control-label" >Username</label>
				<div class="col-sm-10 input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" class="form-control" id="newUserName" name="username" placeholder="Username" required>
				</div>
			</div>
			<div class="form-group focus form-section">
				<label for="newName" class="col-sm-2 control-label" >Name</label>
				<div class="col-sm-10 input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" class="form-control" id="newName" name="name" placeholder="Name" required>
				</div>
			</div>
			<div class="form-group focus form-section">
				<label for="newEmail" class="col-sm-2 control-label" >Email</label>
				<div class="col-sm-10 input-group">
				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
					<input type="email" class="form-control" id="newEmail" name="email" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group focus form-section">
				<label for="newPassword" class="col-sm-2 control-label" >Password</label>
				<div class="col-sm-10 input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password" class="form-control" id="newPassword" name="password" placeholder="Password" required>
				</div>
			</div>
			<div class="form-group focus form-section">
   				 <label for="profileImage" class="col-sm-2 control-label" >Choose Profile Image:</label>
   				 <div class="col-sm-10" >
					<select class="form-control " id="profileImage" name="profile_image">
                			<option value="usera.jpg">user a </option>
                			<option value="userb.jpg">user b </option>
                			<option value="userc.jpg">user c </option>
                			<option value="userd.jpg">user d </option>
                			<option value="usere.jpg">user e </option>
                			<option value="userf.jpg">user f </option>
			        </select>
				 </div>
			</div>
			
			<style>
       					/* Style for the small images in the dropdown */
       					.profile-image-option {
       					    width: 100px; /* Adjust as needed */
       					    height: 100px; /* Adjust as needed */
       					    border-radius: 50%;
       					    margin-left: 40px; /* Adjust as needed */
       					    cursor: pointer;
       					}
    		</style>
   			<br>
			<div class="form-group ">
				<div class="col-sm-12 ">
					<button type="submit" class="btn btn-success btn-rounded">Register</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="profile-grid">
    <div class="profile-card">
        <h4 class="username">User A</h4>
        <img src="assets/userimg/usera.jpg" alt="User A">
    </div>
    <div class="profile-card">
        <h4 class="username">User B</h4>
        <img src="assets/userimg/userb.jpg" alt="User B">
    </div>
    <div class="profile-card">
        <h4 class="username">User C</h4>
        <img src="assets/userimg/userc.jpg" alt="User C">
    </div>
 
    <!-- Repeat the pattern for other users -->
    <div class="profile-card">
        <h4 class="username">User D</h4>
        <img src="assets/userimg/userd.jpg" alt="User D">
    </div>
    <div class="profile-card">
        <h4 class="username">User E</h4>
        <img src="assets/userimg/usere.jpg" alt="User E">
    </div>
    <div class="profile-card">
        <h4 class="username">User F</h4>
        <img src="assets/userimg/userf.jpg" alt="User F">
    </div>
</div>



<?php
include('includes/footer.php');
?>