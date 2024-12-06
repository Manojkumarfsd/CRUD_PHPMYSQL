<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "employeedb");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Employee Application</h1>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success">
                            <a href="add.php" class="text-light" style="text-decoration: none;">Add New</a>
                        </button>
                        <br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">BU</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Query to fetch data from the employees table
                                $sql = "SELECT * FROM employees";
                                $result = mysqli_query($connection, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['BU']; ?></td>
                                            <td>
                                            <td>
                                                <button class="btn btn-success">
                                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-light" style="text-decoration: none;">Edit</a>
                                                </button>
                                                <button class="btn btn-danger">  
                                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="text-light" style="color: red;">Delete</a>
                                                </button>
                                                
                                            </td>
                                            

                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                ?>
                                    <tr>
                                        <td colspan="6">No records found</td>
                                    </tr>
                                <?php
                                }
                                // Close the database connection
                                mysqli_close($connection);
                                ?>
                            </tbody>
                        </table>
                        <div class="card-header">
                            <button class="btn btn-primary">
                                <a href="download.php" class="text-light" style="text-decoration: none;">Download CSV</a>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
