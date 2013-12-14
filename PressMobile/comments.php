<div id="comments" class="comments_box">

	<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
	    <?php die('貌似你做了些不该做的……Big brother is watching you！'); ?>
	<?php endif; ?>
	<?php if(!empty($post->post_password)) : ?>
	    <?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
	    <?php endif; ?>
	<?php endif; ?>
	<?php $i++; ?> 
	
	<?php //trackbacks计数分离
	if (function_exists('wp_list_comments')) {
		$trackbacks = $comments_by_type['pings'];
	} else {
		$trackbacks = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_approved = '1' AND (comment_type = 'pingback' OR comment_type = 'trackback') ORDER BY comment_date", $post->ID));
	}?>

	
		<?php if($comments) : //如果有评论 ?>
		
			
	
	
			<?php if ( function_exists('wp_list_comments') ) : //嵌套评论 ?>
			<div class="commentshow">
			<div id="loading-comments"></div>
	<ol class="comment_list" >
	<?php wp_list_comments('type=comment&callback=devecomment&max_depth=10000'); ?>
	</ol>
	<nav class="commentnav">
		<?php paginate_comments_links('prev_text=«&next_text=»');?>
	</nav>
	</div>
			<?php else : ?>
					
			<?php endif; ?>
			
			
			
									
	<?php else : ?>
	 
	<?php endif; ?>
	
	
	<?php if(comments_open()) : ?>
		
	<div id="respond" class="respond" role="form">
    <h2 id="reply-title" class="comments-title"> 发表评论 <small>
      <?php cancel_comment_reply_link(); ?>
      </small> </h2>
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
    <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
      <?php if ( $user_ID ) : ?>
      <p style="margin-bottom:10px">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;|&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
      <?php else : ?>
      <div id="comment-author-info" <?php if ( !empty($comment_author) ) echo 'style="display:none"'; ?>>
        <p>
          <input type="text" placeholder="姓名" required="" name="author" id="author" value="<?php echo $comment_author; ?>" size="14" tabindex="1" />
          <label for="author">签名</label>
          <em>*</em></p>
        <p>
          <input type="text" placeholder="fuck@example.com" required="" name="email" id="email" value="<?php echo $comment_author_email; ?>"  pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" size="25" tabindex="2" />
          <label for="email">邮箱</label>
          <em>*</em></p>
        <p class="comment-author-url">
          <input placeholder="http://xxx.xxx.xxx" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="36" tabindex="3" />
          <label for="url">网址</label>
        </p>
      </div>
      <?php if ( !empty($comment_author) ) { ?>
      <div id="author-info"> <span class="author-info-r"><a id="tab-author" href="javascript:;">更改用户</a></span> <?php echo $comment_author ?> </div>
      <?php } ?>
      <?php endif; ?>
      
      <p class="comment-form-comment">
        <textarea  placeholder="来一发" required="" name="comment" id="comment" rows="10" tabindex="4" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
      </p>
	  <input name="submit" type="submit" id="submit" class="commentsubmit" tabindex="5" value="SUBMIT（Ctrl + Enter）" />
      <?php comment_id_fields(); ?>
      <?php do_action('comment_form', $post->ID); ?>
    </form>
    <?php endif; ?>
  </div>
		  
		<?php endif; ?>
	
</div>