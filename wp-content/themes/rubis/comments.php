<?php 
if(basename($_SERVER['SCRIPT_FILENAME']) == 'comments.php') die(__('Please do not load this page directly.' , TS_DOMAIN)); 
?>

<section id = "comments" class = "has-divider">
	<?php if(post_password_required()) : ?>
		<p class = "nopassword">
		<?php _e('This post is password protected. Enter the password to view any comments.' , TS_DOMAIN); ?>
		</p>
	</section><!-- #comments -->
	<?php return; endif; ?>
	
	<a href = "#comment-form" title = "<?php _e('Leave a Comment' , TS_DOMAIN); ?>" class = "leave-a-comment"></a>
	
	<h3 class = "comments-title"><?php printf(_n('One Response' , '%1$s Responses' , get_comments_number() , TS_DOMAIN) , number_format_i18n(get_comments_number())); ?></h3>
	<div class = "leave-a-comment-text"><a href = "#comment-form" class = "meta"><?php _e('Leave a Comment' , TS_DOMAIN); ?></a></div>
	
	<?php if(have_comments()) : ?>
	<ol class = "comments-list">
		<?php wp_list_comments(array('callback' => 'ts_comment_format' , 'end-callback' => 'ts_end_comment_format')); ?>
	</ol>
	
	<?php if(get_comment_pages_count() > 1) : ?>
	<div class = "divider dashed"></div>
	<?php endif; ?>
	
	<?php else : ?>
	<div class = "divider dashed"></div>
	<?php _e('No comments so far.' , TS_DOMAIN); ?>
	<?php endif; ?>
	
	<nav class = "comments-pagination">
	<?php paginate_comments_links(); ?>
	</nav>
</section><!-- #comments -->

<?php if('open' == $post->comment_status) : ?>
	<div id = "respond">
		<section id = "comment-form">
		<span class = "leave-a-comment"></span>
		
			<h3 class = "form-title"><?php comment_form_title(__('Leave a Comment' , TS_DOMAIN) , __('Leave a Reply to' , TS_DOMAIN) . ' %s' ); ?></h3>
			 <span class = "meta form-tagline"><?php echo  ts_get_theme_option('comment_form_tagline'); ?></span>
			
			<?php if(get_option('comment_registration') && !$user_ID) : ?>
				<p class = "comment-form"><?php printf(__('You must be %1$s logged in %2$s to post a comment.' , TS_DOMAIN) , '<a href="' . get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink()) . '">' , '</a>'); ?></p>
			<?php else : ?>
			 
				<form action = "<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method = "post" id = "commentform" name = "commentform" class = "comment-form">
					<?php if($user_ID) : ?>
						<div class = "respond_form_user_fields">
							<p><?php _e('Logged in as' , TS_DOMAIN); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account' , TS_DOMAIN); ?>"><?php _e('Log out' , TS_DOMAIN); ?> &raquo;</a></p>
						</div>
					<?php else : ?>
						<div class = "form-input">
							<label><input type = "text" name = "author"><?php _e('Name' , TS_DOMAIN); ?><span>*</span></label>
						</div>
						
						<div class = "form-input">
							<label><input type = "text" name = "email"><?php _e('E-mail' , TS_DOMAIN); ?><span>*</span><small>(<?php _e('will not be published' , TS_DOMAIN); ?>)</small></label>
						</div>
						
						<div class = "form-input">
							<label><input type = "text" name = "url"><?php _e('Website' , TS_DOMAIN); ?></label>
						</div>
					<?php endif; ?>
						
					<div class = "form-input">
						<textarea name = "comment"></textarea>
					</div>
					 
					<button type = "submit" id = "submit" name = "submit" onclick = "javascript: document.forms['commentform'].submit(); return false;"><?php _e('Submit Comment' , TS_DOMAIN); ?></button>
					<button class = "secondary cancel_reply" id = "cancel-comment-reply-link" onclick = "javascript: window.location.href = '#respond'" style="display:none;"><?php _e('Cancel' , TS_DOMAIN); ?></button>
					<?php comment_id_fields(); ?>
					
					
					<?php do_action('comment_form', $post->ID); ?>
				</form>
			 
			<?php endif; // If registration required and not logged in ?>
		</section><!-- #comment-form -->
	</div><!-- #respond -->
	 
<?php endif; // if you delete this the sky will fall on your head ?>


<?php

function ts_end_comment_format($comment , $args , $depth){
	$GLOBALS['comment'] = $comment;
	
	return;
}

function ts_comment_format($comment , $args , $depth){
	$GLOBALS['comment'] = $comment;

	switch($comment->comment_type) :
		case '' :
		?>
		<li id = "comment-<?php comment_ID(); ?>" <?php comment_class('comment'); ?>>
			<div>
				<span class = "avatar"><?php echo get_avatar($comment , 40); ?></span>
				
				<div class = "comment-author">
					<?php echo get_comment_author_link(); ?>
				</div><!-- .comment-author -->
				
				<div class = "comment-meta">
					<a class = "comment-date" title = "<?php _e('Permalink to this comment' , TS_DOMAIN); ?>" href = "<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
						<time datetime = "<?php echo get_comment_date("Y-m-d"); ?>" class = "comment-meta commentmetadata">
						<?php echo ts_get_theme_option('comment_date_format') == 'ago' ? ts_get_time_ago(strtotime(get_the_time($comment->comment_date))) : get_comment_date() . ' ' . __('at' , TS_DOMAIN) . ' ' . get_comment_time(); ?>
						</time>
					</a>
					 - 
					<span class = "comment-action comment-reply comment-reply-link">
						<?php comment_reply_link(array_merge($args , array('depth' => $depth , 'max_depth' => $args['max_depth']))); ?>
					</span>
					
					<?php edit_comment_link(__('Edit' , TS_DOMAIN) , ' - <span class = "comment-action edit-link">' , '</span>'); ?>
					
					<?php if($comment->comment_approved == '0') : ?>
						<div class = "comment-pending-approval">
							 - <?php _e('Your comment is awaiting moderation.' , TS_DOMAIN); ?>
						</div>
					<?php endif; ?>
				</div><!-- .comment-meta -->

				<div class = "comment-body">
					<?php comment_text(); ?>
				</div><!-- .comment-body -->
			</div>
		<?php
		break;

		case 'pingback'  :
		case 'trackback' :

		break;
	endswitch;
}

?>