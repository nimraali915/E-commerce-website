<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>bout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>about us</h3>
    <p> <a href="home.php">home</a> / about </p>
</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/7.jpeg" alt="">
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>We are committed to ethical and sustainable practices in everything we do, from sourcing materials to production. Your trust and satisfaction are our top priorities. Discover a world of exceptional products and embark on a journey of self-expression and confidence with LAVISHLAYER</p>
            <a href="shop.php" class="btn">shop now</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>what we provide?</h3>
            <p>Here at LAVISHLAYER we take immense pride in offering you an exquisite collection of winter coats, jewelry, and makeup that redefine style, quality, and elegance. Our winter coats are crafted with precision, using the finest materials to ensure not only warmth but also a touch of fashion-forward flair. Choose from a diverse range of designs, from cozy parkas to classic trench coats, all meticulously designed to elevate your winter wardrobe.</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image">
            <img src="images/download.jpeg" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images/8.jpeg" alt="">
        </div>

        <div class="content">
            <h3>who we are?</h3>
            <p>Welcome to LAVISHLAYER where style and substance converge to redefine elegance. We are more than a retailer; we are your partners in creating unforgettable fashion statements. Our journey began with a passion for fashion, an unwavering commitment to quality, and the belief that true style knows no limits.</p>
            <a href="#reviews" class="btn">clients reviews</a>
        </div>

    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="title">client's reviews</h1>

    <div class="box-container">

        <div class="box">      
            <p>"I couldn't be happier with my purchase from LAVISHLAYER The coat I got is not only 
            incredibly stylish but also keeps me warm during the coldest winter days. The attention to detail and quality of craftsmanship are truly impressive. It's become my go-to winter staple, and I've received countless compliments on it!"</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>nooor</h3>
        </div>

        <div class="box">
       
            <p>The jewelry from Lavishlayer is simply breathtaking. I recently bought a necklace for a special occasion, and it exceeded my expectations. The design is exquisite, and the quality is top-notch. I felt like a million bucks wearing it, and I can't wait to explore more pieces from their collection.".</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>abbas</h3>
        </div>

        <div class="box">
        
            <p>I discovered lavish layer while searching for both a coat and jewelry to complete my winter look. I couldn't believe my luck when I found the perfect coat and a matching necklace. The coat is stylish and keeps me warm, and the necklace adds a touch of sophistication to any outfit. It's a winning combination, and I couldn't be happier with my purchases!"</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>komal</h3>
        </div>

        <div class="box">
                      <p>Not only does offer exceptional products, but their customer service is also outstanding. I had some questions about sizing, and their team was incredibly helpful and responsive. They made sure I got the right fit, and the entire shopping experience was a breeze. I'll definitely be a returning customer."</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>javida fatima</h3>
        </div>

        <div class="box">
            <p>I love unique and one-of-a-kind pieces of jewelry, and delivers just that. The earrings I bought are unlike anything I've seen elsewhere. The craftsmanship is remarkable, and I appreciate the attention to detail. It's refreshing to have jewelry that stands out and sparks conversations."</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>rida</h3>
        </div>

        <div class="box">
            <p>I was searching for a statement coat and a matching statement necklace, and I hit the jackpot with [Your The coat turns heads wherever I go, and the necklace adds the perfect finishing touch to my outfits. I feel like a fashion icon thanks to this dynamic duo!".</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>nayab</h3>
        </div>

    </div>

</section>











<?php @include 'footer.php'; ?>

<script src="script.js"></script>

</body>
</html>