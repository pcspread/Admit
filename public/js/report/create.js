/**
 * 報告確認を行う
 */
function confirmReport() {
    if (window.confirm('報告してもよろしいですか？')) {
        return true;
    } else {
        return false;
    }
}