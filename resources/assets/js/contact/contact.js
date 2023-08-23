'use strict';

document.addEventListener('DOMContentLoaded', loadContactData);

function loadContactData() {

    listen('click', '.delete-contact-btn', function (event) {
        let deletePagetId = $(event.currentTarget).data('id');
        deleteItem(route('Contacts.destroy', deletePagetId), Lang.get('messages.common.contact'), 'Contact');
    })

}

