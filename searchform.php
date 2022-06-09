<form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo('url') ?>">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="搜索这个世界" required>
    <button type="submit"><span class="iconfont icon-sousuo"></span></button>
</form>