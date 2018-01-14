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
		

		<article>
			<!-- Articles -->
			<?php
				$sql_article = "SELECT * FROM article";
				$result_article = $conn->query($sql_article);

				if ($result_article->num_rows > 0) {

					while($row = $result_article->fetch_assoc()) {

						echo '<div>';

						echo "<li class='article-list-item'>". $row["article_header"];

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
