<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "employeedb");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'id' is passed in the URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    
    // Fetch the record to edit
    $sql = "SELECT * FROM employees WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $phone = $row['phone'];
        $address = $row['address'];
        $BU = $row['BU'];
    } else {
        echo '<script>alert("Record not found!"); location.replace("indexemp.php");</script>';
        exit;
    }
}

// Handle form submission for update
if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $address = mysqli_real_escape_string($connection, $_POST["address"]);
    $BU = mysqli_real_escape_string($connection, $_POST["bu"]);

    // Update query
    $update_sql = "UPDATE employees SET name='$name', phone='$phone', address='$address', BU='$BU' WHERE id='$id'";
    
    if (mysqli_query($connection, $update_sql)) {
        echo '<script>alert("Record updated successfully!"); location.replace("indexemp.php");</script>';
    } else {
        echo "Error: " . $update_sql . "<br>" . mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Employee</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" required value="<?php echo $name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required value="<?php echo $phone; ?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address" required value="<?php echo $address; ?>">
                            </div>
                            <div class="form-group">
                                <label for="bu">BU</label>
                                <input type="text" class="form-control" name="bu" placeholder="Enter BU" required value="<?php echo $BU; ?>">
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary" name="update" value="Update">
                            <a href="indexemp.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
