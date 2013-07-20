<?php
/*
Template Name: autor
*/
?>
<?php
	include('header.php');
	include('sidebar.php');
	ini_set( "display_errors", 0);
?>
<section id="main">
	<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
		<article>
			<div class="articlecontent">
				<p><?php the_content(__('(Whole article...)')); ?>
			</div>
			<div class="line"></div>
			<h2>Poslední články na blogu</h2>
			<ul style="list-style-type: none;">
			<?php
				$feed = 'http://blog.czcampuseros.eu/author/'.the_slug().'/feed/';
				$channel = (array) simplexml_load_file($feed);
				foreach ($channel['channel'] as $item) {
					if (!empty($item->link)) {
				?>
				<li><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></li>
				<?php
						}
					}
				?>
			</ul>
		</article>
	<?php } } else { ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php } ?>
</section>
<?php
	include('footer.php');
?>