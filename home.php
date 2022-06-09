<?php
session_start();
require_once "includes/db_connect.php";
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
    body {
      font-family: sans-serif;
    }

    .home_page_register {
      background: url(images/home_img_1.jpg);
      background-size: cover;
      background-position: top;
      height: 800px;
      position: relative;
    }

    .reg_text {
      color: white;
      position: absolute;
      left: 150px;
      top: 120px;
      font-size: 25px;
    }

    .reg_button {
      width: 170px;
      height: 45px;
      /*position: absolute;*/
      left: 200px;
      top: 370px;
      color: white;
      background: transparent;
      font-weight: bold;
      border-radius: 6px;
      border: 2px solid rgb(6, 0, 255);
      box-shadow: 0 0 10px rgb(6, 0, 255);
      cursor: pointer;
      display: inline-block;
      margin-right: 5%;
      margin-left: 10%;
    }

    .reg_button:hover {
      outline: none;
      background-color: rgb(6, 0, 255, 0.5);
      transition: 1s;
    }

    .footer {
      background-color: black;
    }

    .footer h3 {
      text-decoration: none;
      text-align: left;
    }

    .title {
      text-align: center;
    }

    .title h1 {
      letter-spacing: 5px;
    }

    .title h5 {
      color: blue;
      font-family: Helvetica;
    }

    .title p {
      font-family: Helvetica;
      color: #545454;
    }

    .about {
      width: 80%;
      display: table;
      table-layout: fixed;
      overflow: hidden;
      margin-top: 30px;
      padding-top: 30px;
      vertical-align: baseline;
      margin-bottom: 5%;
      margin-left: 10%;
      background-image: url(https://topfit.qodeinteractive.com/wp-content/uploads/2017/02/about-testimonials-bckr.jpg?id=12780);
    }

    .about .pic {
      display: table-cell;
      width: 50%;
      vertical-align: middle;
      height: 100%;
      background-size: cover;
      padding: 0 5% 0 0;
    }

    .about .pic img {
      width: 70%;
      height: 50%;
      margin-left: 30%;
      border-radius: 25px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .about .about-text {
      width: 50%;
      display: table-cell;
      vertical-align: middle;
      height: 100%;
      background-size: cover;
      font-size: 22px;
      line-height: 26px;
    }

    .about .about-text p {
      display: block;
      margin-right: 10%;
    }

    .grid-container {
      display: grid;
      grid-template-columns: auto auto auto;
      margin-top: 20%;
    }

    .grid-container>div {
      font-size: 20px;
      color: #545454;
    }

    .grid-container .p1 {
      font-weight: bold;
      font-size: 24px;
      color: black;
    }

    .background {
      background-color: #F5F5F5;
      padding-top: 3%;
      padding-bottom: 3%;
      margin-bottom: 3%;
    }

    .service {
      width: 80%;
      display: table;
      table-layout: fixed;
      overflow: hidden;
      margin-top: 30px;
      padding-top: 30px;
      vertical-align: baseline;
      margin-bottom: 5%;
      margin-left: 13%;
    }

    .service .col1 {
      display: table-cell;
      width: 20%;
      vertical-align: middle;
      height: 100%;
      background-size: cover;
      padding: 0 5% 0 0;
    }

    .service .col2 {
      display: table-cell;
      width: 20%;
      vertical-align: top;
      height: 100%;
      background-size: cover;
      padding: 0 5% 0 0;
    }

    .service .col2 img {
      width: 90%;
      height: 30%;
      border-radius: 25px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .service .col3 {
      display: table-cell;
      width: 20%;
      vertical-align: middle;
      height: 100%;
      background-size: cover;
      padding: 0 5% 0 0;
    }

    .service p {
      color: #545454;
    }

    .explore {
      background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/explore.jpg");
      width: 100%;
      height: 500px;
      margin-bottom: 3%;
    }

    .explore h1 {
      color: white;
      text-align: center;
      padding-top: 10%;
    }

    .button {
      width: 250px;
      height: 40px;
      font-size: 20px;
      background-color: #0736a6;
      border: none;
      color: white;
      cursor: pointer;
      text-align: center;
      border-radius: 25px;
      font-family: sans-serif;
      font-weight: bold;
      margin-left: 43%;

    }

    .button:hover {
      background-color: #000033;
    }

    .workout-grid {
      display: grid;
      grid-template-columns: 5% auto auto auto 5%;
      gap: 10px;
      padding: 10px;
      margin-bottom: 3%;
    }

    .workout-grid>div {
      padding: 20px 0;
    }

    /*.workout-grid > div img{
  width: 70%;
  height: 100%;
  border-radius: 25px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}*/
    .middle {
      position: relative;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .card {
      cursor: pointer;
      width: 80%;
      height: 600px;

    }

    .front,
    .back {
      width: 100%;
      height: 100%;
      overflow: hidden;
      backface-visibility: hidden;
      position: absolute;
      transition: transform .6s linear;
      border-radius: 25px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .front img {
      height: 600px;
      width: 100%;
    }

    .front {
      transform: perspective(600px) rotateY(0deg);
    }

    .back {
      background: #e33058;
      transform: perspective(600px) rotateY(180deg);
    }

    .back-content {
      text-align: left;
    }

    .back-content h2,
    h3 {
      text-align: center;
      text-decoration: underline;
    }

    .card:hover>.front {
      transform: perspective(600px) rotateY(-180deg);
    }

    .card:hover>.back {
      transform: perspective(600px) rotateY(0deg);
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

    .page {
      display: grid;
      grid-template-columns: auto auto auto;
      margin-bottom: 3%;
      height: 600px;
      overflow: hidden;
    }

    .page .page1 {
      background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/workout.jpg");
      background-size: cover;
      transition: 0.7s;
      background-position: center;
    }

    .page .page1:hover {
      transform: scale(1.1);
    }

    .page .page2 {
      background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/online.jpg");
      background-size: cover;
      transition: 0.7s;
      background-position: center;
    }

    .page .page2:hover {
      transform: scale(1.1);
    }

    .page .page3 {
      background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/coach.jpg");
      background-size: cover;
      transition: 0.7s;
      background-position: center;
    }

    .page .page3:hover {
      transform: scale(1.1);
    }

    .page .page1 a {
      margin-top: 64%;
    }

    .page .page3 a {
      margin-top: 69%;
    }

    .page a {
      font-weight: bold;
      cursor: pointer;
      border: none;
      color: white;
      position: relative;
      font-family: 'Poppins', sans-serif;
      font-size: 18px;
      letter-spacing: 0.5px;
      padding: 0 10px;
      text-decoration: none;
      text-align: center;
      margin-top: 60%;
    }

    .page a:hover {
      color: white;
    }

    .page a:hover::after {
      width: 100%;
    }

    .page a::after {
      content: "";
      position: absolute;
      background-color: #0736a6;
      height: 3px;
      width: 10%;
      left: 0;
      bottom: -10px;
      transition: 0.3s;
    }

    .page-anchor {
      align-items: center;
      display: flex;
      justify-content: space-around;
      margin: auto;
    }

    .trainers {
      /*min-height: 100vh;*/
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

    .price-style {
      box-sizing: border-box;
      margin-top: 3%;
      margin-bottom: 5%;
    }

    .price-row {
      width: 90%;
      max-width: 1100px;
      margin: auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      grid-gap: 25px;
    }

    .price-col {
      padding: 10% 15%;
      border-radius: 10px;
      text-align: center;
      background-color: #303030;
      color: white;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .price-col p {
      font-size: 22px;
      font-weight: bold;
    }

    .price-col h3 {
      text-decoration: none;
      font-size: 44px;
      margin: 20px 0 40px;
      font-weight: 500;
    }

    .price-col h3 span {
      font-size: 16px;
    }

    .price-col ul {
      text-align: left;
      margin: 20px 0;
      list-style: none;
    }

    .price-col ul li {
      margin: 15px 0;
    }

    .price-col ul li::before {
      content: '\2022';
      color: #e33058;
      font-weight: bold;
      margin-right: 8px;
    }

    .price-col button {
      width: 100%;
      padding: 14px 0;
      background: transparent;
      color: white;
      font-size: 15px;
      border: 1px solid #e33058;
      border-radius: 6px;
      margin-top: 30px;
      cursor: pointer;
    }

    .price-col button:hover {
      background: #e33058;
    }

    .gbody {
      height: 50vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: url(https://topfit.qodeinteractive.com/wp-content/uploads/2017/02/about-testimonials-bckr.jpg?id=12780);
      margin-bottom: 10%;
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

    .comment-section {
      width: 100%;
      height: auto;
      /*border: 5px solid black;*/
      margin: auto;
      padding-top: 3%;
      padding-left: 3%;
      margin-bottom: 3%;
      padding-bottom: 3%;
      /*background-color: #303030;
      border-radius: 5px;*/
      box-sizing: border-box;
    }

    .comment-section .comment-option {
      align-items: center;
      display: flex;
      justify-content: space-around;
      margin: auto;
      margin-bottom: 3%;
    }

    .comment-section .comment-option button {
      font-weight: bold;
      cursor: pointer;
      border: none;
      color: #303030;
      position: relative;
      background-color: white;
      font-family: 'Poppins', sans-serif;
      font-size: 18px;
      letter-spacing: 0.5px;
      padding: 0 10px;
    }

    .comment-section .comment-option button::after {
      content: "";
      position: absolute;
      background-color: #0736a6;
      height: 3px;
      width: 10%;
      left: 0;
      bottom: -10px;
      transition: 0.3s;
    }

    .comment-section .comment-option button:hover {
      color: blue;
    }

    .comment-section .comment-option button:hover:after {
      width: 100%;
    }

    .testimonial {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      width: 100%;
    }

    .testimonial-box-container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      width: 100%;
    }

    .testimonial-box {
      width: 500px;
      background-color: #fff;
      padding: 20px;
      margin: 15px;
      border-radius: 5px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .profile-img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      overflow: hidden;
      margin-right: 10px;
    }

    .profile-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
    }

    .profile {
      display: flex;
      align-items: center;
    }

    .name-user {
      display: flex;
      flex-direction: column;
    }

    .name-user strong {
      color: #3d3d3d;
      font-size: 1.1rem;
      letter-spacing: 0.5px;
    }

    .name-user span {
      color: #979797;
      font-size: 0.8rem;
    }

    .reviews {
      display: flex;

      flex-direction: row-reverse;
      float: left
    }

    .reviews>input {
      display: none;
    }

    .reviews>label {
      position: relative;
      width: 19px;
      font-size: 25px;
      color: red;
      cursor: pointer;
    }

    .reviews>label::before {
      content: "\2605";
      position: absolute;
      opacity: 0;
    }

    .reviews>label:hover:before,
    .reviews>label:hover~label:before {
      opacity: 1 !important;
    }

    .reviews>input:checked~label:before {
      opacity: 1;
    }

    .reviews:hover>input:checked~label:before {
      opacity: 0.4;
    }

    .box-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .client-comment p {
      font-size: 0.9rem;
      color: #4b4b4b;
    }

    .testimonial-box:hover {
      transform: translateY(-10px);
      transition: all ease 0.3s;
    }

    .myTable {
      width: 80%;
      margin: auto;
      border-collapse: separate;
  border-spacing: 0 15px;

    }
    .myTable th{
      background-color: #4287f5;
  color: white;
    }
    .myTable td{
      border: 1px solid black;
  padding: 5px;
    }
    .myTable td button{
      margin-left: 30%;
    }
    .commentTable{
      width: 70%;
    }
    .tableAlign{
      text-align: center;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#all-comments").show();
      $("#your-comments").hide();
      $("#all-commentsButton").click(function() {
        $("#all-comments").show(1000);
        //hide your comments
        $("#your-comments").hide(500);
      });
      $("#your-commentsButton").click(function() {
        $("#all-comments").hide(500);
        //show your comments
        $("#your-comments").show(1000);
      });


      //flag comment starts
      $(".flag").click(function() {
        var reviewID = $(this).attr("id");
        //alert(reviewID);
        $.ajax({
          url:"homeAjax.php",
          method: "POST",
          data:{review_id:reviewID},
          dataType:"text",
          success:function(text)
          {
            $("#box".concat(reviewID)).hide(1000);
          }
        });
        
      });
      $(".flag").mouseenter(function(){
        var reviewID = $(this).attr("id");
        //alert(reviewID);
        $("#".concat(reviewID)).html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-flag-fill" viewBox="0 0 16 16"><path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/></svg>');
      });

      $(".flag").mouseleave(function(){
        var reviewID = $(this).attr("id");
        //alert(reviewID);
        $("#".concat(reviewID)).html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-flag" viewBox="0 0 16 16"><path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z"/></svg>');
      });

      //flag comments ends


      //delete button starts
      $(".deleteButton").click(function(){
        var reviewID = $(this).attr("id");
        //alert (reviewID);
        $.ajax({
          url:"homeAjax.php",
          method: "POST",
          data:{delete_id:reviewID},
          dataType:"text",
          success:function(text)
          {
            $("#tr".concat(reviewID)).hide(1000);
            $("#box".concat(reviewID)).hide(1000);
          }
        });
      });

      //delete button ends

      //write your comment
      $("#submit").on("click",function(){
        var rating=($("input[name=txt_rating]:checked").val());
        var comment=$("textarea[name=txt_comment]").val();
        $.ajax({
          url:"homeAjax.php",
          method: "POST",
          data:{
            txt_rating:rating,
            txt_comment:comment
          },
          success:function()
          {

          },
          error:function(html)
          {
            $("#error").html(html);
          }
        });
      });

      //end write your comment
    });
  </script>
</head>

<body style="font-family: sans-serif;">
  <div class='home_page_register'>
    <?php
    $activemenu = "home";
    include('includes/menu.php');
    ?>
    <div class="reg_text">
      <br><br>
      <h2 style="text-align: center;">Want to achieve your dreams?</h2>
      <h3 style="text-align: center; text-decoration:none;">Get started now!</h3>
      <h4 style="text-align: center;">Be part of our family.</h4>
      <h4 style="text-align: center;">Be Great!</h4>
      <h4 style="text-align: center;">Be an <span style="color:rgb(6,0,255); font-weight: bold; font-size:30px; text-transform: uppercase;">Extremer!</span></h4>
      <?php
      if (!isset($_SESSION['firstname'])) {
        echo "<a href='#about'><button class='reg_button'>EXPLORE</button></a>";
        echo "<a href='registration.php'><button class='reg_button'>JOIN US</button></a>";
      } else {
        echo "<h4 style='text-align:center;'>Welcome " . $_SESSION['firstname'] . "!</h4>";
      }
      ?>
    </div>
  </div>
  <br />
  <!--------------------about starts here-------------------------------------------------->
  <div class="title" id="about">
    <h5>WHO WE ARE</h5>
    <h1>ABOUT US</h1>
    <p>From the moment you walk through the door you know Xtreme Fitness is a<br> unique place.</p>
  </div>
  <div class="about">
    <div class="pic">
      <img src="images/about.jpg">
    </div>
    <div class="about-text">
      <p>When we created Xtreme Fitness, we knew we wanted to be more than just a simple gym. Having worked in traditional gyms in the past, we knew we needed to create a concept that would provide our members with the most effective tools for success. This meant we needed to offer a wide range of classes both for children and adults.</p>
      <p>This also meant we needed to provide a learning environment run by experienced and successful coaches. However, our most important goal was to create a welcoming atmosphere and community in which everyone feels a sense of belonging.</p>
      <div class="grid-container">
        <div>ENVIRONMENT</div>
        <div>CLASSES</div>
        <div>PRICES</div>
        <div class="p1">Clean and Airy</div>
        <div class="p1">Every Level</div>
        <div class="p1">Affordable</div>
      </div>
    </div>
  </div>

  <!--------------------------about end here----------------------------------------------------->

  <div class="background">

    <!---------------services start here------------------------------------------------------>
    <div class="title">
      <h5>SERVICES WE PROVIDE</h5>
      <h1>OUR SERVICES</h1>
      <p>We provide the best services at a reasonable price.</p>
    </div>


    <div class="service">
      <div class="col1">
        <h3>BOOKINGS</h3>
        <p>Our members can book our best trainers for training sessions and to get training advice.</p>
        <h3>ONLINE CLASSES</h3>
        <p>Join our online group classes and follow them from your home.</p>
        <h3>TRAINERS</h3>
        <p>Feeling confused about which trainer to choose? Have a look at our trainers page and do not hesitate to contact them.</p>
      </div>
      <div class="col2">
        <img src="images/service.jpg">
      </div>
      <div class="col3">
        <h3>WORKOUT</h3>
        <p>First time going to a gym? Find which workout is adapted for your body.</p>
        <h3>ACCOUNT</h3>
        <p>Creating an account provides you many facilities.</p>
        <h3>CONTACT US</h3>
        <p>For any queries do not hesitate to contact us. Our team will reply as soon as possible.</p>
      </div>
    </div>
    <!--------------------------------services end here----------------------------------->
    <div class="explore">
      <h1>EXPLORE XTREME FITNESS</h1>
      <a href="registration.php"><button class="button">JOIN US</button></a>
    </div>

    <!-------------------------workout starts here--------------------------------->
    <div class="title">
      <h5>WHAT DO YOU WANT TO LEARN TODAY?</h5>
      <h1>POPULAR WORKOUTS</h1>
      <p>Whether you want to want to loose weight, tone up, gain muscle or improve <br> strength, we provide a wide range of workouts to help you achieve your goals <br>in a friendly and airy environment.</p>
    </div>
    <div class="workout-grid">
      <div></div>

      <div class="card middle">
        <div class="front">
          <img src="images/lunges.jpg">
        </div>
        <div class="back">
          <div class="back-content middle">
            <h2>Lunges</h2>
            <h3>Muscles worked:</h3>
            <ul>
              <li>Abdominals</li>
              <li>Back muscles</li>
              <li>Gluteal muscles</li>
              <li>Quadriceps</li>
              <li>Hamstrings</li>
              <li>Calves</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="card middle">
        <div class="front">
          <img src="images/pushup.jpg">
        </div>
        <div class="back">
          <div class="back-content middle">
            <h2>Push Up</h2>
            <h3>Muscles worked:</h3>
            <ul>
              <li>Pectoralis major</li>
              <li>Pectoralis minor</li>
              <li>Triceps</li>
              <li>Anterior deltoids</li>
              <li>Core muscles</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="card middle">
        <div class="front">
          <img src="images/squat.jpg">
        </div>
        <div class="back">
          <div class="back-content middle">
            <h2>Squat</h2>
            <h3>Muscles worked:</h3>
            <ul>
              <li>Gluteus maximus, minimus, and medius (buttocks)</li>
              <li>Quadriceps (front of the thigh)</li>
              <li>Hamstrings (back of the thigh)</li>
              <li>Adductor (groin)</li>
              <li>Hip flexors</li>
            </ul>
          </div>
        </div>
      </div>

      <div></div>
    </div>
    <a href="workout.php"><button class="button">More Workouts</button></a>
  </div>
  <!------------------workout ends here----------------------------------->

  <!----------------------step starts-------------------------------->
  <div class="step">
    <div class="step1">
      <h4>STEP 1</h4>
      <div class="separator"></div>
      <h4>SET YOUR GOALS</h4>
      <p>Don't rush in getting a fit body quickly but instead set some goals before each session.</p>
    </div>
    <div class="step2">
      <h4>STEP 2</h4>
      <div class="separator"></div>
      <h4>GET A PROGRAM</h4>
      <p>Get a fully prepared program which will be adapted to your lifestyle and body.</p>
    </div>
    <div class="step3">
      <h4>STEP 3</h4>
      <div class="separator"></div>
      <h4>TRAIN HARD</h4>
      <p>The first sessions might be painful but you'll feel better gradually. Just don't give up!</p>
    </div>
  </div>
  <!---------------------------step ends---------------------------------------------------->

  <!-------------------------------page starts-------------------------------------------->
  <div class="page">
    <div class="page1">
      <div class="page-anchor"><a href="workout.php">VIEW WORKOUTS</a></div>
    </div>
    <div class="page2">
      <div class="page-anchor"><a href="onlineClasses.php">VIEW ONLINE CLASSES</a></div>
    </div>
    <div class="page3">
      <div class="page-anchor"><a href="bookings.php">GET A COACH</a></div>
    </div>
  </div>
  <!-----------------------------page ends------------------------------------------------------->

  <!-----------------------------------trainer start-------------------------------------------->
  <div class="background">
    <div class="title">
      <h5>YOUR BEST PARTNER</h5>
      <h1>MEET OUR TEAM</h1>
      <p>We are a team of experienced people, nutrition, sports and fitness passionate<br />
        experts with talent and knowledge unsurpassed in the industry.<br />
        Get to know us.</p>
    </div>

    <div class="trainers">
      <div class="items">
        <div class="item">
          <a href="trainers.php#trainer1"><img src="images/trainers/train1.jpg"></a>
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
          <a href="trainers.php#trainer2"><img src="images/trainers/train2.jpg"></a>
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
          <a href="trainers.php#trainer3"><img src="images/trainers/trainer-4.jpg"></a>
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
          <a href="trainers.php#trainer4"><img src="images/trainers/train4.jpg"></a>
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
  </div>
  <!-----------------------------trainers end---------------------------------------------------------->

  <!-------------------------------membership starts-------------------------------------------------->
  <div class="title">
    <h5>BECOME A PART OF US</h5>
    <h1>OUR MEMBERSHIP</h1>
    <p>We offer a wide range of membership with options to suit every budget.<br>
      Everything from One Day Pass to monthly or annual prepaid memberships.<br>
      What's more, we won't tie you in to a long term contract, giving you greater flexibility.
    </p>
  </div>

  <div class="price-style">
    <div class="price-row">
      <div class="price-col">
        <p>Monthly</p>
        <h3>Rs 1150.00 <span>/ month</span></h3>
        <ul>
          <li>Renew your membership per month.</li>
          <li>Rs 1150.00 charged per month.</li>
          <li>Membership is prepaid.</li>
          <li>Membership to be renewed 30 days following payment date.</li>
          <li>Payment can be made online or in cash.</li>
          <li>Recommended for those with a busy agenda but want to stay in shape.</li>
        </ul>
        <a href="registration.php"><button>GET MEMBERSHIP</button></a>
      </div>
      <div class="price-col">
        <p>Yearly</p>
        <h3>Rs 1149.00 <span>/ month</span></h3>
        <ul>
          <li>Renew your membership per year.</li>
          <li>Rs 1149.00 charged per month on a span of one year.</li>
          <li>Membership is prepaid.</li>
          <li>Membership to be renewed 365 days following payment date.</li>
          <li>Amount payable per month will be directly debited from account.</li>
          <li>Recommended for those willing to commit the whole into achieving their goals.</li>
        </ul>
        <a href="registration.php"><button>GET MEMBERSHIP</button></a>
      </div>
    </div>
  </div>
  <!---------------------------membership ends---------------------------------------------------------->


  <!--------------------------------------Gallery slider---------------------------->
  <h2 style="text-align: center;">GALLERY</h2>
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

  <!-----------------------------------Gallery ends here-------------------------------->

  <!------------------comment section---------------------------------------------->

  <div class="title">
    <h5>COMMENTS</h5>
    <h1>OUR CLIENT SAY'S</h1>
    <p>Xtreme Fitness is more than just a gym. We are a training facility where you get <br>
      expert help reaching your fitness goals.
    </p>
  </div>

  <div class="comment-section">
    <div class="comment-option">
      <button id="all-commentsButton">ALL COMMENTS</button>
      <button id="your-commentsButton">YOUR COMMENTS</button>
    </div>

    <div class="testimonial" id="all-comments">
      <!----------------testimonial box container------------------->
      <div class="testimonial-box-container">


        <?php
        $sQuery = "SELECT review.review_id,review.date_posted,review.rating,review.comment,user_details.firstname,user_details.lastname
  FROM review,user_details
  WHERE review.member_mail=user_details.email AND flag='0' AND ban='0'
  ORDER BY rating DESC
  LIMIT 3";
        $Result = $conn->query($sQuery);
        $count = 0;
        while ($value = $Result->fetch()) { ?>
          <!-------------box 1-------------------------->
          <div class="testimonial-box" id=<?php echo "box" . $value['review_id']; ?>>
            <!-------------------------------top---------------------->
            <div class="box-top">
              <!------------------profile-------------------------------->
              <div class="profile">
                <div class="profile-img">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                  </svg>
                </div>
                <!-------------Name and date------------------------------->
                <div class="name-user">
                  <strong><?php echo $value['firstname'] . " " . $value['lastname']; ?></strong>
                  <span><?php echo $value['date_posted']; ?></span>
                </div>
              </div>
              <!------------------------------reviews----------------->
              <div class="reviews">
                <input type="radio" name=<?php echo "rating" . $count; ?> value="5" id="5" <?php if ($value['rating'] == "5") echo "checked"; ?>><label for="5">☆</label>
                <input type="radio" name=<?php echo "rating" . $count; ?> value="4" id="4" <?php if ($value['rating'] == "4") echo "checked"; ?>><label for="4">☆</label>
                <input type="radio" name=<?php echo "rating" . $count; ?> value="3" id="3" <?php if ($value['rating'] == "3") echo "checked"; ?>><label for="3">☆</label>
                <input type="radio" name=<?php echo "rating" . $count; ?> value="2" id="2" <?php if ($value['rating'] == "2") echo "checked"; ?>><label for="2">☆</label>
                <input type="radio" name=<?php echo "rating" . $count; ?> value="1" id="1" <?php if ($value['rating'] == "1") echo "checked"; ?>><label for="1">☆</label>
              </div>
              <?php
              if (isset($_SESSION['username'])) { ?>
                <span class="flag" id=<?php echo $value['review_id'];?> style="cursor: pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-flag" viewBox="0 0 16 16">
                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z" />
                  </svg></span>
              <?php } ?>
            </div>
            <!-------------------comments------------------------------->
            <div class="client-comment">
              <p><?php echo $value['comment']; ?></p>
            </div>
          </div>
                
        <?php
          $count = $count + 1;
        } ?>


      </div>
    </div>




    <!-----------your comments----------->
    <?php
    if (isset($_SESSION['username'])) { ?>
      <div id="your-comments">
        <table class="myTable">
          <tr>
            <th class="commentTable">Comment</th>
            <th>Date Posted</th>
            <th> </th>
          </tr>
          <br><br>
          <?php
          $mail = $_SESSION['username'];
          $Query1 = "SELECT review_id,date_posted,comment
          FROM review
          WHERE member_mail = '$mail'
          ORDER BY date_posted DESC";
          $Result1 = $conn->query($Query1);
    
          while ($userValue = $Result1->fetch()) {?>
            <tr id=<?php echo "tr".$userValue['review_id']; ?>>
            <?php
            echo "<td class='commentTable'>" . $userValue['comment'] . "</td>";
            echo "<td class='tableAlign'>" . $userValue['date_posted'] . "</td>"; ?>
            <td><button class="deleteButton" id=<?php echo $userValue['review_id']; ?>>Delete</button></td>
          <?php
            echo "</tr>";
          } ?>


        </table>

        <form method="POST">

          <fieldset style="width: 80%; margin:auto;">
            <legend style="text-align: center;">
              <h3>WRITE A REVIEW</h3>
            </legend>
            <div class="reviews" style="margin-left: 48%;">
              <input type="radio" name="txt_rating" value="5" id="rate-5"><label for="rate-5">☆</label>
              <input type="radio" name="txt_rating" value="4" id="rate-4"><label for="rate-4">☆</label>
              <input type="radio" name="txt_rating" value="3" id="rate-3"><label for="rate-3">☆</label>
              <input type="radio" name="txt_rating" value="2" id="rate-2"><label for="rate-2">☆</label>
              <input type="radio" name="txt_rating" value="1" id="rate-1" required><label for="rate-1">☆</label>
            </div><?php echo $ratingErr; ?>
            <br><br>
            <textarea name="txt_comment" placeholder='Add your review' required class="textareaReview" style="width:100%; border:none;"></textarea>
            <?php $commentErr ?>
            <br>
            <div class="container">
              <!--met delete dan comment box-->
              <input type="submit" value="SUBMIT" class="button" style="cursor: pointer;" id="submit" />
            </div>
            
            <br><br>
            <span id="error"></span>
          </fieldset>
        </form>
      </div>
    <?php
    }
    ?>
    <!--your comments end here-->
  </div>




  <!------------------------comments end---------------------------------------------->
  <?php include 'includes/footer.php' ?>
</body>

</html>