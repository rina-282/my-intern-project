<?php
// Include the database connection
include('database.php');

// Ensure the connection is established
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get the ID from the query string
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Check if the ID is valid
if ($id > 0) {
    // Prepare the SQL statement to prevent SQL injection
    if ($stmt = $conn->prepare("SELECT * FROM studentt WHERE id = ?")) {
        $stmt->bind_param("i", $id); // Bind the integer parameter
        $stmt->execute(); // Execute the prepared statement
        $result = $stmt->get_result(); // Get the result

        if ($result->num_rows > 0) {
            // Fetch and output data of the fetched row
            $row = $result->fetch_assoc();
            $student_info = array(
                'id' => $row['id'],
                'fname' => $row['fname'],
                'lname' => $row['lname'],
                'contact' => $row['contact'],
                'age' => $row['age'],
                'address' => $row['address'],
                'city' => $row['city'],
                'country' => $row['country'],
                'dob' => $row['dob'],
                'file_name' => $row['file_name'],
                'file_data' => $row['file_data'],
                'upload_date' => $row['upload_date'],
            );
            // Debugging output
            echo '<pre>';
            print_r($student_info);
            echo '</pre>';

            // Check if there's a PDF file to download
            if (isset($student_info['file_name']) && isset($student_info['file_data'])) {
                // PDF Download Section
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . htmlspecialchars($student_info['file_name']) . '"');
                echo $student_info['file_data']; // Send the PDF binary data to the browser for download
                exit(); // Stop further execution after sending the PDF
            }
        } else {
            echo "No results found";
        }

        $stmt->close(); // Close the prepared statement
    } else {
        echo "Error preparing the SQL statement: " . $conn->error;
    }

} 

$conn->close(); // Close the database connection
?>
