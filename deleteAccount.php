<?php
session_start();
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
        h2{
            color: white;
        }
        button{
	width: 350px;
	height: 40px;
	font-size: 20px;
	background-color: #0736a6;
	border: none;
	color: white;
    margin-top: 20px;
    cursor: pointer;
}
button:hover{
    background-color: #000033;
}
    </style>
</head>
<body class="bodystyle" style="font-family: sans-serif;">
    <?php
        $activemenu="login";
        include('includes/menu.php');
    ?>
    <br><br>
    <?php
    $email=$_SESSION['username'];
    $passwordErr="";
    $password="";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST['txt_password']))
        {
            $passwordErr="Please enter your password";
        }
        else
        {
            $password=$_POST['txt_password'];
        }
        if($password==$_SESSION['password'])
        {
            require_once "includes/db_connect.php";
            $sQuery="DELETE FROM user_details WHERE email='$email'";
            $Result=$conn->exec($sQuery);
            if($Result)
            {
                echo "<h2>Your account has been successfully deleted!!!</h2>";
                echo '<a href="logout.php"><button>Back</button></a>';
            }
            else
            {
                echo "<h2>An error has occurred</h2>";
                echo '<a href="account.php"><button>Back</button></a>';
            }
        }
        else{
            $passwordErr="Wrong password";?>
            <form class="formstyle" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <h1>Confirm Deletion</h1>
        <h3 style="color: white;">Your Password:</h3>
        <input type="password" name="txt_password"><br>
        <?php echo "<h4 style='color:red'>".$passwordErr."</h4>";?>
        <button type="submit">Confirm</button>
    </form>
    <a href="account.php"><button>Cancel</button></a>
        <?php }
        
    }
    else{
    ?>
    <form class="formstyle" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <h1>Confirm Deletion</h1>
        <h3 style="color: white;">Your Password:</h3>
        <input type="password" name="txt_password"><br>
        <?php echo "<h4 style='color:red'>".$passwordErr."</h4>";?>
        <button type="submit">Confirm</button>
    </form>
    <a href="account.php"><button>Cancel</button></a>
    <?php
    }
        $count=1;
        while($count<=19)
        {
        echo "<br>";
        $count=$count+1;
        }
        include('includes/footer.php');
    ?>
</body>
</html>