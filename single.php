<?php
	include('header.php');
	include('sidebar.php');
	$args = array(
		'id_form' => 'commentform',
		'id_submit' => 'submit',
		'title_reply' => __( 'Zanechte komentář' ),
		'title_reply_to' => __( 'Leave a Reply to %s' ),
		'cancel_reply_link' => __( 'Cancel Reply' ),
		'label_submit' => __( 'Odeslat komentář' ),
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after' => '<p class="form-allowed-tags">' . sprintf( __( 'Můžete použít následující HTML značky a atributy: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'fields' => apply_filters(
			'comment_form_default_fields', array(
				'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
				'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
				'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
			)
		)
	);
?>
<section id="main">
<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
	<article>
	<?php if(!has_tag('simpleheader', get_the_ID())) { ?>
		<header>
			<span class="date"><?php the_time('j. n. Y v G:m') ?></span>
			<h1><a href="<?php the_permalink(""); ?>"><?php the_title(); ?></a></h1>
			<div class="line"></div>
			<span class="author">Vydal/a: <?php the_author_posts_link(); ?></span>
			<span class="category">
				<?php
					//the_category(', ');
					foreach(get_the_category() as $cat) { $categories .= $cat->term_id.','; }
					wp_list_categories(array('include' => $categories, 'style' => 'none')); 
				?>
			</span>
			<span class="tags"><?php the_tags('', '', ''); ?></span>
		</header>
	<?php } else { ?>
		<div class="counter"><ul>
			<li class="previousarticle tags"><?php previous_post_link('<span>%link</span>', '« Předchozí'); ?></li>
			<li class="nextarticle tags"><?php next_post_link('<span>%link</span>', 'Další »'); ?></li>
		</ul></div>
	<?php } ?>
		<div class="content"><?php the_content(__('(Celý článek...)')); ?></div>
		<?php if (get_the_author_meta('user_login') == 'e-Mail') { ?>
		<div class="disclaimer">
			<p>Text tohoto příspěvku je uveřejněný na základě výzvy a to bez jakékoliv obsahové, či gramatické úpravy.
			Obsah tohoto příspěvku nemusí vyjadřovat názorové postoje členů občanského sdružení CZcampuseros a odpovídá za něj výlučně autor,
			kterého identita může představovat mj. obecně používanou přezdívku na sociálních sítích a nebyla ze strany CZcampuseros nijak ověřována,
			mimo kontroly existence e-mail adresy, ze které byl příspěvek odeslán.</p>
		</div>
		<?php } comments_template( '', true ); ?>
		<div class="comment_form"><?php comment_form($args); ?></div>
		<div class="counter"><ul>
			<li class="previous tags"><?php previous_post_link('<span>%link</span>', '« « «'); ?></li>
			<li class="dot tags"><span>&nbsp;</span></li>
			<li class="next tags"><?php next_post_link('<span>%link</span>', '» » »'); ?></li>
		</ul></div>
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