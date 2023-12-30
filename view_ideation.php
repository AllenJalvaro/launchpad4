<?php
    require "config.php";

    if (empty($_SESSION["email"])) {
        header("Location: login.php");
        exit(); 
    }
    $instructorEmail = $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Teacher</title>
		<link rel="icon" href="/launchpad/images/favicon.svg" />
    <style media="screen">
        embed {
            border: 2px solid black;
            margin-top: 30px;
        }

        .div1 {
            margin-left: 170px;
        }

        .card {
            margin-top: 30px;
            padding: 15px;
            max-width: 900px; /* Set max-width for the card */
            width: 70%; /* Make the card responsive */
        }

        .card img {
            max-width: 100%; /* Make the image inside the card responsive */
        }

        .card-content {
            margin-top: 15px;
        }

        .btn-evaluate {
            margin-top: 15px;
        }
    </style>
    <style media="screen">
      embed{
        border: 2px solid black;
        margin-top: 30px;
      }
      .div1{
        margin-left: 170px;
      }
    </style>
</head>
<body>
    <aside class="sidebar">
        <header class="sidebar-header">
            <img src="\launchpad\images\logo-text.svg" class="logo-img">
        </header>
        <hr>
        <nav>
            <a href="teacher-dashboard.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'teacher-dashboard.php') ? 'active' : ''; ?>">
                <button>
                    <span>
                        <i><img src="\launchpad\images\home-icon.png" alt="home-logo" class="logo-ic"></i>
                        <span>Home</span>
                    </span>
                </button>
            </a>

            <!-- Link to the Evaluation page -->
            <a href="evaluation.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'evaluation.php') ? 'active' : ''; ?>">
                <button>
                    <span>
                        <i><img src="\launchpad\images\evaluation-img.png" alt="evaluation-logo" class="logo-ic"></i>
                        <span>Evaluation</span>
                    </span>
                </button>
            </a>
            <br><br><br><br>
            <p>My companies</p>
            <a href="">
                <button>
                    <span>
                        <?php
                        echo $instructorEmail;
                        ?>
                    </span>
                </button>
            </a>
        </nav>
    </aside>

    <?php
    // Check if ideation_id is set in the query parameters
    if (isset($_GET['ideation_id'])) {
        // Sanitize the input to prevent SQL injection
        $ideationID = mysqli_real_escape_string($conn, $_GET['ideation_id']);

        // SQL query to retrieve ideation details
        $sql = "SELECT ideation_phase.*, project_title FROM ideation_phase, project WHERE IdeationID = '$ideationID' and ideation_phase.project_id = project.project_id";
        $result = $conn->query($sql);

        // Check if Project_logo is not empty and exists
        // Display ideation details
        if ($result->num_rows > 0) {
            $ideation = $result->fetch_assoc();
            echo '<div class="card container-fluid">';
            echo '<h2 class="mb-4">Ideation Phase Details</h2>';
            echo "<p><strong>Project Title:</strong> " . (isset($ideation['project_title']) ? $ideation['project_title'] : 'N/A') . "</p>";

            // Specify the path to the "images" folder
            $imagePath = '\launchpad\images\\' . (isset($ideation['Project_logo']) ? $ideation['Project_logo'] : '');

            // Check if Project_logo is not empty and exists
            // if (!empty($ideation['Project_logo']) && file_exists($imagePath)) {
                // Display the image using an <img> tag
                echo '<img src="\launchpad\images\657e4a963eb86.jpg" alt="Project Logo" width="100px" height="100px">';
            // } else {
                // echo '<p>Image not found or invalid path.</p>';
            // }

            echo "<div class='card-content'>";
            echo "<p><strong>Project Overview:</strong> " . (isset($ideation['Project_Overview']) ? $ideation['Project_Overview'] : 'N/A') . "</p>";
            echo "<p><strong>Project Modelcanvas:</strong> " . (isset($ideation['Project_Modelcanvas']) ? $ideation['Project_Modelcanvas'] : 'N/A') . "</p>";
            echo "<p><strong>Submission Date:</strong> " . (isset($ideation['Submission_date']) ? $ideation['Submission_date'] : 'N/A') . "</p>";

            // Button for evaluation
            echo '<a class="btn btn-primary btn-evaluate" href="evaluation.php">Evaluate</a>';

            echo '</div>'; // End of card-content
            echo '</div>'; // End of card
            ?>
            <div class="div1">
            <?php

            $sql = "SELECT * FROM ideation_phase";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <embed type="application/pdf" src="<?php echo $row['Project_Modelcanvas']; ?>" width="800" height="500">
            <?php
            }
            mysqli_free_result($query);

            mysqli_close($conn);
            ?>
        </div>
        <?php
        } else {
            echo '<p>Ideation phase not found.</p>';
        }
    } else {
        echo '<p>Invalid request. Ideation ID not provided.</p>';
    }

    // Close the database connection
    $conn->close();
    ?>

    <!-- Include Bootstrap scripts (jQuery and Popper.js) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
