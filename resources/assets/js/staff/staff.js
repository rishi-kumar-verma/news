'use strict';

document.addEventListener('DOMContentLoaded', loadStaffData);

function loadStaffData() {

    let staffTableName = $('#staffTable');

        listen('click', '.delete-staff-btn', function (event) {
            let deleteStaffId = $(event.currentTarget).data('id');
            deleteItem(route('staff.destroy', deleteStaffId), Lang.get('messages.staff.staff'), staffTableName);
        })
}

