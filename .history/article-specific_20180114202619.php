<?php

include('dbconnection.php');

// Start the session
session_start();
echo "ECHOCOHOHOOH".$_SESSION["username"];
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
				<?php
					if($_SESSION["username"]!=null){
				?>
						<form method="post"> 
					<label id="comment_text">Comment:</label><br/>
					<input type="text" name="comment_text"><br/>
					<button type="submit" name="save">save</button>
				</form>
					}
				

				<?php
				if(isset($_POST['save'])){
					$articleid = $_GET["val"];
					$commentText = $_POST['comment_text'];
					if($_SESSION["username"]!=null){
						$username = $_SESSION["username"];
					}
					$sql = "INSERT INTO `comment` (`comment_text`, `comment_user_name`, `comment_article_id`) VALUES ('".$commentText."', '".$username."', '".$articleid."');";

					if ($conn->query($sql) === TRUE) {
						echo "New comment created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				?>

				<!-- Comments Section -->
				<?php

				$articleid = $_GET["val"];

				$sql_comments = "SELECT * FROM comment WHERE comment_article_id=".$articleid." AND comment_approve_status=1";
				$result_comments = $conn->query($sql_comments);
				if($result_comments!=null){
					if ($result_comments->num_rows > 0) {
						while($row = $result_comments->fetch_assoc()) {
							echo '<div>';
							echo $row["comment_text"];
							echo $row["comment_user_name"];
							echo '</div>'; 
						}
					}else{
						echo "No Comments";
					}
				}else{
					echo '<br>';
					echo "No Comments";
					echo '<br>';					
				}
				?>

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
