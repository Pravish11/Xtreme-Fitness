<?php
session_start();
require_once "includes/db_connect.php";
if (isset($_POST['review_id'])) {
    $Query = "UPDATE review
SET flag='1'
WHERE review_id='" . $_POST['review_id'] . "'";
    $conn->exec($Query);
    echo "box" . $_POST['review_id'];
}

if (isset($_POST['delete_id'])) {
    $Query = "DELETE FROM review
WHERE review_id='" . $_POST['delete_id'] . "'";
    $conn->exec($Query);
}?>

<?php
  $ratingErr = $commentErr = "";
  $rating = $comment = "";
  $msg = "";
    if (!isset($_POST["txt_rating"])) {
      $ratingErr = "<h4 style='color:red;'>A proper rating is required</h4>";
      $msg=$ratingErr;
    } else {
      $rating = test_input($_POST["txt_rating"]);
    }
    if (empty($_POST["txt_comment"])) {
      $commentErr = "<h4 style='color:red'>Comment cannot be empty</h4>";
      $msg=$commentErr;
    } else {
      $comment = test_input($_POST["txt_comment"]);
    }
    if ($ratingErr == "" && $commentErr == "") {
      //$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql = 'CALL insertreview(:email,:date_posted,:comment,:rating,:flag,:ban)';
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':date_posted', $date_posted);
      $stmt->bindParam(':comment', $R_comment);
      $stmt->bindParam(':rating', $R_rating);
      $stmt->bindParam(':flag', $flag);
      $stmt->bindParam(':ban', $ban);

      $email = $_SESSION['username'];
      $date_posted = strftime("%Y-%m-%d");
      $R_comment = $comment;
      $R_rating = $rating;
      $flag = '0';
      $ban = '0';
      $stmt->execute();
    }
    else
    {
        echo $msg;
    }
  
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>


