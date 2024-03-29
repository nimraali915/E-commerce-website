<?php
@include 'config.php';

if(isset($_POST['submit'])){
   $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $name = mysqli_real_escape_string($conn, $filter_name);

   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($conn, $filter_email);

   $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
   $password = mysqli_real_escape_string($conn, $filter_pass);

   $filter_cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
   $cpass = mysqli_real_escape_string($conn, $filter_cpass);

   $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'User already exists!';
   } else {
      if($password != $cpass){
         $message[] = 'Confirm password not matched!';
      } else {
         // Hash the password using password_hash() before storing it
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);

         $insert_query = "INSERT INTO `user` (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
         if (mysqli_query($conn, $insert_query)) {
            $message[] = 'Registered successfully!';
            header('location: login.php');
            exit;
         } else {
            $message[] = 'Registration failed!';
         }
      }
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
   if(isset($message)){
      foreach($message as $msg){
         echo '
         <div class="message">
            <span>'.$msg.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
   ?>

   <section class="form-container">
      <form action="" method="post">
         <h3>Register now</h3>
         <input type="text" name="name" class="box" placeholder="Enter your username" required>
         <input type="email" name="email" class="box" placeholder="Enter your email" required>
         <input type="password" name="pass" class="box" placeholder="Enter your password" required>
         <input type="password" name="cpass" class="box" placeholder="Confirm your password" required>
         <input type="submit" class="btn" name="submit" value="Register now">
         <p>Already have an account? <a href="login.php">Login now</a></p>
      </form>
   </section>
</body>
</html>
