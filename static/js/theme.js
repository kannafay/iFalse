// 返回顶部
(function($) { "use strict";	
	$(document).ready(function(){"use strict";
		var progressPath = document.querySelector('.progress-wrap path');
		var pathLength = progressPath.getTotalLength();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
		progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
		progressPath.style.strokeDashoffset = pathLength;
		progressPath.getBoundingClientRect();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';		
		var updateProgress = function () {
			var scroll = $(window).scrollTop();
			var height = $(document).height() - $(window).height();
			var progress = pathLength - (scroll * pathLength / height);
			progressPath.style.strokeDashoffset = progress;
		};
		updateProgress();
		$(window).scroll(updateProgress);	
		var offset = 20;
		var duration = 0;
		jQuery(window).on('scroll', function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.progress-wrap').addClass('active-progress');
			} else {
				jQuery('.progress-wrap').removeClass('active-progress');
			};
		});				
		jQuery('.progress-wrap').on('click', function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		});
	});
})(jQuery);





// PC端导航栏用户菜单
const user_set_btn = document.querySelector('.nav-bar .admin img');
const user_set_menu = document.querySelector('.nav-bar .user-menu');
if(user_set_btn) {
    function remove_set_menu(e) {
        user_set_menu.classList.remove('user-menu-open');
        document.removeEventListener("click",remove_set_menu);
    };
    user_set_btn.addEventListener("click",(e)=>{
        e.stopPropagation();
        if(user_set_menu.classList.toggle('user-menu-open')) {
            document.addEventListener("click",remove_set_menu);
        };
    });
    user_set_menu.addEventListener("click",(e)=>e.stopPropagation());
};






// 移动端导航栏用户菜单
const user_set_btn_mb = document.querySelector('.nav-bar-mb .admin img');
const user_set_menu_mb = document.querySelector('.nav-bar-mb .user-menu');
if(user_set_btn_mb) {
    function remove_set_menu(e) {
        user_set_menu_mb.classList.remove('user-menu-open-mb');
        document.removeEventListener("click",remove_set_menu);
    };
    user_set_btn_mb.addEventListener("click",(e)=>{
        e.stopPropagation();
        if(user_set_menu_mb.classList.toggle('user-menu-open-mb')) {
            document.addEventListener("click",remove_set_menu);
        };
    });
    user_set_menu_mb.addEventListener("click",(e)=>e.stopPropagation());
};






// 移动端菜单
const menu_mb_open = document.querySelector('#menu-mb-open');
const menu_mb_close = document.querySelector('#menu-mb-close');
const menu_mb = document.querySelector('.menu-mb');
const menu_mb_mask = document.querySelector('.menu-mb-mask');

menu_mb_open.onclick = function() {
    menu_mb.className = 'menu-mb menu-mb-open';
    menu_mb_mask.className = 'menu-mb-mask menu-mb-mask-block';
};
menu_mb_mask.onclick = function() {
    menu_mb.className = 'menu-mb';
    this.className = 'menu-mb-mask';
};
menu_mb_close.onclick = function() {
    menu_mb.className = 'menu-mb';
    menu_mb_mask.className = 'menu-mb-mask';
};






// 滚动时隐藏用户菜单
$(window).scroll(function() {
    $(user_set_menu).removeClass('user-menu-open');
    $(user_set_menu_mb).removeClass('user-menu-open-mb');
})







// 目录树菜单按钮
const post_menu_btn = document.querySelector('.post-menu-btn');
const post_menu = document.querySelector('#article-toc');
if(post_menu && post_menu_btn) {
    function remove_post_menu(e) {
        post_menu.classList.remove('article-toc');
        document.removeEventListener("click",remove_post_menu);
    };
    post_menu_btn.addEventListener("click",(e)=>{
        e.stopPropagation();
        if(post_menu.classList.toggle('article-toc')) {
            document.addEventListener("click",remove_post_menu);
        };
    });
    post_menu.addEventListener("click",(e)=>e.stopPropagation());
};






// 滚动时收起toc
// $(window).scroll(function() {
//     $('#article-toc').removeAttr('class');
// })






// 删除 "发表在"
const comments_meta = document.querySelectorAll('.wp-block-latest-comments__comment-meta');
const comments_meta_fabiao = [];
if(comments_meta) {
    $(comments_meta).each(function(i) {
        comments_meta[i].removeChild(comments_meta[i].childNodes[1]);
    });
};
// 删除评论区用户超链接
const remove_comments_author_a = document.querySelectorAll('.wp-block-latest-comments__comment-author');
$(remove_comments_author_a).each(function(i) {
    remove_comments_author_a[i].removeAttribute('href');
});







// 给评论摘要添加超链接
const comments_links = document.querySelectorAll('.wp-block-latest-comments__comment-link');
const comments_excerpt = document.querySelectorAll('.wp-block-latest-comments__comment-excerpt p');
if(comments_links) {
    const comments_links_href = [];
    const comments_links_a = [];
    $(comments_excerpt).each(function(i) {
        comments_links_a[i] = document.createElement('a');
        comments_links_href[i] = comments_links[i].getAttribute('href');
        comments_links_a[i].setAttribute('href',comments_links_href[i]);
        comments_excerpt[i].parentNode.replaceChild(comments_links_a[i],comments_excerpt[i]);
        comments_links_a[i].appendChild(comments_excerpt[i]);
    });
};






// 滚动时隐藏header
var header_element = document.querySelectorAll(".header-hidden");
if(header_element) {
    var headroom = []; 
    $(header_element).each(function(i) {
        // headroom[i] = new Headroom(header_element[i]);
        headroom[i] = new Headroom(header_element[i], {
            "tolerance": 5,
            "offset": 205,
          });
        headroom[i].init(); 
    });
};







// 侧边栏搜索
const sidebar_search_input = document.querySelector('#primary-sidebar .widget_search input');
if(sidebar_search_input) {
    if(sidebar_search_input.getAttribute("placeholder") == false) {
        sidebar_search_input.setAttribute("placeholder","搜索...");
    };
};
const sidebar_search_btn = document.querySelector('#primary-sidebar .widget_search button');
if(sidebar_search_btn) {
    sidebar_search_btn.innerHTML = '<span class="iconfont icon-sousuo">';
};







// 图片预览
const content_p_img = document.querySelectorAll('.post-content img');
if(content_p_img && !document.querySelector('.container').classList.contains('page-link')) {
	const content_p_a = [];
	for(let i=0; i<content_p_img.length; i++) {
		content_p_a[i] = document.createElement('a');
		content_p_img[i].parentNode.replaceChild(content_p_a[i],content_p_img[i]);
		content_p_a[i].appendChild(content_p_img[i]);
        content_p_a[i].setAttribute('href',content_p_img[i].getAttribute('data-original'));
        content_p_a[i].setAttribute('data-fancybox','gallery');
	};
};

const say_p_img = document.querySelectorAll('.say-post-content p img');
if(say_p_img) {
	const say_p_a = [];
	for(let i=0; i<say_p_img.length; i++) {
		say_p_a[i] = document.createElement('a');
		say_p_img[i].parentNode.replaceChild(say_p_a[i],say_p_img[i]);
		say_p_a[i].appendChild(say_p_img[i]);
        say_p_a[i].setAttribute('href',say_p_img[i].getAttribute('data-original'));
        say_p_a[i].setAttribute('data-fancybox','gallery');
        say_p_a[i].className = 'say-img';
	};
};

const say_dt = document.querySelectorAll('.say-post-content .gallery .gallery-item dt');
const say_dt_img = document.querySelectorAll('.say-post-content .gallery .gallery-item dt img');
if(say_dt_img) {
	const say_dt_img_src = []; 
	for(let i=0; i<say_dt_img.length; i++) {
		say_dt[i].setAttribute('href',say_dt_img[i].getAttribute('data-original'));
        say_dt[i].setAttribute('data-fancybox','gallery');
	};
};






// 缩略图删除延迟加载
const swiper_img = document.querySelectorAll('.swiper .swiper-slide img');
$(swiper_img).each(function(i){
    swiper_img[i].setAttribute('src',swiper_img[i].getAttribute('data-original'));
    swiper_img[i].removeAttribute('data-original');
});






// 夜间模式按钮
function getCookie(name){
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i].trim();
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	};
	return null;
};

const night_btn = document.querySelector('.change-night-mb span');
const night_btn_pc = document.querySelector('.change-night-pc span');
const allImgs = document.querySelectorAll(`
    .post-content img,
    .say-banner img, 
    .say-post-content img, 
    .content .main-part ul li .home-pic img,
    .home-2 .home-2-mian ul li .home-2-pic img,
    .wrapper-home .swiper-slide img,
    .wrapper-recommend .recommend a img,
    .login-page .login-main .login-img
`); //获取首页、文章、页面、说说、主页图片

if (getCookie("night") == "1") {
    night_btn.classList.add('icon-rijianmoshixhdpi');
    night_btn_pc.classList.add('icon-rijianmoshixhdpi');

    //所有图片降低亮度
    for(let i=0; i<allImgs.length; i++) {
        allImgs[i].classList.add("img-night");
    };
} else {
    night_btn.classList.add('icon-yueduye-yejianmoshi');
    night_btn_pc.classList.add('icon-yueduye-yejianmoshi');

    //恢复所有图片降低亮度
    for(let i=0; i<allImgs.length; i++) {
        allImgs[i].classList.remove("img-night");
    };
};
function nightBtn() {
    if (getCookie("night") == "1") {
        night_btn.classList.add('icon-rijianmoshixhdpi');
        night_btn.classList.remove('icon-yueduye-yejianmoshi');
        night_btn_pc.classList.add('icon-rijianmoshixhdpi');
        night_btn_pc.classList.remove('icon-yueduye-yejianmoshi');
        // logo黑
        logo_light.style.display = "none";
        logo_night.style.display = "block";
        logo_light_m.style.display = "none";
        logo_night_m.style.display = "block";

        //所有图片降低亮度
        for(let i=0; i<allImgs.length; i++) {
            allImgs[i].classList.add("img-night");
        }
    } else {
        night_btn.classList.add('icon-yueduye-yejianmoshi');
        night_btn.classList.remove('icon-rijianmoshixhdpi');
        night_btn_pc.classList.add('icon-yueduye-yejianmoshi');
        night_btn_pc.classList.remove('icon-rijianmoshixhdpi');
        // logo白
        logo_light.style.display = "block";
        logo_night.style.display = "none";
        logo_light_m.style.display = "block";
        logo_night_m.style.display = "none";

        //恢复所有图片降低亮度
        for(let i=0; i<allImgs.length; i++) {
            allImgs[i].classList.remove("img-night");
        };
    };
};





// 侧边功能按钮
$(window).scroll(function() {
    let scrollTop = $(this).scrollTop();
    let scrollBottom = $(window).height() + scrollTop;
    if(window.innerWidth > 960) {
        if(scrollTop >= 20 ) {
            $('.change-night-pc, .post-menu-btn, .article-toc-mb').css({'opacity':'1','visibility':'visible','display':'flex'});
        } else {
            $('.change-night-pc, .post-menu-btn, .article-toc-mb').css({'opacity':'0','visibility':'hidden'});
        };
    } else if(window.innerWidth <= 960) {
        $('.change-night-pc').css({'opacity':'0','visibility':'hidden'});
        if(scrollTop >= 20 && scrollBottom < $(document).height() - 100) {
            $('.post-menu-btn, .article-toc-mb').css({'opacity':'1','visibility':'visible','display':'flex'});
        } else {
            $('.post-menu-btn, .article-toc-mb').css({'opacity':'0','visibility':'hidden'});
        };
    };
    if(post_menu == null) {
        $(post_menu_btn).css('display','none');
    }
});

$(window).resize(function() {
    let scrollTop = $(this).scrollTop();
    let scrollBottom = $(window).height() + scrollTop;
    if(window.innerWidth > 960) {
        if(scrollTop >= 20 ) {
            $('.change-night-pc, .post-menu-btn, .article-toc-mb').css({'opacity':'1','visibility':'visible','display':'flex'});
        } else {
            $('.change-night-pc, .post-menu-btn, .article-toc-mb').css({'opacity':'0','visibility':'hidden'});
        };
    } else if(window.innerWidth <= 960) {
        $('.change-night-pc').css({'opacity':'0','visibility':'hidden'});
        if(scrollTop >= 20 && scrollBottom < $(document).height() - 100) {
            $('.post-menu-btn, .article-toc-mb').css({'opacity':'1','visibility':'visible','display':'flex'});
        } else {
            $('.post-menu-btn, .article-toc-mb').css({'opacity':'0','visibility':'hidden'});
        };
    }
    if(post_menu == null) {
        $(post_menu_btn).css('display','none');
    }
})





// 折叠菜单
const menu_m = document.querySelectorAll('.nav-mb .nav-menu-mb > .menu-item-has-children'); // 一级
const menu_m_a = document.querySelectorAll('.nav-mb .nav-menu-mb > .menu-item-has-children > a'); // 一级a标签
const menu_m_a_i = document.querySelectorAll('.nav-mb .nav-menu-mb > .menu-item-has-children > a > i');

// 设置高度并添加点击事件
$(menu_m).each(function(i) {
    const menu_m_height = [];
    menu_m_height[i] = $(menu_m[i]).innerHeight();
    $(menu_m[i]).css("height",$(menu_m_a[i]).innerHeight());
    $(menu_m_a[i]).click(function() {
        $(menu_mb_mask).click(function() {
            $(menu_m[i]).css("height",$(menu_m_a[i]).innerHeight());
            $(menu_m_a_i[i]).css("transform","rotate(0deg)");
            $(menu_m_a[i]).removeClass("open");
        });
    });

    // 点击新的一级自动折叠其他二级
    menu_m_a[i].setAttribute('index', i);
    $(menu_m_a[i]).click(function() {
		var isOpen = $(this).hasClass("open");
        $(menu_m_a).each(function(i){
            $(menu_m_a_i[i]).css("transform","rotate(0deg)");
            $(menu_m_a[i]).removeClass("open");
        });
         
        $(menu_m).each(function(i){
            $(menu_m[i]).css("height", $(menu_m_a[i]).innerHeight());
        });

		if (false === isOpen) {
			$(this).addClass("open");	
			$(menu_m_a_i[this.getAttribute('index')]).css("transform","rotate(-90deg)");
			$(menu_m[this.getAttribute('index')]).css('height', menu_m_height[this.getAttribute('index')] + 'px');
        
	        if($(menu_m[this.getAttribute('index')]).innerHeight() == menu_m_height[this.getAttribute('index')]) {
	            $(menu_m[this.getAttribute('index')]).css("height",$(menu_m_a[i]).innerHeight());
	            $(menu_m_a_i[this.getAttribute('index')]).css("transform","rotate(0deg)");
	            $(menu_m_a[this.getAttribute('index')]).removeClass("open");
	        };
		};
    });

});

// 一级点击事件
const menu_m_li = document.querySelectorAll('.nav-mb > ul > .menu-item-has-children'); // 一级
const menu_m_li_a = document.querySelectorAll('.nav-mb > ul > .menu-item-has-children > a'); // 一级a标签
$(menu_m_li).each(function(i){
    let menu_m_li_item = menu_m_li[i].querySelectorAll('.nav-mb > ul > .menu-item-has-children ul li'); // 孩子
    $(menu_m_li_item).each(function(k){
        if(/current-menu-item/.exec(menu_m_li_item[k].getAttribute('class'))) {
            $(menu_m_li_a[i]).addClass("current");
            return false;
        };
    });
});

