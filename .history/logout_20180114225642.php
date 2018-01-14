<!-- Simple destroy session and redirect to login page -->
<?php
session_start();
session_destroy();
/* 
 * Redirect to a different page in the current directory that was requested 
 */
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'mypage.php';  // change accordingly

header("Location: http://$host$uri/$extra");
?>