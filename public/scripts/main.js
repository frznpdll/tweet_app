'use strict';

{
    const item = document.getElementById('delete');
    item.addEventListener('submit', e => {
        e.preventDefault();

        if (!confirm('削除してよろしいですか？')) {
            return;
        }
        item.submit();
    })
}