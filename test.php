<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
.image{
        width: 60px;
		    height: 60px;
      }
      fieldset{
        width: 20%;
      }
      textarea{
        border: none;
        resize: none;
        font-family: sans-serif;
        font-size: medium;
        color: black;
      }
      .textareaReview{
        height: 30px;
        width: 100%;
        border: none;
        border-bottom: 2px solid #aaa;
        background-color: transparent;
        margin-bottom: 10px;
        resize: none;
        outline: none;
      }
      .container { 
        height: 20px;
        position: relative;
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
        margin-left: 40%;
      }
      .button:hover{
    background-color: #000033;
}
      .error {color: #FF0000;}   
      .row {
  display: flex;
}

/* Create three equal columns that sits next to each other */
.column {
  flex: 33.33%;
  padding: 5px;
}

.rating {
    display: flex;
    margin-top: -10px;
    flex-direction: row-reverse;
    margin-left: 40%;
    float: left;
    
}

.rating>input {
    display: none;
}

.rating>label {
    position: relative;
    width: 19px;
    font-size: 25px;
    color: red;
    cursor: pointer;
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0;
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important;
}

.rating>input:checked~label:before {
    opacity: 1;
}

.rating:hover>input:checked~label:before {
    opacity: 0.4;
}

  </style>
</head>
<body>
  




<div style="margin-left:5%;">
<h2 style="text-align: center; font-size:200%; font-family:sans-serif;">WHAT PEOPLE SAY</h2>

<?php
require_once "includes/db_connect.php";
  $sQuery = "SELECT review.date_posted,review.rating,review.comment,user_details.firstname,user_details.lastname
  FROM review,user_details
  WHERE review.member_mail=user_details.email AND flag='0' AND ban='0'
  ORDER BY rating DESC
  LIMIT 3";
  $Result=$conn->query($sQuery);
  $count=0;
  while($value=$Result->fetch())
  {
      $getname[$count]=$value['firstname']." ".$value['lastname'];
      $getdate[$count]=$value['date_posted'];
      $getrating[$count]=$value['rating'];
      $getcomment[$count]=$value['comment'];
      $count=$count+1;
  }?>
  <div class="row">
    <div class="column">
    <fieldset>
    <legend style="font-size: 200%;text-align:center;">"</legend>
    <div class="rating"> 
    <input type="radio" name="rating0" value="5" id="5" <?php if($getrating[0]=="5") echo "checked";?>><label for="5">☆</label> 
    <input type="radio" name="rating0" value="4" id="4" <?php if($getrating[0]=="4") echo "checked";?>><label for="4">☆</label> 
    <input type="radio" name="rating0" value="3" id="3" <?php if($getrating[0]=="3") echo "checked";?>><label for="3">☆</label> 
    <input type="radio" name="rating0" value="2" id="2" <?php if($getrating[0]=="2") echo "checked";?>><label for="2">☆</label> 
    <input type="radio" name="rating0" value="1" id="1" <?php if($getrating[0]=="1") echo "checked";?>><label for="1">☆</label> 
    </div><br>
    <textarea rows="5" cols="50" disabled><?php echo $getcomment[0];?></textarea>
    <table>
      <tr>
        <td rowspan="2"><img src="images/person2.png" class="image"></td>
        <td style="font-size: 15px;"><b><?php echo $getname[0];?></b></td>
      </tr>
      <tr>
        <td style="font-size: 15px;"><?php echo $getdate[0];?></td>
      </tr>
    </table>
  </fieldset>
    </div>
    <div class="column">
  <fieldset>
    <legend style="font-size: 200%;text-align:center;">"</legend>
    <div class="rating"> 
    <input type="radio" name="rating1" value="5" id="5" <?php if($getrating[1]=="5") echo "checked";?>><label for="5">☆</label> 
    <input type="radio" name="rating1" value="4" id="4" <?php if($getrating[1]=="4") echo "checked";?>><label for="4">☆</label> 
    <input type="radio" name="rating1" value="3" id="3" <?php if($getrating[1]=="3") echo "checked";?>><label for="3">☆</label> 
    <input type="radio" name="rating1" value="2" id="2" <?php if($getrating[1]=="2") echo "checked";?>><label for="2">☆</label> 
    <input type="radio" name="rating1" value="1" id="1" <?php if($getrating[1]=="1") echo "checked";?>><label for="1">☆</label> 
    </div><br>
    <textarea rows="5" cols="50" disabled><?php echo $getcomment[1];?></textarea>
    <table>
      <tr>
        <td rowspan="2"><img src="images/person1.gif" class="image"></td>
        <td style="font-size: 15px;"><b><?php echo $getname[1];?></b></td>
      </tr>
      <tr>
        <td style="font-size: 15px;"><?php echo $getdate[1];?></td>
      </tr>
    </table>
  </fieldset>
    </div>
    <div class="column">
  <fieldset>
    <legend style="font-size: 200%;text-align:center;">"</legend>
    <div class="rating"> 
    <input type="radio" name="rating2" value="5" id="5" <?php if($getrating[2]=="5") echo "checked";?>><label for="5">☆</label> 
    <input type="radio" name="rating2" value="4" id="4" <?php if($getrating[2]=="4") echo "checked";?>><label for="4">☆</label> 
    <input type="radio" name="rating2" value="3" id="3" <?php if($getrating[2]=="3") echo "checked";?>><label for="3">☆</label> 
    <input type="radio" name="rating2" value="2" id="2" <?php if($getrating[2]=="2") echo "checked";?>><label for="2">☆</label> 
    <input type="radio" name="rating2" value="1" id="1" <?php if($getrating[2]=="1") echo "checked";?>><label for="1">☆</label> 
    </div><br>
    <textarea rows="5" cols="50" disabled><?php echo $getcomment[2];?></textarea>
    <table>
      <tr>
        <td rowspan="2"><img src="images/man.png" class="image"></td>
        <td style="font-size: 15px;"><b><?php echo $getname[2];?></b></td>
      </tr>
      <tr>
        <td style="font-size: 15px;"><?php echo $getdate[2];?></td>
      </tr>
    </table>
  </fieldset>
    </div>
  </div> <!--end div for row-->
  <?php
  $ratingErr=$commentErr="";
  $rating=$comment="";
  $msg="";
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
      if(!isset($_POST["txt_rating"]))
      {
        $ratingErr="<h4 style='color:red;'>A proper rating is required</h4>";
      }
      else{
        $rating=test_input($_POST["txt_rating"]);
      }
      if(empty($_POST["txt_comment"]))
      {
        $commentErr="<h4 style='color:red'>Comment cannot be empty</h4>";
      }
      else
      {
        $comment=test_input($_POST["txt_comment"]);
      }
      if($ratingErr=="" && $commentErr=="")
      {
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql ='CALL insertreview(:email,:date_posted,:comment,:rating,:flag,:ban)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':date_posted',$date_posted);
        $stmt->bindParam(':comment',$R_comment);
        $stmt->bindParam(':rating',$R_rating);
        $stmt->bindParam(':flag',$flag);
        $stmt->bindParam(':ban',$ban);

        $email=$_SESSION['username'];
        $date_posted=strftime("%Y-%m-%d");
        $R_comment=$comment;
        $R_rating=$rating;
        $flag='0';
        $ban='0';
        $stmt->execute();
        $conn==null;
        $msg="<h4 style='color:red;text-align:center'>Review submitted</h4>";
      }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if(isset($_SESSION['username'])){
  	/*if($_GET['referer'] == 'login')
  	{*/ ?>
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"].'?referer=login';?>">
  
  <fieldset style="width: 40%;">
  <legend style="text-align: center;"><h3>WRITE A REVIEW</h3></legend>
  <div class="rating" style="margin-left: 42%;">
  <input type="radio" name="txt_rating" value="5" id="rate-5" ><label for="rate-5">☆</label>
  <input type="radio" name="txt_rating" value="4" id="rate-4" ><label for="rate-4">☆</label>
  <input type="radio" name="txt_rating" value="3" id="rate-3" ><label for="rate-3">☆</label>
  <input type="radio" name="txt_rating" value="2" id="rate-2" ><label for="rate-2">☆</label>
  <input type="radio" name="txt_rating" value="1" id="rate-1" ><label for="rate-1">☆</label>
  </div><?php echo $ratingErr;?>
  <br><br>
  <textarea name="txt_comment" placeholder='Add your review' required class="textareaReview"></textarea>
  <?php $commentErr ?>
  <br>
  <div class="container"> <!--met delete dan comment box-->
    <input type="submit" value="SUBMIT" class="button" style="cursor: pointer;"/>
  </div>
  <?php echo $msg; ?>
  <br><br>   
  </fieldset>
</form>
<?php
  	//}//end if
  }
  
?>
</div>
<br><br>
</body>
</html>