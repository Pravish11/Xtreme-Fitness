<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Xtreme Fitness</title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		body{
			background-image: url(images/reg_img1.jpg);
			background-position: center;
			background-size: cover;
			font-family: sans-serif;
			margin-top: 40px;
		}
		.regForm{
			width: 800px;
			background-color: rgb(0, 0, 0,0.8);
			margin: auto;
			color: #b8b8b8;
			padding: 10px 0 10px 0;
			text-align: center;
			border-radius: 15px 15px 0 0;
		}
		.main{
			background-color: rgb(0, 0, 0,0.7);
			margin: auto;
			width: 800px;
		}
		form{
			padding: 10px;
		}
		#name{
			width: 100%;
			height: 60px;
		}
		.name{
			margin-left: 25px;
			margin-top: 25px;
			width: 180px;
			color: white;
			font-size: 18px;
			font-weight: 700;
		}
		.firstname{
			position: relative;
			left: 200px;
			top: -28px;
			line-height: 25px;
			border-radius: 6px;
			padding: 0 22px;
			font-size: 16px;
		}
		.lastname{
			position: relative;
			left: 380px;
			top: -57px;
			line-height: 25px;
			border-radius: 6px;
			padding: 0 22px;
			font-size: 16px;
			color: #555;
		}
		.firstlabel{
			position: relative;
			color: #E5E5E5;
			text-transform: capitalize;
			left: 206px;
			top: -34px;
		}
		.lastlabel{
			position: relative;
			color: #E5E5E5;
			text-transform: capitalize;
			left:138px;
			top: -34px;
		}
		.input_space{
			position: relative;
			left: 200px;
			top: -28px;
			line-height: 25px;
			border-radius: 6px;
			padding: 0 22px;
			font-size: 16px;
		}
		.radio_btn{
			position: relative;
			left: 205px;
			top: -21px;
			margin: 0 15px 0 15px;
			border-radius: 50%;
			cursor: pointer;
			outline: none;
		}
		.radio_label{
			position: relative;
			color: #E5E5E5;
			text-transform: capitalize;
			left: 205px;
			top: -21px;
		}
		button{
			background-color: #b8b8b8;
			display: block;
			text-align: center;
			border-radius: 12px;
			border: 2px groove #366473;
			padding: 14px 110px;
			outline: none;
			cursor: pointer;
			margin-top: 10px;
			margin-left: 450px;
			font-weight: bold;
			font-size: 18px;

		}
        button:hover{
            background-color: #555;
            color: white;
        }

	</style>
</head>
<body>
	<?php
		$submission["firstname"]=$submission["lastname"]=$submission["mail"]=$submission["dob"]=$submission["address"]=$submission["gender"]=$submission["tel"]=$submission["type"]=$submission["password"]=$submission["confirm_pwd"]="";
		$error["firstname"]=$error["lastname"]=$error["mail"]=$error["dob"]=$error["address"]=$error["tel"]=$error["gender"]=$error["type"]=$error["pwd"]="";
		if ($_SERVER['REQUEST_METHOD']=="POST")
		{
			if (empty($_POST['txt_firstname']))
			{
				$error['firstname']="*First Name is required";
			}
			else
			{

				if (!preg_match("/^([A-Z]([A-Z]*[a-z]*[\-]*[\']*))+( [A-Z]([A-Z]*[a-z]*[\-]*[\']*))*$/", $_POST['txt_firstname']))
				{

					$error["firstname"]="*Your firstname should consist of one or more letters starting with an uppercase followed by any letter or (-)(')";
				}
				else
				{
					

					$submission["firstname"]=test_input($_POST['txt_firstname']);
				}
			}
			if (empty($_POST['txt_lastname']))
			{
				$error="*Last Name required";
			}
			else
			{
				if (!preg_match("/^[A-Z]([A-Z]*[a-z]*[\']*[\-]*)*$/", $_POST['txt_lastname']))
				{
					$error["lastname"]="*Last name should consist of only one word starting with uppercase followed by any letter or (-)(')";
				}
				else
				{
					$submission["lastname"]=test_input($_POST["txt_lastname"]);
				}
			}
			if (empty($_POST['txt_mail']))
			{
				$error["mail"]="*Email is required";
			}
			else
			{
				if (!filter_var($_POST['txt_mail'],FILTER_VALIDATE_EMAIL))
				{
					$error["mail"]="*Wrong email format";
				}
				else
				{
					$submission["mail"]=test_input($_POST['txt_mail']);
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
			if (!isset($_POST['txt_acc_type']))
			{
				$error['type']="*Account type is required";
			}
			else
			{
				$submission['type']=test_input($_POST['txt_acc_type']);
			}
			if (empty($_POST['txt_password']))
			{
				$error['pwd']="*Password is required";

			}
			else
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
			}
		} 
		function test_input($data) {
  			$data = trim($data);
  			$data = stripslashes($data);
  			$data = htmlspecialchars($data);
  			return $data;
  		}
	?>



	<?php 
		if ($_SERVER['REQUEST_METHOD']=="POST" && $error['firstname']=="" && $error['lastname']=="" && $error['mail']=="" && $error['dob']=="" && $error['address']=="" && $error['tel']=="" && $error['gender']=="" && $error['type']=="" && $error['pwd']=="" )
		{
			require_once "includes/db_connect.php";
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$sql = 'CALL insertUserDetails(:email,:lastname,:firstname,:dob,:address,:tel_no,:gender)';
			$stmt=$conn->prepare($sql);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':lastname',$lastname);
			$stmt->bindParam(':firstname',$firstname);
			$stmt->bindParam(':dob',$dob);
			$stmt->bindParam(':address',$address);
			$stmt->bindParam(':tel_no',$tel_no);
			$stmt->bindParam(':gender',$gender);

			$email=addslashes($submission['mail']);
			$lastname=($submission['lastname']);
			$firstname=($submission['firstname']);
			$dob=date("Y/m/d", strtotime($submission['dob']));
			$address=addslashes($submission['address']);
			$tel_no=$submission['tel'];
			$gender=($submission['gender']);
			$stmt->execute();

			$sql = 'CALL insertAccounts(:email,:password,:type)';
			$stmt=$conn->prepare($sql);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':password',$password);
			$stmt->bindParam(':type',$type);

			$password=password_hash($submission['password'], PASSWORD_DEFAULT);
			$type='member';
			$stmt->execute();

			$sql = 'CALL insertMembership(:email,:type,:membership_end)';
			$stmt=$conn->prepare($sql);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':type',$type);
			$stmt->bindParam(':membership_end',$member_end);

			$type=$submission['type'];
			$member_end=date("y-m-d");
			$stmt->execute();


			$conn==null;




			/*echo "<h2>Your Input was:</h2>";
			 echo "Name: " . $submission['firstname'] . " ".$submission['lastname'] ;
			 echo "<br>";
			 echo "Email: " . $submission['mail'];
			 echo "<br>";
			 echo "dob: ". $submission['dob'];
			 echo "<br>";
			 echo "address:" . $submission['address'];
			 echo "<br>";
			 echo "gender:" . $submission['gender'];
			 echo "<br>";
			 echo "tel no:" . $submission['tel'];
			 echo "<br>";
			 echo "password:" . $submission['password'];
			 echo "<br>";
			 echo "confirmed password:" . $submission['confirm_pwd'];*/
			 header("Location:login.php");
             die();
		}
		else
		{?>
			<div class="regForm">
				<h1>Become An Extremer</h1>
				<h5 style="color:red">*ALL FIELDS ARE REQUIRED*</h5>
			</div>
			<div class="main">
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<div id="name">
						<h2 class="name">Name</h2>
						<span style="color:red; position: relative; left:200px;top:-30px;"><h6><?php echo $error["firstname"]?></h6></span>
						<input class="firstname" type="text" name="txt_firstname" value="<?php echo $submission['firstname'];?>" size="20" required><br>
						<label class="firstlabel">First Names</label>
						<input class="lastname" type="text" name="txt_lastname" value="<?php echo $submission['lastname'];?>" size="20" required>
						<label class="lastlabel">Last Name</label>
						<span style="color:red; position:relative; top:-40px; left:200px;"><h6><?php echo $error["lastname"];?></h6></span>	
					</div>
					<h2 class="name">Mail: </h2>
					<input class="input_space" type="email" name="txt_mail" value="<?php echo $submission['mail'];?>" size="50" required>
					<span style="color:red;position: relative; left:-280px;"><?php echo $error["mail"];?></span>
					<h2 class="name">Date Of Birth: </h2>
					<input class="input_space" type="date" name="txt_dob" value="<?php echo $submission['dob'];?>" required>
					<span style="color:red; position: relative; left:-13px"><?php echo $error["dob"];?></span>
					<h2 class="name">Address: </h2>
					<input class="input_space" type="text" name="txt_address" value="<?php echo $submission['address'];?>" size="50" required>
					<span style="color:red; position: relative; left:-280px"><?php echo $error["address"];?></span>
					<h2 class="name">Telephone No: </h2>
					<input class="input_space" type="tel" name="txt_telephone" value="<?php echo $submission['tel'];?>" required>
					<span style="color:red; position: relative; left:-40px; font-weight: bold;"><?php echo $error["tel"];?></span>
					<h2 class="name">Gender: </h2>
					<label class="radio_label">Male</label><input class="radio_btn" type="radio" name="txt_gender" value="male" <?php if(isset($submission['gender']) && $submission['gender']=="male") echo "checked";?>>
					<label class="radio_label">Female</label><input class="radio_btn" type="radio" name="txt_gender" value="female" <?php if(isset($submission['gender']) && $submission['gender']=="female") echo "checked";?>>
					<label class="radio_label">Other</label><input class="radio_btn" type="radio" name="txt_gender" value="other" <?php if(isset($submission['gender']) && $submission['gender']=="other") echo "checked";?>>
					<span style="color:red; position: relative; left:200px; top:-20px;"><?php echo $error["gender"];?></span>
					<h2 class=name>Subscription Type: </h2>
					<label class="radio_label">Monthly</label><input class="radio_btn" type="radio" name="txt_acc_type" value="monthly" <?php if(isset($submission['type']) && $submission['type']=="monthly") echo "checked";?>>
					<label class="radio_label">Yearly</label><input class="radio_btn" type="radio" name="txt_acc_type" value="yearly" <?php if(isset($submission['type']) && $submission['type']=="yearly") echo "checked";?>>
					<span style="color:red; position: relative; left:200px; top:-20px;"><?php echo $error["type"];?></span>
					<h2 class='name'>Password: </h2>
					<input class="input_space" type="Password" name="txt_password" required value="<?php echo $submission['password'];?>">
					<h2 class="name">Confirm Password: </h2>
					<input class="input_space" type="Password" name="txt_confirm_password" value="<?php echo $submission['confirm_pwd'];?>" required>
					<span style="color:red; position: relative; left:200px; top:-30px;"><?php echo $error["pwd"];?></span>
					<button type='submit'>Register</button>
				</form>
			</div>
	<?php } ?>

</body>
</html>