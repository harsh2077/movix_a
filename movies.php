<?php
$page_title = "Movix: Movies";

require_once('includes/header.php');
require_once('includes/database.php');

// Select statement
$query_str = "SELECT * FROM movies";

// Execute the query
$result = $conn->query($query_str);

// Handle selection errors
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else {
    ?>
    <div class="container wrapper">
	<ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Movies</li>
    </ul>
        <h1 class="text-center">Movies</h1>

        <div class="row">
            <div class="col-md-6">
                <form action="searchmovies.php" method="get" class="form-inline search-form" role="form">
                    <div class="input-group">
                        <label class="sr-only" for="nameSearch">Search by Name</label>
                        <div class="input-group-addon"><i class="fa fa-search fa-lg"></i></div>
                        <input type="text" name="movie" placeholder="Search by Name" id="nameSearch" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Go!</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="searchmovies.php" method="get" class="form-inline search-form" role="form">
                    <div class="input-group">
                        <label class="sr-only" for="yearSearch">Search by Year</label>
                        <div class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></div>
                        <input type="text" name="year" placeholder="Search by Year" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Go</button>
                </form>
            </div>
        </div>

        <div class="row movie-list">
            <?php
            while ($result_row = $result->fetch_assoc()):
            ?>
                <div class="col-md-4">
                    <a href="moviedetails.php?id=<?php echo $result_row['movie_id']?>" class="card-link">
                        <div class="card mb-4 shadow">
                            <img class="card-img-top" src="<?php echo $result_row['movie_img'] ?>" alt="<?php echo $result_row['movie_name'] ?>"/>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $result_row['movie_name'] ?></h5>
                                <p class="card-text"><?php echo 'Year: ', $result_row['movie_year'] ?></p>
                                <p class="card-text"><?php echo 'Bio: ', $result_row['movie_bio'] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
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
	.card {
        border: 1px solid #ddd;
        transition: all 0.3s ease;
        padding: 15px; /* Added padding */
		border-radius: 15px; /* Added border-radius for curved corners */
        overflow: hidden; /* Ensures the border-radius is applied to the image */
        transform: scale(1); /* Initial scale */
        margin-bottom: 15px; /* Added margin to create a gap between cards */
    }

    .card:hover {
        background-color: #3d1b5f;
        color: white;
        transform: scale(1.05); /* Scale on hover */
    }

    .card:not(:hover) {
        background-color: #eee;
        color: black;
    }

    .card-title {
        font-size: 1.5em; /* Increased text size */
    }
	.card-img-top {
        border-radius: 10px; /* Added border-radius for curved corners */
        width: 100%; /* Ensures the image takes the full width of the container */
        height: auto; /* Allows the image to maintain its aspect ratio */
        display: block; /* Removes any default styling that might interfere */
        margin: 0 auto; /* Centers the image horizontally */
    }
</style>
    <?php
    // Clean up result sets when we're done with them
    $result->close();
}

// Close the connection
$conn->close();

include('includes/footer.php');
?>
