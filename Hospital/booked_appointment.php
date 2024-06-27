<?php
    include("../Admin/connection.php");
    $query = "UPDATE tbl_appointment SET status='Booked' WHERE id=$_GET[id]";
    mysqli_query($connection,$query);
    echo "<script>window.location.href='appointment.php'</script>";
?>