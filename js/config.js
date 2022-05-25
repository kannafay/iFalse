/**
 * 该文件为主题参数默认值
 */
 var header = new Vue({
    el: '.user-info',
    data: {
        hello: 'Hi, 请登录!', // 未登录时显示
    },
})
var banner = new Vue({
    el: '.wrapper',
    data: {
        text: '不管你是什么派，坚持你的坚持，热爱你的热爱', // 首页banner区大头文字，主要用于形象展示
        name: '神秘布偶猫', // 昵称
    },
})

var sidebar = new Vue({
    el: '.post-author-description',
    data: {
        description: '这家伙很懒，什么都没写', // 作者描述

    },
})

var footer = new Vue({
    el: '.footer',
    data: {
        copyright: 'Copyright © 2022', // 版权信息
        power: 'Theme iFalse by', // 主题作者*
        author: '神秘布偶猫', // 作者昵称*
        url: 'https://www.onll.cn', // 作者网站*
        statement: '站点声明: 本站转载作品版权归原作者及来源网站所有，原创内容作品版权归作者所有，任何内容转载、商业用途等均须联系原作者并注明来源。', // 末尾网站版权提示
    },
})

var page_404 = new Vue({
    el: '.page-404',
    data: {
        text_404: '抱歉, 您请求的页面暂时无法打开, 请稍后再试!',
        backhome_404: '返回首页',
    },
})
