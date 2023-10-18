<?php /* to log the user out of the session */
session_start();
session_destroy();
header('Location: $root/login.php');
exit();
?>