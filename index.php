<?php
	include('header.php');
	include('sidebar.php');
?>
<section id="main">
<?php
	dynamic_sidebar( 'main1' );
	if (have_posts()) {
?>
	<ul class="widget">
<?php
		$count = rand(0, 3);
		while (have_posts()) {
			the_post();
			$color = getrandcolor($count);
			$count++;
			if($count == 4) { $count = 0; }
?>
		<li id="<?php echo the_ID(); ?>" class="threebox"
			style="
				background-color: <?php echo $color; ?>;
				border-color: <?php echo $color; ?>;
			"
			onClick="location.href='<?php the_permalink(""); ?>'"
			onMouseOver="changeColorON('<?php echo the_ID(); ?>', '#fff');"
			onMouseOut="changeColorOUT('<?php echo the_ID(); ?>', '<?php echo $color; ?>');">
				<span class="date"><?php the_time('d. m. Y'); ?></span>
				<a href="<?php the_permalink(""); ?>">
					<h1 class="title" <?php if(preg_match('/^(TIP|Speakers): /', get_the_title())) { echo "style=\"text-transform: none;\""; } ?>><?php the_title(); ?></h1>
				</a>
				<div class="content"><?php echo strip_tags(get_the_content('(...)')); ?></div>
		</li>
<?php
		}
?>
	</ul>
<?php
	} else {
?>
	<article>
		<p><?php _e('Žádné články neodpovídají zadaným kritériím.'); ?></p>
	</article>
<?php
	}
	dynamic_sidebar( 'main2' );
?>
	<div class="counter">
<?php
	$current = get_query_var( 'paged' );
	if ($current == 0) { $current = 1; }
	echo paginate_links(array(
		'base' => str_replace('91919', '%#%', get_pagenum_link(91919)),
		'format' => 'page/%#%',
		'total' => ceil($wp_query->found_posts / get_settings('posts_per_page')),
		'current' => absint( $current ),
		'show_all' => false,
		'prev_next' => true,
		'prev_text' => __('&laquo; Předchozí'),
		'next_text' => __('Další &raquo;'),
		'end_size' => 3, 'mid_size' => 5,
		'type' => 'list', 'add_args' => false,
		'add_fragment' => ''
	));
?>
	</div>
</section>
<?php
	include('footer.php');
?>