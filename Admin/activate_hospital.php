<?php
    // Include the connection.php file to establish a connection to the database
    include("connection.php");
    
    // Create an UPDATE query to set the status to 'activate' in the tbl_hospital table
    // where the id matches the value passed in the URL parameter 'id'
    $query = "UPDATE tbl_hospital SET status='activate' WHERE id=$_GET[id]";
    
    // Execute the query using the established connection
    mysqli_query($connection,$query);
    
    // Redirect the user to the hospital.php page using JavaScript
    echo "<script>window.location.href='hospital.php'</script>";
?>