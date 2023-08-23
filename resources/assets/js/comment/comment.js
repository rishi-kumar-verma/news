'use strict';

document.addEventListener('DOMContentLoaded', loadCommentData)

function loadCommentData() {
    let comments = 'comment'
    listen('click', '.comment-delete-btn', function (event) {
        let deleteCommentId = $(event.currentTarget).data('id');
        deleteItem(route('post-comments.destroy', deleteCommentId), comments, Lang.get('messages.comment.comment'));
    });

};

$(document).on('change', '.set-comment-btn', function (e) {
    const status = ($(this).prop('checked')) ? 0 : 1;
    $.ajax({
        url: 'comment-status/' + status,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
            }
        }
    });
});

