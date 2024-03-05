<?php
session_start();

if (isset($_POST['submit'])) {
    // Include the database configuration file
    include 'config.php';

    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $password = $filter_pass; // No need to hash it here, we'll hash it when storing

    $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'");

    if ($select_users) {
        if (mysqli_num_rows($select_users) > 0) {
            $row = mysqli_fetch_assoc($select_users);

            if (password_verify($password, $row['password'])) {
                if ($row['user_type'] == 'admin') {
                    $_SESSION['admin_name'] = $row['name'];
                    $_SESSION['admin_email'] = $row['email'];
                    $_SESSION['admin_id'] = $row['id'];
                    header('location: admin_page.php');
                    exit; // Exit after the header redirect
                } elseif ($row['user_type'] == 'user') {
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['user_id'] = $row['id'];
                    header('location: home.php');
                    exit; // Exit after the header redirect
                } else {
                    $message = 'Invalid user type!';
                }
            } else {
                $message = 'Incorrect password!';
            }
        } else {
            $message = 'No user found with that email!';
        }
    } else {
        $message = 'Query failed!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if (isset($message)) {
        echo '
        <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
    ?>
    <section class="form-container">
        <form action="" method="post">
            <h3>Login now</h3>
            <input type="email" name="email" class="box" placeholder="Enter your email" required>
            <input type="password" name="pass" class="box" placeholder="Enter your password" required>
            <input type="submit" class="btn" name="submit" value="Login now">
            <p>Don't have an account? <a href="register.php">Register now</a></p>
        </form>
    </section>
</body>
</html>
