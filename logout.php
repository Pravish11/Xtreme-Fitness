<?php
// Start the session
//The session_start() function must be the very first thing in your document. Before any HTML tags.
session_start();
session_destroy();
?>
<html>
<body>
<!--You are sucessfully logged out !! <a href='login.php'>Click here to log in </a>-->
<?php
header("Location:login.php");
die();
?>
</body>
</html>