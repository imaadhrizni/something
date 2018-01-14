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
					<li><a href="#">Articles</a></li>
					<li><a href="#">Create Admin</a></li>
					<li><a href="#">Comment</a></li>
					<li><a href="#">Category</a></li>
				</ul>
			</nav>

			<article>


				<!-- All Existing Comments pending approval -->
				<div style="margin-top: 100px;">

					<?php

					$sqlComments = "SELECT * FROM comment WHERE comment_approval_status = 0";
					$result_article = $conn->query($sqlArticle);

					while($row = $result_article->fetch_assoc()) {
						echo '<div>';
						echo '<form method="post">';
						echo "<li class='article-list-item'>". $row["comment_text"];
						$commentId = $row["comment_id"];
						echo '<input type="hidden" name="commentId" value='.$commentId.'>';
						echo '<button type="submit" name="approve">Approve</button>';
						echo "</li>";
						echo '</form>';
						echo '</div>';
					}

						echo '<button type="submit" name="approve">Approve</button>';
						if(isset($_POST['delete'])){

						$deleteid = $_POST['deleteid'];
	
						$sqlDelete = "DELETE FROM article WHERE article_id = ".$deleteid;
	
						if ($conn->query($sqlDelete) === TRUE) {
							echo "article deleted";
						} else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}
	
					}
	

					?>
				</div>

				


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
