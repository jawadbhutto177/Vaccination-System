<?php
    include("connection.php");
    session_start();
    if(!isset($_SESSION['admin_session']))
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
    <title>View Hospital Detail</title>
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
    .mainContent ul
    {
        padding: 0px 20px;
    }
    .mainContent ul li
    {
        margin: 20px 0px;
        font-size: 22px;
    }
    .mainContent img
    {
        margin: 10px 0px;
        border: 1px solid #000;
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
                <h2 class="title">Hospital Details</h2>
                <?php
                    $query = "SELECT tbl_hospital.*, tbl_city.name as 'cname' FROM tbl_hospital INNER JOIN tbl_city on tbl_hospital.cid=tbl_city.id WHERE tbl_hospital.id=$_GET[id]";
                    $result = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($result);
                ?>
                <img src="<?php echo $row['image'];?>" alt="">
                <ul>
                    <li>Hospital Id : <?php echo $row['id']?></li>
                    <li>Hospital Name : <?php echo $row['name']?></li>
                    <li>Hospital Contact : <?php echo $row['contact']?></li>
                    <li>City : <?php echo $row['cname']?></li>
                    <li>Hospital Email : <?php echo $row['email']?></li>
                    <li>Hospital Password : <?php echo $row['password']?></li>
                    <li>Hospital Address : <?php echo $row['address']?></li>
                    <li>Hospital Status : <?php echo $row['status']?></li>
                </ul>
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