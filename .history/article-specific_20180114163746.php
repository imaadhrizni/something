<?php

include('dbconnection.php');

// Start the session
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

			<article>

				<?php

				$articleid = $_GET["val"];

				$sql_article = "SELECT * FROM article WHERE article_id=".$articleid;
				
				$result_article_text = $conn->query($sql_article);

				if ($result_article_text->num_rows > 0) {

					while($row = $result_article_text->fetch_assoc()) {

						echo '<div>';

						echo $row["article_text"];

						echo '</div>';

					}

				}

				?>


				<!-- Add Comment Form -->
				<form method="post"> 
					<label id="comment_text">Comment:</label><br/>
					<input type="text" name="comment_text"><br/>2
					<button type="submit" name="save">save</button>
				</form>
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
				header("Location: http://$host$uri/$normalURL");

			} else{
				$adminURL = "admin-portal.php";
				header("Location: http://$host$uri/$adminURL");
			}

		}
	}
}

?>



				<!-- Comments Section -->
				<!-- <?php

				$articleid = $_GET["val"];

				$sql_article = "SELECT * FROM comment WHERE article_id=".$articleid." AND comment_approve_status==1";

				$result_result_comments = $conn->query($sql_article);

				if ($result_comments->num_rows > 0) {
					while($row = $result_comments->fetch_assoc()) {
						echo '<div>';
						echo $row["comment_text"].$row["comment_user_name"];
						echo '</div>';
					}
				}
				?> -->

			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
	</html>

	<?php
	$conn->close();
	?>
