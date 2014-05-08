<?php

include "header.html";
require_once('database.php');

$database = new db();
$result   = $database->selectArticles(6);

while($article = $database->fetchArray($result))
{
	$id[]    = $article['id'];
	$title[] = $article['title'];
	$body[]  = $article['body'];
}

?>

<nav>
	<ul>
		<li><a href="home.php" class="selected">Home</a></li>
		<li><a href="add_article.php" >Create Article</a></li>
		<li><a href="delete_article.php">Delete Article</a></li>
		<li><a href="edit_article.php">Edit Article</a></li>
		<li><a href="read_section.php">Read Section</a></li>
	</ul>
</nav>

<div class="banner grid_18">
	<p>
		<h2>
		Some slick phrase would go in here<br>
		to sum up what the business <br>
		actually does and stands for
		</h2>
	</p>
</div>	
<div class="grid_6 callout"></div>
</header>
	<div class="main clearfix">
		<div class="grid_9">
			<?php
				for($i = 0; $i < count($title)/2; $i++)
				{
					echo "<h4>". $title[$i]."</h4>";
					echo "<p class ='first'>";
					echo $body[$i];
					echo "</p>";
					echo "<p>";
					echo "<a href='read_single_view.php?id=".$id[$i]."' class='button'>Read more</a>";
					echo "</p>";
				}
			?>
		</div>
		<div class="grid_9">
			<?php
				for($i = count($title)/2 + (count($title) % 2); $i < count($title); $i++)
				{
					echo "<h4>". $title[$i]."</h4>";
					echo "<p class ='first'>";
					echo $body[$i];
					echo "</p>";
					echo "<p>";
					echo "<a href='read_single_view.php?id=".$id[$i]."' class='button'>Read more</a>";
					echo "</p>";
				}
			?>
		</div>
		<div class="grid_6">
			<blockquote>
				<p>
					Clean, elegant typography
					matched with sharp lines 
					and precise spacing leads 
					to a professional look <br>
					and feel.
				</p>
			</blockquote>	
		</div>
	</div> <!-- end div class main -->

<?php
include "footer.html";
?>