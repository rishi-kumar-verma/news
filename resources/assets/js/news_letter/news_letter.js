'use strict';

document.addEventListener('DOMContentLoaded', loadNewsLetterData)

function loadNewsLetterData () {
    listen('click', '.delete-subscriber-btn', function (event) {
        let subscriberId = $(event.currentTarget).data('id')
        deleteItem(route('news-letter.destroy', subscriberId), Lang.get('messages.subscriber'), 'NewsLetter')
    })
}
