<?php
// Include the connection.php file which contains the database connection details
include("connection.php");

// Start the session
session_start();

// Check if the admin session is not set
if (!isset($_SESSION['admin_session'])) {
    // If not set, redirect to the login page
    echo "<script>window.location.href='login.php'</script>";
}

?>

<!-- HTML starts here -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Hospital</title>
    <!-- Link to the stylesheet -->
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<!-- Add custom styles -->
<style>
    .mainContent {
        padding: 30px 80px;
    }

    .mainContent form input,
    .mainContent form select {
        width: 100%;
        border: none;
        outline: none;
        padding: 15px 20px;
        border-radius: 6px;
        background-color: #eee;
        margin: 12px 0px;
        font-size: 16px;
    }

    .mainContent form input[type="submit"] {
        background-color: #178066;
        color: #fff;
    }
</style>

<body>
    <!-- Navigation container -->
    <div class="container">
        <?php
        // Include the navigation.php file which contains the navigation menu
        include("navigation.php");
        ?>

        <!-- Main content container -->
        <div class="main">
            <div class="topbar">
                <!-- Toggle button for the navigation menu -->
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- User profile picture -->
                <div class="user">
                    <a href='profile.php'><img src="assets/imgs/customer01.jpg" alt=""></a>
                </div>
            </div>

            <!-- Main content area -->
            <div class="mainContent">
                <h2>Register a New Hospital</h2>
                <!-- Form to add a new hospital -->
                <form method="post" enctype="multipart/form-data" autocomplete="off">
                    <!-- Input field for hospital name -->
                    <input type="text" placeholder="Enter Hospital Name" name="name"><br>
                    <!-- Input field for hospital phone number -->
                    <input type="number" placeholder="Enter Hospital Number" name="phone"><br>
                    <!-- Select field for city -->
                    <select name="city">
                        <!-- Option to select a city -->
                        <option hidden>Select Any City</option>
                        <?php
                        // Query to fetch all cities from the database
                        $query = "SELECT * FROM tbl_city";
                        $result = mysqli_query($connection, $query);
                        foreach ($result as $row) {
                            // Display each city as an option
                            echo "<option value='$row[id]'>$row[name]</option>";
                        }
                        ?>
                    </select><br>
                    <!-- Input field for hospital email -->
                    <input type="email" placeholder="Enter Hospital Email" name="email"><br>
                    <!-- Input field for hospital password -->
                    <input type="password" placeholder="Enter Hospital Password" name="password"><br>
                    <!-- Input field for hospital address -->
                    <input type="text" placeholder="Enter Hospital Address" name="address"><br>
                    <!-- Select field for hospital status -->
                    <select name="status">
                        <!-- Options for hospital status -->
                        <option>Select Any Status</option>
                        <option value="activate">Activate</option>
                        <option value="deactivate">Deactive</option>
                    </select><br>
                    <!-- Input field for hospital image -->
                    <input type="file" name="image"><br>
                    <!-- Submit button to add the new hospital -->
                    <input type="submit" value="Add New Hospital" name="btnadd">
                </form>

                <?php
                // Check if the submit button is clicked
                if (isset($_POST['btnadd'])) {
                    // Get the posted values
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $city = $_POST['city'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $address = $_POST['address'];
                    $status = $_POST['status'];
                    $imageName = $_FILES['image']['name'];
                    $tmpName = $_FILES['image']['tmp_name'];
                    $imageType = $_FILES['image']['type'];
                    $path = "assets/imgs/hospital-images/$imageName";
                    // Move the uploaded image to the specified path
                    move_uploaded_file($tmpName, $path);
                    // Query to insert the new hospital into the database
                    $query = "INSERT INTO tbl_hospital(name,contact,cid,email,password,address,status,image) VALUES('$name','$phone','$city','$email','$password','$address','$status','$path')";
                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        // If the query is successful, display a success message and redirect to the hospital page
                        echo
                        "<script>
                                alert('New Hospital Added');
                                window.location.href='hospital.php'
                            </script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>