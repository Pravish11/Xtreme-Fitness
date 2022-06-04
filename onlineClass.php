<?php
session_start();
require_once "includes/db_connect.php";
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
            color: #545454;
        }
        .image{
            width: 400px;
            height: 250px;
            vertical-align: middle;
            position: relative;
            top: -70px;
        }
        fieldset{
            margin-left: 25%;
            margin-right: 25%;
            border: none;
            border-top: 1px solid #C0C0C0;
        }
        .p1{
            text-align: left; 
            display:inline-block;
            padding-left: 65px;
            font-family: Optima, sans-serif;
            color: black;
        }
        .button {
            background-color: #0736a6;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
        }
        .button:hover{
            background-color: #000033;
        }
        input{
            height: 32px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".show").hide();
            $(".b1").click(function(){
                $(".show1").toggle(1000);
            });
        });
        $(document).ready(function(){
            $(".show").hide();
            $(".b2").click(function(){
                $(".show2").toggle(1000);
            });
        });
    </script>
</head>
<body style="font-family: sans-serif;">
    <div class="onlineClasses-image">
        <?php
            $activemenu = "onlineClasses"; 
            include('includes/menu.php');
        ?>
    </div>
    <div class="onlineClasses-text">
        <h1 style="font-size:50px;font-family:sans-serif;">ONLINE CLASSES</h1>
    </div>
    <h2 style="text-align: center;">OUR WEEKLY CLASSES:</h2>
    <p>Our passionate team train you at home with a set of exercises to keep you healthly.<br>Join our classes through zoom and enjoy your session!</p>
    <br>
    <?php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sQuery="SELECT online_class.class_name,online_class.class_date,online_class.start_time,online_class.duration,user_details.firstname,user_details.lastname
        FROM online_class,user_details
        WHERE online_class.coach_mail=user_details.email
        ORDER BY online_class.class_date ASC";
        $Result = $conn->query($sQuery);
        $count=0;
        while($value=$Result->fetch())
        {
            $className[$count]=$value['class_name'];
            $classDate[$count]=$value['class_date'];
            $startTime[$count]=$value['start_time'];
            $duration[$count]=$value['duration'];
            $name[$count]=$value['firstname']." ".$value['lastname'];
            $count=$count+1;
        }
        if($className[0]=="Yoga")
            {
                $imageName="images/Yoga.jpg";?>
                <fieldset>
                <img src=<?php echo $imageName;?> class="image">
                <p class="p1"><b>Class Name: </b><?php echo $className[0];?><br>
                <b>Date: </b><?php echo $classDate[0];?><br>
                <b>Start time: </b><?php echo $startTime[0];?><br>
                <b>Duration: </b><?php echo $duration[0];?><br>
                <b>Coach: </b><?php echo $name[0];?><br><br><br>
                <button class="button b1">Register Now</button><br></p><br>
                <div class="show show1">
                <?php
                        if(!isset($_SESSION['username']))
                        {
                            echo "<b style='color:red;'>You need to log in to complete registration</b><br><br><a href='login.php'><button class='button'>Login</button></a>";
                        }
                        else
                        {
                            $email1=$_SESSION['username'];
                            $className1=$className[0];
                            $classDate1=$classDate[0];
                            $sQuery1="SELECT *
                            FROM online_class_registration
                            WHERE member_mail='$email1'
                            AND class_name='$className1'
                            AND class_date='$classDate1'";
                            $Result1=$conn->query($sQuery1);
                            $userResult1=$Result1->fetch(PDO::FETCH_ASSOC);
                            if($userResult1['member_mail'])
                            {
                                echo "<b style='color:red;'>You have already registered for this class</b>";
                            }
                            else
                            {
                                $passwordErr1=$password1="";
                                    if($_SERVER["REQUEST_METHOD"]=="POST")
                                    {
                                        if($_POST['txt_password1']!=$_SESSION['password'])
                                        {
                                            $passwordErr1="<b style='color:red;'>Wrong password. Try again</b>";
                                            
                                        }
                                        else
                                        {
                                            $password1=$_POST['txt_password1'];
                                        
                                        }
                                        if($passwordErr1=="")
                                        {
                                            $sql1='call insertOnlineClassReg(:email1,:name1,:date1,:time1)';
                                            $stmt1 = $conn->prepare($sql1);
                                            $stmt1->bindParam(':email1',$mail1);
                                            $stmt1->bindParam(':name1',$name1);
                                            $stmt1->bindParam(':date1',$date1);
                                            $stmt1->bindParam(':time1',$time1);
                                            $mail1=$email1;
                                            $name1=$className1;
                                            $date1=$classDate1;
                                            $time1=$startTime[0];
                                            $stmt1->execute();
                                            $conn==null;
                                            echo "<b style='color:red;'>Registration successful</b>";
                                        }
                                        else
                                        { ?>
                                            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                            <h4>Enter your password to confirm registration</h4>
                                            <input type="password" name="txt_password1" placeholder="Your password" required><?php echo $passwordErr1;?><br><br>
                                            <button type="submit" class="button">Confirm</button>
                                            </form>
                                        <?php }
                                    }
                                    else{?>

                                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                            <h4>Enter your password to confirm registration</h4>
                                            <input type="password" name="txt_password1" placeholder="Your password" required><?php echo $passwordErr1;?><br><br>
                                            <button type="submit" class="button">Confirm</button>
                                        </form>
                            <?php }
                            }
                        }
                    ?>
                </div>
                </fieldset>
            <?php }
        ?>


        <?php if($className[1]=="Zumba")
            {
                $imageName="images/Zumba.jpg";?>
                <fieldset>
                <img src=<?php echo $imageName;?> class="image">
                <p class="p1"><b>Class Name: </b><?php echo $className[1];?><br>
                <b>Date: </b><?php echo $classDate[1];?><br>
                <b>Start time: </b><?php echo $startTime[1];?><br>
                <b>Duration: </b><?php echo $duration[1];?><br>
                <b>Coach: </b><?php echo $name[1];?><br><br><br>
                <button class="button b2">Register Now</button><br></p><br>
                <div class="show show2">
                <?php 
                        	if(!isset($_SESSION['username']))
                            {
                                echo "<b style='color:red;'>You need to log in to complete registration</b><br><br><a href='login.php'><button class='button'>Login</button></a>";
                            }
                            else
                            {
                                $email=$_SESSION['username'];
                                $cName=$className[1];
                                $cDate=$classDate[1];
                                $sQuery="SELECT *
                                FROM online_class_registration
                                WHERE member_mail='$email'
                                AND class_name='$cName'
                                AND class_date='$cDate'";
                                $Result=$conn->query($sQuery);
                                $userResult=$Result->fetch(PDO::FETCH_ASSOC);
                                if($userResult['member_mail'])
                                {
                                    echo "<b style='color:red;'>You have already registered for this class</b>";
                                }
                                else
                                {
    
                                    $passwordErr=$password="";
                                    if($_SERVER["REQUEST_METHOD"]=="POST")
                                    {
                                        if($_POST['txt_password']!=$_SESSION['password'])
                                        {
                                            $passwordErr="<b style='color:red;'>Wrong password. Try again</b>";
                                        }
                                        else
                                        {
                                            $password=$_POST['txt_password'];
                                        }
                                        if($passwordErr=="")
                                        {
                                            $sql='call insertOnlineClassReg(:email,:name,:date,:time)';
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bindParam(':email',$mail);
                                            $stmt->bindParam(':name',$name);
                                            $stmt->bindParam(':date',$date);
                                            $stmt->bindParam(':time',$time);
                                            $mail=$email;
                                            $name=$cName;
                                            $date=$cDate;
                                            $time=$startTime[1];
                                            $stmt->execute();
                                            $conn==null;
                                            echo "<b style='color:red;'>Registration successful</b>";
                                        }
                                        else{?>
                                                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                                    <h4>Enter your password to confirm registration</h4>
                                                    <input type="password" name="txt_password" placeholder="Your password" required><?php echo $passwordErr;?><br><br>
                                                    <button type="submit" class="button">Confirm</button>
                                                </form>
                                        <?php }
                                    }
                                    else{
                                    ?>
                                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                            <h4>Enter your password to confirm registration</h4>
                                            <input type="password" name="txt_password" placeholder="Your password" required><?php echo $passwordErr;?><br><br>
                                            <button type="submit" class="button">Confirm</button>
                                        </form>
                                <?php }
                                }
                                
                            }
                    ?>
                </div>
                </fieldset>
            <?php }?>
    <br>
    <?php include 'includes/footer.php' ?>
</body>
</html>