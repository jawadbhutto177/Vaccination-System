<?php
    // Include the connection.php file which contains the database connection settings
    include("connection.php");
    
    // Create an UPDATE query to set the status of a hospital to 'deactivate' in the tbl_hospital table
    // The hospital to be updated is identified by the id passed in the URL parameter
    $query = "UPDATE tbl_hospital SET status='deactivate' WHERE id=$_GET[id]";
    
    // Execute the query using the mysqli_query function
    mysqli_query($connection,$query);
    
    // Redirect the user back to the hospital.php page after updating the hospital status
    echo "<script>window.location.href='hospital.php'</script>";
?>