<div class="content-wrapper">
        <div class="text-wrapper">
            <h2><?php if(get_option("i_wrapper_text")) {echo get_option("i_wrapper_text");} else{echo '<p id="hitokoto"><span id="hitokoto_text">一言加载中...</span></p>';} ?></h2>
            <i><?php if(get_option("i_wrapper_name")) {echo get_option("i_wrapper_name");} else{echo '<p id="hitokoto_author"></p>';} ?></i>
        </div>
    </div>