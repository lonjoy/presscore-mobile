<?php get_header() ;?>

<div id="single">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="<?php echo $post->ID?>" class="entry-list" itemtype="http://schema.org/Article" itemscope="itemscope" data-id="<?php echo $post->ID?>">
        <meta itemprop="inLanguage" content="zh-CN">
        <header class="entry-header">

            <h2 class="entry-name" itemprop="headline">
                <?php the_title(); ?>
            </h2>
            <div class="entry-comment-number"> <span class="number">
          <?php comments_popup_link('0', '1', '%'); ?>
          </span> <span class="corner"></span> </div>
        </header>
        <div class="post-author-single"><?php past_date() ?> | <?php the_author(); ?></div>
        <!--.postMeta-->
        <div class="entry-content" itemprop="description">
            <?php the_content(); ?>
        </div>
        <div class="clear"></div>
    </article>
    <div id="post-meta" class="normal">
        <div id="post-meta-cmt"><?php comments_number('0', '1', '%'); ?>
            <i class="icon icon2-mobile-web-cmt m-l-5"></i>
        </div>
        <span class="arrow arrow-top"></span>
    </div>

    <div class="clear"></div>
    <?php comments_template( '', true ); ?>
    <?php endwhile; endif;?>


</div>
<?php get_footer() ;?>
