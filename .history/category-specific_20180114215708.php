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
			<article>

				<?php

				$categoryid = $_GET["val"];

				$sqlCategory = "SELECT * FROM category WHERE category_id=".$categoryid;
				$result_category = $conn->query($sqlCategory);

				while($row = $result_category->fetch_assoc()) {

					echo "<div>Category: ". $row["category_name"] ."</div><br />";

				}

				$sql_category = "SELECT * FROM article WHERE article_category_id=".$categoryid;
				
				$result_articles = $conn->query($sql_category);

				if ($result_articles->num_rows > 0) {

					while($row = $result_articles->fetch_assoc()) {


						echo '<div>';

						echo "<li class='article-list-item'>". $row["article_header"];

						//echo "<a href='#' class='read-more-button'>Read More</a>";

						$pageid = $row["article_id"];

						echo "<a href='article-specific.php?val=".$pageid."' class='read-more-button'>Read More</a>";

						echo "</li>";

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
