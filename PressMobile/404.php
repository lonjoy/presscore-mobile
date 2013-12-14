<?php get_header() ;?>
<div id="content">
<div class="page_404">
<form id="search_form" class="search_form" action="<?php bloginfo('url');?>" method="get">
<div>
<input id="s" class="searchinput" type="text" tabindex="3" name="s" required="true">
<input id="searchsubmit" class="searchbutton" type="submit" tabindex="4" value="搜索">
</div>
</form>
<article class="entry_common"> 您要找的内容不存在或输入有误，建议您搜索一下。 </article>
</div>
</div>
<?php get_footer() ;?>