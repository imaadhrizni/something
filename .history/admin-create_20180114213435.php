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

			<form method="post"> 
				<label id="username">Username:</label><br/>
				<input type="text" name="title"><br/>

				<label id="password">Article Content:</label><br/>
				<input type="text" name="content"><br/>

				<label id="category">Article Category:</label><br/>
				<button type="submit" name="save">save</button>
			</form>

			<!-- All Existing -->
			<div style="margin-top: 100px;">

				<?php
				//get current username from session
				$username = $_SESSION["username"];
				// Select all users except current user name
				$sqlUsers = "SELECT * FROM user WHERE NOT username = \'$username\'";
				
				$result_users = $conn->query($sqlUsers);
				if($result_users!=null){
					if ($result_users->num_rows > 0) {
						while($row = $result_users->fetch_assoc()) {
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
					}else{
						echo "No admin users who can be modified now";
					}
				}else{
					echo '<br>';
					echo "No admin users who can be modified now";
					echo '<br>';					
				}

				if(isset($_POST['approve'])){

					$commentId = $_POST['commentId'];
					$sqlApprove = "UPDATE `comment` SET `comment_approve_status`=1 WHERE comment_id = ".$commentId;
					if ($conn->query($sqlApprove) == TRUE) {
						echo "comment approved";
						header("Refresh:0");
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
