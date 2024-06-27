<?php
    // Include the connection.php file which contains the database connection settings
    include("connection.php");
    
    // Start the session
    session_start();
    
    // Check if the admin session is not set, redirect to the login page
    if(!isset($_SESSION['admin_session']))
    {
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
    <title>Appointments list</title>
    
    <!-- Link to the external stylesheet -->
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<!-- Inline styles for the main content -->
<style>
   .mainContent
    {
        padding: 30px;
    }
   .mainContent.title
    {
        font-size: 35px;
    }
   .mainContent table
    {
        width: 100%;
    }
   .mainContent table,td,th 
    {
        margin-top: 20px;
        border: 1px solid #999;
        text-align: center;
        border-collapse: collapse;
        padding: 10px;
    }
   .mainContent table a
    {
        padding: 7px 10px;
        background-color: #178066;
        text-decoration: none;
        border-radius: 8px;
        color: #fff;
    }
   .mainContent.btndeactivate
    {
        background-color: red;
    }
   .mainContent.btnactivate
    {
        background-color: yellowgreen;
        color: #000;
    }
   .mainContent.btn
    {
        display: inline-block;
        margin-top: 15px;
        padding: 7px 10px;
        background-color: #178066;
        text-decoration: none;
        border-radius: 8px;
        color: #fff;
    }
</style>

<body>
    <!-- Navigation section -->
    <div class="container">
        <?php
            // Include the navigation.php file which contains the navigation menu
            include("navigation.php");
       ?>
        
        <!-- Main content section -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <!-- Icon for the menu toggle -->
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="user">
                    <!-- Profile picture and link to the profile page -->
                    <a href='profile.php'><img src="assets/imgs/customer01.jpg" alt=""></a>
                </div>
            </div>
            
            <!-- Main content section -->
            <div class="mainContent">
                <h2 class="title">List of Appointments</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Patient Name</th>
                            <th>Hospital Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Vaccine</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // SQL query to retrieve the appointment data
                            $query = "SELECT tbl_patient.name as 'pname', tbl_hospital.name as 'hname', tbl_vaccine.name as 'vname', tbl_appointment.* FROM tbl_appointment INNER JOIN tbl_patient ON tbl_appointment.p_id = tbl_patient.id INNER JOIN tbl_hospital ON tbl_appointment.h_id=tbl_hospital.id INNER JOIN tbl_vaccine ON tbl_appointment.v_id=tbl_vaccine.id";
                            
                            // Execute the query and store the result
                            $result = mysqli_query($connection,$query);
                            
                            // Loop through the result and display the appointment data
                            foreach($result as $row)
                            {
                                echo 
                                "<tr>
                                    <td>$row[id]</td>
                                    <td>$row[pname]</td>
                                    <td>$row[hname]</td>
                                    <td>$row[date]</td>
                                    <td>$row[time]</td>
                                    <td>$row[vname]</td>
                                    <td>$row[status]</td>
                                </tr>";
                            }
                       ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts section -->
    <script src="assets/js/main.js"></script>

    <!-- Ionicons scripts -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>