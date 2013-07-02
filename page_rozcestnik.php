<?php
/*
Template Name: rozcestnik
*/
?>
<?php
	include('header.php');
	include('sidebar.php');
	$update = trim(htmlspecialchars(htmlspecialchars_decode($_GET['update'], ENT_NOQUOTES), ENT_NOQUOTES));
?>
		<section id="main">
			<?php dynamic_sidebar( 'main1' ); ?>
			<section class="twoboxbar rozcestnik widget" id="rozcestnik2" style="float: left;">
				<h1>Blog</h1>
				<ul>
				<?php
					function downloadtocache($from, $to) {
						//if (filemtime($to) > time()-3600) {
						if (isset($from) and isset($to)) {
							$url = fopen($from, 'rb');
							$data = stream_get_contents($url);
							fclose($url);
							$file = fopen($to, 'w+');
							fwrite($file, $data);
							fclose($file); 
						}
					}
					if(!empty($update)) {
						downloadtocache('http://blog.czcampuseros.eu/?feed=rss2', get_theme_root().'/'.get_template().'/../cache/blog.xml');
					}
					$channel = (array) simplexml_load_file(get_theme_root().'/'.get_template().'/../cache/blog.xml');
					$itemNO = 0;
					$count = 0;
					foreach ($channel['channel'] as $item) {
						if ( !empty($item->link) and $itemNO < 3 ) {
							$itemNO++;
							$thiscolor = getrandcolor($count);
							$count++;
							if($count == 4) $count = 0;
				?>
					<li><a id="rsswidget2item<?php echo $itemNO; ?>" class="twobox rsswidget" href="<?php echo $item->link; ?>"
							style="background-color: <?php echo $thiscolor; ?>; border-color: <?php echo $thiscolor; ?>;"
							onMouseOver="changeColorON('rsswidget2item<?php echo $itemNO; ?>', '#fff');"
							onMouseOut="changeColorOUT('rsswidget2item<?php echo $itemNO; ?>', '<?php echo $thiscolor; ?>');">
								<span><?php echo $item->title; ?></span>
					</a></li>
				<?php
						}
					}
				?>
				</ul>
			</section>
			<section class="twoboxbar rozcestnik widget" id="rozcestnik3" style="float: right;">
				<h1>Sdružení</h1>
				<ul>
				<?php
					if(!empty($update)) {
						downloadtocache('http://sdruzeni.czcampuseros.eu/?feed=rss2', get_theme_root().'/'.get_template().'/../cache/sdruzeni.xml');
					}
					$channel = (array) simplexml_load_file(get_theme_root().'/'.get_template().'/../cache/sdruzeni.xml');
					$itemNO = 0;
					$count = 0;
					foreach ($channel['channel'] as $item) {
						if ( !empty($item->link) and $itemNO < 3 ) {
							$itemNO++;
							$thiscolor = getrandcolor($count);
							$count++;
							if($count == 4) $count = 0;
				?>
					<li><a id="rsswidget3item<?php echo $itemNO; ?>" class="twobox rsswidget" href="<?php echo $item->link; ?>"
							style="background-color: <?php echo $thiscolor; ?>; border-color: <?php echo $thiscolor; ?>;"
							onMouseOver="changeColorON('rsswidget3item<?php echo $itemNO; ?>', '#fff');"
							onMouseOut="changeColorOUT('rsswidget3item<?php echo $itemNO; ?>', '<?php echo $thiscolor; ?>');">
								<span><?php echo $item->title; ?></span>
					</a></li>
				<?php
						}
					}
				?>
				</ul>
			</section>
			<?php dynamic_sidebar( 'main2' ); ?>
		</section>
<?php
	include('footer.php');
?>
