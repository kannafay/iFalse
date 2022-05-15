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


// 文章页
const remove_comment_h2_href = document.querySelectorAll('.post-comments .post-comments-content h2 a')[0];
if(remove_comment_h2_href){remove_comment_h2_href.removeAttribute('href')}

const change_comment_submit_text = document.querySelector('.post-comments .post-comments-content #commentform #submit');
if(change_comment_submit_text){change_comment_submit_text.value = 'BiuBiu'}

const change_comment_respond_textarea = document.querySelector('.post-comments .post-comments-content .comment-respond textarea');
if(change_comment_respond_textarea){change_comment_respond_textarea.rows = '6'}

const change_comment_respond_title = document.querySelector('.post-comments .post-comments-content #respond #reply-title');
if(change_comment_respond_title){change_comment_respond_title.firstChild.data = '说点什么？';}

const change_comment_respond_textarea_text = document.querySelector('.post-comments .post-comments-content .comment-respond textarea');
if(change_comment_respond_textarea_text){change_comment_respond_textarea_text.setAttribute('placeholder','一起热爱这个世界！')}

const change_comment_respond_author = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-author input');
if(change_comment_respond_author){change_comment_respond_author.setAttribute('placeholder','昵称*')}

const change_comment_respond_email = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-email input');
if(change_comment_respond_email){change_comment_respond_email.type = 'email'}

const change_comment_respond_email_tip = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-email input');
if(change_comment_respond_email_tip){change_comment_respond_email_tip.setAttribute('placeholder','邮箱*')}

const change_comment_respond_url = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-url input');
if(change_comment_respond_url){change_comment_respond_url.setAttribute('placeholder','网址(非必填)')}

const change_comment_respond_cookie = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-cookies-consent label');
if(change_comment_respond_cookie){change_comment_respond_cookie.innerText = '保留我的信息，方便下次评论'}

const change_comment_email_notes = document.querySelector('.post-comments .post-comments-content .comment-respond #email-notes');
if(change_comment_email_notes){change_comment_email_notes.innerText = '发表评论'}



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

