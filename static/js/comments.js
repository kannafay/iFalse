// 在targetElement之后插入新节点newElement
function insertAfter(newElement, targetElement) {
    let parent = targetElement.parentNode;
    if(parent.lastChild == targetElement){
        parent.appendChild(newElement);
    }else{
        parent.insertBefore(newElement,targetElement.nextSibling);
    };
};

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
};
// 会员标签
const comment_member = document.querySelectorAll('.post-comments .byuser > .comment-body > .vcard > .fn > i');
for(let i=0; i<comment_member.length; i++) {
    comment_member[i].innerText = '会员';
};
// 作者标签
const comment_author = document.querySelectorAll('.post-comments .bypostauthor > .comment-body > .vcard > .fn > i');
for(let i=0; i<comment_author.length; i++) {
    comment_author[i].innerText = '作者';
};
// 博主标签改善
const comment_vcard = document.querySelectorAll('.post-comments .comment .comment-body .vcard');
const web_master = [];
for(let i=0; i<comment_vcard.length; i++) {
    web_master[i] = comment_vcard[i].querySelector('i').innerText + comment_vcard[i].querySelector('.fn > i').innerText;
    // console.log(web_master[i]);
    if(web_master[i] == "博主会员") {
        comment_vcard[i].querySelector('.fn > i').style.display = 'none';
    };
};

// 删除评论区用户链接
const remove_author_a = document.querySelectorAll('.post-comments .fn a');
for(let i=0; i<remove_author_a.length; i++) {
    remove_author_a[i].removeAttribute('href');
};
const remove_time_a = document.querySelectorAll('.post-comments .comment-meta a:first-child');
for(let i=0; i<remove_time_a.length; i++) {
    remove_time_a[i].removeAttribute('href');
};

// 删除文章页/页面评论数量的超链接
const article_comment_num_a = document.querySelector('.single-detail .other .comments a');
const page_comment_num_a = document.querySelector('.page-detail .other .comments a');
if(article_comment_num_a) {
    article_comment_num_a.removeAttribute('href');
};
if(page_comment_num_a) {
    page_comment_num_a.removeAttribute('href');
};

// 改变上下页名称
const comment_page_up = document.querySelector('#post-comments-nav .prev');
if(comment_page_up){comment_page_up.innerText = '<'};
const comment_page_down = document.querySelector('#post-comments-nav .next');
if(comment_page_down){comment_page_down.innerText = '>'};

// 评论区
const remove_comment_h2_href = document.querySelectorAll('.post-comments .post-comments-title a')[0];
if(remove_comment_h2_href){remove_comment_h2_href.removeAttribute('href')};

const change_comment_submit_text = document.querySelector('.post-comments #commentform #submit');
if(change_comment_submit_text){change_comment_submit_text.value = 'BiuBiu'};

const change_comment_respond_textarea = document.querySelector('.post-comments .comment-respond textarea');
if(change_comment_respond_textarea){change_comment_respond_textarea.rows = '6'};

const change_comment_respond_author = document.querySelector('.post-comments .comment-respond .comment-form-author input');
const change_comment_respond_author_label = document.querySelector('.post-comments .comment-respond .comment-form-author label');

if(change_comment_respond_author){change_comment_respond_author.setAttribute('placeholder',change_comment_respond_author_label.innerText)};

const change_comment_respond_email = document.querySelector('.post-comments .comment-respond .comment-form-email input');
if(change_comment_respond_email){change_comment_respond_email.type = 'email'};

const change_comment_respond_email_tip = document.querySelector('.post-comments .comment-respond .comment-form-email input');
const change_comment_respond_email_tip_label = document.querySelector('.post-comments .comment-respond .comment-form-email label');
if(change_comment_respond_email_tip){change_comment_respond_email_tip.setAttribute('placeholder',change_comment_respond_email_tip_label.innerText)};

const change_comment_respond_url = document.querySelector('.post-comments .comment-respond .comment-form-url input');
const change_comment_respond_url_label = document.querySelector('.post-comments .comment-respond .comment-form-url laebl');
if(change_comment_respond_url){change_comment_respond_url.setAttribute('placeholder','您的站点（非必填）')};

const change_comment_respond_cookie = document.querySelector('.post-comments .comment-respond .comment-form-cookies-consent label');
if(change_comment_respond_cookie){change_comment_respond_cookie.innerText = '保留我的信息，方便下次评论'};

const change_comment_email_notes = document.querySelector('.post-comments .comment-respond #email-notes');
if(change_comment_email_notes){change_comment_email_notes.innerText = '发表评论'};

const change_comment_edit = document.querySelectorAll('.post-comments .comment-meta .comment-edit-link');
$(change_comment_edit).each(function(i) {
    change_comment_edit[i].innerText = '编辑评论';
});

// 文章、页面评论为0时隐藏
const comment_number = $('.post-comments .post-comments-title a').text();
if(comment_number == "沙发") {
    $('.post-comments-title').text('还没有人评论哦！');
    $('.post-comments-title').css('margin-bottom','0');
};


// 回复时移动输入框
let respond_id = null;
$(document).ready(function() {
    if (/replytocom=\d+/.exec(window.location.href)) {
        respond_id = Number(/\d+/.exec(/replytocom=\d+/.exec(window.location.href)));
    };

    comment_respond = document.querySelector('.post-comments .comment-respond'); //回复框
    comment_respond_title = document.querySelector('.post-comments .comment-respond .comment-reply-title'); //标题
    comment_respond_title_a = document.querySelector('.post-comments .comment-respond .comment-reply-title #cancel-comment-reply-link'); //标题
    comment_comment = document.querySelectorAll('.post-comments .comment-body'); //评论者卡片
    comment_comment_input = document.querySelector('.post-comments .comment-respond .form-submit'); //提交按钮
    if(comment_respond_title_a){
        comment_respond_cancel_url = comment_respond_title_a.getAttribute('href');
        comment_respond_cancel = document.createElement('span').innerHTML = `<a class="comment-cancel-btn" href="${comment_respond_cancel_url}">取消回复</a>`;
    };
    comment_comment_id = [];

    $(comment_comment).each(function(i) {
        comment_comment_id[i] = Number(/\d+/.exec(comment_comment[i].getAttribute('id')));
        if(comment_comment_id[i] == respond_id) {
            insertAfter(comment_respond, comment_comment[i]);
            $(comment_respond_title).css('display','none');
            $(comment_comment[i].querySelector('.reply')).css('display','none');
            $(comment_respond).css('margin-top','15px');
            $(replyText).focus();
            $(replyText).css('margin-bottom','5px');
            $(comment_comment_input).append(comment_respond_cancel);
            $('.post-comments .comment-respond .form-submit input').css('width','70%');
            $(`.post-comments .comment-respond textarea,
            .post-comments .comment-respond .comment-form-author input, 
            .post-comments .comment-respond .comment-form-email input, 
            .post-comments .comment-respond .comment-form-url input`).css({'box-shadow':'none','background-color':'var(--box-comment)'});
            $("html,body").animate({scrollTop:$(comment_comment[i]).offset().top - 110}, 300); //距离顶部110px
            $(change_comment_respond_textarea).attr('placeholder', '@' + $(comment_respond_title.querySelector('a')).text());//改变文本框placeholder
            return false;
        };
    });
    if(!respond_id) {
        $(change_comment_respond_textarea).attr('placeholder', '一言加载中...')
        fetch('https://v1.hitokoto.cn')
        .then(response => response.json())
        .then(data => {
          if(change_comment_respond_textarea) {
            $(change_comment_respond_textarea).attr('placeholder', data.hitokoto);
          }
        })
        .catch(console.error);
    };
});