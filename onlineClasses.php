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
        .p1{
            text-align: center;
            font-family:Helvetica;
            color: #545454;
        }
        .footer
        {
            background-color: black;
        }
        .show{
            display: grid;
            grid-template-columns: auto auto auto;
            justify-items: center;
            margin-top: 5%;
            margin-bottom: 3%;
        }

        .polaroid {
            width: 430px;
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-bottom: 25px;
            border-radius: 25px;
        }
        .polaroid img{
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
        }
        .container {
            text-align: center;
            padding: 10px 20px;
        }
        
        .p2{
            font-family: sans-serif;
            line-height: 0.5;
        }
        .btn{
            width: 150px;
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
        .btn:hover{
            background-color: #000033;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
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
    <p class="p1">Our passionate team train you at home with a set of exercises to keep you healthly.<br>Join our classes through zoom and enjoy your session!</p>
    <div class="show">
        <?php
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sQuery="SELECT online_class.class_name,online_class.class_date,online_class.start_time,online_class.duration,online_class.imagepath,user_details.firstname,user_details.lastname
            FROM online_class,user_details
            WHERE online_class.coach_mail=user_details.email
            ORDER BY online_class.class_date ASC";
            $Result = $conn->query($sQuery);
            $count=1;
            while ($value=$Result->fetch())
            {
                if($value['class_date']>=strftime("%Y-%m-%d")){
                    $cName[$count]=$value['class_name'];
                    $cDate[$count]=$value['class_date'];
                    $cTime[$count]=$value['start_time'];?>
                <div class="polaroid">
                    <img src=<?php echo $value['imagepath'];?> style="width: 100%;">
                    <div class="container">
                        <p class="p2"><b><span id=<?php echo "classbtn".$count;?>><?php echo $value['class_name'];?></span></b></p>
                        <p style="display: none;" id=<?php echo "datebtn".$count;?>><?php echo $value['class_date'];?></p>
                        <p class="p2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg> <?php $dt=strtotime($value['class_date']);echo date("D",$dt)." ".date("d",$dt)." ".date("M",$dt)." ".date("Y",$dt);?></p>
                        <p class="p2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg> <span id=<?php echo "startbtn".$count;?>><?php echo $value['start_time'];?></span></p>
                        <p class="p2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
  <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
  <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
</svg> <?php echo $value['duration'];?></p>
                        <p class="p2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> <?php echo $value['firstname']." ".$value['lastname'];?></p>
                        <button id=<?php echo "btn".$count;?> class="btn" onclick="getbtnId(<?php echo 'btn'.$count;?>)">Join</button>
                        <button id=<?php echo "cancelbtn".$count;?> class="btn" style="display: none;" onclick="getCancel(<?php echo 'cancelbtn'.$count;?>)">Cancel</button>
                        <?php $count++;?>
                    </div>
                </div>
            <?php }
            }
        ?>
    </div>
    
    <?php
        
        if(!isset($_SESSION['username']))//user not logged in
        {
            for($i=1;$i<$count;$i++)
            {?>
                <script>
                   document.getElementById("btn".concat(<?php echo $i;?>)).onclick = function(){
                        location.href="login.php";
                    };
                </script>
            <?php }
        } ?>

        <?php
            if(isset($_SESSION['username']))//user logged in
            {
                for($i=1;$i<$count;$i++)
                {
                    $email = $_SESSION['username'];
                    $className = $cName[$i];
                    $classDate = $cDate[$i];
                    $classTime = $cTime[$i];
                    $Registered = "SELECT *
                    FROM online_class_registration
                    WHERE member_mail='$email'
                    AND class_name='$className'
                    AND class_date='$classDate' 
                    AND starting_time='$classTime'";
                    $Result1=$conn->query($Registered);
                    $userResult1=$Result1->fetch(PDO::FETCH_ASSOC);
                    if($userResult1['member_mail']) //user already registered for this class
                    {?>
                        <script>
                            document.getElementById("btn".concat(<?php echo $i;?>)).innerHTML="Joined";
                            document.getElementById("btn".concat(<?php echo $i;?>)).style.background="grey";
                            document.getElementById("btn".concat(<?php echo $i;?>)).disabled= true;
                            document.getElementById("cancelbtn".concat(<?php echo $i;?>)).style.display="inline";
                        </script>
                    <?php }
                }
            }
        ?>
        <script>
            function getbtnId(value)
            {
                let num=value.id.substring(value.id.length - 1); 
                document.getElementById(value.id).innerHTML="Joined";
                document.getElementById(value.id).style.background="grey";
                document.getElementById(value.id).disabled= true;
                document.getElementById("cancelbtn".concat(num)).style.display="inline";
                let className=document.getElementById("classbtn".concat(num)).innerHTML;
                let classDate=document.getElementById("datebtn".concat(num)).innerHTML;
                let classTime=document.getElementById("startbtn".concat(num)).innerHTML;
                //window.location.href='onlineClasses.php?className='+x+'&classDate='+y+'&time=' +z;
                $.ajax({
                    url:"onlineClassesAjax.php",
                    method: "POST",
                    data:{class_name:className,
                    class_date:classDate,
                class_time:classTime}
                });

            }
            function getCancel(value)
            {
                let num=value.id.substring(value.id.length - 1);
                document.getElementById("btn".concat(num)).innerHTML="Join";
                document.getElementById("btn".concat(num)).style.background="#0736a6";
                document.getElementById("btn".concat(num)).disabled= false;
                document.getElementById(value.id).style.display="none";
                let className=document.getElementById("classbtn".concat(num)).innerHTML;
                let classDate=document.getElementById("datebtn".concat(num)).innerHTML;
                let classTime=document.getElementById("startbtn".concat(num)).innerHTML;
                //window.location.href='onlineClasses.php?deleteClass='+x+'&deleteDate='+y+'&deleteTime=' +z;
                $.ajax({
                    url:"onlineClassesAjax.php",
                    method: "POST",
                    data:{c_name:className,
                    c_date:classDate,
                c_time:classTime}
                });
            }
        </script>
    <?php include 'includes/footer.php' ?> 
</body>
</html>