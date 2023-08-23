'use strict';

document.addEventListener('DOMContentLoaded', rolePageData)

function rolePageData() {

    listen('click', '.delete-btn', function (event) {
        let tableName = '#rolesTable';
        let recordId = $(event.currentTarget).data('id');
        deleteItem(route('roles.destroy', recordId), 'Role', Lang.get('messages.role.role'));
    });

    listen('click', '#checkAllPermission', function () {
        if ($('#checkAllPermission').is(':checked')) {
            $('.permission').each(function () {
                $(this).prop('checked', true);
            });
        } else {
            $('.permission').each(function () {
                $(this).prop('checked', false);
            });
        }
    });

    listen('click', '.permission', function () {
        if($('.permission:checked').length === $('.permission').length){
            $('#checkAllPermission').prop('checked',true);
        }else{
            $('#checkAllPermission').prop('checked',false);
        }
    })

}
