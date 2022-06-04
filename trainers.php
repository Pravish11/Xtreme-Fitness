<?php
session_start();
$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xtreme Fitness</title>
  <link rel="stylesheet" href="css/mystyle1.css?v=<?php echo time(); ?>">
  <style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    }

    .trainers {
      min-height: 100vh;
      text-align: center;
      padding: 0% 6%;
    }

    .trainers .items {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .trainers .items .item {
      height: 40rem;
      width: 20rem;
    }

    .trainers .item img {
      width: 70%;
      height: 70%;
      border-radius: .6rem;
      object-fit: cover;
    }

    .trainers .item .inner {
      position: relative;
      z-index: 9999;
      padding: 0 1rem;
    }

    .trainers .item:hover {
      transform: translateY(-20px);
      cursor: pointer;
    }

    .trainers .item .inner .info {
      background-color: #272727;
      padding: 1.2rem 1 rem;
      border-radius: 0.6rem;
      margin-top: -3.5rem;
    }

    .trainers .item:hover .info {
      transform: translateY(-30px);
    }

    .trainers .item .inner .info h4 {
      font-size: 1.2rem;
      font-weight: 600;
      margin: 0;
      color: white;
      font-family: sans-serif;
    }

    .trainers .item .inner .info p {
      font-size: 0.9rem;
      font-weight: 400;
      margin-top: .2rem;
      color: white;
      font-family: Helvetica;
    }

    .trainers .item .inner .info .links a {
      display: inline-block;
      height: 2rem;
      width: 2rem;
      background-color: #fff;
      border-radius: 50%;
      text-align: center;
      line-height: 2rem;
      margin-left: 0.3rem;
      font-size: 1.1rem;
      margin-bottom: 8px;
    }

    .trainers .item .inner .info .links a:hover {
      box-shadow: 0 0 .6rem #fff;
    }

    .footer {
      background-color: #000;
    }

    h2 {
      font-family: sans-serif;
      text-align: center;
      letter-spacing: .2em;
      font-weight: 700;
      color: #2d2d2d;
    }

    .trainer-name h3 {
      font-family: sans-serif;
      text-align: center;
      letter-spacing: .2em;
      font-weight: 700;
      color: #2d2d2d;
      text-decoration: underline;
    }

    .subtitle {
      font-size: 19px;
      font-family: sans-serif;
      margin: 0 0 12px;
      font-weight: 700;
      line-height: 1.8333em;
      letter-spacing: .25em;
      text-align: center;
      display: block;
      overflow-wrap: break-word;
      color: #2d2d2d;
      margin-bottom: 80px;
    }

    .introduction-align {
      width: 100%;
      display: table;
      table-layout: fixed;
      overflow: hidden;
      margin-top: -30px;
      padding-top: 30px;
      vertical-align: baseline;
      margin-bottom: 10%;
    }

    .introduction {
      display: table-cell;
      width: 50%;
      vertical-align: middle;
      height: 100%;
      background-size: cover;
      padding: 0 5% 0 0;

    }

    .introduction p {
      font-size: 20px;
      font-family: sans-serif;
      line-height: 26px;
      margin-left: 15%;
    }

    .testimonial {
      width: 50%;
      display: table-cell;
      vertical-align: middle;
      height: 100%;
      background-size: cover;
      font-size: 18px;
      line-height: 26px;
      font-family: sans-serif;
      font-weight: bolder;
      color: #2d2d2d;

    }

    .testimonial .p1 {
      border-left: 6px solid blue;
    }

    .testimonial .p1 p {
      margin-left: 2%;
    }

    .trainerbkgd {
      background-color: #000;
    }

    .trainerabout {
      width: 90%;
      display: table;
      table-layout: fixed;
      overflow: hidden;
      margin-top: -30px;
      padding-top: 50px;
      margin-bottom: 10%;
      padding-bottom: 50px;
      margin-left: -115px;
    }

    .trainerpic {
      width: 50%;
      display: table-cell;
      vertical-align: middle;
      height: 100%;
      background-size: cover;
      position: relative;
    }

    .trainerpic img {
      margin-left: 45%;
      width: 50%;
      border-radius: 25px;
      opacity: 100%;
      transition: .5s ease;
    }

    .trainerpic:hover img {
      opacity: 50%;
    }

    .trainerpic:hover .overlay {
      opacity: 100%;
    }

    .content {
      position: absolute;
      top: 50%;
      left: 70%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
    }

    .overlay {
      opacity: 0%;
    }

    .btn {
      background-color: #0736a6;
      border: none;
      color: white;
      cursor: pointer;
      border-radius: 25px;
      font-family: sans-serif;
      width: 130px;
      height: 50px;
    }

    .btn:hover {
      background-color: #000033;
    }

    .trainerabt {
      background-color: #272727;
      width: 40%;
      display: table-cell;
      vertical-align: middle;
      height: 100%;
      background-size: cover;
      color: white;
      font-family: sans-serif;
      border-radius: 25px;

    }

    .trainerabt h3 {
      font-family: sans-serif;
      text-align: center;
    }

    .trainerabt p {
      margin-left: 5%;
      margin-right: 5%;
    }

    .wrap {
      position: relative;
      margin-top: 5%;
      margin-bottom: 10%;
    }

    .slide {
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;

    }

    .slide1 {
      background-image: url(https://topfit.qodeinteractive.com/wp-content/uploads/2017/02/about-testimonials-bckr.jpg?id=12780);
    }

    .slide2 {
      background-image: url(https://topfit.qodeinteractive.com/wp-content/uploads/2017/02/about-testimonials-bckr.jpg?id=12780);
    }

    .slide3 {
      background-image: url(https://topfit.qodeinteractive.com/wp-content/uploads/2017/02/about-testimonials-bckr.jpg?id=12780);
    }

    .slide-content {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .slide-content span {
      font-family: sans-serif;
      margin-left: 30%;
      margin-right: 30%;
      font-weight: bold;
      font-size: 25px;
    }

    .arrow {
      cursor: pointer;
      /*position: absolute;
			top: 50%;
			margin-top: -30px;
			border-style: solid black;*/
      border: solid black;
      border-width: 0 3px 3px 0;
      display: inline-block;
      padding: 3px;
      position: absolute;
      top: 50%;
      margin-top: -30px;
      width: 30px;
      height: 30px;

    }

    #arrow-left {
      /*border-width: 30px 40px 30px 0;
			border-color: transparent #000 transparent transparent;
			left:0;
			margin-left: 430px;*/
      transform: rotate(135deg);
      -webkit-transform: rotate(135deg);
      left: 0;
      margin-left: 430px;
    }

    #arrow-right {
      /*border-width: 30px 0px 30px 40px;
			border-color: transparent transparent transparent #000;
			right:0;
			margin-right: 430px;*/
      transform: rotate(-45deg);
      -webkit-transform: rotate(-45deg);
      right: 0;
      margin-right: 430px;
    }

    html {
      scroll-behavior: smooth;
    }

    .step {
      width: 80%;
      display: table;
      table-layout: fixed;
      overflow: hidden;
      margin-left: 10%;
      margin-bottom: 2%;
    }

    .step1 {
      width: 33.333333%;
      display: table-cell;
    }

    .step1 h4 {
      text-align: center;
      font-family: sans-serif;
    }

    .step1 p {
      margin-left: 20%;
      margin-right: 20%;
      text-align: center;
      font-family: sans-serif;
    }

    .separator {
      position: relative;
      height: auto;
      font-size: 0;
      border-bottom: 6px solid blue;
      width: 10%;
      margin-left: 45%;
    }

    .step2 {
      width: 33.333333%;
      display: table-cell;
    }

    .step2 h4 {
      text-align: center;
      font-family: sans-serif;
    }

    .step2 p {
      margin-left: 20%;
      margin-right: 20%;
      text-align: center;
      font-family: sans-serif;
    }

    .step3 h4 {
      text-align: center;
      font-family: sans-serif;
    }

    .step3 p {
      margin-left: 20%;
      margin-right: 20%;
      text-align: center;
      font-family: sans-serif;
    }

    .start-button {
      width: 250px;
      height: 40px;
      font-size: 20px;
      background-color: #0736a6;
      border: none;
      color: white;
      cursor: pointer;
      margin-left: 43%;
      border-radius: 25px;
      font-family: sans-serif;
      font-weight: bold;
      margin-bottom: 5%;
    }

    .start-button:hover {
      background-color: #000033;
    }

    .gbody {
      height: 50vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: url(https://topfit.qodeinteractive.com/wp-content/uploads/2017/02/about-testimonials-bckr.jpg?id=12780);
    }

    .gslider {
      width: 800px;
      height: 500px;
      border-radius: 10px;
      overflow: hidden;
    }

    .gslides {
      width: 500%;
      height: 500px;
      display: flex;
    }

    .gslides input {
      display: none;
    }

    .gslide {
      width: 20%;
      transition: 2s;
    }

    .gslide img {
      width: 800px;
      height: 500px;
    }

    /*css for manual navigation slide*/
    .navigation-manual {
      position: absolute;
      width: 800px;
      margin-top: -40px;
      display: flex;
      justify-content: center;
    }

    .manual-btn {
      border: 2px solid white;
      padding: 5px;
      border-radius: 10px;
      cursor: pointer;
      transition: 1s;
    }

    .manual-btn:not(:last-child) {
      margin-right: 40px;
    }

    .manual-btn:hover {
      background: white;
    }

    #radio1:checked~.first {
      margin-left: 0;
    }

    #radio2:checked~.first {
      margin-left: -20%;
    }

    #radio3:checked~.first {
      margin-left: -40%;
    }

    #radio4:checked~.first {
      margin-left: -60%;
    }

    #radio5:checked~.first {
      margin-left: -80%;
    }

    #radio6:checked~.first {
      margin-left: -100%;
    }

    #radio7:checked~.first {
      margin-left: -120%;
    }

    /*css for automatic navigation*/
    .navigation-auto {
      position: absolute;
      display: flex;
      width: 800px;
      justify-content: center;
      margin-top: 460px;
    }

    .navigation-auto div {
      border: 2px solid white;
      padding: 5px;
      border-radius: 10px;
      transition: 1s;
    }

    .navigation-auto div:not(:last-child) {
      margin-right: 40px;
    }

    #radio1:checked~.navigation-auto .auto-btn1 {
      background: white;
    }

    #radio2:checked~.navigation-auto .auto-btn2 {
      background: white;
    }

    #radio3:checked~.navigation-auto .auto-btn3 {
      background: white;
    }

    #radio4:checked~.navigation-auto .auto-btn4 {
      background: white;
    }

    #radio5:checked~.navigation-auto .auto-btn5 {
      background: white;
    }

    #radio6:checked~.navigation-auto .auto-btn6 {
      background: white;
    }

    #radio7:checked~.navigation-auto .auto-btn7 {
      background: white;
    }
  </style>

</head>

<body>
  <div class="trainer-image">
    <?php
    $activemenu = "trainers";
    include('includes/menu.php');
    ?>
    <div class="trainer-text">
      <h1 style="font-size:50px;font-family:sans-serif;">TRAINERS</h1>
    </div>
  </div>
  <br />

  <div class="trainers">
    <h2 style="text-align: center; font-size:200%; font-family:sans-serif;">MEET OUR TEAM</h2>
    <p style="color: #545454;text-align: center;font-family:Helvetica;">
      We are a team of experienced people, nutrition, sports and fitness passionate<br />
      experts with talent and knowledge unsurpassed in the industry.<br />
      Get to know us.
    </p>
    <br><br>
    <div class="items">
      <div class="item">
        <a href="#trainer1"><img src="images/trainers/train1.jpg"></a>
        <div class="inner">
          <div class="info">
            <h4>John Wick</h4>
            <p>Health trainer</p>
            <div class="links">
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="lightskyblue" class="bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-youtube" viewBox="0 0 16 16">
                  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="brown" class="bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg></a>
            </div>
          </div>
        </div>
      </div>

      <div class="item">
        <a href="#trainer2"><img src="images/trainers/train2.jpg"></a>
        <div class="inner">
          <div class="info">
            <h4>Martin Bugaj</h4>
            <p>Body training</p>
            <div class="links">
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="lightskyblue" class="bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-youtube" viewBox="0 0 16 16">
                  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="brown" class="bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg></a>
            </div>
          </div>
        </div>
      </div>


      <div class="item">
        <a href="#trainer3"><img src="images/trainers/trainer-4.jpg"></a>
        <div class="inner">
          <div class="info">
            <h4>Sarah Logan</h4>
            <p>All rounder</p>
            <div class="links">
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="lightskyblue" class="bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-youtube" viewBox="0 0 16 16">
                  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="brown" class="bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg></a>
            </div>
          </div>
        </div>
      </div>


      <div class="item">
        <a href="#trainer4"><img src="images/trainers/train4.jpg"></a>
        <div class="inner">
          <div class="info">
            <h4>Christian Grey</h4>
            <p>Cross Fit</p>
            <div class="links">
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="lightskyblue" class="bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-youtube" viewBox="0 0 16 16">
                  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                </svg></a>
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="brown" class="bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg></a>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  <h2>WHY SHOULD YOU INVEST IN A PERSONAL TRAINER?</h2>
  <p class="subtitle">WORKING WITH A PROFESSIONAL WILL FAST-TRACK YOUR PROGRESS &amp; YOU'LL LEARN HOW<br> TO MAINTAIN YOUR RESULTS LONG-TERM</p>
  <!------------------------trainer 1 starts here------------------------------------------->
  <div class="trainer1details" id="trainer1">
    <div class="trainer-name">
      <h3>John Wick</h3>
    </div>
    <div class="introduction-align">
      <div class="introduction">
        <p>John Wick has helped hundreds of people like you achieve their fitness goals.</p>
        <p>From working with professional athletes in world-renowned fitness facilities, traveling the globe to train CEOs of high performing companies, working with everyday men and women who live busy lives and just want to look and feel better.</p>
        <p>People regularly fly from all around the world to undertake his programs at his Xtreme Fitness and you can now get the opportunity to access his coaching from all corners of the globe through his training system.</p>
      </div>
      <div class="testimonial">
        <div class="p1">
          <p>I’m very passionate in helping others feel good and finding happiness. I believe<br> that when you FEEL GOOD, you do better in life.

            A healthy lifestyle to me is more<br> than lifting weights, and I always emphasize that to my clients. It’s about stretching,<br> warming up, eating healthy and making sure your body also gets the rest and sleep<br> it needs.

            I enjoy showing others what their bodies are capable of doing with hard work.<br> It is my ultimate goal to help you reach a happy, well-balanced lifestyle that will<br> help minimize future health related issues.

            “Whatever the mind can conceive and<br> believe, it can achieve.” – Napolean Hill</p>
        </div>
      </div>
    </div>
    <div class="trainerbkgd">
      <div class="trainerabout">
        <div class="trainerpic">
          <img src="images/trainers/train1.jpg">
          <div class="overlay">
            <div class="content">
              <a href="bookings.php"><button class="btn">Book now</button></a>
            </div>
          </div>
        </div>
        <div class="trainerabt">
          <h3>DETAILS:</h3>
          <p>I was a small, skinny teenager from South Wales who joined the British Army at 16.</p>
          <p>From that day on, fitness became a major part of my life and I have exercised in some form for most days ever since.</p>
          <p>I spent over a decade experimenting on myself with different workout programs and nutrition concepts based around what was available to me at the time.</p>
          <p>From training in open spaces or tents in the deserts of Iraq or Afghanistan, to training in fully equipped, world-class gyms, I learned the hard away what really worked.</p>
          <p>I wanted to show people how simple it can be to get leaner, stronger and more athletic bodies they can be proud of.

            There’s nothing more rewarding than seeing so many people achieve such incredible transformations, not only to their bodies but also to all areas of their lives.
            My motto is health is wealth. A body in good health keeps a mind peaceful and happy.</p>
        </div>
      </div>
    </div>
  </div>
  <!------------------------trainer 1 ends here--------------------------------------------->
  <!--------------------trainer 2 starts here----------------------------------------->
  <div class="trainer2details" id="trainer2">
    <div class="trainer-name">
      <h3>Martin Bugaj</h3>
    </div>
    <div class="introduction-align">
      <div class="introduction">
        <p>Martin Bugaj is a personal trainer and a body transformation coach. He has been in the fitness industry since 2007 and has worked with hundreds of clients both in person and online, helping them achieve their health and fitness goals, delivering outstanding results.</p>
        <p>Martin specializes in body transformations and by working with variety of different clients he has developed a proven and tested formula for a successful body transformation.</p>
        <p>He believes, that as a professional who offers such service, one must understand every detail, every emotion and every step of the journey, in order to help, guide and fully support their clients. “Practice what you preach” is his mantra and he always stays active, always looking for new challenges and ways to improve his service and his clients’ results.</p>
      </div>
      <div class="testimonial">
        <div class="p1">
          <p>MY LOVE FOR FITNESS GOES WAY BEYOND JUST TRAINING AND NUTRITION, I<br> AM GENUINELY PASSIONATE ABOUT HELPING OTHERS REACH THEIR FULL<br> POTENTIAL WHEN IT COMES TO THEIR PHYSICAL FITNESS, HEALTH & WELL<br> BEING, AND MINDSET. THERE IS NOTHING MORE REWARDING FOR ME THAN<br> SEEING MY CLIENTS TRANSFORM NOT ONLY THEIR BODIES, BUT BECOME<br> STRONGER AND MORE CONFIDENT VERSIONS OF THEMSELVES. IT IS TRULY<br> AMAZING.</p>
        </div>
      </div>
    </div>
    <div class="trainerbkgd">
      <div class="trainerabout">
        <div class="trainerpic">
          <img src="images/trainers/train2.jpg">
          <div class="overlay">
            <div class="content">
              <a href="bookings.php"><button class="btn">Book now</button></a>
            </div>
          </div>
        </div>
        <div class="trainerabt">
          <h3>DETAILS:</h3>
          <p>Martin is a fully qualified Level 3 Personal Trainer, Postural Assessment & Corrective Exercise Coach and BioSignature Practitioner.
            He continually attends courses and seminars, reads textbooks and pays for mentorship programs with other highly respected coaches in the industry to further his education.</p>

          <p>He has worked with other coaches to gain first-hand experience as a coaching client, when preparing for a number of natural bodybuilding competitions in a Men’s Physique category.</p>

          <p>He knows exactly what it means to push the body to extreme, experience cravings and struggle both physically and mentally when undergoing a body transformation, and this is why he understands his clients and is able to empathize with them when things get tough.</p>
        </div>
      </div>
    </div>
  </div>
  <!----------------------------------trainer 2 ends here---------------------------------->
  <!--------------------------------trainer 3 starts here------------------------------------>
  <div class="trainer3details" id="trainer3">
    <div class="trainer-name">
      <h3>Sarah Logan</h3>
    </div>
    <div class="introduction-align">
      <div class="introduction">
        <p>Sarah is a certified personal trainer with a big passion for helping people become the best version of themselves when it comes to their health and wellness. Her journey in the fitness world started 10 years ago and during that time Sarah has been able to work in different environments and with people from all over the globe. This has given her many tools to work with and to be able to adjust to every client's needs according to their fitness goals.</p>
      </div>
      <div class="testimonial">
        <div class="p1">
          <p>Passion is energy. Feel the power that comes from focusing on what excites you.<br> Exactly this passion brought me to the sport of bodybuilding.I will help you reaching<br> your personal goals with my individualized and promising approach.

            I love to motivate<br> and help people and taking them to a next level. Not only with fitness but also to<br> teach them how to become more confident and to acquire a stronger mindset.</p>
        </div>
      </div>
    </div>
    <div class="trainerbkgd">
      <div class="trainerabout">
        <div class="trainerpic">
          <img src="images/trainers/trainer-4.jpg">
          <div class="overlay">
            <div class="content">
              <a href="bookings.php"><button class="btn">Book now</button></a>
            </div>
          </div>
        </div>
        <div class="trainerabt">
          <h3>DETAILS:</h3>
          <p>Sarah is a fully certified personal trainer and all rounder specialist. She has been training clients for nearly 10 years and during that time she has refined her fitness strategy to provide the best results, but more importantly, to do so while having fun! She knows that if you enjoy your workouts you are much more likely to stick with them, and the program is all about building amazing habits for how you workout and eat.</p>
          <p>Regular exercise isn’t just great for your body, it’s also going to help you feel happier, more optimistic and give you more energy. Her favorite thing about what she does is seeing how people transform both mentally and physically when they incorporate exercise into their lifestyle. she focuses on creating a program which will never grow boring, so that it is easy for you to make my workouts part of your daily routine. That’s why she writes a whole new workout every single week day – She wants to offer you a program that you can stick with for life!</p>
        </div>
      </div>
    </div>
  </div>
  <!-------------------------------trainer 3 ends here-------------------------------------->
  <!------------------------------trainer 4 starts here----------------------------------->
  <div class="trainer4details" id="trainer4">
    <div class="trainer-name">
      <h3>Christian Grey</h3>
    </div>
    <div class="introduction-align">
      <div class="introduction">
        <p>Christian has been a certified personal & sports performance trainer for the past 5+ years. He is also a USAW Certified Olympic Weightlifting Coach, Certified Sports Performance Specialist & a Certified Speed, Agility & Cross Fit Trainer. Christian is a former competitor in Olympic Weightlifting, Powerlifting, Strongman & Bodybuilding. He has also competed in football, wrestling, track & field, swimming, baseball & martial arts. Christian has won & set numerous GOLD Medals & AAU (Amateur Athletic Union) World & American Records in the 275lb class. A competitive bodybuilder for 10 year in the Mr. Novice, Jr., Senior Illinois…Mr. Chicagoland & Midwest Bodybuilding Championships qualifying him for the Mr. America.</p>
      </div>
      <div class="testimonial">
        <div class="p1">
          <p>My passion is to train my clients so they reach their health and fitness goals. At<br> the young age of 25, I received my first coaching certification. After that, I<br> continued my education in the fitness field, earning many more certifications and<br> awards. I’ll give you straightforward answers that help to simplify your journey.<br> I’ve personally been on both ends of the scale from a size 0 all the way to size 14.<br> So, I get what the extremes can do to your health and your mental state of being.</p>
        </div>
      </div>
    </div>
    <div class="trainerbkgd">
      <div class="trainerabout">
        <div class="trainerpic">
          <img src="images/trainers/train4.jpg">
          <div class="overlay">
            <div class="content">
              <a href="bookings.php"><button class="btn">Book now</button></a>
            </div>
          </div>
        </div>
        <div class="trainerabt">
          <h3>DETAILS:</h3>
          <p>Christian has trained many first responders for the military, law enforcement & fire fighters through cross-training methods to prepare them for the physical & mental challenges ahead of them.
            Christian was also the former Head Strength & Conditioning Coach & PE Athletics teacher for Rancho Christian High School in Temecula, CA. and a PAC 5 Division Head Strength & Conditioning Coach for Lakewood High School in Lakewood, CA.
          </p>
          <p>His “Look Up…Get Up…Never Give Up…Never Quit” philosophy has helped many members over the years achieve their goals.
            Sharing his many years of athletic competition and training experience has enabled him to set the standards of excellence in strength conditioning by teaching others about proper nutrition, lifting techniques, speed, agility & quickness.
          </p>
        </div>
      </div>
    </div>
  </div>
  <!------------------------------trainer 4 ends here------------------------------------>
  <!--slider -->
  <div class="wrap">
    <div id="arrow-left" class="arrow"></div>
    <div id="slider">
      <div class="slide slide1">
        <div class="slide-content">
          <span>"Martin helped me change my body shape, but also my perspective on every day challenges. At first I had reservations; “will this work?” “can I be disciplined enough?” “Will a PT be able to get the best out of me?” Martin was patient and encouraging and with his personalised approach I never felt out of my depth. You’ll struggle to find anyone as passionate, motivated & personable as Martin. The ability to bring the best out of people is rare but Martin possess bags of it."</span>
        </div>
      </div>
      <div class="slide slide2">
        <div class="slide-content">
          <span>"Sarah helped my wife and I hit the physical targets we set ourselves in advance of our wedding. Over 3 months, I lost around 15kg and completely changed the way my body looked. In doing so, I changed my relationship with food and alcohol and also the way that I train. Without Sarah, I could not have achieved what I did. She’s a great coach who lives what she does and is really focused and motivated by her clients’ results. I cannot recommend her enough."</span>
        </div>
      </div>
      <div class="slide slide3">
        <div class="slide-content">
          <span>"Martin was instrumental in completely changing the way I look and now think about food and exercise. I was always a fit and healthy, but slightly overweight. Martin was able to transform my body over 12 weeks and I was able to lose 14 kgs/2 stone in that period, dropping two belt sizes and reducing my body fat by 13%. He combines the skill of a motivator, an expert in his field and a friend who can help you when you are struggling."</span>
        </div>
      </div>
    </div>
    <div id="arrow-right" class="arrow"></div>
  </div>
  <script>
    let sliderText = document.querySelectorAll('.slide'),
      arrowLeft = document.querySelector('#arrow-left'),
      arrowRight = document.querySelector('#arrow-right'),
      current = 0;
    const textInTimer = 4500,
      textOutTimer = 3000;
    //clear all images
    function reset() {
      for (let i = 0; i < sliderText.length; i++) {
        sliderText[i].style.display = 'none';
      }
    }


    //initialise slider
    function startSlide() {
      reset();
      sliderText[0].style.display = 'block';
    }
    //show prev
    function slideLeft() {
      reset();
      sliderText[current - 1].style.display = 'block';
      current--;
    }
    //show next
    function slideRight() {
      reset();
      sliderText[current + 1].style.display = 'block';
      current++;
    }
    //left arrow click
    arrowLeft.addEventListener('click', function() {
      if (current == 0) {
        current = sliderText.length;
      }
      slideLeft();
    });
    //right arrow click
    arrowRight.addEventListener('click', function() {
      if (current == sliderText.length - 1) {
        current = -1;
      }
      slideRight();
    });
    startSlide();
  </script>
  <!--slider ends here-->
  <h2>WANT TO WORK TOGETHER & GET AMAZING RESULTS?</h2>
  <p class="subtitle">JUST FOLLOW THESE 3 STEPS</p>
  <div class="step">
    <div class="step1">
      <h4>STEP 1</h4>
      <div class="separator"></div>
      <p>Click on any the blue ‘Get Started Today’ button you find just below here. You'll have to login or register if you're a new member.</p>
    </div>
    <div class="step2">
      <h4>STEP 2</h4>
      <div class="separator"></div>
      <p>Arrange a call so we can talk about goals, past training experience, any injuries, exercise and nutrition preferences or specific areas you would like to work on.</p>
    </div>
    <div class="step3">
      <h4>STEP 3</h4>
      <div class="separator"></div>
      <p>Book the trainer to start building the physique you’ve always wanted. He’ll get to work on your programme right away. This takes no more than 48 hours.</p>
    </div>
  </div>
  <?php
  $page = "";
  if (isset($_SESSION['firstname'])) {
    $page = "bookings.php";
  } else {
    $page = "login.php";
  }
  ?>
  <a href=<?php echo $page; ?>><button class="start-button">GET STARTED TODAY</button></a>

  <!--------------------------------------Gallery slider---------------------------->
  <h2>GALLERY</h2>
  <div class="gbody">
    <div class="gslider">
      <div class="gslides">
        <!---radio button starts-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <input type="radio" name="radio-btn" id="radio5">
        <input type="radio" name="radio-btn" id="radio6">
        <input type="radio" name="radio-btn" id="radio7">
        <!---radio button ends-->
        <!----slider images start---->
        <div class="gslide first">
          <img src="images/trainers/gallery1.jpg">
        </div>
        <div class="gslide">
          <img src="images/trainers/gallery2.jpg">
        </div>
        <div class="gslide">
          <img src="images/trainers/gallery3.jpg">
        </div>
        <div class="gslide">
          <img src="images/trainers/gallery4.jpg">
        </div>
        <div class="gslide">
          <img src="images/trainers/gallery5.jpg">
        </div>
        <div class="gslide">
          <img src="images/trainers/gallery6.jpg">
        </div>
        <div class="gslide">
          <img src="images/trainers/gallery7.jpg">
        </div>
        <!----slider images end------>

        <!-----automatic navigation starts----->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
          <div class="auto-btn5"></div>
          <div class="auto-btn6"></div>
          <div class="auto-btn7"></div>
        </div>
        <!-----automatic navigation ends------>
      </div>
      <!-----manual navigation starts------->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
        <label for="radio5" class="manual-btn"></label>
        <label for="radio6" class="manual-btn"></label>
        <label for="radio7" class="manual-btn"></label>
      </div>
      <!----manual navigation ends---------->
    </div>
  </div>
  <!-----------------------------------Gallery ends here-------------------------------->
  <script>
    var counter = 1;
    setInterval(function() {
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if (counter > 7) {
        counter = 1;
      }
    }, 5000);
  </script>
  <br /><br /><br />
  <?php include 'includes/footer.php' ?>
</body>

</html>