<?php session_start(); 
$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/mystyle1.css?v=<?php echo time();?>">
	<title>Extreme Fitness</title>
	<style type="text/css">
		body{
			overflow-x: hidden;
		}
		.book_title{
			background: url(images/coach1.jpg);
			background-position: center;
			background-size: cover;
			height: 350px;
			position: relative;
			margin-bottom: 10px;
		}
		h2{
			color: white;
			position: absolute;
			left: 25%;
			top: 50%;
			bottom: -15px;
			font-family: sans-serif;
			font-size: 30px;

		}
		.info{ 
			float: left;
			background: url(images/coach3.jpg);
			background-size: cover;
			background-position: center;
			margin-bottom: 30px;
			
		}
		.info_element{
			float: left;
			background-color: rgb(0, 0, 0,0.4);
		}
		#info_img{
			background: url(images/coach2.jpg);
			background-size: cover;
			background-position: center;
			width: 410px;
			height: 500px;
			margin-right: 30px;
		}
		#info_text{
			background-color: darkred;
			width: 600px;
			height: 500px;
		}
		ol li{
			margin-top: 10px;
			font-family: sans-serif;
			font-weight: bold;
			font-size: 20px;
		}
		p{
			color: white;
		}
		h3{
			color: rgb(6,0,255);
		}
		form{
			font-family: sans-serif;
			padding: 10px;
		}
		fieldset{
			border: 2px solid;
			border-color: rgb(6,0,255);
			border-radius: 6px;
			margin: 20px 0;
			padding: 20px;
		}
		legend{
			font-weight: bold;
			color:currentColor;
			margin-left: 575px;	
			padding: 0 20px;
			text-transform: uppercase;
		}		

	</style>
</head>
<body>
	<?php
		$gender=$specialisation="";
		if ($_SERVER['REQUEST_METHOD']=="POST" && $_POST['txt_coach_name']=="")	//clicked on search button
		{
			require_once "includes/db_connect.php";
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="SELECT user.firstname,user.lastname,c.specialisation,user.gender FROM user_details user, accounts a, coach c WHERE user.email=a.email AND user.email=c.email AND a.acc_type='coach'";
			if (isset($_POST['txt_coach_gender']))
			{
				$gender=$_POST['txt_coach_gender'];
				$sql=$sql . " AND user.gender=:gender";
				
			}
			if (!empty($_POST['txt_specialisation']))
			{
				$specialisation=$_POST['txt_specialisation'];
				$sql=$sql. " AND c.specialisation=:specialisation";
				
			}
			$stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			if (isset($_POST['txt_coach_gender'])){$stmt->bindParam(':gender',$gender);}
			if (!empty($_POST['txt_specialisation'])){$stmt->bindParam(":specialisation",$specialisation);}
			$stmt->execute();
			$conn==null;
		} 
	?>

	<div class="book_title">
	<?php 
	$active_menu="";
	include "includes/menu.php";
	?>
	<h2>BOOK YOUR PERSONAL COACHING SESSION NOW!</h2>
	</div>
	<div class="info">
		<div class='info_element' id="info_img"></div>
		<div class="info_element" id="info_txt">
			
			<h3 style="font-family: sans-serif; text-align:center;">DO YOU NEED HELP?</h3>
			<p style="font-family:sans-serif; font-size: 17px; text-align:center;">Extreme Fitness comprises of professional coaches ready and waiting to help you achieve your goal. <br><br> Our coaches can do it all.<br><br>But they also have their speciality. So choose the one who you think will be the perfect match for you. <br><br> From <span style="font-weight: bold;">Yoga</span> to <span style='font-weight: bold;'> Weight lifting,</span> our coaches offer a variety of fields at which our gym members can choose to get better at. </p>
			<br><br>
			<p style="font-family:sans-serif; text-align:center;">So, do not waste time and get your personal coach now</p>
			<ol style='position: relative; left: 35%;'>
				<li>Choose your coach</li>
				<li>Choose your workout plan</li>
				<li>Choose your date and time</li>
				<li>Start chasing your dream</li>
			</ol>
			<h3 style="font-family:sans-serif;text-align: center; margin-top: 30px;">GET TO WORK!</h3>
		</div>
	</div> 

	<form method='post' action='<?php echo $_SERVER["PHP_SELF"];?>'>
		<fieldset>
			<legend>Choose Your Coach</legend>
			<label>NAME:</label>
			<input type="text" name="txt_coach_name" value=""><br>
			<label>Want to know more about our coaches? Let us help!</label><br>
			Filter(Optional):
			Male<input type="radio" name="txt_coach_gender" value="male">
			Female<input type="radio" name="txt_coach_gender" value="female">
			<select name="txt_specialisation">
				<option value="" selected>Specialisation</option>
				<option value="Yoga">Yoga</option>
				<option value="body building">Body Building</option>
			</select>
			<button type="submit">Search</button>
			<?php
				if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['txt_coach_name']=="")
				{?>
					<table border="1">
						<caption>Results</caption>
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Gender</th>
								<th>Specialisation</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row=$stmt->fetch(PDO::FETCH_ASSOC))
								{
									echo "<tr>";
									echo '<td>'. $row['firstname'] . '</td>';
									echo '<td>'. $row['lastname'] . '</td>';
									echo '<td>'. $row['gender'] . '</td>';
									echo '<td>'. $row['specialisation'] . '</td>';
								} 
							?>
						</tbody>
					</table>
				<?php } 
			?>
		</fieldset>
	</form>
	<form method='post' action='<?php echo $_SERVER["PHP_SELF"];?>'>
		<fieldset>
			<legend>Choose your workout</legend>
			<label>Workout Name:</label>
			<input type="text" name="workout_txt" value=""><br>
			<label>Want more details about the workout plans? Let us help!</label><br>
			<label>Filter(Optional:</label>
			<select name="txt_body_part">
				<option value="" selected>Body Part</option>
				<option value="upper">Upper Body</option>
				<option value="lower">Lower Body</option>
				<option value="full">Full Body</option>
			</select>
			<button type="submit">Search</button>
		</fieldset>
	</form>
	
	<br><br><br>
	<?php include "includes/footer.php"; ?>
</body>
</html>