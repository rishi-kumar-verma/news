'use strict';
$(document).ready(function () {
    $('.translateLanguage,#subFolderFiles').select2();

    let lang = languageName;
    let file = fileName;
    let url = currentUrl+'?';
        listen('change', '.translateLanguage', function () {
            lang = $(this).val();
            if (lang == '') {
                window.location.href = url;
            } else {
                window.location.href = url + 'name=' + lang + '&file=' + file;
            }
        });

        listen('change', '#subFolderFiles', function () {
            file = $(this).val();
            if (file == '') {
                location.href = url;
            } else {
                window.location.href = url + 'name=' + lang + '&file=' + file;
            }
        });
});

    listen('click', '.addLanguageModal', function () {
        $('#addModal').appendTo('body').modal('show');
    });

    listen('hidden.bs.modal','#addModal', function () {
        resetModalForm('#addNewForm', '#validationErrorsBox');
    });
