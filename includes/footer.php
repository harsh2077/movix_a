<?php
// Start session
@session_start();
?>

<footer class="bg-dark text-white">
    <div class="container">
        <div class="row">
            <!-- First Row -->
            <div class="col-md-6">
                <h4>Contact Us:</h4>
                <ul>
                    <li>Company Name: Movix</li>
                    <li>Email: <a href="mailto:your-email@gmail.com">your-email@gmail.com</a></li>
                    <li>Twitter: <a href="https://twitter.com/your-twitter-id" target="_blank">@your-twitter-id</a></li>
                    <li>LinkedIn: <a href="https://www.linkedin.com/in/your-linkedin-id" target="_blank">Your Name</a></li>
                    <li>GitHub: <a href="https://github.com/your-github-id" target="_blank">Your GitHub</a></li>
                    <li>Discord: YourDiscordID#1234</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4>Quick Links:</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="https://www.prutor.ai" target="_blank">Movix Company</a></li>
                    <!-- Add more links as needed -->
                </ul>
            </div>
            <!-- End First Row -->

            <!-- Second Row -->
            <!-- Second Row -->
<div class="col-md-6">
    <!-- Feedback Form Box -->
    <div class="feedback-box">
        <form id="feedback-form" action="process_feedback.php" method="post">
            <?php
            // Assuming $_SESSION['login'] contains the username if the user is logged in
            if (isset($_SESSION['login'])) {
                echo '
                    <div class="form-group">
                        <label for="user_name">Your Name:</label>
                        <input type="text" class="form-control" name="user_name" value="' . $_SESSION['login'] . '" required readonly>
                    </div>

                    <div class="form-group">
                        <label for="user_email">Your Email:</label>
                        <input type="email" class="form-control" name="user_email" value="' . $_SESSION['email'] . '" required readonly>
                    </div>
                ';
            }
            ?>
            <div class="form-group">
                <label for="feedback">Your Feedback:</label>
                <textarea class="form-control" name="feedback" rows="2" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </form>
    </div>
    <!-- End Feedback Form Box -->
</div>

<div class="col-md-6">
    <h4>Dark Mode is Available:</h4>
    <!-- Toggle Button -->
    <div class="navbar-brand mr-4">
        <button id="dark-mode-toggle" class="dark-mode-button">Toggle Mode</button>
    </div>
</div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const darkModeToggle = document.getElementById('dark-mode-toggle');
                        const body = document.body;
                        const isDarkMode = localStorage.getItem('dark-mode') === 'enabled';

                        if (isDarkMode) {
                            body.classList.add('dark-mode');
                        }

                        darkModeToggle.addEventListener('click', function () {
                            body.classList.toggle('dark-mode');
                            const isDarkModeEnabled = body.classList.contains('dark-mode');
                            localStorage.setItem('dark-mode', isDarkModeEnabled ? 'enabled' : 'disabled');
                        });
                    });
                </script>

                <style>
                    body.dark-mode {
                        background-color: #1a1a1a;
                        color: #ffffff;
                    }
                    /* Add more styles as needed */
/* Feedback Form Box Styling */
.feedback-box {
        background-image: linear-gradient(to right, #8b0000, #b22222); /* Dark red gradient background color */
        padding: 20px;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }

    .feedback-box:hover {
        transform: scale(1.05); /* Hovering effect: Increase size on hover */
    }

    .feedback-box form {
        margin-bottom: 0; /* Remove default form margin to fit within the box */
    }

    .feedback-box label {
        color: #fff; /* Text color for labels */
    }

    .feedback-box textarea,
    .feedback-box input {
        background-color: rgba(255, 255, 255, 0.5); /* Semi-transparent white background for input fields */
        border: none;
        color: #000; /* Text color for input fields */
    }

    /* Add more styles as needed */
    /* Feedback Form Submit Button Styling */

    /* Feedback Form Submit Button Styling */
    .feedback-box button.btn-primary {
        background-image: linear-gradient(to bottom, #FF6961, #FF4D46); /* Shining red gradient background color */
        border: none;
        color: #fff; /* Text color for the button */
        font-weight: bold;
        padding: 10px 20px;
        cursor: pointer;
        transition: background 0.3s ease-in-out, transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(255, 77, 70, 0.1); /* Subtle box shadow for a shining effect */
    }

    .feedback-box button.btn-primary:hover {
        background-image: linear-gradient(to bottom, #FF4D46, #FF2D27); /* Darker red gradient on hover */
        transform: scale(1.05); /* Hovering effect: Increase size on hover */
        box-shadow: 0 8px 12px rgba(255, 45, 39, 0.2); /* Enhance box shadow on hover for a shining effect */
    }

    /* Add more styles as needed */
    /* Dark Mode Toggle Button Styling */
    .dark-mode-button {
        background-color: transparent;
        border: 2px solid #ffffff; /* Border color */
        color: #006EFF; /* Text color for the button */
        font-weight: bold;
        padding: 10px 20px;
        cursor: pointer;
        transition: background 0.3s ease-in-out, color 0.3s ease-in-out, padding 0.3s ease-in-out;
        border-radius: 5px;
    }

    .dark-mode-button:hover {
        background-color: #ffffff; /* Background color on hover */
        color: #333333; /* Darker text color on hover */
        padding: 12px 22px; /* Increase padding on hover for effect */
    }

    /* Add more styles as needed */


                </style>
                <!-- End Toggle Button -->
            </div>
            <!-- End Second Row -->
        </div>
    </div>

    <p class="text-center mt-3 mb-0">&copy; Movix <?php echo date("Y"); ?></p>
</footer>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
