//#region  show messages in (error or success) div
function showErr(msg, time = 2000, divErr = ".msg-err-js", divSuc = ".msg-suc-js") {
    hideLoading();
    window.scrollTo({ top: 0, behavior: 'smooth' });
    $(divSuc).slideUp();
    $(divErr).empty();
    $(divErr).prepend(msg);
    $(divErr).slideDown();
    $(divErr).animate({ opacity: '1' }, time);
    $(divErr).slideUp();
}

function showSuc(msg, time = 2000, divErr = ".msg-err-js", divSuc = ".msg-suc-js") {
    window.scrollTo({ top: 0, behavior: 'smooth' });
    $(divErr).slideUp();
    $(divSuc).empty();
    $(divSuc).prepend(msg);
    $(divSuc).slideDown();
    $(divSuc).animate({ opacity: '1' }, time);
    $(divSuc).slideUp();
}
//#endregion

//#region Loading Div
function showLoading() {
    $('#loading').fadeIn();
}

function hideLoading() {
    $('#loading').fadeOut();
}
//#endregion Loading Div