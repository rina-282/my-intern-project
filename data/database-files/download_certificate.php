<?php
session_start();
include('database.php'); // Ensure the database connection is included

// Fetch the student ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to get the file name from the database for the particular student
    $sql = "SELECT file_name FROM pdf_files WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_name = $row['file_name'];

        // Construct the file path
        $file_path = 'C:\\wamp64\\www\\internship\\pdf\\' . $file_name;

        // Check if file exists and force download
        if (file_exists($file_path)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
            header('Content-Length: ' . filesize($file_path));
            readfile($file_path);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "No certificate available for this student.";
    }

    $stmt->close();
}
$conn->close();
?>
