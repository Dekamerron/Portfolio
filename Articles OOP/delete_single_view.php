<?php

include "header.html";
require_once('database.php');

$database = new db();
$id       = $_GET['id'];
$results  = $database->selectOne($id);

if($database->affectedRows())
{
	$article = $database->fetchAssoc($results);
	$title   = $article['title'];
	$body    = $article['body'];
}

if(!$article['id'])
{
	header("Location: delete_article.php");
}

if(isset($_POST['delete_article']))
{
	$database->deleteArticle($id);
	
	if($database->affectedRows())
	{
		header("Location: delete_article.php");
	}
	
}
else if(isset($_POST['go_back']))
{
	header("Location: delete_article.php");
}

?>

<nav>
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="add_article.php">Create Article</a></li>
		<li><a href="delete_article.php" class="selected">Delete Article</a></li>
		<li><a href="edit_article.php">Edit Article</a></li>
		<li><a href="read_section.php">Read Section</a></li>
	</ul>
</nav>
</header>
	<div class="main clearfix">
		<div class="grid_24 work">
			<img src="images/delete2.jpg">
			<?php
				echo "<h4>".$title."</h4>";
				echo $body;
				echo "<h4></h4>";
			?>
			<form action="" method="POST">
				<input type="submit" name="delete_article" value="Delete" class="button">
				<input type="submit" class='button' name="go_back" value="Go back">
			</form>
		</div>
	</div>
</div>
</body>
</html>
