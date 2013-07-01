<?php
/*
Template Name: clear
*/
?>
<?php
	include('header.php');
	include('sidebar.php');
?>
<section id="main">
<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
	<article>
		<div class="content"><?php the_content(__('(Celý článek...)')); ?></div>
	</article>
<?php } } else { ?>
	<article>
		<p><?php _e('Žádné články neodpovídají zadaným kritériím.'); ?></p>
	</article>
<?php } ?>
</section>
<?php
	include('footer.php');
?>