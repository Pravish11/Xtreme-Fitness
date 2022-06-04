<?php
session_start();


$error['username']=$error['password']="";
$submission['username'] = $submission['password']="";
$found=true;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["txt_username"]))
    {
        $error['username']="Username is required";
    }
    else
    {
        $submission['username']=$_POST["txt_username"];
    }
    if(empty($_POST["txt_password"]))
    {
        $error['password']="Password is required";
    }
    else
    {
        $submission['password']=$_POST["txt_password"];
    }
    if($error['username']=="" && $error['password']=="")
    {
        require_once "includes/db_connect.php";
        $email=addslashes($submission['username']);
        $password=$submission['password'];
        $query = "SELECT * FROM accounts WHERE email='$email'";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result=$conn->query($query);
        $userResult=$result->fetch(PDO::FETCH_ASSOC);
        if($userResult['email'])//user exits
        {
            $hashed_password=$userResult['password'];
            if(password_verify($submission['password'],$hashed_password))
            {
                $_SESSION['username']=$submission['username'];
                $_SESSION['password']=$submission['password'];
                $query = "SELECT * FROM user_details WHERE email='$email'";
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $result=$conn->query($query);
                $userResult=$result->fetch(PDO::FETCH_ASSOC);
                $_SESSION['firstname']=$userResult['firstname'];
                header("Location: ".$_SESSION['redirectURL']);
                die();
            }
            else{
                $found=false;
            $Msg= '<h5 style="color:red; text-align:left">Error: Wrong credentials.<br/> Try again or make sure you are a registered user!</h5>';
            }
   
        }
        else
        {
            $found=false;
            $Msg= '<h5 style="color:red; text-align:left">Error: Wrong credentials.<br/> Try again or make sure you are a registered user!</h5>';
        }
    }
}
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
button{
	width: 250px;
      height: 40px;
      font-size: 20px;
      background-color: #0736a6;
      border: none;
      color: white;
      cursor: pointer;
      
      border-radius: 25px;
      font-family: sans-serif;
      font-weight: bold;
     
}
button:hover{
    background-color: #000033;
}
::placeholder
{
    color: white;
}
    </style>
</head>
<body class="loginstyle bodystyle">
<?php 
   $activemenu = "login"; 
   include('includes/menu.php');
  ?>
   <?php
  if(isset($_SESSION['username']))
  { 
    echo "<h3 style=\"color:white\">You are already logged in</h3>";
    
  }//end if
  else
  {	  
  ?>
  <form class="formstyle" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" >
      <h1>LOG IN</h1>
      <input type="email" name="txt_username" placeholder="Email address" class="inputstyle" <?php echo $submission['username'];?>required>
      <?php echo $error['username'];?>
      <input type="password" name="txt_password" placeholder="Password" class="inputstyle" <?php echo $submission['password'];?>required>
      <?php echo $error['password'];?>
      <?php if($found==false) echo $Msg; ?>
      <button type="submit">Log In</button>
  </form>
  <h4 style="color: white;">NOT A MEMBER YET?</h4>
      <a href="registration.php"><button type="submit">Create an account</button></a>

  <?php } ?>
  <br/><br/><br/><br/><br/><br/>
  <?php include 'includes/footer.php' ?>
</body>
</html>