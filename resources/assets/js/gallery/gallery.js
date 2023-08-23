'use strict';

document.addEventListener('DOMContentLoaded', loadGalleryData)

function loadGalleryData () {

    let galleryTableName = $('#galleryTable')

    if (!galleryTableName) {
        return
    }
        listen('click', '.delete-gallery-image-btn', function (event) {
            let deletePollId = $(event.currentTarget).data('id');
            deleteItem(route('gallery-images.destroy', deletePollId),
                Lang.get('messages.details.gallery'),'#galleryTable' )
        })
}
