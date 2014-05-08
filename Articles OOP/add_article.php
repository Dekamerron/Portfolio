<?php

include "header.html";
require_once('database.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$database = new db();
	
	$title  = htmlspecialchars($_POST['article_title']);
	$body   = htmlspecialchars($_POST['article_body']);

	$database->addArticle($title, $body);

	$status = ($database->affectedRows()) ? "Article successfully added!" : "There was an error!" . mysql_error();
}

?>

<nav>
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="add_article.php" class="selected">Create Article</a></li>
		<li><a href="delete_article.php">Delete Article</a></li>
		<li><a href="edit_article.php">Edit Article</a></li>
		<li><a href="read_section.php">Read Section</a></li>
	</ul>
</nav>
</header>
	<div class="main clearfix">
		<div class="grid_12 work">
			<img src="images/work.jpg">
			<form action="" method="POST">
				<h2><label for="article_title">Article title</label></h2>
				<?php if(isset($status)){ echo "<b>$status</b>"; } ?>
				<input type="text" name="article_title" id="article_title" maxlength="70" size="70">

				<h2><label for="article_body">Article body</label></h2>
				<textarea name="article_body" name="article_body" id="article_body" rows="20" cols="113"></textarea>

				<input type="submit" value="Submit" name="submit_article" class="button">
			</form>
		</div>
		<div class="grid_12 work create">
			<img src="images/NY.jpg">
		</div>
	</div>

<?php
include "footer.html";
?>

