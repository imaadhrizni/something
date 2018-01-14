<?php

include('dbconnection.php');


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

				$hashed_password = password_hash($password, PASSWORD_DEFAULT);

				$sql = "INSERT INTO user (username, password) VALUES ('".$username."', '".$hashed_password."')";

				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
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
