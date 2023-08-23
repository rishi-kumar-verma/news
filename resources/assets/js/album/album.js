'use strict';

document.addEventListener('DOMContentLoaded', loadAlbumData);

function loadAlbumData() {

    let albumTableName = $('#albumTable');

    if ($('#Album').length) {
      listen('click','#Album',function () {
            $('#createAlbumModal').modal('show').appendTo('body');
        });
    }

    listen('hidden.bs.modal', '#createAlbumModal', function () {
        resetModalForm('#createAlbumForm',
            '#createAlbumCategoryValidationErrorsBox');
        $('#selectLanguage').val(null).trigger('change');
    });

    listen('hidden.bs.modal', '#editCityModal', function () {
        resetModalForm('#editAlbumForm', '#editCityValidationErrorsBox');
    });

    listen('click', '.edit-album-btn', function (event) {
        let id = $(event.currentTarget).data('id');

        renderData(id);
    });

    function renderData(id) {
        $.ajax({
            url: route('albums.edit', id),
            type: 'GET',
            success: function (result) {
                $('#albumID').val(result.data.id);
                $('#editName').val(result.data.name);
                $('#editLanguage').val(result.data.lang_id).trigger('change');
                $('#editAlbumModal').modal('show').appendTo('body');
            },
        });
    }

    listen('submit', '#createAlbumForm', function (e) {
        e.preventDefault();
        $.ajax({
            url: route('albums.store'),
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#createAlbumModal').modal('hide');
                    window.livewire.emit('refresh');
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    });

    listen('submit', '#editAlbumForm', function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        let id = $('#albumID').val();
        $.ajax({
            url: route('albums.update', id),
            type: 'PUT',
            data: formData,
            success: function (result) {
                $('#editAlbumModal').modal('hide');
                displaySuccessMessage(result.message);
                window.livewire.emit('refresh');
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    });

    listen('click', '.delete-album-btn', function (event) {
        let deleteAlbumId = $(event.currentTarget).data('id');
        deleteItem(route('albums.destroy', deleteAlbumId), Lang.get('messages.gallery.album'));
    });
}
