/**
 * ハンバーガーメニューの開閉
 */
function openBurger() {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-list');
    const mask = document.querySelector('.mask');
    const lines = document.querySelectorAll('.burger-line');

    burger.addEventListener('click', function () {
        nav.classList.toggle('display');
        burger.classList.toggle('position');
        mask.classList.toggle('display');

        lines.forEach(line => {
            line.classList.toggle('active');
        });
    });
}
openBurger();

/**
 * 上方へ移動するボタンの出現と消失
 */
function upper() {
    const upper = document.querySelector('.upper');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 0) {
            upper.style.display = 'flex';
        } else {
            upper.style.display = 'none';
        }
    });
}
upper();

/**
 * コメントの削除
 */
function noneComment() {
    const comment = document.querySelector('.comment');

    setTimeout(function () {
        comment.style.display = 'none';
    }, 3500);
}
noneComment();