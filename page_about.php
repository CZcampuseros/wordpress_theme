<?php
/*
Template Name: about
*/
?>
<?php
	include('header.php');
	include('sidebar.php');

	$pages = get_pages(array('child_of' => '0'));
	foreach ( $pages as $page ) {
		if ($page->post_title == 'Team1' or $page->post_title=='Team2') $listofpages[] = $page->ID;
	}
?>
		<section id="main">
			<?php dynamic_sidebar( 'main1' ); ?>
			<?php $counter = 0; foreach($listofpages as $teamlist) { $counter++; ?>
			<section id="about<?php echo $counter; ?>" class="twoboxbar widget about">
				<h1>Team<?php echo $counter; ?></h1>
				<ul>
					<?php $pages = get_pages(array('sort_column' => 'menu_order', 'child_of' => $teamlist)); $count = 0; foreach ( $pages as $page ) { $thiscolor = getrandcolor($count); $count++; if($count == 4) { $count = 0; } ?>
						<li><a href="<?php echo get_page_link( $page->ID ); ?>"
							id="rsswidget<?php echo $counter; ?>item<?php echo $page->ID; ?>" class="twobox rsswidget"
							style="background-color: <?php echo $thiscolor; ?>; border-color: <?php echo $thiscolor; ?>;"
							onMouseOver="changeColorON('rsswidget<?php echo $counter; ?>item<?php echo $page->ID; ?>', '#fff');"
							onMouseOut="changeColorOUT('rsswidget<?php echo $counter; ?>item<?php echo $page->ID; ?>', '<?php echo $thiscolor; ?>');">
								<?php if (has_post_thumbnail($page->ID)) { echo get_the_post_thumbnail($page->ID); } else { echo '<img src="', get_bloginfo('template_directory'), '/images/thumb-default.png','" alt="thumbnail" />'; } ?>
								<span><?php echo $page->post_title; ?></span>
						</a></li>
					<?php } ?>
				</ul>
			</section>
			<?php } ?>
		</section>
<?php
	include('footer.php');
?>