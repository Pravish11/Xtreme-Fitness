<?php
$review_id=$_GET['review_id'];
require_once "includes/db_connect.php";
$Query="DELETE FROM review
WHERE review_id=$review_id";
$conn->exec($Query);
header("Refresh:0;url=home.php");
?>