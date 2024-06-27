<?php
    include("connection.php");
    session_start();
    if(!isset($_SESSION['admin_session']))
    {
        echo "<script>window.location.href='login.php'</script>";
    }

    $query = "SELECT * FROM tbl_patient WHERE id=$_GET[id]";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient Details</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<style>
    .mainContent
    {
        padding: 30px;
        display: flex;
        justify-content: space-around;
    }
    .mainContent .leftSide
    {
        width: 45%;
    }
    .mainContent form input,
    .mainContent form select
    {
        width: 100%;
        border: none;
        outline: none;
        padding: 15px 20px;
        border-radius: 6px;
        background-color: #eee;
        margin: 12px 0px;
        font-size: 16px;
    }
    .mainContent form input[type="submit"]
    {
        background-color: #178066;
        color: #fff;
    }
    .mainContent .rightSide
    {
        width: 45%;
    }
    .mainContent .rightSide .image
    {
        width: 100%;
        height: 300px;
        border: 1px solid #178066;
        margin-top: 40px;
    }
    .mainContent .rightSide .image img
    {
        width: 100%;
        height: 100%;
        object-fit: cover;
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
                <div class="leftSide">
                <h2>Edit / Update Patient</h2>
                <form method="post" enctype="multipart/form-data" autocomplete="off">
                    <input type="text" placeholder="Enter Patient Name" name="name" value="<?php echo $row['name'];?>"><br>
                    <input type="number" placeholder="Enter Patient Number" name="phone" value="<?php echo $row['contact'];?>"><br>
                    <select name="city">
                        <option hidden>Select Any City</option>
                        <?php 
                            $query = "SELECT * FROM tbl_city";
                            $result = mysqli_query($connection,$query);
                            foreach ($result as $row1) {
                                echo "<option value='".$row1['id']."'";
                                if ($row['cid'] == $row1['id']) {
                                    echo " selected";
                                }
                                echo ">".$row1['name']."</option>";
                            }
                        ?>
                    </select><br>
                    <input type="email" placeholder="Enter Patient Email" name="email" value="<?php echo $row['email'];?>"><br>
                    <input type="text" placeholder="Enter Patient Password" name="password" value="<?php echo $row['password'];?>"><br>
                    <input type="text" placeholder="Enter Patient Address" name="address" value="<?php echo $row['address'];?>"><br>
                    <select name="gender">
                        <option hidden>Select Any Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <input type="submit" value="Update Patient" name="btnadd">
                </form>
                <?php
                    if(isset($_POST['btnadd']))
                    {
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $city = $_POST['city'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $address = $_POST['address'];
                        $gender = $_POST['gender'];
                        $query = "UPDATE tbl_patient SET name='$name',contact='$phone',cid='$city',email='$email',password='$password',address='$address',gender='$gender' WHERE id=$_GET[id]";
                        $result = mysqli_query($connection,$query);
                        if($result)
                        {
                            echo 
                            "<script>
                                alert('Patient Updated Successfully');
                                window.location.href='patient.php'
                            </script>";
                        }
                    }
                ?>
                </div>
                <div class="rightSide">
                    <div class="image">
                        <img src="<?php echo $row['image'];?>">
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="image">
                        <input type="submit" value="Uplaod Image" name="btnupload">
                    </form>
                    <?php
                        if(isset($_POST['btnupload']))
                        {
                            $imageName = $_FILES['image']['name'];
                            $tmpName = $_FILES['image']['tmp_name'];
                            $path = "assets/imgs/patient-images/$imageName";
                            move_uploaded_file($tmpName,$path);
                            $query = "UPDATE tbl_patient SET image='$path' WHERE id=$_GET[id]";
                            $result = mysqli_query($connection,$query);
                            if($result)
                            {
                                echo 
                                "<script>
                                    alert('Image Updated Successfully');
                                    window.location.href='patient.php'
                                </script>";
                            }
                        }
                    ?>
                </div>
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