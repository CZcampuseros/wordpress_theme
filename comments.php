<?php
	if (have_comments()) {
?>
<div class="headingline"></div>
<div class="comment">
	<h2>Komentáře</h2>
	<div class="comments">
		<span class="comment_date"><?php comment_date('d.m.Y h:m'); ?></span>
		<a class="comment_author" href="<?php echo comment_author_url(); ?>"><?php echo $comment->comment_author; ?></a>
		<div class="comment_content"><?php echo $comment->comment_content; ?></div>
	</div>
	<?php
		}
	?>
</div>