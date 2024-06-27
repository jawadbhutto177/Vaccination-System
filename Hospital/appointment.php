<?php
    include("../Admin/connection.php");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments List</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<style>
    .mainContent
    {
        padding: 30px;
    }
    .mainContent .title
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
    .mainContent .btndeactivate
    {
        background-color: red;
    }
    .mainContent .btnactivate
    {
        background-color: yellowgreen;
        color: #000;
    }
    .mainContent .btn
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
    <!-- =============== Navigation ================ -->
    <div class="container">
        <?php
            include("navigation.php");
        ?>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="user">
                    <a href='profile.php'><img src="assets/imgs/customer01.jpg" alt=""></a>
                </div>
            </div>
            <!-- ======================= Cards ================== -->
            <div class="mainContent">
                <h2 class="title">List of Appointments</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Vaccine</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT tbl_patient.name as 'pname', tbl_hospital.name as 'hname', tbl_vaccine.name as 'vname', tbl_appointment.* FROM tbl_appointment INNER JOIN tbl_patient ON tbl_appointment.p_id = tbl_patient.id INNER JOIN tbl_hospital ON tbl_appointment.h_id=tbl_hospital.id INNER JOIN tbl_vaccine ON tbl_appointment.v_id=tbl_vaccine.id WHERE tbl_appointment.h_id=$_SESSION[hospital_session]";
                            $result = mysqli_query($connection,$query);
                            if (!$result) {
                                echo "Error: " . mysqli_error($connection);
                                exit;
                            }
                            foreach($result as $row)
                            {
                                echo 
                                "<tr>
                                    <td>$row[pname]</td>
                                    <td>$row[date]</td>
                                    <td>$row[time]</td>
                                    <td>$row[vname]</td>
                                    <td>$row[status]</td>
                                    <td>
                                        <a href='booked_appointment.php?id=$row[id]' class='btnactivate'>Book</a>
                                        <a href='cancel_appointment.php?id=$row[id]' class='btndeactivate'>Cancel</a>
                                    </td>
                                    </td>
                                </tr>";
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>