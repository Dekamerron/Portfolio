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
	header("Location: edit_article.php");
}

if(isset($_POST['edit_article']))
{
	$title = htmlspecialchars($_POST['article_title']);
	$body  = htmlspecialchars($_POST['article_body']);

	$database->updateArticle($title, $body, $id);

	if($database->affectedRows())
	{
		header("Location: edit_article.php");
	}
}
else if(isset($_POST['go_back']))
{
	header("Location: edit_article.php");
}

?>

<nav>
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="add_article.php">Create Article</a></li>
		<li><a href="delete_article.php">Delete Article</a></li>
		<li><a href="edit_article.php" class="selected">Edit Article</a></li>
		<li><a href="read_section.php">Read Section</a></li>
	</ul>
</nav>
</header>
	<div class="main clearfix">
		<div class="grid_24 work">
			<img src="images/edit.jpg">
			<form action="" method="POST">
				<h2><label for="article_title">Article title</label></h2>
				<?php 
				if(isset($status))
					{
						echo "<b>".$status."</b>";
					}
				?>
				<br>
				<input type="text" name="article_title" id="article_title" maxlength="70" size="70" 
				value="<?php echo $title; ?>">

				<h2><label for="article_body">Article body</label></h2>
				<textarea name="article_body" name="article_body" id="article_body" rows="20" cols="113"><?php echo $body; ?></textarea>

				<input type="submit" value="Edit" name="edit_article" class="button">
				<input type="submit" class='button' name="go_back" value="Go back">
			</form>
		</div>
	</div>

<?php
include "footer.html";
?>
