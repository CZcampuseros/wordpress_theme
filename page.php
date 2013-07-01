<?php
	include('header.php');
	include('sidebar.php');
?>
<section id="main" class="<?php echo get_post_type( get_the_ID() ); ?>">
<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
	<article>
		<header><h1><a href="<?php the_permalink(""); ?>"><?php the_title(); ?></a></h1></header>
		<div class="content"><?php the_content(__('(Whole article...)')); ?></div>
	</article>
<?php } } else { ?>
	<article>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	</article>
<?php } ?>
</section>
<?php
	include('footer.php');
?>