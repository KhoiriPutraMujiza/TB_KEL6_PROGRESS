<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Buttonscarves Beauty</title>
</head>
<body>

    <header>
        <a href="#" class="logo"><img src="image/logo.png" alt=""></a>

        <ul class="navmenu">
            <li><a href="#">COSMETICS</a><br><br>
                <ul class="submenu">
                    <li><a href="#">Lip</a></li>
                    <li><a href="#">Eye</a></li>
                    <li><a href="#">Face</a></li>
                </ul>
            </li>
            <li><a href="#">BEAUTY TOOLS</a></li>
            <li><a href="#">BODY CARE</a><br><br>
                <ul class="submenu">
                    <li><a href="#">Body Lotion</a></li>
                </ul>
            </li>
            <li><a href="#">PERFUMES</a></li>
            <li><a href="#">SPECIAL SETS</a></li>
        </ul>

        <div class="nav-icon">
            <a href="#"><i class='bx bx-heart' ></i></a>
            <a href="#"><i class='bx bx-search'></i></a>
            <a href="#"><i class='bx bx-shopping-bag' ></i></a>
            <a href="login.php"><i class='bx bx-user' ></i></a>
        </div>
    </header>

    <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<style>
    .slider {
      width: 100%;
      height: 510px;
      position: relative;
      margin: 0 auto;
    }

    .slider img {
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }

    .slider img:first-child {
      z-index: 1;
      opacity: 1;
    }

    .slider img:nth-child(2) {
      z-index: 0;
    }

    .navigation-button {
      text-align: center;
      position: relative;
      margin: 0 auto;
    }

    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
    }

    .active,
    .dot:hover {
      background-color: #717171;
    }
  </style>
</head>
<body>
  <div class="slider">
    <img src="image1.jpg" alt="Slide 1">
    <img src="image2.jpg" alt="Slide 2">
    <img src="image3.jpg" alt="Slide 3">
  </div>

  <div class="navigation-button">
    <span class="dot active" onclick="changeSlide(0)"></span>
    <span class="dot" onclick="changeSlide(1)"></span>
    <span class="dot" onclick="changeSlide(2)"></span>
  </div>

  <script>
    var imgs = document.querySelectorAll('.slider img');
    var dots = document.querySelectorAll('.dot');
    var currentImg = 0; // index of the first image
    const interval = 3000; // duration(speed) of the slide

    function changeSlide(n) {
      for (var i = 0; i < imgs.length; i++) { // reset
        imgs[i].style.opacity = 0;
        dots[i].className = dots[i].className.replace(' active', '');
      }

      currentImg = n;

      imgs[currentImg].style.opacity = 1;
      dots[currentImg].className += ' active';
    }

    function autoSlide() {
      currentImg = (currentImg + 1) % imgs.length; // update the index number
      changeSlide(currentImg);
    }

    var timer = setInterval(autoSlide, interval);

    dots.forEach((dot, i) => {
      dot.onclick = () => {
        changeSlide(i);
      }
    });
  </script>

</body>
</html>