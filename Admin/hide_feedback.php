<?php
    include("connection.php");
    $query = "UPDATE tbl_feedback SET status='hide' WHERE id=$_GET[id]";
    mysqli_query($connection,$query);
    echo "<script>window.location.href='feedback.php'</script>";
?>