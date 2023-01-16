// 在targetElement之后插入新节点newElement
function insertAfter(newElement, targetElement){
    let parent = targetElement.parentNode;
    if(parent.lastChild == targetElement){
        parent.appendChild(newElement);
    }else{
        parent.insertBefore(newElement,targetElement.nextSibling);
    }
}

// 评论者标签
const comment_name = document.querySelectorAll('.post-comments .comment .comment-body .vcard .fn');
const comment_name_span = [];
const comment_name_i = [];
for(let i=0; i<comment_name.length; i++) {
    comment_name_span[i] = document.createElement('span');
    comment_name_span[i].innerText = comment_name[i].innerText;
    comment_name_i[i] = document.createElement('i');
    comment_name_i[i].innerText = '游客';
    // insertAfter(comment_name_i[i],comment_name[i]);
    comment_name[i].appendChild(comment_name_i[i]);
}
// 会员标签
const comment_member = document.querySelectorAll('.post-comments .byuser > .comment-body > .vcard > .fn > i');
for(let i=0; i<comment_member.length; i++) {
    comment_member[i].innerText = '会员';
}
// 作者标签
const comment_author = document.querySelectorAll('.post-comments .bypostauthor > .comment-body > .vcard > .fn > i');
for(let i=0; i<comment_author.length; i++) {
    comment_author[i].innerText = '作者';
}

// 删除评论区用户链接
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

// 回复时文本域聚焦
const replyText = document.querySelector('.post-comments .comment-respond textarea');
const currentUrl = window.location.href;
$(document).ready(function() {
    if (/replytocom=\d+#respond$/.exec(currentUrl)) {
        $(replyText).focus();
    } else {
        $(replyText).blur();
    }
})

// 文章、页面评论为0时隐藏
const comment_number = document.querySelector('.post-comments .post-comments-title a').innerHTML;
if(comment_number == "沙发") {
    document.querySelector('.post-comments .post-comments-title').style.display = 'none';
}

