<?php
require "config.php";

if (empty($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION["email"];
$selectedCompanyID = isset($_GET['Company_id']) ? $_GET['Company_id'] : null;

if (isset($userEmail)) {
    $checkCompanyQuery = "SELECT c.*, s.Student_ID 
                        FROM company_registration c
                        INNER JOIN student_registration s ON c.Student_ID = s.Student_ID
                        WHERE s.Student_email = '$userEmail'";
} else {
    $checkCompanyQuery = "SELECT * FROM company_registration WHERE Company_ID = '$selectedCompanyID'";
}


$resultCompany = mysqli_query($conn, $checkCompanyQuery);

$hasCompany = mysqli_num_rows($resultCompany) > 0;
$companyID = "";
$companyName = "";
$companyLogo = "";

if ($hasCompany) {
    $row = mysqli_fetch_assoc($resultCompany);
    $companyID = $row["Company_ID"];
    $companyName = $row["Company_name"];
    $companyLogo = $row["Company_logo"];
}
// else{
//     header("Location: index.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/navbar.css">
    <title>Home - Launchpad</title>
    <link rel="icon" href="/launchpad/images/favicon.svg" />
    <style>
        .logo {
            width: 200px;
            height: auto;
            display: block;
            margin: 20px auto;
        }

        .project-card:hover {
            box-shadow: 0 0 15px rgba(3, 33, 81, 0.402);
        }

        .content2 {
            margin-top: 30px;
            margin-left: 300px;
        }

        .content {
            margin-top: 20px;
            margin-left: 270px;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .project-card:active {
            transform: scale(0.98);
            box-shadow: none;
        }

        .project-card {
            position: relative;
            margin: 0;
            flex: 0 0 calc(33.33% - 20px);
            max-width: calc(33.33% - 20px);
            box-sizing: border-box;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            text-decoration: none;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 5px;
        }

        .logo {
            width: 200px;
            height: auto;
            display: block;
            margin: 20px auto;
        }

        .profile-info {
            display: flex;
            align-items: center;
            margin-top: 10px;

        }
        

        .profile-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
            box-shadow: 0 0 15px rgba(3, 33, 81, 0.202);
        }

        .profile {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .project-card:hover {
            box-shadow: 0 0 15px rgba(3, 33, 81, 0.402);
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <header class="sidebar-header">
            <img src="\launchpad\images\logo-text.svg" class="logo-img">
        </header>

        <nav>
            <a href="#" class="active">
                <button>
                    <span>
                        <i><img src="\launchpad\images\home-icon.png" alt="home-logo" class="logo-ic"></i>
                        <span>Home</span>
                    </span>
                </button>
            </a>
            <a href="project-idea-checker.php">
                <button>
                    <span>
                        <i><img src="\launchpad\images\project-checker-icon.png" alt="home-logo" class="logo-ic"></i>
                        <span>Project Idea Checker</span>
                    </span>
                </button>
            </a>
            <a href="invitations.php">
                <button>
                    <span>
                        <i><img src="\launchpad\images\invitation-icon.png" alt="home-logo" class="logo-ic"></i>
                        <span>Invitations</span>
                    </span>
                </button>
            </a>
            <p class="divider-company">YOUR COMPANY<a href="create-company.php" style="text-decoration: none;">

                    <img src="\launchpad\images\join-company-icon.png" alt="Join Company Icon" width="15px"
                        height="15px" style="margin-left: 70px;">

                </a></p>
            <?php if ($hasCompany): ?>
                <?php foreach ($resultCompany as $row): ?>
                    <a href="company_view.php?Company_id=<?php echo $row['Company_ID']; ?>">
                        <button>
                            <span class="<?php echo 'btn-company-created'; ?>">
                                <div class="circle-avatar">
                                    <?php if (!empty($row['Company_logo'])): ?>
                                        <img src="\launchpad\<?php echo $row['Company_logo']; ?>" alt="Company Logo"
                                            class="img-company">
                                    <?php endif; ?>
                                </div>
                                <span class="create-company-text">
                                    <?php echo $row['Company_name']; ?>
                                </span>
                            </span>
                        </button>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>


            <p class="divider-company">COMPANIES YOU'VE JOINED</p>
            <a href="#">
                <button>
                    <span class="btn-join-company">
                        <i>
                            <div class="circle-avatar">
                                <img src="\launchpad\images\join-company-icon.png" alt="">
                            </div>
                        </i>
                        <span class="join-company-text">Join companies</span>
                    </span>
                </button>
            </a>
            <a href="profile.php">
                <button>
                    <span>
                        <div class="avatar2" id="initialsAvatar4"></div>
                        <span>Profile</span>
                    </span>
                </button>
            </a>

        </nav>


    </aside>

    <?php
    $email = $_SESSION['email'];

    $select_user_info = "SELECT * FROM student_registration WHERE Student_email='$email'";
    $result_user_info = mysqli_query($conn, $select_user_info);
    if ($result_user_info) {
        if (mysqli_num_rows($result_user_info) > 0) {
            $row = mysqli_fetch_assoc($result_user_info);
            $stud_id = $row['Student_ID'];
            $fname = $row['Student_fname'];
            $lname = $row['Student_lname'];
            $course = $row['Course'];
            $year = $row['Year'];
            $block = $row['Block'];
            $contactNo = $row['Student_contactno'];
        }
    }
    ?>
    <div class="content2">
        <br>
        <h1>
            Latest Projects
        </h1>
    </div>

    <div class="content">


        <div class="project-card">
            <div class="container">
                <img src="/launchpad/images/m1.jpg" alt="MindfulMood Logo" class="logo">
                <h1>AdventureTracker</h1>
                <p>Mar 15, 2023</p>
                <p>AdventureTracker is a mobile app designed for outdoor enthusiasts, providing real-time tracking,
                    route planning, and personalized adventure statistics.</p>
                <div class="profile-info">
                    <div class="profile-circle">
                        <img src="/launchpad/images/l1.jpg" class="profile" alt="Developer Profile">
                    </div>
                    <p>TrailBlaze Tech</p>
                </div>
            </div>
        </div>
        <div class="project-card">
            <div class="container">
                <img src="/launchpad/images/m2.jpg" alt="MindfulMood Logo" class="logo">
                <h1>NutriPal</h1>
                <p>Aug 10, 2023</p>
                <p>NutriPal is your personal nutrition assistant, offering meal planning, calorie tracking, and
                    customized health insights to help you achieve your wellness goals.</p>
                    <div class="profile-info">
                    <div class="profile-circle">
                        <img src="/launchpad/images/l2.jpg" class="profile" alt="Developer Profile">
                    </div>
                    <p>NutriTech Solutions</p>
                </div>
                

            </div>
        </div>
        <div class="project-card">
            <div class="container">
                <img src="/launchpad/images/m3.png" alt="MindfulMood Logo" class="logo">
                <h1>FitFusion</h1>
                <p>Jan 5, 2023</p>
                <p>FitFusion is a holistic fitness platform integrating various workout styles, personalized routines,
                    and progress tracking to keep you motivated on your fitness journey.</p>
                    <div class="profile-info">
                    <div class="profile-circle">
                        <img src="/launchpad/images/l3.jpg" class="profile" alt="Developer Profile">
                    </div>
                <p>Fitness Innovate</p>
                </div>

            </div>
        </div>
        <div class="project-card">
            <div class="container">
                <img src="/launchpad/images/m4.jpg" alt="MindfulMood Logo" class="logo">
                <h1>EcoHarvest</h1>
                <p>May 20, 2023</p>
                <p>EcoHarvest is an eco-conscious marketplace connecting consumers with sustainable products, from
                    organic foods to eco-friendly fashion, fostering a greener lifestyle.</p>
                    <div class="profile-info">
                    <div class="profile-circle">
                        <img src="/launchpad/images/l4.jpg" class="profile" alt="Developer Profile">
                    </div>
                <p>GreenTech Solutions</p>
                </div>

            </div>
        </div>
        <div class="project-card">
            <div class="container">
                <img src="/launchpad/images/m5.png" alt="MindfulMood Logo" class="logo">
                <h1>TravelSync</h1>
                <p>Apr 12, 2023</p>
                <p>TravelSync is your ultimate travel companion, providing seamless itinerary management, travel expense
                    tracking, and sharing features for an enhanced travel experience.</p>
                    <div class="profile-info">
                    <div class="profile-circle">
                        <img src="/launchpad/images/l5.jpg" class="profile" alt="Developer Profile">
                    </div>
                <p>Wanderlust Technologies</p>
                </div>

            </div>
        </div>
        <div class="project-card">
            <div class="container">
                <img src="/launchpad/images/m6.jpg" alt="MindfulMood Logo" class="logo">
                <h1>LearnSpan</h1>
                <p>Jul 3, 2023</p>
                <p>LearnSpan is an innovative language learning app utilizing immersive techniques, cultural insights,
                    and personalized lessons to make language acquisition engaging and effective.</p>
                    <div class="profile-info">
                    <div class="profile-circle">
                        <img src="/launchpad/images/l6.jpg" class="profile" alt="Developer Profile">
                    </div>
                <p>LinguaSphere Learning</p>
                </div>

            </div>
        </div>
        <div class="project-card">
            <div class="container">
                <img src="/launchpad/images/m7.jpg" alt="MindfulMood Logo" class="logo">
                <h1>HealthHub</h1>
                <p>Oct 17, 2023</p>
                <p>HealthHub is a comprehensive health and wellness app offering fitness tracking, nutrition planning,
                    and mental health support, empowering users to achieve their holistic well-being goals.</p>
                    <div class="profile-info">
                    <div class="profile-circle">
                        <img src="/launchpad/images/l7.jpg" class="profile" alt="Developer Profile">
                    </div>
                <p>WellNest Labs</p>
                </div>
            </div>
        </div>

    </div>
    <script>
        // JavaScript to set the initials
        document.addEventListener("DOMContentLoaded", function () {
            const firstName = "<?php echo $fname ?>"; // Replace with actual first name
            const lastName = "<?php echo $lname ?>"; // Replace with actual last name

            const initials = getInitials(firstName, lastName);
            document.getElementById("initialsAvatar4").innerText = initials;
        });

        // Function to get initials from first and last names
        function getInitials(firstName, lastName) {
            return (
                (firstName ? firstName[0].toUpperCase() : "") +
                (lastName ? lastName[0].toUpperCase() : "")
            );
        }
    </script>
</body>

</html>