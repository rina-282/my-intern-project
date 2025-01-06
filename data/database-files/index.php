 <?php
session_start(); // Start the session

include('database.php'); // Include the database connection

// Ensure the user is logged in and student info is available
if (!isset($_SESSION['student_info']) || empty($_SESSION['student_info'])) {
    header("Location: login.php");
    exit();
}

// Get student ID from session data
$s_id = $_SESSION['student_info']['id'];

// Use the student ID to get student info
include('fetch.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
       body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar h3 a {
            color: white;
            text-decoration: none;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        .tab-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }
        .tab-content p {
            margin: 0;
            display: flex;
            align-items: center;
            
        }
        .tab-content strong {
            width: 150px;
            flex-shrink: 0;
        }
        .tab-content input {
    border: 1px solid #ddd;
    padding: 5px;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
    background-color: #e0e0e0; /* Set the background color to grey */
}
.sidebar .logo-container {
    text-align: left; /* Align content to the left */
    margin-bottom: 20px; /* Space below the logo */
    overflow: hidden; /* Prevent overflow if the image is larger than its container */
 
}

.sidebar .logo-container img {
    width: 200%; /* Ensure the image fits within the container */
    height: auto; /* Maintain the aspect ratio */
    display: block; /* Ensure the image is a block element */
    max-width: 150%; /* Allow the logo to scale up */
    position: relative; 
    right: 65px; /* Keep the image aligned to the left */

}
.profile-photo {
    text-align: center;
    margin-bottom: 20px;
}

.profile-photo img {
    width: 150px;
    height: 150px; /* Corrected typo */
    border-radius: 50%; /* Keeps the image round */
    object-fit: cover; /* Ensures the image covers the circle shape */
    border: 2px solid #ddd; /* Optional: Add a border around the photo */
}




        .download-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: black;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .download-button:hover {
    background-color: #e0e0e0; 
    color:black;
    
        }
        /* Responsive styles */
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                box-shadow: none;
            }
            .main-content {
                padding: 10px;
            }
            .tab-content {
                padding: 10px;
            }
        }
        @media (max-width: 480px) {
            .sidebar {
                padding: 10px;
            }
            .download-button {
                padding: 8px 16px;
                font-size: 14px;
            }
            .tab-content {
                padding: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
        <div class="logo-container">
        <img src="assets/img/logo.png" alt="College Logo">
        </div>
                <h3><a href="#">Leaving Certificate</a></h3>
                <!-- Add more links here -->
        </aside>
        <main class="main-content">
            <section id="student-info">
            <div class="profile-photo">
         <img src="images/profile1.jpg" alt="Student Profile Photo"> 
        
    </div>
                <h2>Student Information</h2>
                <div class="tab-content">
                <?php
                $student_info = $_SESSION['student_info'];

                //echo '<p><strong>Student ID:</strong> <input type="text" value="' . (isset($student_info['id']) ? htmlspecialchars($student_info['id']) : 'N/A') . '" readonly></p>';
                echo '<p><strong>First Name:</strong> <input type="text" value="' . (isset($student_info['fname']) ? htmlspecialchars($student_info['fname']) : 'N/A') . '" readonly></p>';
                echo '<p><strong>Last Name:</strong> <input type="text" value="' . (isset($student_info['lname']) ? htmlspecialchars($student_info['lname']) : 'N/A') . '" readonly></p>';
                echo '<p><strong>Contact:</strong> <input type="text" value="' . (isset($student_info['contact']) ? htmlspecialchars($student_info['contact']) : 'N/A') . '" readonly></p>';
                echo '<p><strong>Age:</strong> <input type="text" value="' . (isset($student_info['age']) ? htmlspecialchars($student_info['age']) : 'N/A') . '" readonly></p>';
                echo '<p><strong>Address:</strong> <input type="text" value="' . (isset($student_info['address']) ? htmlspecialchars($student_info['address']) : 'N/A') . '" readonly></p>';
                echo '<p><strong>City:</strong> <input type="text" value="' . (isset($student_info['city']) ? htmlspecialchars($student_info['city']) : 'N/A') . '" readonly></p>';
                echo '<p><strong>Country:</strong> <input type="text" value="' . (isset($student_info['country']) ? htmlspecialchars($student_info['country']) : 'N/A') . '" readonly></p>';
                echo '<p><strong>Date of Birth:</strong> <input type="text" value="' . (isset($student_info['dob']) ? htmlspecialchars($student_info['dob']) : 'N/A') . '" readonly></p>';
                
                ?>
                </div>
            </section>
    
          <!-- Leaving Certificate Section -->
<section id="leaving-certificate">
    <h2>Leaving Certificate</h2>
    <p>Click the button below to download the Leaving Certificate:</p>
    <a href="download_certificate.php?id=<?php echo htmlspecialchars($student_info['id']); ?>" class="download-button">Download Certificate</a>

</section>
 



        </main>
    </div>
    <script src="script.js"></script>
</body>
</html>