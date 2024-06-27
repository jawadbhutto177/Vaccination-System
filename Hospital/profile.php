<?php
    include("../Admin/connection.php");
    session_start();
    if(!isset($_SESSION['hospital_session']))
    {
        echo "<script>window.location.href='login.php'</script>";
    }

    $query = "SELECT * FROM tbl_hospital WHERE id=$_SESSION[hospital_session]";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Profile</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<style>
    .mainContent
    {
        padding: 20px;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .mainContent .title
    {
        font-size: 30px;
    }
    .mainContent .leftSide
    {
        width: 45%;
    }
    .mainContent .leftSide input,
    .mainContent .leftSide select
    {
        padding: 15px 10px;
        border: none;
        outline: none;
        background-color: #eee;
        border-radius: 12px;
        margin: 10px 0px;
        width: 100%;
    }
    .mainContent .leftSide input[type="submit"]
    {
        background-color: #178066;
        color: #fff;
        font-size: 16px;
    }
    .mainContent .rightSide
    {
        width: 40%;
    }
    .mainContent .rightSide .image
    {
        margin-top: 50px;
        width: 100%;
        border: 1px solid #999;
    }
    .mainContent .rightSide .image img
    {
        width: 100%;
        height: 300px;
        object-fit: contain;
    }
    .mainContent .rightSide input[type="submit"]
    {
        background-color: #178066;
        padding: 8px 20px;
        color: #fff;
        border-radius: 6px;
        margin-top: 10px;
        border: none;
        outline: none;
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
                    <h2 class="title">My Profile</h2>
                    <form method="post">
                        <input type="text" placeholder="Enter Your Name" name="name" required value="<?php echo $row['name']?>"><br>
                        <input type="email" placeholder="Enter Your Email" required name="email" value="<?php echo $row['email']?>"><br>
                        <input type="text" placeholder="Enter Your Password" required name="password" value="<?php echo $row['password']?>"><br>
                        <input type="text" placeholder="Enter Contact Number" required name="contact" value="<?php echo $row['contact']?>"><br>
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
                        <input type="text" placeholder="Enter Your Address" required name="address" value="<?php echo $row['address']?>"><br>
                        <input type="submit" value="Update Profile" name="btnupdate"><br>
                    </form>
                    <?php
                        if(isset($_POST['btnupdate']))
                        {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $city = $_POST['city'];
                            $contact = $_POST['contact'];
                            $address = $_POST['address'];
                            $query = "UPDATE tbl_hospital SET name='$name',email='$email',password='$password',cid='$city',address='$address',contact='$contact' WHERE id=$_SESSION[hospital_session]";
                            $result = mysqli_query($connection,$query);
                            if($result)
                            {
                                echo 
                                "<script>
                                    alert('Profile Updated Successful');
                                    window.location.href='profile.php';
                                </script>";
                            }
                        }
                    ?>
                </div>
                <div class="rightSide">
                    <div class="image">
                        <img src="<?php echo $row['image']; ?>" alt="">
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="image"><br>
                        <input type="submit" value="Uplaod Image" name="btnupload">
                    </form>
                    <?php
                        if(isset($_POST['btnupload']))
                        {
                            $imageName = $_FILES['image']['name'];
                            $tmpName = $_FILES['image']['tmp_name'];
                            $path = "assets/imgs/$imageName";
                            move_uploaded_file($tmpName,$path);
                            $query = "UPDATE tbl_hospital SET image='$path' WHERE id=$_SESSION[hospital_session]";
                            $result = mysqli_query($connection,$query);
                            if($result)
                            {
                                echo 
                                "<script>
                                    alert('Image Changed');
                                    window.location.href='profile.php';
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