'use strict'

{

    const text = document.getElementById('text');
    window.onload = function() {
        var val = text.value;
        text.value = '';
        text.focus();
        text.value = val;
    }


    const item = document.getElementById('delete');
    item.addEventListener('submit', e => {
        e.preventDefault();

        if (!confirm('削除してよろしいですか？')) {
            return;
        }
        item.submit();
    })
}