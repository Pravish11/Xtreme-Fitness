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
        p{
      text-align: center;
      font-family:Helvetica;
    }
    .footer{
        background-color: black;
    }
    </style>
</head>
<body>
<div class="contact-image">
<?php 
   $activemenu = "contact"; 
   include('includes/menu.php');
  ?>
  <div class="contact-text">
    <h1 style="font-size:50px;font-family:sans-serif;">CONTACT US</h1>
</div>
</div> 
<br/>
<br/>
<div style="margin-left: 15%;">
<table>
    <tr>
        <td><?php  include('contactForm.php');?></td>
        <td><div style="margin-left: 25%;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7486.692658433952!2d57.48473342704781!3d-20.244466579636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217c5b1e4771db33%3A0x57602f8c1bc61566!2sEb%C3%A8ne%2C%20Quatre%20Bornes!5e0!3m2!1sen!2smu!4v1645015720279!5m2!1sen!2smu" width="600" height="700" style="border:0;" allowfullscreen="" loading="lazy">MAP</iframe></div></td>
    </tr>
</table>
<br/>
<br/>
<br/>
<table>
<tr>
            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg></td>
            <td>Ebene</td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg></td>
            <td>(+230) 698 5689</td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
</svg></td>
            <td>Xtreme_Fitness@gmail.com</td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-clock" viewBox="0 0 16 16">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg></td>
            <td>BUSINESS HOURS</td>  
        </tr>
        <tr>
            <td> </td>
            <td>Monday - Friday: 08:00 - 20:00</td>
        </tr>   
        <tr>
            <td> </td>
            <td>Saturday - Sunday: 09:00 - 15:00</td>
        </tr>      
</table>
</div>
<br/>
<br/>
    <!----------------------------------------------------------------------------------------------------------->
<?php include 'includes/footer.php' ?>
</body>
</html>