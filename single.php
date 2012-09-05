<?php get_header(); ?>
<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

			<article>
				<div class="post-header">
					<div class="post-meta">
						<p><?php _e('Posted on '); the_time('F j, Y'); ?></p>
						<p><?php comments_popup_link('No comments', 'One comment', '% comments', 'comments-link', 'Comments are closed'); ?></p>
					</div><!--.postMeta-->
					<h2><?php the_title(); ?></h2>
				</div>				
				
				<div class="post-content">
					<?php the_content(); ?>
					<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
				</div><!--.post-content-->
			</article>
		<div class="post-nav">
			<p class="older"><?php previous_post_link('%link', '&laquo; Previous post') ?></p>
			<p class="newer"><?php next_post_link('%link', 'Later Post &raquo;') ?></p>
			<div class="clear"></div>
		</div>
		</div><!-- #post-## -->

		<?php comments_template( '', true ); ?>

	<?php endwhile; /* end loop */ ?>
</div><!--#content-->
<?php get_footer(); ?>