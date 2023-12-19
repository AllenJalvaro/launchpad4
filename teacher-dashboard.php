<?php
    require "config.php";

    if (empty($_SESSION["email"])) {
        header("Location: login.php");
        exit(); 
    }
    $instructorEmail = $_SESSION["email"];
    $query = "SELECT instructor_fname from instructor_registration where instructor_email='$instructorEmail'";
    $result = mysqli_query($conn, $query);
    $fname;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fname = $row['instructor_fname'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Home</title>
		<link rel="icon" href="/launchpad/images/favicon.svg" />
    <style media="screen">
      embed{
        border: 2px solid black;
        margin-top: 30px;
      }
      .div1{
        margin-left: 170px;
      }
    /* Additional styles for the cards */
        .card {
            text-decoration: none;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden; /* Ensures the border-radius works with the image inside */
            transition: transform 0.3s ease-in-out;
            width: 100%; /* Set the desired width for the card */
            max-width: 400px; /* Optional: Set a maximum width if needed */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
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
            <br><br><br><br><p>My companies</p>
            <a href="logout.php">
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
    $sql = "SELECT p.Project_title, i.Project_logo, i.IdeationID
            FROM project p
            JOIN ideation_phase i ON p.Project_ID = i.Project_ID ORDER BY i.ideationid DESC";

    $result = $conn->query($sql);
    ?>

    <div class="content">
        
        <h2>Welcome Mentor <?php echo $fname ?>!</h2>
        <p>This is where you can manage your home content.</p><br><br>

        <div class="row">
            <?php
            // Display the results
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Wrap each project in a clickable Bootstrap card within a grid column
                    echo '<div class="col-md-3 mb-4">';
                    echo '<a href="view_ideation.php?ideation_id=' . $row['IdeationID'] . '" class="card">';
                    echo '<div class="card-body">';
                    echo "<h5 class='card-title'>{$row['Project_title']}</h5>";
                    echo "<p class='card-text'>Logo: {$row['Project_logo']}</p>";
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>No projects found.</p>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Include Bootstrap scripts (jQuery and Popper.js) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>