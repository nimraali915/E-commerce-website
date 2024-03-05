<?php
@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_POST['update_product'])) {

    $update_p_id = $_POST['update_p_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    mysqli_query($conn, "UPDATE `products` SET name = '$name', details = '$details', price = '$price' WHERE id = '$update_p_id'") or die('Query failed');

    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'images/' . $image; // Change $image_folter to $image_folder
    $old_image = $_POST['update_p_image'];

    if (!empty($image)) {
        if ($image_size > 2000000) {
            $message[] = 'Image file size is too large!';
        } else {
            mysqli_query($conn, "UPDATE `products` SET image = '$image' WHERE id = '$update_p_id'") or die('Query failed');
            move_uploaded_file($image_tmp_name, $image_folder);
            sleep(1); // Wait for 1 second
            unlink('images/' . $old_image);
            
            $message[] = 'Image updated successfully!';
        }
    }

    $message[] = 'Product updated successfully!';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom admin CSS file link -->
    <link rel="stylesheet" href="admin_style.css">

</head>
<body>

<?php @include 'admin_header.php'; ?>

<section class="update-product">

    <?php

    $update_id = $_GET['update'];
    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('Query failed');
    if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <img src="images/<?php echo $fetch_products['image']; ?>" class="image" alt="">
                <input type="hidden" value="<?php echo $fetch_products['id']; ?>" name="update_p_id">
                <input type="hidden" value="<?php echo $fetch_products['image']; ?>" name="update_p_image">
                <input type="text" class="box" value="<?php echo $fetch_products['name']; ?>" required
                       placeholder="Update product name" name="name">
                <input type="number" min="0" class="box" value="<?php echo $fetch_products['price']; ?>" required
                       placeholder="Update product price" name="price">
                <textarea name="details" class="box" required placeholder="Update product details" cols="30"
                          rows="10"><?php echo $fetch_products['details']; ?></textarea>
                <input type="file" accept="image/jpg, image/jpeg, image/png" class="box" name="image">
                <input type="submit" value="Update Product" name="update_product" class="btn">
                <a href="admin_product.php" class="option-btn">Go Back</a>
            </form>

            <?php
        }
    } else {
        echo '<p class="empty">No product selected for update.</p>';
    }
    ?>

</section>

<script src="admin_script.js"></script>

</body>
</html>
