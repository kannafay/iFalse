const respond_box = document.querySelector('.post-comments-content #respond');
const comments_content_box = document.querySelector('.post-comments-content');


//功能: 在targetElement之后插入 新节点newElement
function insertAfter(newElement, targetElement){
    let parent = targetElement.parentNode;
    if(parent.lastChild == targetElement){
        parent.appendChild(newElement);
    }else{
        parent.insertBefore(newElement,targetElement.nextSibling);
    }
}


//添加博主标签
const comment_author_name_a = document.querySelectorAll('.post-comments .post-comments-content .fn a');
const comment_author_card = document.querySelectorAll('.post-comments .post-comments-content .fn .master');
const comment_author_i = [];
const comment_author_title = [];
for(let i=0; i<comment_author_card.length; i++) {
    comment_author_i[i] = document.createElement('i');
    comment_author_title[i] = document.createTextNode('博主');
    comment_author_i[i].appendChild(comment_author_title[i]);
    insertAfter(comment_author_i[i],comment_author_card[i]);
    // function SlyarErrors(){return true;}window.onerror=SlyarErrors;
}

//删除所有a href
const remove_author_a = document.querySelectorAll('.post-comments .post-comments-content .fn a');
for(let i=0; i < remove_author_a.length; i++) {
    remove_author_a[i].removeAttribute('href');
}
const remove_time_a = document.querySelectorAll('.post-comments .post-comments-content .comment-meta a:first-child');
for(let i=0; i < remove_time_a.length; i++) {
    remove_time_a[i].removeAttribute('href');
}


//改变上下页名称
const comment_page_up = document.querySelector('#post-comments-nav .prev');
if(comment_page_up){comment_page_up.innerText = '<';}
const comment_page_down = document.querySelector('#post-comments-nav .next');
if(comment_page_down){comment_page_down.innerText = '>';}
