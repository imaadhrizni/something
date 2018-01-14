<?php

include('dbconnection.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css"/>
	<title>Northampton News - Home</title>

	<style type="text/css">
	.read-more-button{

		float: right;
		text-decoration: none;

	}

	.article-list-item{

		background: #fff;
		padding: 10px;
		list-style: none;

	}
</style>
</head>
<body>
	<header>
		<section>
			<h1>Northampton News</h1>
		</section>
	</header>
	<?php
	include ('menu.php');
	?>
	<img src="images/banners/randombanner.php" />
	<main>
		<!-- Delete the <nav> element if the sidebar is not required -->
			<nav>
				<ul>
					<li><a href="#">Sidebar</a></li>
					<li><a href="#">This can</a></li>
					<li><a href="#">Be removed</a></li>
					<li><a href="#">When not needed</a></li>
				</ul>
			</nav>

			<?php

			if(isset($_POST['save'])){

				$username = $_POST['username'];

				$password = $_POST['password'];

				$sql = "SELECT * FROM user";

				$result = $conn->query($sql);

				while($row = $result->fetch_assoc()) {

					$dbpassword = $row["password"];

					$passwordOK = password_verify($password, $dbpassword);

					$dbusername = $row["username"];

					$dbusertype = $row["user_type"];

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
				}
			}

			?>

			<form method="post"> 
				<label id="username">Username:</label><br/>
				<input type="text" name="username"><br/>

				<label id="password">Password:</label><br/>
				<input type="text" name="password"><br/>

				<button type="submit" name="save">save</button>
			</form>



			
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
	</html>

	<?php
	$conn->close();
	?>
