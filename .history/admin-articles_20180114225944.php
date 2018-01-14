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
					<li><a href="admin-articles.php">Articles</a></li>
					<li><a href="admin-create.php">Create Admin</a></li>
					<li><a href="admin-comments.php">Comment Approval</a></li>
					<li><a href="admin-category.php">Category</a></li>
				</ul>
			</nav>

			<article>
				<!-- Articles -->
				<?php

				if(isset($_POST['save'])){

					$title = $_POST['title'];
					$content = $_POST['content'];
					$categoryId = $_POST['category'];
					$username = $_SESSION("username");

					$sql = "INSERT INTO article (article_text, article_category_id, article_user_name, article_header) VALUES ('".$content."', '".$category."', '"$username"', '".$title."')";

					if ($conn->query($sql) === TRUE) {
						echo "New article created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

				}


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

				<form method="post"> 
					<label id="title">Article Title:</label><br/>
					<input type="text" name="title"><br/>

					<label id="content">Article Content:</label><br/>
					<input type="text" name="content"><br/>

					<label id="category">Article Category:</label><br/>
					<select name="category">
						<?php

							$sql = "SELECT * FROM category";

							$result = $conn->query($sql);

							while($row = $result->fetch_assoc()) {

								echo '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';

							}


						?>
					</select>

					<button type="submit" name="save">save</button>
				</form>


				<div style="margin-top: 100px;">

					<?php

					$sqlArticle = "SELECT * FROM article";
					$result_article = $conn->query($sqlArticle);

					while($row = $result_article->fetch_assoc()) {

						echo '<div>';

						echo '<form method="post">';

						echo "<li class='article-list-item'>". $row["article_header"];

						//echo "<a href='#' class='read-more-button'>Read More</a>";

						$deleteid = $row["article_id"];

						echo '<input type="hidden" name="deleteid" value='.$deleteid.'>';

						echo '<button type="submit" name="delete">Delete</button>';

						echo "</li>";

						echo '</form>';

						echo '</div>';

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
