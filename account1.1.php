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
        .background{
            background-color: rgb(0, 0, 0,0.7);
        }
        input{
            border: none;
            font-size: 20px;
	        border-bottom: 1px solid white;
            padding: 0px 22px;
        }
        form{
            
			margin: auto;
			width: 800px;
            text-align: center;
            font-family: sans-serif;
            color: white;
        }
        table{
            margin-left: 20%;
        }
        td{
            padding: 5px;
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
.button1{
    background-color: red;
    margin:4%;
}
.button1:hover{
    background-color: #FF6347;
}
    </style>
</head>
<body class="bodystyle">
    <?php
        $activemenu="login";
        include('includes/menu.php');
        $submission["firstname"]=$submission["lastname"]=$submission["mail"]=$submission["dob"]=$submission["address"]=$submission["gender"]=$submission["tel"]=$submission["type"]=$submission["password"]=$submission["confirm_pwd"]="";
		$error["firstname"]=$error["lastname"]=$error["mail"]=$error["dob"]=$error["address"]=$error["tel"]=$error["gender"]=$error["type"]=$error["pwd"]="";
        $pwdMsg=$changes="";
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            if (empty($_POST['txt_fname']))
			{
				$error['firstname']="*First Name is required";
			}
			else
			{

				if (!preg_match("/^([A-Z]([A-Z]*[a-z]*[\-]*[\']*))+( [A-Z]([A-Z]*[a-z]*[\-]*[\']*))*$/", $_POST['txt_fname']))
				{

					$error["firstname"]="*Your firstname should consist of one or more letters starting with an uppercase followed by any letter or (-)(')";
				}
				else
				{
					

					$submission["firstname"]=test_input($_POST['txt_fname']);
				}
			}
			if (empty($_POST['txt_lname']))
			{
				$error["lastname"]="*Last Name required";
			}
			else
			{
				if (!preg_match("/^[A-Z]([A-Z]*[a-z]*[\']*[\-]*)*$/", $_POST['txt_lname']))
				{
					$error["lastname"]="*Last name should consist of only one word starting with uppercase followed by any letter or (-)(')";
				}
				else
				{
					$submission["lastname"]=test_input($_POST["txt_lname"]);
				}
			}
			if (empty($_POST['txt_dob']))
			{
				$error["dob"]="*Date Of Birth Required.";
			}
			else
			{
				$submission["dob"]=test_input($_POST['txt_dob']);
			}
			if (empty($_POST["txt_address"]))
			{
				$error['address']="*Address is required";
			}
			else
			{
				$submission['address']=test_input($_POST['txt_address']);
			}
			if (empty($_POST['txt_telephone']))
			{
				$error['tel']="*Telephone Number is required";
			}
			else
			{
				if (!preg_match("/^[5][0-9]{7}$/",$_POST['txt_telephone']))
				{
					$error['tel']="*Telephone Number must match the following format ((5)1234567)";
				}
				else
				{
					$submission['tel']=test_input($_POST['txt_telephone']);
				}
			}
            if (!isset($_POST['txt_gender']))
			{
				$error['gender']="*Gender is required";
			}
			else
			{
				$submission['gender']=test_input($_POST['txt_gender']);
			}	
			if ($value['membership_end']<strftime("%Y-%m-%d"))
			{
				$submission['type']=test_input($_POST['txt_sub']);
			}
            if(!empty($_POST['txt_password']))
			{
				$submission['password']=test_input($_POST['txt_password']);
				if (empty($_POST['txt_confirm_password']))
				{
					$error['pwd']="*Please confirm your password";
				}
				else
				{
					if (strcmp($submission['password'],$_POST['txt_confirm_password'])!=0)
					{
						$error['pwd']="*Passwords must match";
					}
					else
					{
						$submission['confirm_pwd']=test_input($_POST['txt_confirm_password']);
					}
				}
                if(empty($_POST['txt_old_password']))
                {
                    $error['pwd']="*Input old password";
                }
                elseif($_SESSION['password']!=$_POST['txt_old_password'])
                {
                    $error['pwd']="*Please verify your password";
                }
			}
            
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($_SERVER['REQUEST_METHOD']=="POST" && $error['firstname']=="" && $error['lastname']=="" && $error['dob']=="" && $error['address']=="" && $error['tel']=="" && $error['gender']=="" && $error['type']=="" && $error['pwd']=="" )
        {
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            if($value['membership_end']<strftime("%Y-%m-%d")){
                $sQuery='CALL updateMembership(:email,:type)';
                $stmt=$conn->prepare($sQuery);
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':type',$type);
                $email=$_SESSION['username'];
                $type=$submission['type'];
                $stmt->execute();
            }

            $sQuery='CALL updateUserDetails(:current_email,:lastname,:firstname,:dob,:address,:tel_no,:gender)';
            $stmt=$conn->prepare($sQuery);
            $stmt->bindParam(':current_email',$current_email);
			$stmt->bindParam(':lastname',$lastname);
			$stmt->bindParam(':firstname',$firstname);
			$stmt->bindParam(':dob',$dob);
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':tel_no',$tel_no);
			$stmt->bindParam(':gender',$gender);

            $current_email=$_SESSION['username'];
            $lastname=($submission['lastname']);
			$firstname=($submission['firstname']);
			$dob=date("Y/m/d", strtotime($submission['dob']));
			$address=addslashes($submission['address']);
			$tel_no=$submission['tel'];
			$gender=($submission['gender']);
			$stmt->execute();
            $changes= '<h4 style="color:white">Changes saved</h4>';
            if(!empty($_POST['txt_password']))
            {
                $sQuery='CALL updateAccount(:email,:password)';
                $stmt=$conn->prepare($sQuery);
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':password',$pwd);
                $email=$_SESSION['username'];
                $pwd=password_hash($submission['password'], PASSWORD_DEFAULT);
                $stmt->execute();
                $pwdMsg= '<h4 style="color:white">Password changed</h4>';
                header("Location:logout.php");
                die();
            }
        }
        ?>
        <br>
    <div class="background";>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>"><br><br>
    <h1>Account Details</h1>
    <hr>
    <br>
    <?php 
        $email=$_SESSION['username'];
        
        $sQuery = "SELECT user_details.firstname, user_details.lastname,user_details.dob, user_details.address, user_details.tel_no, user_details.gender, membership.type,membership.membership_end
        FROM user_details,membership
        WHERE user_details.email=membership.email
        AND user_details.email='$email'";
        $Result=$conn->query($sQuery);
        while($value= $Result->fetch())
        {
    ?>
        <table>
            <tr>
                <td><b>First Name:</b></td>
                <td><input type="text" name="txt_fname" value="<?php echo $value['firstname'];?>"></td>
            </tr><span style="color:red;"><h6><?php echo $error["firstname"]?></h6></span>
            <tr>
                <td><b>Last Name:</b></td>
                <td><input type="text" name="txt_lname" value="<?php echo $value['lastname'];?>"></td>
            </tr><span style="color:red;"><h6><?php echo $error["lastname"]?></h6></span>
            <tr>
                <td><b>Date of Birth:</b></td>
                <td><input type="date" name="txt_dob" value="<?php echo $value['dob'];?>"></td>
            </tr><span style="color:red;"><h6><?php echo $error["dob"]?></h6></span>
            <tr>
                <td><b>Address:</b></td>
                <td><input type="text" name="txt_address" value="<?php echo $value['address'];?>"></td>
            </tr><span style="color:red;"><h6><?php echo $error["address"]?></h6></span>
            <tr>
                <td><b>Telephone No:</b></td>
                <td><input type="tel" name="txt_telephone" value="<?php echo $value['tel_no'];?>"></td>
            </tr><span style="color:red;"><h6><?php echo $error["tel"]?></h6></span>
            <tr>
                <td><b>Gender:</b></td>
                <td><input type="radio" name="txt_gender" value="male" <?php if($value['gender']=="male") echo "checked";?> >Male
                <input type="radio" value="female" name="txt_gender" <?php if($value['gender']=="female") echo "checked";?> >Female
                <input type="radio" value="other" name="txt_gender" <?php if($value['gender']=="other") echo "checked";?> >Other</td>
            <?php if($value['membership_end']<strftime("%Y-%m-%d")){?>
            <tr>
                <td><b>Subscription Type:</b></td><!--si panlor arriv membership end no edit allowed ni delete-->
                <td><input type="radio" name="txt_sub" value="monthly" <?php if($value['type']=="monthly") echo "checked";?>>Monthly
                <input type="radio" name="txt_sub" value="yearly" <?php if($value['type']=="yearly") echo "checked";?>>Yearly
                </td>
            </tr>
            <?php }?>
            <tr>
                <td><b>Old Password:</b></td>
                <td><input type="password" name="txt_old_password"></td>
            </tr>
            <tr>
                <td><b>New Password:</b></td>
                <td><input type="password" name="txt_password"></td>
            </tr>
            <tr>
                <td><b>Confirm password:</b></td>
                <td><input type="password" name="txt_confirm_password"></td>
            </tr><span style="color:red;"><h6><?php echo $error["pwd"]?></h6></span>
        </table>
        <?php echo $pwdMsg;echo $changes;?>
        <button type="submit">Save changes</button>
        <br><br>
    </form>
    <?php if($value['membership_end']<strftime("%Y-%m-%d")){?>
    <a href="deleteAccount.php"><button class="button1">Delete Account</button></a>
    <?php }?>
    <a href="home.php?referer=login"><button>Cancel</button></a>
    
    <br><br>
    </div>
    <br><br>
    <?php
        }
        include('includes/footer.php');
    ?>
</body>
</html>