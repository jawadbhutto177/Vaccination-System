<?php
    include("connection.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
     <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
     <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     <link href="assets/css/style.css" rel="stylesheet" />
     <link href="assets/css/responsive.css" rel="stylesheet" />
     <link rel="stylesheet" href="assets/css/formstyling.css">
</head>
<style>
    body
    {
        width: 100%;
        height: 100vh;
        background: url("assets/imgs/hero-bg.png");
        background-size: 100% 90%;
        background-position: 0% 0% 150%;
        background-repeat: no-repeat;
    }
</style>
<body>
    <section class="main">
        <div class="form">
            <h2>Admin Login</h2>
            <form method="post" autocomplete="off">
                <input type="email" placeholder="Enter Email Address" name="email" required><br><br>
                <input type="password" placeholder="Enter Password" name="password" required><br><br>
                <input type="submit" value="Login" name="btnlogin">
            </form>
            <?php
                if(isset($_POST['btnlogin']))
                {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $query = "SELECT * FROM tbl_admin WHERE email='$email' and password='$password'";
                    $result = mysqli_query($connection,$query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['admin_session'] = $row['id'];
                        echo 
                        "<script>
                            window.location.href='index.php';
                        </script>";
                    }
                    else
                    {
                        echo 
                        "<script>
                            alert('Incorrect Email or Password');
                        </script>";
                    }
                }
            ?>
        </div>
    </section>
</body>
</html>