<?php
	// post thumbnail support
	add_theme_support( 'post-thumbnails' );
	// adds the post thumbnail to the RSS feed
	function cwc_rss_post_thumbnail($content) {
	    global $post;
	    if(has_post_thumbnail($post->ID)) {
	        $content = '<p>' . get_the_post_thumbnail($post->ID) .
	        '</p>' . get_the_content();
	    }
	    return $content;
	}
	//add_filter('the_excerpt_rss', 'cwc_rss_post_thumbnail');
	//add_filter('the_content_feed', 'cwc_rss_post_thumbnail');


	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));
	
	// removes the WordPress version from your header for security
	function wb_remove_version() {
		return '<!--built on the Whiteboard Framework-->';
	}
	add_filter('the_generator', 'wb_remove_version');
	
	
	// Removes Trackbacks from the comment cout
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}
	// custom excerpt ellipses for 2.9+
	function custom_excerpt_more($more) {
		return 'Read More &raquo;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	// no more jumping for read more link
	function no_more_jumping($post) {
		return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'&nbsp; Continue Reading &raquo;'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');
	
	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');

	// adds a class to the post if there is a thumbnail
	function has_thumb_class($classes) {
		global $post;
		if( has_post_thumbnail($post->ID) ) { $classes[] = 'has_thumb'; }
			return $classes;
	}
	add_filter('post_class', 'has_thumb_class');

	// add_action( 'admin_init', 'theme_options_init' );
	// add_action( 'admin_menu', 'theme_options_add_page' );
	
	// Init plugin options to white list our options
	// function theme_options_init(){
	// 	register_setting( 'tat_options', 'tat_theme_options', 'theme_options_validate' );
	// }
	
	// Load up the menu page
	// function theme_options_add_page() {
	// 	add_theme_page( __( 'Theme Options', 'tat_theme' ), __( 'Theme Options', 'tat_theme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
	// }
	

	
	function twentyeleven_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p><?php _e( '<em>Pingback:</em>'); ?> <?php comment_author_link(); ?></p>
		<?php
				break;
			default :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				
				<div class="comment-text">
<!--				<div class="comment-meta">-->
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;
					?>
					<div class="avatar">
						<p class="gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar($comment, $avatar_size); } ?></p>
					</div>
					<div class="meta-text">
						<p><?php comment_author_link(); ?></p>
						<p><?php comment_date('n/j/y'); ?></p>
						<p><?php comment_time(); ?></p>
					</div>
					
				<!--</div>--><!--.commentMeta-->
				    <?php comment_text(); ?>
				    
				    
				    <div class="reply">
				    	<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply »'), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				    </div><!-- .reply -->
				    
				</div><!--.commentText-->
				

	
				<div class="clear"></div>
				
			</article><!-- #comment-## -->
	
		<?php
				break;
		endswitch;
	}
	
function strip_nsfw( $content ) {

	$regexArg = '[\w\s"\'\/=:.?-]';

	$content = preg_replace('/<img'.$regexArg.'*nsfw'.$regexArg.'*>/','[image removed due to NSFW content]',$content);
	$content = preg_replace('/<a'.$regexArg.'*nsfw'.$regexArg.'*>[^<>]*<\/a>/','[link removed due to NSFW content]',$content);
	
	return $content;
	//return "herpderp";
}

add_filter('strip_nsfw','strip_nsfw');
	
function the_content_feed_sfw( $content ) {
	$content = apply_filters('strip_nsfw',$content);
	return $content;
}	

add_filter('the_content_feed', 'the_content_feed_sfw');

function the_excerpt_rss_sfw( $output ) {
	$output = apply_filters('strip_nsfw',$output);
	return $output;
}

add_filter('the_excerpt_rss', 'the_excerpt_rss_sfw');

?>