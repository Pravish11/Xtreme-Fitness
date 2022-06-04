<?php 
	session_start();
	$email=$_SESSION['username'];
	require_once "includes/db_connect.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/mystyle1.css?v=<?php echo time();?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
	<script>
		$(document).ready(function(){

			//hiding all set buttons
			$('.set_btn').hide();
			//hiding all radio buttons and their labels
			$('.radio_btn').hide();
			$('.radio_label').hide();

			//events when edit button for firstname field is clicked
			$("#firstname_edit").click(function(){
				$(".edit_btn").hide();
				$('#firstname_set').show();
				$('#firstname_space').prop('disabled',false);
				$("#save_btn").prop('disabled',true);
			});
			//events when set button for firstname is clicked
			$("#firstname_set").click(function(){
				var pattern=/^([A-Z]([A-Z]*[a-z]*[\-]*[\']*))+( [A-Z]([A-Z]*[a-z]*[\-]*[\']*))*$/;
				var fname=$('#firstname_space').val();
				if (fname=="")
				{
					$('#firstname_space').css("border-bottom",'2px solid red');
					$('#firstname_error').text("Please fill out this field.")
					$("#firstname_error").show();
				}
				else
				{
					if (!pattern.test(fname))
					{
						$('#firstname_space').css("border-bottom",'2px solid red');
						$('#firstname_error').text("First Names can contain at least one word starting with an uppercase and may only contain letters and characters (-)(')");
						$("#firstname_error").show();
						
						
					}
					else
					{
						$(this).hide();
						$("#firstname_error").hide();
						$('#firstname_space').removeAttr('style');
						$('.edit_btn').show();
						$('#firstname_space').prop("disabled",true);
						$('#save_btn').prop("disabled",false);
					}
				}
			});

			//lastname edit button is clicked
			$("#lastname_edit").click(function(){
				$(".edit_btn").hide();
				$("#lastname_set").show();
				$("#lastname_space").prop("disabled",false);
				$("#save_btn").prop("disabled",false);
			});
			//lastname set button is clicked
			$("#lastname_set").click(function(){
				var pattern=/^[A-Z]([A-Z]*[a-z]*[\']*[\-]*)*$/;
				var lastname=$('#lastname_space').val();
				if (lastname=="")
				{
					$('#lastname_space').css("border-bottom",'2px solid red');
					$('#lastname_error').text("Please fill out this field.")
					$("#lastname_error").show();
				}
				else
				{
					if (!pattern.test(lastname))
					{
						$('#lastname_space').css("border-bottom",'2px solid red');
						$('#lastname_error').text("Your Last Name should contain only one word starting with an uppercase which can contain characters like (-)(')");
						$("#lastname_error").show();
						
					}
					else
					{
						$(this).hide();
						$("#lastname_error").hide();
						$('#lastname_space').removeAttr('style');
						$('.edit_btn').show();
						$('#lastname_space').prop("disabled",true);
						$('#save_btn').prop("disabled",false);
					}
				}
			});
			//dob edit button is clicked
			$("#dob_edit").click(function(){
				$(".edit_btn").hide();
				$('#dob_set').show();
				$('#dob_space').prop('disabled',false);
				$("#save_btn").prop('disabled',true);
			});
			//dob set button is clicked
			$("#dob_set").click(function(){
				//format mm/dd/yy
				var entered_value=$("#dob_space").val();
				parts=entered_value.split('-');
				var entered_date=new Date(parts[0],parts[1]-1,parts[2]); //creating date object with entered date from user
				var current_date=new Date(); //current date
				if (current_date<=entered_date)
				{
					$('#dob_space').css("border-bottom",'2px solid red');
					$('#dob_error').text("Please select a valid date");
					$("#dob_error").show();
				}
				else
				{
						$(this).hide();
						$("#dob_error").hide();
						$('#dob_space').removeAttr('style');
						$('.edit_btn').show();
						$('#dob_space').prop("disabled",true);
						$('#save_btn').prop("disabled",false);
				}

			});
			//address edit button is clicked
			$('#address_edit').click(function(){
				$(".edit_btn").hide();
				$('#address_set').show();
				$('#address_space').prop('disabled',false);
				$("#save_btn").prop('disabled',true);
			});
			//address set button is clicked
			$("#address_set").click(function(){
				var address=$('#address_space').val();
				if (address=="")
				{
					$('#address_space').css("border-bottom",'2px solid red');
					$('#address_error').text("Please fill out this field");
					$("#address_error").show();
				}
				else
				{
					$(this).hide();
					$("#address_error").hide();
					$('#address_space').removeAttr('style');
					$('.edit_btn').show();
					$('#address_space').prop("disabled",true);
					$('#save_btn').prop("disabled",false);	
				}
			});
			//tel edit button is clicked
			$('#tel_edit').click(function(){
				$(".edit_btn").hide();
				$('#tel_set').show();
				$('#tel_space').prop('disabled',false);
				$("#save_btn").prop('disabled',true);
			});
			//tel set button is clicked
			$('#tel_set').click(function(){
				var pattern=/^[5][0-9]{7}$/;
				var tel=$('#tel_space').val();
				if (tel=="")
				{
					$('#tel_space').css("border-bottom",'2px solid red');
					$('#tel_error').text("Please fill out this field");
					$("#tel_error").show();
				}
				else
				{
					if(!pattern.test(tel))
					{
						$('#tel_space').css("border-bottom",'2px solid red');
						$('#tel_error').text("Telephone No must match the following format: (5)(1234567)");
						$("#tel_error").show();
					}
					else
					{
						$(this).hide();
						$("#tel_error").hide();
						$('#tel_space').removeAttr('style');
						$('.edit_btn').show();
						$('#tel_space').prop("disabled",true);
						$('#save_btn').prop("disabled",false);
					}
				}
			});
			//gender edit button is clicked
			$('#gender_edit').click(function(){
				$(".edit_btn").hide();
				$('#gender_set').show();
				$('.gender_label').show();
				$('.gender_btn').show();
				$('#gender_value').hide();
				$("#save_btn").prop('disabled',true);
			});
			//gender set button is clicked
			$('#gender_set').click(function(){
				var value=$('input[name="txt_gender"]:checked').val();
				$('#gender_value').text(value);
				$('#gender_value').show();
				$('.gender_label').hide();
				$('.gender_btn').hide();
				$('.edit_btn').show();
				$('#gender_set').hide();
				$('#save_btn').prop('disabled',false);
			});
			//type edit button is clicked
			$('#type_edit').click(function(){
				$(".edit_btn").hide();
				$('#type_set').show();
				$('.type_label').show();
				$('.type_btn').show();
				$('#type_value').hide();
				$("#save_btn").prop('disabled',true);
			});
			//type set button is clicked
			$('#type_set').click(function(){
				var value=$('input[name="txt_type"]:checked').val();
				$('#type_value').text(value);
				$('#type_value').show();
				$('.type_label').hide();
				$('.type_btn').hide();
				$('.edit_btn').show();
				$('#type_set').hide();
				$('#save_btn').prop('disabled',false);
			});

			//hide cancel password change button
			$('#cancel_pwd_btn').hide();
			$('#confirm_pwd_btn').hide();
			$('.pwd_label').hide();
			$('.pwd_space').hide();
			$('.pwd_icon').hide();
			$("#pwd_error").hide();
			var error=false;
			
			//when change pwd button is clicked
			$('#change_pwd_btn').click(function(){
				$('#cancel_pwd_btn').show();
				$('#confirm_pwd_btn').show();
				$('.pwd_label').show();
				$('.pwd_space').show();
				$('#change_pwd_btn').hide();
			});
			//when cancel pwd button is clicked
			$("#cancel_pwd_btn").click(function(){
				$('#cancel_pwd_btn').hide();
				$('#confirm_pwd_btn').hide();
				$('.pwd_label').hide();
				$('.pwd_space').val("");
				$('.pwd_space').removeAttr('style');
				$('.pwd_icon').hide();
				$('.pwd_space').hide();
				$('#change_pwd_btn').show();
				$("#old_pwd_error").hide();
			});
			//when old password fields loses focus
			$('#old_pwd_space').blur(function(){
				var old_pwd=$("#old_pwd_space").val();
				$.post('check_pwd.php', {old_password: old_pwd}, function(data){
					if(data)
					{
						$('#old_pwd_space').css("border-bottom",'2px solid lightgreen');
						$("#old_pwd_error").hide();
					}
					else
					{
						$('#old_pwd_space').css("border-bottom","2px solid red");
						$("#old_pwd_error").text("Password does not match");
						$("#old_pwd_error").show();
					}

				})	
			});
			//when confirm password field loses focus
			$('#confirm_pwd_space').keyup(function(){
				var new_pwd=$('#new_pwd_space').val();
				var confirmed_pwd=$("#confirm_pwd_space").val();
				if (confirmed_pwd!==new_pwd)
				{
					$('#confirm_pwd_space').css('border-bottom','2px solid red');
					$('#correct_icon').hide();
					$('#error_icon').show();
				}
				else
				{
					$('#confirm_pwd_space').css('border-bottom','2px solid lightgreen');
					$('#error_icon').hide();
					$('#correct_icon').show();
				}
			});
			//when confirm password button is clicked
			$('#confirm_pwd_btn').click(function(){
				
			});
		});
	</script>
	<title>Extreme Fitness</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}
		.header{
		
			text-align: center;
			width: 800px;
			margin: auto;
			padding: 15px;
			background: rgb(255, 255, 255,0.3);
		}
		.details{
			
			margin: auto;
			width: 800px;
			background: rgb(255, 255, 255,0.4);
			padding: 15px;
		}
		.name{
			margin-top: 20px;
			font-weight: bold;
			font-size: 22px;
		}
		.input_space{
			position: relative;
			left: 270px;
			top: -28px;
			width: 350px;
			line-height: 25px;
			font-size: 21px;
			border: none;
			outline: none;
			border-bottom: 2px solid black;
			background: rgb(255, 255, 255,0.4);
		}
		.radio_label{
			position: relative;
			font-size: 20px;
			left: 270px;
			top: -23px;
			text-transform: capitalize;
			
		}
		.radio_btn{
			position: relative;
			left: 270px;
			top: -23px;
			margin-right: 15px;
			margin-left: 5px;
			cursor: pointer;
		}
		.big_btn{
			width: 200px;
			height: 50px;
			border: 2px solid black;
			border-radius: 6px;
			cursor: pointer;
			font-size: 18px;
			font-weight: bold;
			text-transform: uppercase;
		}
		.btns{
			width: 800px;
			background: rgb(255, 255, 255,0.3);
			margin: auto;
			padding: 20px;
		}
		.edit_btn, .set_btn{
			width: 50px;
			height: 25px;
			position: relative;
			left: 90%;
			top: -60px;
			text-transform: uppercase;
			font-size: 15px;
			font-weight: bold;
			border: none;
			outline: none;
			background: transparent;
			text-decoration: underline;
			color: darkblue;
			cursor: pointer;
		}
		.pwd_btn{
			/*weight: 100px;*/
			height: 25px;
			position: relative;
			left: 30%;
			margin-top: 10px;
			border: none;
			background: transparent;
			outline: none;
			color: darkblue;
			text-decoration: underline;
			font-size: 16px;
			text-transform: uppercase;
			font-weight: bold;
			cursor: pointer;
		}
		input:disabled{
			color: black;
			background: transparent;
			border: none;
		}
		#save_btn{
			border: 1px solid rgb(6, 0, 255);
			box-shadow: 0 0 5px rgb(6, 0, 255);
			background: rgb(6, 0, 255,0.5);
		}
		#save_btn:hover{
			background: rgb(6, 0, 255,0.9);
			transition: 1.5s;
		}
		#sub_btn{
			border: 1px solid rgb(255,0,0);
			box-shadow: 0 0 5px rgb(255, 0, 0);
			background: rgb(255, 0, 0,0.5);
		}
		#sub_btn:hover{
			background: rgb(255, 0, 0,0.9);
			transition: 1.5s;
		}
		#cancel_btn{
			background: rgb(255, 255, 255,0.5);
			border: 1px solid rgb(255, 255, 255);
			box-shadow: 0 0 5px rgb(255, 255, 255);
		}
		#cancel_btn:hover{
			background: rgb(255, 255, 255,0.9);
			transition: 1.5s;
		}
		#save_btn:disabled, #sub_btn:disabled{
			background: grey;
			border: 2px solid black;
			box-shadow: none;
			cursor: default;
		}
		.error_msg{
			color: red;
			display: block;
			font-weight: bold;
			position: relative;
			left: 270px;
			top: -50px;
			font-size: 14px;
			width: 500px;
		}
		.pwd_icon{
			position: relative;
			left: 37%;
			top: -25px;
		}
	</style>
</head>
<body class='bodystyle'>
	<?php 
		$activemenu='login';
		include ("includes/menu.php");


		$sQuery="SELECT * FROM user_details WHERE email='$email'";
		$Result=$conn->query($sQuery);
		$userDetails=$Result->fetch();

		$sQuery="SELECT * FROM membership WHERE email='$email'";
		$Result=$conn->query($sQuery);
		$membership=$Result->fetch();

		$sQuery="SELECT * FROM accounts WHERE email='$email'";
		$Result=$conn->query($sQuery);
		$account=$Result->fetch();

		$current_date=date('Y-m-d');
		$membership_end=date('Y-m-d',strtotime($membership['membership_end']));

		if ($_SERVER['REQUEST_METHOD']=='POST')
		{

		}

	if ($current_date<$membership_end)
	{
		echo "<p style='font-size: 40px; color:white; position:relative; top:30px;'>Your current subscription ends on <span 	style='font-weight: bold;'><i>$membership_end</i></span></p>";
	}
	else
	{
		echo "<p style='font-size: 40px; color:white; position:relative; top:30px;'>Your current subscription ended on <span 	style='font-weight: bold;'><i>$membership_end</i></span></p>";
	}
	?>
	<div class="header" style='margin-top: 100px;'><h1>Your Details</h1></div>
	<form class='details' autocomplete="off">
		<h3 class='name'>Firstname(s):</h3>
		<input type="text" class='input_space' id='firstname_space' name="txt_firstname" value='<?php echo $userDetails["firstname"]; ?>' disabled><br>
		<button class='set_btn' id='firstname_set' type="button">Set</button>
		<button type='button' class='edit_btn' id='firstname_edit'>Edit</button>
		<span class="error_msg" id="firstname_error"></span>

		<h3 class='name'>Lastname:</h3>
		<input type="text" class='input_space' id='lastname_space' name="txt_lastname" value='<?php echo $userDetails["lastname"]; ?>' disabled><br>
		<button class='set_btn' id='lastname_set' type="button">Set</button>
		<button type='button' class='edit_btn' id='lastname_edit'>Edit</button>
		<span class="error_msg" id="lastname_error"></span>


		<h3 class='name'>Date Of Birth:</h3>
		<input type="date" class='input_space' id="dob_space" name="txt_dob" value='<?php echo $userDetails["dob"]; ?>' placeholder='yy/mm/dd' disabled><br>
		<button class='set_btn' id='dob_set' type="button">Set</button>
		<button type='button' class='edit_btn' id='dob_edit'>Edit</button>
		<span class="error_msg" id="dob_error"></span>

		<h3 class='name'>Address</h3>
		<input type="text" class='input_space' id='address_space' name="txt_address" value='<?php echo $userDetails["address"]; ?>' disabled><br>
		<button class='set_btn' id='address_set' type="button">Set</button>
		<button type='button' class='edit_btn' id='address_edit'>Edit</button>
		<span class="error_msg" id="address_error"></span>

		<h3 class='name'>Telephone No:</h3>
		<input type="text" class='input_space' id='tel_space' name="txt_tel" value='<?php echo $userDetails['tel_no']; ?>' disabled><br>
		<button class='set_btn' id='tel_set' type="button">Set</button>
		<button type='button' class='edit_btn' id='tel_edit'>Edit</button>
		<span class="error_msg" id="tel_error"></span>

		<h3 class='name'>Gender:</label></h3>
		<p class='input_space' id='gender_value' style="background: transparent; border:none; text-transform: capitalize;"><?php echo $userDetails['gender']; ?></p>
		<label class='radio_label gender_label'>Male</label><input type="radio" class='radio_btn gender_btn'  name="txt_gender" value='male' <?php if ($userDetails['gender']=='male') echo 'checked'; ?> >
		<label class='radio_label gender_label'>Female</label><input type="radio" class='radio_btn gender_btn'  name="txt_gender" value='female' <?php if ($userDetails['gender']=='female') echo 'checked'; ?>>
		<label class='radio_label gender_label'>Other</label><input type="radio" class='radio_btn gender_btn'  name="txt_gender" value='other' <?php if ($userDetails['gender']=='other') echo 'checked'; ?> > <br>
		<button class='set_btn' id='gender_set' type="button">Set</button>
		<button type='button' class='edit_btn' id='gender_edit'>Edit</button>

		<h3 class='name'>Membership Type: </h3>
		<?php
			if ($current_date<$membership_end)
			{ ?>
				<p class='input_space' id='type_value' style="background: transparent; border:none; text-transform: capitalize;"><?php echo $membership['type']; ?>    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-lock-fill" viewBox="0 0 16 16">
  				<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
				</svg></p>
			<?php 
			}
			else
			{ ?>
				<p class='input_space' id='type_value' style="background: transparent; border:none; text-transform: capitalize;"><?php echo $membership['type']; ?></p>
				<label class='radio_label type_label' >Monthly</label><input type="radio" class='radio_btn type_btn'  name="txt_type" value='monthly' <?php if($membership['type']=="monthly") echo "checked"; ?> >
				<label class='radio_label type_label'>Yearly</label><input type="radio" class='radio_btn type_btn'  name="txt_type" value='yearly' <?php if($membership['type']=="yearly") echo "checked"; ?> ><br>	
				<button class='set_btn' id='type_set' type="button">Set</button>
				<button type='button' class='edit_btn' id="type_edit">Edit</button>
				<?php 
			} 
		?>
		
		
		<button type='button' class='pwd_btn' id='change_pwd_btn'>Change Password</button>
		<button type='button' class='pwd_btn' id='cancel_pwd_btn'>Cancel</button>
		<button type='button' class='pwd_btn' id='confirm_pwd_btn' style='position: relative; left: 40%;'>Confirm</button>
		<h3 class='name pwd_label' id="old_pwd_label">Old Password:</h3>
		<input type="Password" class='input_space pwd_space' id='old_pwd_space' style='border-bottom: 1px solid black' name="txt_old_password"><br>
		<span class='error_msg' id="old_pwd_error" style='position: relative; top: -20px; font-size:16px;'></span> 

		<h3 class='name pwd_label' id="new_pwd_label">New Password:</h3>
		<input type="Password" class='input_space pwd_space' id='new_pwd_space' style='border-bottom: 1px solid black' name="txt_new_password"><br>

		<h3 class='name pwd_label' id='confirm_pwd_label'>Confirm New Password:</h3>
		<input type="Password" class='input_space pwd_space' id='confirm_pwd_space' style='border-bottom: 1px solid black' name="txt_confirm_password"><svg class="pwd_icon" id='error_icon'xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
  		<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>	
		</svg>
		<svg class="pwd_icon" id='correct_icon' xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="lightgreen" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
  		<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
		</svg><br>

		<button type='submit' class='big_btn' id='save_btn' style='position: relative; left:37%;' >Save Changes</button>
	</form>
	<div class='btns'>
		<a href="deleteAccount.php"><button class='big_btn' id='sub_btn'>Delete Account</button></a>
		<a href="home.php"><button class='big_btn' id='cancel_btn' style='position: relative; left:350px'>Cancel</button></a>
	</div><br>
	<p style="color:white; font-size: 20px;"><span style='font-weight: bold; color:red'>NOTE:</span>You can change your subscription type or delete your account only <span style='text-transform: uppercase; font-weight: bold; text-decoration: underline;'>after</span> your subscription has ended.</p>

	
	<br><br><br>
	<?php include "includes/footer.php"; ?>
</body>
</html>