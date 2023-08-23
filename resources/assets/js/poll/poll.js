'use strict';

document.addEventListener('DOMContentLoaded', loadPollData)

function loadPollData () {

        listen('click', '.delete-poll-btn', function (event) {
            let pollTableName = $('#PollsTable')
            let deletePollId = $(event.currentTarget).data('id')
            deleteItem(route('polls.destroy', deletePollId), Lang.get('messages.poll.poll'), pollTableName)
        });
}
