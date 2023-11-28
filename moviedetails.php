<?php
require_once('includes/database.php');

//retrieve movie id
$id = $_GET['id']; // href="moviedetails.php?id=<?php echo $result_row['movie_id']?

//select statement
$query_str = "SELECT * FROM $tblMovies WHERE movie_id = '" . $id . "'";
$review_str = "SELECT review_rating, review_content FROM $tblReviews WHERE reviews.review_movie_id=" . $id . "";

//execute the query
$result = $conn->query($query_str);
$review_result = $conn->query($review_str);

//Handle selection errors
if (!$result || !$review_result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else { //display results in a table
    //insert a row into the table for each row of data
    $result_row = $result->fetch_assoc();
    $review_result_row = $review_result->fetch_assoc();

    $page_title = "Movix: " . $result_row['movie_name']; // use it for later imp part 
    require_once('includes/header.php');
    ?>
    <div class="container wrapper">
        <ul class="breadcrumb"> <!--navbar  -->
            <li><a href="index.php">Home</a></li>
            <li><a href="movies.php">Movies</a></li>
            <li class="active"><?php echo $result_row['movie_name'] ?></li>
        </ul>

        <h1 class="text-center"><?php echo $result_row['movie_name'] ?></h1>
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-image">
                        <img class="img-responsive" src="<?php echo $result_row['movie_img']; ?>" alt="" />
                    </div>
                    <div class="card-info">
                        <h3>Year: <?php echo $result_row['movie_year'] ?></h3>
                        <h3>Movie Rating: <?php echo $result_row['movie_rating'] ?></h3>
                        <p class="lead"><?php echo $result_row['movie_bio'] ?></p>
                    </div>
                </div>
				


				
				<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <!-- Movie details card content (image and information) -->
        </div>
    </div>
</div>

<div class="reviews-container">
    <?php
    $review_str = "SELECT * FROM reviews WHERE review_movie_id='$id'";
    $review_result = $conn->query($review_str);

    if ($review_result->num_rows > 0) {
        while ($review_row = $review_result->fetch_assoc()) :
    ?>
            <div class="review-box">
                <div class="rating-column">
                    <h4>Rating: <span class="<?= ($review_row['review_rating'] >= 4) ? 'text-success' : (($review_row['review_rating'] < 2) ? 'text-danger' : '') ?>">
                            <?= $review_row['review_rating'] ?>
                        </span>
                    </h4>
                </div>
                <div class="review-column">
                    <p class="lead"><?= $review_row['review_content'] ?></p>
                </div>
                <div class="like-column">
                    <?php
                    // Add an if statement to check if the user is logged in
                    if (isset($_SESSION['login'])) {
                        // Inside your while loop where reviews are displayed
                        $review_id = $review_row['review_id'];

                        $user_id = $_SESSION['id']; // Assuming user ID is stored in the session

                        // Query to check if the current review is liked by the user
                        $check_like_query = "SELECT * FROM liked_reviews WHERE like_user_id = $user_id AND like_review_id = $review_id";
                        $check_like_result = $conn->query($check_like_query);

                        // Check if there is a record in the liked_reviews table for this user and review
                        $is_liked = $check_like_result->num_rows > 0;
                    ?>
                        <!-- Inside the while loop where the reviews are displayed -->
                        <button class="btn like-button <?= $is_liked ? 'liked' : 'not-liked' ?>" data-review-id="<?= $review_row['review_id'] ?>" onclick="likeReview(<?= $review_row['review_id'] ?>)">
                            <?= $is_liked ? 'Liked' : 'Like' ?>
                        </button>
                    <?php
                    }
                    ?>
                </div>
            </div><style>
			/* Add this CSS in your stylesheets or within the head of your HTML document */

.review-box {
    display: flex;
    border: 1px solid #ddd;
    margin-bottom: 10px;
    transition: background-color 0.3s ease-in-out;
    padding: 10px;
}

.review-box:hover {
    background-color: #f0f0f0; /* Adjust the color as needed */
    background-image: linear-gradient(to left, #87CEEB, #FF69B4); /* Adjust the colors as needed */
    color: #fff; /* Updated text color on hover */
}

.rating-column {
    flex: 0.5;
    text-align: center;
}




.like-column {
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 10px;
	flex: 1;
}
.like-button {
	color: white;
	border: none;
	padding: 10px 20px; /* Adjust padding for height and width */        text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px; /* Adjust font size */
	cursor: pointer;
	transition: background 0.3s ease-in-out;
}

.like-button.liked {
	background: linear-gradient(to right, #8b0000, #b22222); /* Dark red to light red */
}

.like-button.not-liked {
	background: linear-gradient(to right, #006400, #228b22); /* Dark green to light green */
}

.like-button:hover {
	background: linear-gradient(to right, #006400, #32cd32); /* Dark green to lighter green on hover */
}

.like-button.liked:hover {
	background: linear-gradient(to right, #8b0000, #ff4500); /* Dark red to orange on hover */
}
.like-button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 22px;
        cursor: pointer;
    }
.rating-column h4 {
    margin: 0;
}

.review-column {
    flex: 3;
}

.like-column {
    flex: 1;
    text-align: right;
}

.like-button {
    background-color: transparent;
    border: none;
    color: #c6cd57;
    cursor: pointer;
    outline: none;
    transition: color 0.5s ease-in-out;
}

.like-button:hover {
    color: #fff; /* Darker blue on hover */
}
.btn-info:hover {
        background-color: #d9d6d8;
        border-color: #204d74;
        color: #333;
    }

    .btn-info {
        background-image: linear-gradient(to bottom, #70CCFF, #006EFF);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

    <?php
        endwhile;
    } else {
    ?>
        <p class="lead">Be the first to review this movie!</p>
    <?php
    }
    ?>
</div>

            </div>
        </div><script>
                        function likeReview(reviewId) {
                            // Assuming you have jQuery included, you can use AJAX to send data to addlikes.php
                            $.ajax({
                                type: "GET",
                                url: "addlikes.php",
                                data: { review_id: reviewId },
                                success: function (response) {
                                    // Handle success if needed
                                    console.log(response);
                                },
                                error: function (error) {
                                    // Handle error if needed
                                    console.error(error);
                                }
                            });
                        }
                    </script>
        <?php
        if (empty($login)) {
            ?>
            <p class="lead"><a href="loginform.php">Sign in</a> or <a href="registration.php">register</a> to leave a review or make this a favorite movie!</p>
            <?php
        } else {
            ?>
            <p>
    <a class="btn btn-info" href="addreview.php?id=<?php echo $result_row['movie_id'] ?>" role="button">
        ADD REVIEW <i class="fa fa-plus"></i>
    </a>
</p>

            <p>
                <?php if ($role == 1) : ?>
                    <a class="btn btn-danger" href="deletemovie.php?id=<?php echo $result_row['movie_id']; ?>">DELETE MOVIE <i class="fa fa-close"></i></a>
                <?php
                endif;
            }
            ?>
        </div>
		
    </div>
    <?php
}

// close the connection.
$conn->close();
include_once('includes/footer.php');
?>
