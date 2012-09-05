<?php get_header(); ?>
	<div id="content">

	<?php if (false) ://if (is_front_page() & !is_paged()) : ?>
	<div id="home-infobox">
		
		<div id="hi-text">
			<div id="hi">Hi There!</div>
			<img src="<?php bloginfo('template_url'); ?>/images/pic_sara.jpg" />
			<img src="<?php bloginfo('template_url'); ?>/images/pic_molly.jpg" />
			<img src="<?php bloginfo('template_url'); ?>/images/pic_me.jpg" />

			<p class="text">Welcome to the personal webpage and blog of Clare Bayley, an engineer, photographer, and feminist who lives in San Francisco with two adorable cats. </p>
			<p class="follow">Ways to follow this blog: 
			<a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" /></a>
			<a href="https://twitter.com/clarebayley" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/twitter.png" /></a>
			<a href="http://www.facebook.com/clare.bayley" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/fb.png" /></a>
			</p>
			
		</div>
		<div class="clear"></div>
	</div>
	
	<?php endif; ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post-single">
				<div class="post-header">
					<div class="post-meta">
						<p><?php _e('Posted on '); the_time('F j, Y'); ?></p>
						<p><?php comments_popup_link('No Comments', '<em>1 Comment</em>', '<em>% Comments</em>'); ?></p>
					</div><!--.postMeta-->
					<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				</div>

				<div class="post-content">
					<?php the_content(__('Read more'));?>
				</div>
				
			</div><!--.post-single-->

		<?php endwhile; else: ?>
			<div class="no-results">
				<p><strong><?php _e('There has been an error.'); ?></strong></p>
				<p><?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.'); ?></p>
				<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
			</div><!--noResults-->
		<?php endif; ?>
			
		<div class="newer-older">
			<p class="older"><?php next_posts_link('&laquo; Older Entries') ?></p>
			<p class="newer"><?php previous_posts_link('Newer Entries &raquo;') ?></p>
			<div class="clear"></div>
		</div><!--.oldernewer-->

	</div><!--#content-->
<?php get_footer(); ?>
