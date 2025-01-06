<?php
session_start(); // Start the session

include('database.php'); // Include the database connection

$email = $_POST['email'];
$password = $_POST['password'];

// Sanitize input(to avoid invalid character)
 $email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

// Check user credentials
$sql = "SELECT id FROM user WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $userId = $user['id'];

    // Fetch student info based on the user ID
    $studenttSql = "SELECT * FROM studentt WHERE id = '$userId'";
    $studentResult = $conn->query($studenttSql);

    if ($studentResult->num_rows > 0) {
        // Store student info in session
        $_SESSION['student_info'] = $studentResult->fetch_assoc();

        // Redirect to dashboard
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['student_info'] = [];
        echo "<script>alert('No student data found'); window.location.href='login.php';</script>";
    }
} else {
    echo "<script>alert('Invalid username or password'); window.location.href='login.php';</script>";
}

// Close the database connection at the end of this script
$conn->close();
?>
