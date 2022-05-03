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
