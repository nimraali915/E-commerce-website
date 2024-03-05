<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['admin_id'])) {
   header('location:login.php');
   exit; // Always exit after a header redirect
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_query = "DELETE FROM `user` WHERE id = '$delete_id'";
   
   if (mysqli_query($conn, $delete_query)) {
      header('location: admin_users.php');
      exit; // Exit after the header redirect
   } else {
      $error_message = 'Error deleting user: ' . mysqli_error($conn);
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Your head content here -->
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="admin_style.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="users">
   <h1 class="title">User Accounts</h1>
   <?php
   if (isset($error_message)) {
      echo '<p class="error-message">' . $error_message . '</p>';
   }
   ?>
   <div class="box-container">
      <?php
      $select_users = mysqli_query($conn, "SELECT * FROM `user`") or die('Query failed: ' . mysqli_error($conn));
      if (mysqli_num_rows($select_users) > 0) {
         while ($fetch_users = mysqli_fetch_assoc($select_users)) {
            ?>
            <div class="box">
               <p>User ID: <span><?php echo $fetch_users['id']; ?></span></p>
               <p>Username: <span><?php echo $fetch_users['name']; ?></span></p>
               <p>Email: <span><?php echo $fetch_users['email']; ?></span></p>
               <p>User Type: <span style="color:<?php if ($fetch_users['user_type'] == 'admin') {
                        echo 'var(--orange)';
                     } ?>"><?php echo $fetch_users['user_type']; ?></span></p>
               <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('Delete this user?');" class="delete-btn">Delete</a>
            </div>
      <?php
         }
      }
      ?>
   </div>
</section>

<script src="admin_script.js"></script>
</body>
</html>
