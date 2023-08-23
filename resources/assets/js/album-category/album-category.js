'use strict';

document.addEventListener('DOMContentLoaded', loadAlbumCategoryData);

function loadAlbumCategoryData() {

    let albumCategoryTableName = $('#albumCategoryTable');

    listen('click', '#AlbumCategory', function () {
        $('#createAlbumCategoryModal').modal('show').appendTo('body');
    });

    listen('hidden.bs.modal', '#createAlbumCategoryModal', function () {
        resetModalForm('#createAlbumCategoryForm',
            '#createAlbumCategoryValidationErrorsBox');
        $('#selectAlbum').val(null).trigger('change');
        $('#selectLanguage').val(null).trigger('change');
    });

    listen('hidden.bs.modal', '#editAlbumCategoryModal', function () {
        resetModalForm('#editAlbumCategoryForm',
            '#editCityValidationErrorsBox');
    });

    listen('click', '.edit-album-category-btn', function (event) {
        let id = $(event.currentTarget).data('id');
        renderData(id);
    });

    function renderData(id) {
        $.ajax({
            url: route('album-categories.edit', id),
            type: 'GET',
            success: function (result) {
                $('#albumCategoryID').val(result.data.id);
                $('#editName').val(result.data.name);
                $('#editAlbum').val(result.data.album_id).trigger('change');
                $('#editLanguage').val(result.data.lang_id).trigger('change');
                $('#editAlbumCategoryModal').modal('show').appendTo('body');
            },
        });
    }

    listen('submit', '#createAlbumCategoryForm', function (e) {
        e.preventDefault();
        $.ajax({
            url: route('album-categories.store'),
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#createAlbumCategoryModal').modal('hide');
                    window.livewire.emit('refresh');
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    });

    listen('submit', '#editAlbumCategoryForm', function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        let id = $('#albumCategoryID').val();
        $.ajax({
            url: route('album-categories.update', id),
            type: 'PUT',
            data: formData,
            success: function (result) {
                $('#editAlbumCategoryModal').modal('hide');
                displaySuccessMessage(result.message);
                window.livewire.emit('refresh');
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    });

    listen('click', '.delete-album-category-btn', function (event) {
        let albumCategoryId = $(event.currentTarget).data('id');
        deleteItem(route('album-categories.destroy', albumCategoryId), 
            Lang.get('messages.album_category.album_category'),albumCategoryTableName,);
    });
}