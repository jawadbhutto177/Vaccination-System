<?php
    // Include the connection file to establish a connection to the database
    include("../Admin/connection.php");
?>

<div class="cardBox">
    <a href="appointment.php" style="text-decoration: none">
    <div class="card">
        <div>
            <?php
                // Query to select all appointments for the current hospital
                $query = "SELECT * FROM tbl_appointment WHERE h_id=$_SESSION[hospital_session]";
                // Execute the query
                $result = mysqli_query($connection,$query);
                // Count the number of rows returned
                $appointment_count = mysqli_num_rows($result);
            ?>
            <!-- Display the appointment count -->
            <div class="numbers"><?php echo $appointment_count;?></div>
            <!-- Display the card name -->
            <div class="cardName">Appointments</div>
        </div>
    </div>
    </a>
    <a href="covid-test.php" style="text-decoration: none">
    <div class="card">
        <div>
            <?php
                // Query to select all tests for the current hospital
                $query = "SELECT * FROM tbl_test WHERE h_id=$_SESSION[hospital_session]";
                // Execute the query
                $result = mysqli_query($connection,$query);
                // Count the number of rows returned
                $test_count = mysqli_num_rows($result);
            ?>
            <!-- Display the test count -->
            <div class="numbers"><?php echo $test_count;?></div>
            <!-- Display the card name -->
            <div class="cardName">Covid Test</div>
        </div>
    </div>
    </a>
</div>