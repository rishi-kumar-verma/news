'use strict';

document.addEventListener('DOMContentLoaded', loadMenuData);

function loadMenuData() {

    let categoryTableName = $('#categoryTable');

    listen('click', '.delete-menu-btn', function (event) {
        let deleteMenuId = $(event.currentTarget).data('id');
        deleteItem(route('menus.destroy', deleteMenuId), Lang.get('messages.menu.menu'), categoryTableName);
    })
}
