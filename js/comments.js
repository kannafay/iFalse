// 在targetElement之后插入新节点newElement
function insertAfter(newElement, targetElement){
    let parent = targetElement.parentNode;
    if(parent.lastChild == targetElement){
        parent.appendChild(newElement);
    }else{
        parent.insertBefore(newElement,targetElement.nextSibling);
    }
}

// 添加博主标签
const comment_author_name_a = document.querySelectorAll('.post-comments .post-comments-content .fn a');
const comment_author_card = document.querySelectorAll('.post-comments .post-comments-content .fn .master');
const comment_author_i = [];
const comment_author_title = [];
for(let i=0; i<comment_author_card.length; i++) {
    comment_author_i[i] = document.createElement('i');
    comment_author_title[i] = document.createTextNode('作者');
    comment_author_i[i].appendChild(comment_author_title[i]);
    insertAfter(comment_author_i[i],comment_author_card[i]);
}

// 删除评论链接
const remove_author_a = document.querySelectorAll('.post-comments .post-comments-content .fn a');
for(let i=0; i<remove_author_a.length; i++) {
    remove_author_a[i].removeAttribute('href');
}
const remove_time_a = document.querySelectorAll('.post-comments .post-comments-content .comment-meta a:first-child');
for(let i=0; i<remove_time_a.length; i++) {
    remove_time_a[i].removeAttribute('href');
}

// 删除文章页/页面评论数量的超链接
const article_comment_num_a = document.querySelector('.single-detail .other .comments a');
const page_comment_num_a = document.querySelector('.page-detail .other .comments a');
if(article_comment_num_a) {
    article_comment_num_a.removeAttribute('href');
}
if(page_comment_num_a) {
    page_comment_num_a.removeAttribute('href');
}

// 改变上下页名称
const comment_page_up = document.querySelector('#post-comments-nav .prev');
if(comment_page_up){comment_page_up.innerText = '<';}
const comment_page_down = document.querySelector('#post-comments-nav .next');
if(comment_page_down){comment_page_down.innerText = '>';}

// 评论区
const remove_comment_h2_href = document.querySelectorAll('.post-comments .post-comments-content .post-comments-title a')[0];
if(remove_comment_h2_href){remove_comment_h2_href.removeAttribute('href')}

const change_comment_submit_text = document.querySelector('.post-comments .post-comments-content #commentform #submit');
if(change_comment_submit_text){change_comment_submit_text.value = 'BiuBiu'}

const change_comment_respond_textarea = document.querySelector('.post-comments .post-comments-content .comment-respond textarea');
if(change_comment_respond_textarea){change_comment_respond_textarea.rows = '6'}

const change_comment_respond_textarea_text = document.querySelector('.post-comments .post-comments-content .comment-respond textarea');
if(change_comment_respond_textarea_text){change_comment_respond_textarea_text.setAttribute('placeholder','友好发言，维护世界和平!')}

const change_comment_respond_author = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-author input');
const change_comment_respond_author_label = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-author label');

if(change_comment_respond_author){change_comment_respond_author.setAttribute('placeholder',change_comment_respond_author_label.innerText)}

const change_comment_respond_email = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-email input');
if(change_comment_respond_email){change_comment_respond_email.type = 'email'}

const change_comment_respond_email_tip = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-email input');
const change_comment_respond_email_tip_label = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-email label');
if(change_comment_respond_email_tip){change_comment_respond_email_tip.setAttribute('placeholder',change_comment_respond_email_tip_label.innerText)}

const change_comment_respond_url = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-url input');
const change_comment_respond_url_label = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-url laebl');
if(change_comment_respond_url){change_comment_respond_url.setAttribute('placeholder','您的站点（非必填）')}

const change_comment_respond_cookie = document.querySelector('.post-comments .post-comments-content .comment-respond .comment-form-cookies-consent label');
if(change_comment_respond_cookie){change_comment_respond_cookie.innerText = '保留我的信息，方便下次评论'}

const change_comment_email_notes = document.querySelector('.post-comments .post-comments-content .comment-respond #email-notes');
if(change_comment_email_notes){change_comment_email_notes.innerText = '发表评论'}

const change_comment_edit = document.querySelectorAll('.post-comments .comment-meta .comment-edit-link');
$(change_comment_edit).each(function(i) {
    change_comment_edit[i].innerText = '编辑评论';
})

const replyText = document.querySelector('.post-comments .comment-respond textarea');
const currentUrl = window.location.href;
$(document).ready(function() {
    if (/replytocom=\d+#respond$/.exec(currentUrl)) {
        $(replyText).focus();
    } else {
        $(replyText).blur();
    }
})