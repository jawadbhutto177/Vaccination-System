<?php
    include("../Admin/connection.php");
    $patient_name = $_GET['pname'];
    $test_id = $_GET['id'];
    session_start();
    if(!isset($_SESSION['hospital_session']))
    {
        echo "<script>window.location.href='login.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Test Report</title>
</head>
<style>
    .mainContent
    {
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .mainContent .title
    {
        font-size: 30px;
    }
    .mainContent form input,
    .mainContent form select
    {
        padding: 15px 10px;
        border: 1px solid lightgray;
        outline: none;
        background-color: #eee;
        border-radius: 12px;
        margin: 10px 0px;
        width: 400px;
    }
    .mainContent input[type="submit"]
    {
        background-color: #178066;
        color: #fff;
        font-size: 16px;
    }
</style>
<body>
    <div class="mainContent">
    <h2 class="title">Create COVID Test Report</h2>
    <form method="post">
        <input type="text" placeholder="Enter Patient Name" required name="pname" value="<?php echo $patient_name;?>"><br>
        <input type="date" placeholder="Enter Any Date" required name="date"><br>
        <select name="status">
        <option hidden>Select Status</option>
        <option>Negative</option>
        <option>Positive</option>
        </select><br>
        <input type="submit" value="Create Report" name="btncreate"><br>
    </form>
    <?php
        if(isset($_POST['btncreate']))
        {
            $date = $_POST['date'];
            $status = $_POST['status'];
            $query = "UPDATE tbl_test SET date='$date',result='$status' WHERE id=$test_id";
            $result = mysqli_query($connection,$query);
            if($result)
            {
                echo 
                "<script>
                    alert('Status Updated');
                    window.location.href='covid-test.php'
                </script>";
            }
        }
        
    ?>
    </div>
</body>
</html>