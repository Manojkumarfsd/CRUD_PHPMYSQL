<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "employeedb");

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Set headers for the CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="employee_data.csv"');

// Open the output stream
$output = fopen("php://output", "w");

// Write column headers to the CSV
fputcsv($output, ['ID', 'Name', 'Phone', 'Address', 'BU']);

// Fetch employee data from the database
$query = "SELECT id, name, phone, address, BU FROM employees";
$result = mysqli_query($conn, $query);

// Loop through the rows and write them to the CSV
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }
}

// Close the database connection and output stream
mysqli_close($conn);
fclose($output);
exit;
?>
