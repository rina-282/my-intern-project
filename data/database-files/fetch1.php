<?php
// Assuming database connection is already established
// No need to reconnect to the database here
// Include the database connection
include('database.php');

// Ensure the connection is established
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get the ID from the query string
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// SQL query to fetch data
$sql = "SELECT id, fname, lname, file_name, file_data, upload_date FROM pdf_files"; // replace 'your_table_name' with the actual table name
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch and display data
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. " - File Name: " . $row["file_name"]. " - File Data: " . $row["file_data"]. " - Upload Date: " . $row["upload_date"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close(); // Close the database connection
?>
