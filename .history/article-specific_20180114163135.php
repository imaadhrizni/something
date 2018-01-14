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


				<!-- Comment Section -->
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
