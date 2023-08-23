'use strict';

document.addEventListener('DOMContentLoaded', loadCategoryData);


function loadCategoryData() {

    let categoryTableName = $('#categoryTable');

    listen('click', '.edit-category-btn', function (event) {
        let categoryId = $(event.currentTarget).data('id');
        renderData(categoryId);
    });


    window.renderData = function (id) {
        $.ajax({
            url: categoriesUrl + '/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    $('#editCategoryId').val(result.data.id);
                    $('#editName').val(result.data.name);
                    $('#editSlug').val(result.data.slug);
                    $('#editSlugHide').val(result.data.slug);
                    $('#languageEditId').val(result.data.lang_id).trigger('change.select2');
                    if (result.data.show_in_menu == 1) {
                        $('.is-active-menu').val(1).prop('checked', true);
                    }
                    if (result.data.show_in_home_page == 1) {
                        $('.is-active-home').val(1).prop('checked', true);
                    }
                    $('#editModal').modal('show');
                }
            },
            error: function (result) {
                manageAjaxErrors(result);
            },
        });
    };

    $('#languageId').select2({
        width: '100%',
        dropdownParent: $('#addModal')
    });
    $('#languageEditId').select2({
        width: '100%',
        dropdownParent: $('#editModal')
    });

    listen('keyup',"#editName,#name",function() {
        var Text = $.trim($(this).val());
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#editSlug").val(Text);
        $('#editSlugHide').val(Text);
        $("#slug").val(Text);
        $('#slugHide').val(Text);
    });

    listen('hidden.bs.modal', '#addModal', function () {
        resetModalForm('#addNewCategories');
        $('#languageId').val(null).trigger('change');
    });

    listen('hidden.bs.modal', '#editModal', function () {
        $('.is-active-menu').val(0).prop('checked', false);
        $('.is-active-home').val(0).prop('checked', false);
    });

    listen('submit', '#addNewCategories', function (event) {
        event.preventDefault();
        $.ajax({
            url: categoriesStore,
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                $('#addModal').modal('hide');
                displaySuccessMessage(result.message);
                window.livewire.emit('refresh');
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    });

    listen('submit', '#editCategories', function (event) {
        event.preventDefault();
        let id = $('#editCategoryId').val();
        $.ajax({
            url: route('category.update', id),
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                $('#editModal').modal('hide');
                displaySuccessMessage(result.message);
                window.livewire.emit('refresh');
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },

        });
    });

    listen('click', '.delete-category-btn', function (event) {

        let deleteCategoryId = $(event.currentTarget).data('id');
        deleteItem(route('category.destroy', deleteCategoryId), 'Category', Lang.get('messages.gallery.category'));
    });
}

