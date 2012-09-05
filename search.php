<?php get_header(); ?>
<div id="content" class="search">

	<div class="box"><h2>Search results for: <?php the_search_query(); ?></h2></div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post-single">
			<div class="post-header">
				<div class="post-meta">
					<p><?php _e('Posted on '); the_time('F j, Y'); ?></p>
					<p><?php comments_popup_link('No Comments', '<em>1 Comment</em>', '<em>% Comments</em>'); ?></p>
				</div><!--.postMeta-->
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</div>
				
			<div class="post-excerpt">
				<?php the_excerpt(); /* the excerpt is loaded to help avoid duplicate content issues */ ?>
			</div><!--.post-excerpt-->
		</div><!--.post-single-->
		
	<?php endwhile; ?>
	
	<div class="newer-older">
		<p class="older"><?php next_posts_link('&laquo; Older Entries') ?></p>
		<p class="newer"><?php previous_posts_link('Newer Entries &raquo;') ?></p>
		<div class="clear"></div>
	</div><!--.oldernewer-->
	
	<?php else: ?>
		<div class="no-results box">
			<h2><?php _e('No Results Found'); ?></h2>
		</div><!--no-results-->
	<?php endif; ?>


	
</div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
