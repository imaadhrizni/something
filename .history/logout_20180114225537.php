<!-- Simple destroy session and redirect to login page -->
<?php
session_start();
session_destroy();
$host  = $_SERVER['HTTP_HOST'];
					$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

					if(($dbusername == $username) && ($passwordOK == true)){
					
						if($dbusertype == 0){
							$normalURL = "index.php";
							$_SESSION["username"] = $username;
							echo "IMAADH".$_SESSION['username'];
							header("Location: http://$host$uri/$normalURL");

						} else{
							$adminURL = "admin-portal.php";
							$_SESSION["username"] = $username;
							echo "IMAADH".$_SESSION['username'];
							header("Location: http://$host$uri/$adminURL");
						}

					}
?>