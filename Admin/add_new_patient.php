<?php
    // Include the connection.php file
    include("connection.php");
    
    // Start the session
    session_start();
    
    // Check if the admin session is not set
    if(!isset($_SESSION['admin_session']))
    {
        // Redirect to the login page
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
    <title>Add New Patient</title>
    <!-- Link to the index.css file -->
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<!-- Custom styles for the main content -->
<style>
   .mainContent
    {
        padding: 30px 80px;
    }
   .mainContent form input,
   .mainContent form select
    {
        width: 100%;
        border: none;
        outline: none;
        padding: 15px 20px;
        border-radius: 6px;
        background-color: #eee;
        margin: 12px 0px;
        font-size: 16px;
    }
   .mainContent form input[type="submit"]
    {
        background-color: #178066;
        color: #fff;
    }
    
</style>

<body>
    <!-- Navigation container -->
    <div class="container">
        <?php
            // Include the navigation.php file
            include("navigation.php");
       ?>
        
        <!-- Main content container -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <!-- Ion icon for the menu -->
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="user">
                    <!-- Profile image link -->
                    <a href='profile.php'><img src="assets/imgs/customer01.jpg" alt=""></a>
                </div>
            </div>
            
            <!-- Main content -->
            <div class="mainContent">
                <h2>Register a New Patient</h2>
                <!-- Form to add a new patient -->
                <form method="post" enctype="multipart/form-data" autocomplete="off">
                    <!-- Input field for patient name -->
                    <input type="text" placeholder="Enter Patient Name" name="name"><br>
                    <!-- Input field for patient phone number -->
                    <input type="number" placeholder="Enter Patient Number" name="phone"><br>
                    <!-- Select field for patient city -->
                    <select name="city">
                        <!-- Option to select a city -->
                        <option hidden>Select Any City</option>
                        <?php 
                            // Query to fetch cities from the database
                            $query = "SELECT * FROM tbl_city";
                            $result = mysqli_query($connection,$query);
                            foreach($result as $row)
                            {
                                // Display city options
                                echo "<option value='$row[id]'>$row[name]</option>";
                            }
                       ?>
                    </select><br>
                    <!-- Input field for patient email -->
                    <input type="email" placeholder="Enter Patient Email" name="email"><br>
                    <!-- Input field for patient password -->
                    <input type="password" placeholder="Enter Patient Password" name="password"><br>
                    <!-- Input field for patient address -->
                    <input type="text" placeholder="Enter Patient Address" name="address"><br>
                    <!-- Select field for patient gender -->
                    <select name="gender">
                        <!-- Option to select a gender -->
                        <option hidden>Select Any Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <!-- Select field for patient status -->
                    <select name="status">
                        <!-- Option to select a status -->
                        <option>Select Any Status</option>
                        <option value="activate">Activate</option>
                        <option value="deactivate">Deactive</option>
                    </select><br>
                    <!-- Input field for patient image -->
                    <input type="file" name="image"><br>
                    <!-- Submit button to add a new patient -->
                    <input type="submit" value="Add New Patient" name="btnadd">
                </form>
                
                <?php
                    // Check if the submit button is clicked
                    if(isset($_POST['btnadd']))
                    {
                        // Get the posted values
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $city = $_POST['city'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $address = $_POST['address'];
                        $gender = $_POST['gender'];
                        $status =$_POST['status'];
                        $imageName = $_FILES['image']['name'];
                        $tmpName = $_FILES['image']['tmp_name'];
                        $imageType = $_FILES['image']['type'];
                        $path = "assets/imgs/patient-images/$imageName";
                        // Move the uploaded image to the specified path
                        move_uploaded_file($tmpName,$path);
                        // Query to insert the patient data into the database
                        $query = "INSERT INTO tbl_patient(name,contact,cid,email,password,address,gender,status,image) VALUES('$name','$phone','$city','$email','$password','$address','$gender','$status','$path')";
                        $result = mysqli_query($connection,$query);
                        if($result)
                        {
                            // Alert and redirect to the patient page
                            echo 
                            "<script>
                                alert('New Patient Added');
                                window.location.href='patient.php'
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