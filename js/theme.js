// 头部
const menu_mb_open = document.querySelector('#menu-mb-open');
const menu_mb_close = document.querySelector('#menu-mb-close');
const menu_mb = document.querySelector('.menu-mb');
const menu_mb_mask = document.querySelector('.menu-mb-mask');

menu_mb_open.onclick = function() {
    menu_mb.className = 'menu-mb menu-mb-open';
    menu_mb_mask.className = 'menu-mb-mask menu-mb-mask-block';
}
menu_mb_mask.onclick = function() {
    menu_mb.className = 'menu-mb';
    this.className = 'menu-mb-mask';
}
menu_mb_close.onclick = function() {
    menu_mb.className = 'menu-mb';
    menu_mb_mask.className = 'menu-mb-mask';
}

// 懒加载
! function(window, document, $, undefined) {
    function lazyScroll() {
        $('img').each(function(index, item) {
            let bTop = $(this).offset().top;
            let scrollHeight = $(':root').scrollTop();
            let screenHeight = window.innerHeight;
            if ((scrollHeight + screenHeight) > bTop) {
                $(this).attr('src', $(this).data('src'))
            }
        })
    }
    lazyScroll()
    $(window).on('scroll', lazyScroll)
}(window, document, jQuery)

// 移动端菜单按钮
const post_menu_mb_btn = document.querySelector('.post-menu-mb-btn');
const post_menu_mb = document.querySelector('#article-toc-mb');
if(post_menu_mb) {
    post_menu_mb_btn.className = 'post-menu-mb-btn post-menu-mb-btn-on';
    var i_flag = 0;
    post_menu_mb_btn.onclick = function() {
        if(i_flag == 0) {
            post_menu_mb.className = 'article-toc-mb';
            i_flag = 1;
        } else {
            post_menu_mb.className = '';
            i_flag = 0;
        }
    }
}

// 删除 "发表在"
const comments_meta = document.querySelectorAll('.wp-block-latest-comments__comment-meta');
const comments_meta_fabiao = [];
if(comments_meta) {
    for(let i=0; i<comments_meta.length; i++) {
        comments_meta[i].removeChild(comments_meta[i].childNodes[1]);
    }    
}

// 关于
console.log('%c iFalse %c https://gitee.com/kannafay/ifalse', 'background: linear-gradient(to right, #8183ff, #a1a1f7);color:#fff;border-radius:2px;', '');

// 查询次数，花费时间
const queries_num = document.querySelector('#queries_num');
console.log(queries_num.firstChild.data);

// 给评论摘要添加超链接
const comments_links = document.querySelectorAll('.wp-block-latest-comments__comment-link');
const comments_excerpt = document.querySelectorAll('.wp-block-latest-comments__comment-excerpt p');
if(comments_links) {
    const comments_links_href = [];
    const comments_links_a = [];
    for(let i=0; i<comments_links.length; i++) {
        comments_links_a[i] = document.createElement('a');
        comments_links_href[i] = comments_links[i].getAttribute('href');
        comments_links_a[i].setAttribute('href',comments_links_href[i]);
        comments_excerpt[i].parentNode.replaceChild(comments_links_a[i],comments_excerpt[i]);
        comments_links_a[i].appendChild(comments_excerpt[i]);
        // console.log(comments_links_href[i]);
    }
}
// console.log(comments_links);
// console.log(comments_excerpt);
