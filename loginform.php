<?php
$page_title = "Login";
$login_status = "";

/**
 * Description:
 * check login status:
 * 1 -- last login attempt success
 * 2 -- last login attempt failed.
 * 3 -- user just registered. Logged in automatically.
 * other -- new login attempt
 *
 */

require_once('includes/header.php');
?>

    <div class="container wrapper">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Log In</li>
        </ul>
        <div class="col-xs-6 col-xs-offset-2">
            <?php
            if( isset( $_GET['ls'] ) ) {
                $login_status = $_GET['ls'];


                if ($login_status == 1) {
                    echo "<p class='lead'>You are logged in as <span class='text-success text-uppercase'>", $_SESSION['login'], "</span></p>";
                    echo "<a class='btn btn-danger' href='logout.php'>LOG OUT</a><br>";
                    // header( "Refresh:3; url=useraccount.php", true, 303);
                } elseif ($login_status == 2) {
                    echo "<h1>Login</h1>";
                    echo "<p class='lead text-danger'>Incorrect user name/password combination.</p>";
                } elseif ($login_status == 3) {
                    echo "<h1>Login</h1>";
                    echo "<p class='lead text-success'>Thank you. Your account has been created.</p>";
                    echo "<a class='btn btn-danger' href='logout.php'>LOG OUT</a><br>";
                    // header( "Refresh:3; url=useraccount.php", true, 303);
                }
            }else {
                echo "<p class='lead'>You are not logged in. Please login or <a href='registrationform.php'>create</a> a new account</p>";
            }

            if ( $login_status != 1 && $login_status != 3 ) { ?>
                <form class="form-horizontal" role="form" action="login.php" method="post">
                    <div class="form-group">
                        <label for="newUserName" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="newUserName" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newPassword" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="newPassword" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">SIGN IN</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
    <style>
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
    <style/>
<?php
include ('includes/footer.php');
?>