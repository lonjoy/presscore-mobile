<div id="footer">
    <a id="JS_BackTop" class="back-to-top" href="javascript:void(0);">回到顶部</a>
    <div class="clear"></div>
</div>
</div>
<div id="mobile-holder">
    <div class="open-mobile"></div><nav class="mobile-nav">
    <ul>
        <?php if ( !is_home() ){ ?>
        <li><a href="<?php bloginfo('url');?>">回首页</a></li>
        <?php } ?>
        <?php
$args = array(
	'type'                     => 'post',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'name',
        'order'                    => 'ASC',
        'hide_empty'               => 1,
        'hierarchical'             => 1,
        'exclude'                  => '',
        'include'                  => '',
        'number'                   => '',
        'taxonomy'                 => 'category',
        'pad_counts'               => false );
        $categories=get_categories($args);
        foreach($categories as $category) {
        echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></li> ';
        }
        ?>
    </ul>

</nav></div>
<div id="search-container" class="ajax_search">
    <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="filter_container"><input type="text" value="" autocomplete="off" placeholder="输入内容并回车" name="s" id="search-input"/><ul id="search_filtered" class="search_filtered"></ul> </div>
        <input type="submit" name="submit" id="searchsubmit" class="searchsubmit" value=""/>
    </form>
</div>
<div id="holder"></div>
<?php wp_footer(); ?>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/global.js?20131214"></script>
</body>
</html>