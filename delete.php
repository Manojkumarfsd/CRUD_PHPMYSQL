<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "employeedb");

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if an ID is passed in the URL
if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Convert the ID to an integer for security

    // Delete query
    $query = "DELETE FROM employees WHERE id = $id";

    // Execute the query
    mysqli_query($conn, $query);
}

// Redirect to the index page
header("Location: indexemp.php");
exit;

// Close the connection
mysqli_close($conn);
?>
