/**
 * 土日の色を変える
 */
function changeColorDay() {
    const days = document.querySelectorAll('.table-content.day');

    days.forEach(day => {
        if (day.textContent === '土') {
            day.style.backgroundColor = '#CCCCFF';
            day.parentElement.children[0].style.backgroundColor = '#CCCCFF';
            day.parentElement.children[2].style.backgroundColor = '#CCCCFF';
            day.parentElement.children[3].style.backgroundColor = '#CCCCFF';
        }
        if (day.textContent === '日') {
            day.style.backgroundColor = '#FFCCCC';
            day.parentElement.children[0].style.backgroundColor = '#FFCCCC';
            day.parentElement.children[2].style.backgroundColor = '#FFCCCC';
            day.parentElement.children[3].style.backgroundColor = '#FFCCCC';
        }
    });
}
changeColorDay();