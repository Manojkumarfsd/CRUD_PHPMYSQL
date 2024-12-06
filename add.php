<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "employeedb");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Get form inputs
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $address = mysqli_real_escape_string($connection, $_POST["address"]);
    $BU = mysqli_real_escape_string($connection, $_POST["bu"]);

    // Insert query
    $sql = "INSERT INTO employees (name, phone, address, BU) VALUES ('$name', '$phone', '$address', '$BU')";

    if (mysqli_query($connection, $sql)) {
        echo '<script>alert("Data saved successfully!"); location.replace("indexemp.php");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
              <div class ="card">
                <div class="card-header">
                    <h1>Employee Application</h1>
                  </div>
                        <div class="card-body">
                        <form action="add.php" method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
                            </div>
                            <div class="form-group">
                                <label for="bu">BU</label>
                                <input type="text" class="form-control" name="bu" placeholder="Enter BU" required>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary" name="submit" value="Register">
                        </form>

                        </div>
                </div>
            </div>

        </div>

    </div>
</body>
</html>