<?php get_header() ;?>

<div id="single">
    <div class="content-inside">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <a class="entry-list JS_Load" href="<?php the_permalink() ?>" itemtype="http://schema.org/Article" itemscope="itemscope" data-id="<?php echo $post->ID?>">

            <header class="entry-header">
                <div class="entry-comment-number"> <span class="number">
          <?php comments_number('0', '1', '%'); ?>
          </span> <span class="corner"></span> </div>
                <h2 class="entry-name" itemprop="headline">
                    <?php the_title(); ?>
                </h2>

            </header>


            <div class="entry-content" itemprop="description"> <div class="post-thumb">
                <?php post_thumbnail( 120,70 ); ?>
            </div><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 155,"……"); ?> </div>
            <div class="clear"></div>
            <div class="post-author"><?php past_date() ?> | <?php the_author(); ?></div>
        </a>

        <?php endwhile; endif;?>
        <div id="JS_LoadMore" class="load-more-link">
            <?php next_posts_link(__('加载更多文章')); ?>
        </div>
    </div>

</div>
<div class="ajax-status">
    <img width="36" src="<?php echo get_template_directory_uri(); ?>/img/loadingb.gif">
</div>
<?php get_footer() ;?>
