<?php
    // Include the connection.php file which contains the database connection settings
    include("connection.php");
?>

<!-- A container div with class "cardBox" -->
<div class="cardBox">
    
    <!-- A link to patient.php with a card inside -->
    <a href="patient.php" style="text-decoration: none">
        <div class="card">
            <div>
                <?php
                    // SQL query to select all records from the tbl_patient table
                    $query = "SELECT * FROM tbl_patient";
                    // Execute the query and store the result
                    $result = mysqli_query($connection,$query);
                    // Get the number of rows in the result
                    $patient_count = mysqli_num_rows($result);
                ?>
                <!-- Display the patient count -->
                <div class="numbers"><?php echo $patient_count;?></div>
                <!-- Display the card name -->
                <div class="cardName">Patient</div>
            </div>
        </div>
    </a>
    
    <!-- A link to hospital.php with a card inside -->
    <a href="hospital.php" style="text-decoration: none">
        <div class="card">
            <div>
                <?php
                    // SQL query to select all records from the tbl_hospital table
                    $query = "SELECT * FROM tbl_hospital";
                    // Execute the query and store the result
                    $result = mysqli_query($connection,$query);
                    // Get the number of rows in the result
                    $hospital_count = mysqli_num_rows($result);
                ?>
                <!-- Display the hospital count -->
                <div class="numbers"><?php echo $hospital_count;?></div>
                <!-- Display the card name -->
                <div class="cardName">Hospital</div>
            </div>
        </div>
    </a>
    
    <!-- A link to appointment.php with a card inside -->
    <a href="appointment.php" style="text-decoration: none">
        <div class="card">
            <div>
                <?php
                    // SQL query to select all records from the tbl_appointment table
                    $query = "SELECT * FROM tbl_appointment";
                    // Execute the query and store the result
                    $result = mysqli_query($connection,$query);
                    // Get the number of rows in the result
                    $appointment_count = mysqli_num_rows($result);
                ?>
                <!-- Display the appointment count -->
                <div class="numbers"><?php echo $appointment_count;?></div>
                <!-- Display the card name -->
                <div class="cardName">Appointments</div>
            </div>
        </div>
    </a>
    
    <!-- A link to covid-test.php with a card inside -->
    <a href="covid-test.php" style="text-decoration: none">
        <div class="card">
            <div>
                <?php
                    // SQL query to select all records from the tbl_test table
                    $query = "SELECT * FROM tbl_test";
                    // Execute the query and store the result
                    $result = mysqli_query($connection,$query);
                    // Get the number of rows in the result
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