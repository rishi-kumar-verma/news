document.addEventListener('DOMContentLoaded', loadAddPostData);
'use strict';

listen('keyup', "#title", function () {
    var Text = $.trim($(this).val());
    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
    $("#slug").val(Text);
    $("#hiddenSlug").val(Text);
});

function loadAddPostData() {
    
    if ($('#postTag').length) {
        var input1 = document.querySelector("#postTag");
        new Tagify(input1);
    }
    listen('click', '#scheduledPost', function () {
        if($(this).prop("checked") == true){
            $('.date-time').removeClass('d-none')
        } else if ($(this).prop("checked") == false) {
            $('.date-time').addClass('d-none')
        }
    })

    if ($('#scheduledPost').prop('checked') == true) {
        $('.date-time').removeClass('d-none')
    }

    const dt = new Date();
    const now = dt.getHours() + ":" + dt.getMinutes();

    $("#scheduledPostTime").flatpickr({

        enableTime: true,
        minDate: "today",
        minTime: now,
        dateFormat: "Y-m-d H:i",
        locale:lang
    });
    listen('click', '.btn-add-image', function () {
        $('#fileModal').modal('show')
        imagePostData()
    })

    function imagePostData () {

        $.ajax({
            url: route('post-upload-image-get'),
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    $('#fileModal').modal('show')
                    $.each(result.data, function (key, value) {
                        let imagePostData = {
                            imageId: value.id,
                            imgUrl: value.imageUrls,
                            imgName: value.imageUrls.substring(
                                value.imageUrls.lastIndexOf('/') + 1),
                        }
                        let dataTemplate = prepareTemplateRender(
                            '#postTemplate', imagePostData)
                        $('.uploaded-img').append(dataTemplate)
                    })
                }
            },
        })
    }

    listen('hidden.bs.modal', '#fileModal', function () {
        $('#newPostImage').val('')
        $('.uploaded-img').empty()
        $('.modal-footer').addClass('d-none')
    })
    listen('click', '.btn-check', function () {
        $('.modal-footer').removeClass('d-none')
    })

    listen('click', '.select-image', function () {
        let imgUrl = $('input[name="preview_img"]:checked').val()
        $('#fileModal').modal('hide')
        let oldContent = tinyMCE.activeEditor.getContent()
        tinymce.activeEditor.setContent(
            oldContent + '<img class="images" src=' + imgUrl +
            ' data-mce-src=' + imgUrl + '>')
    })

    listen('change', '#newPostImage', function () {
        if (this.files && this.files[0]) {
            let image = this.files[0]
            let formData = new FormData()
            formData.append('image', image)
            $.ajax({
                type: 'POST',
                url: route('editor.post-image-upload'),
                data: formData,
                processData: false,
                contentType: false,
                success: function (result) {
                    displaySuccessMessage(result.message)

                    let dataTemplate = prepareTemplateRender('#postTemplate', {
                        imgUrl: result.data.url,
                        imgName: result.data.url.substring(
                            result.data.url.lastIndexOf('/') + 1),
                        imageId: result.data.mediaId
                    })
                    $('#newPostImage').val('')
                    $('.uploaded-img').append(dataTemplate)
                },
                error: function (result) {
                    displayErrorMessage(result.responseJSON.message)
                },
            })
        }
    })

    listen('click', '.image-delete-btn', function (event) {
        let deleteImageId = $('input[name="preview_img"]:checked').attr('data-id');
        $.ajax({
            url: route('post-image.destroy', deleteImageId),
            type: 'get',
            success: function (result) {
                let id = result.data.id
                if (result) {
                    $('#image-' + id).hide()
                    $('.modal-footer').addClass('d-none')
                    displaySuccessMessage(result.message)
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message)
            },
        })
    })

    updateList = function() {
        var input = document.getElementById('file');
        var output = document.getElementById('fileList');
        var children = "";
        for (var i = 0; i < input.files.length; ++i) {
            children += '<li>' + input.files.item(i).name + '</li>';
        }
        output.innerHTML = '<ul>'+children+'</ul>';
    }

    function previewImages () {

        var $preview = $('#preview').empty()
        if (this.files) $.each(this.files, readAndPreview)

        function readAndPreview (i, file) {

            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + ' is not an image')
            } 

            var reader = new FileReader()

            $(reader).on('load', function () {
                $preview.append($('<img/>', { src: this.result})
                .addClass('border-color'))
            })

            reader.readAsDataURL(file)

        }

    }
    listen('change', '#additionalImage', previewImages)

    if (!isEmpty(langId)){
        setTimeout(function (){
            $('#languageId').val(langId).trigger('change')
        },500)
    }

    $('#categoriesId').select2({
        placeholder: Lang.get('messages.common.select_category'),

    })

    $('#subCategoryId').select2({
        placeholder: Lang.get('messages.common.select_subcategory'),

    })

    listen('change','#languageId',function (){
        let lang_id = $(this).val();
        $.ajax({
            url : route('posts.language'),
            type: 'POST',
            data: { data:lang_id },
            success:function (response){
                $('#categoriesId').empty()
                $('#categoriesId').
                    append(
                    $('<option value=""></option>').text(Lang.get('messages.common.select_category')))
                $.each(response.data, function (i, v) {
                    $('#categoriesId').
                        append($('<option></option>').attr('value', v).text(i))
                })

                if(categoryId) {
                    $('#categoriesId').val(categoryId).trigger('change')
                }
            }
        })
    });

    listen('change','#categoriesId',function (){
        $.ajax({
            url : route('posts.category'),
            type: 'POST',
            data: {  
                cat_id: $(this).val(),
                lang_id: $('#languageId').val(),
            },
            success:function (response){
                $('#subCategoryId').empty()
                $('#subCategoryId').
                    append(
                    $('<option value=""></option>').text(Lang.get('messages.common.select_subcategory')))
                $.each(response.data, function (i, v) {
                    $('#subCategoryId').
                        append($('<option></option>').attr('value', v).text(i))
                })

                if(subCategoryId) {
                    $('#subCategoryId').val(subCategoryId).trigger('change')
                }
            }
        })
    })

    listen('click', '.delete-posts-btn', function (event) {
        let deletePostId = $(event.currentTarget).data('id')
        deleteItem(route('posts.destroy', deletePostId), 'Posts', Lang.get('messages.post.post'))
    })

    listen('click', '#addItem', function () {
        $('.delete-gallery-item').removeClass('d-none');
        let data = {
            i: $('.accordion').length + 1,
            styleCss: 'style',
        }
        let galleryItemHtml = prepareTemplateRender('#galleryItemTemplate',
            data);

        $('.gallery-item-container').append(galleryItemHtml);
        addTinyMCE();
        tooltipLoad();
        IOInitImageComponent();
    })

    listen('click', '#addSortListItem', function () {
        $('.delete-sort_list-item').removeClass('d-none');
        let data = {
            i: $('.accordion').length + 1,
        }
        let invoiceItemHtml = prepareTemplateRender('#sortListItemTemplate',
            data)

        $('.sort_list-item-container').append(invoiceItemHtml)
        addTinyMCE();
        tooltipLoad();
        IOInitImageComponent();
    })

    listen('click', '.delete-gallery-item', function () {
        $(this).parent().parent().parent().remove()
        let countGallery =  $('.accordion').length - 1;
        $('#gallery_title').addClass('gallery-title');
        if(countGallery == 0)
        {
            $('.delete-gallery-item').addClass('d-none');
            $('#gallery_title').addClass('gallery-title');
        }
    })

    listen('click', '.delete-sort_list-item', function () {
        $(this).parent().parent().parent().remove()
        let countSort =  $('.accordion').length - 1;
        $('#sort_list_title').addClass('sort-list-title');
        if(countSort == 0)
        {
            $('.delete-sort_list-item').addClass('d-none');
            $('#sort_list_title').addClass('sort-list-title');
        }
    })

    const addTinyMCE = () => {
        // Initialize
        tinymce.init({
            selector: '.text-gallery-description,.text-sort_list-description',
            themes: 'modern',
            height: 200,
            content_style: tinymce_textarea_coler,
        })
    }
}

listen('change', '#postTypeFilter', function () {
    window.livewire.emit('filterPostType', $(this).val());
});

listen('change', '#categoryFilter', function () {
    window.livewire.emit('filterCategory', $(this).val());
    window.livewire.emit('filterSubCategory', null);
});

listen('change', '#subCategoryFilter', function () {
    window.livewire.emit('filterSubCategory', $(this).val());
});

listen('change', '#languageFilter', function () {
    window.livewire.emit('filterLangId', $(this).val());
});

$('#postTypeFilter').select2({
    width: '100%',
});

$('#categoryFilter').select2({
    width: '100%',
});

$('#subCategoryFilter').select2({
    width: '100%',
});

$('#languageFilter').select2({
    width: '100%',
});
$('#created_by').select2({
    width: '100%',
});

let dropdownBtnEle = ''
let dropdownEle = ''
let dropdownOpen = false
$(document).on('click', '.post-option', function (event){
    dropdownBtnEle = $(this)
    dropdownEle = $(this).next()
    openDropdownManually(dropdownBtnEle, dropdownEle);
})

window.openDropdownManually = function (dropdownBtnEle, dropdownEle) {
    if (!dropdownBtnEle.hasClass('show')) {
        $('.post-option').removeClass('show');
        $('.menu-sub-dropdown').removeClass('show');
        dropdownBtnEle.addClass('show')
        dropdownEle.addClass('show')
        dropdownOpen = true
    } else {
        hideDropdownManually(dropdownBtnEle, dropdownEle)
    }
}

window.hideDropdownManually = function (dropdownBtnEle, dropdownEle) {
    dropdownBtnEle.removeClass('show')
    dropdownEle.removeClass('show')
    dropdownOpen = false
}

listen('click', '.post-item', function (){
    hideDropdownManually(dropdownBtnEle, dropdownEle)
})

listen('click', function(event){
    let target = $(event.target);
    if (dropdownOpen && !target.closest('.post-option').length) {
        hideDropdownManually(dropdownBtnEle, dropdownEle)
    }
});

function validatePostForm() {
    let slug = $('#slug').val();
    let description = $('#description').val();
    let keywords = $('#keywords').val();
    let tags = $('#postTag').val();
    let languageId = $('#languageId').val();
    let categoriesId = $('#categoriesId').val();
    let scheduledPost = $('#scheduledPost').prop('checked');
    let datePicker = $('#scheduledPostTime').val();
    let galleryTitle = $('.gallery-title').val();
    let sortListTitle = $('.sort-list-title').val();
    let sectionType = $('#sectionType').val();
    
    if (isEmpty($.trim(slug))) {
        toastr.error(Lang.get('messages.common.required', {'attribute': 'slug'}));
        return false;
    } else if (slug.length > 180) {
        toastr.error(Lang.get('messages.common.max', {'attribute': 'slug', 'max': 180}));
        return false;
    }
    if (isEmpty($.trim(description))) {
        toastr.error(Lang.get('messages.common.required', {'attribute': 'description'}));
        return false;
    }

    if (isEmpty($.trim(keywords))) {
        toastr.error(Lang.get('messages.common.required', {'attribute': 'keywords'}));
        return false;
    } else if (keywords.length > 180) {
        toastr.error(Lang.get('messages.common.max', {'attribute': 'keywords', 'max': 180}));
        return false;
    }

    if (isEmpty($.trim(tags))) {
        toastr.error(Lang.get('messages.common.required', {'attribute': 'tags'}));
        return false;
    } else if (tags.length > 180) {
        toastr.error(Lang.get('messages.common.max', {'attribute': 'tags', 'max': 180}));
        return false;
    }

    if (isEmpty($.trim(languageId))) {
        toastr.error(Lang.get('messages.common.required', {'attribute': 'language'}));
        return false;
    }

    if (isEmpty($.trim(categoriesId))) {
        toastr.error(Lang.get('messages.common.required', {'attribute': 'category'}));
        return false;
    }

    if (scheduledPost && isEmpty(datePicker)) {
        toastr.error(Lang.get('messages.common.required', {'attribute': 'date & time'}));
        return false;
    }
    
    if(sectionType == 2) {
        if (isEmpty($.trim(galleryTitle))) {
            toastr.error(Lang.get('messages.common.required',
                { 'attribute': 'gallery list item title' }));
            return false;
        } else if (galleryTitle.length > 180) {
            toastr.error(Lang.get('messages.common.max',
                { 'attribute': 'gallery list item title', 'max': 180 }));
            return false;
        }
    }
    
    if(sectionType == 3) {
        if (isEmpty($.trim(sortListTitle))) {
            toastr.error(Lang.get('messages.common.required',
                { 'attribute': 'sort list item title' }));
            return false;
        } else if (sortListTitle.length > 180) {
            toastr.error(Lang.get('messages.common.max',
                { 'attribute': 'sort list item title', 'max': 180 }));
            return false;
        }
    }
    
    return true;
}

listen('click', '.post-save-btn', function () {
    let id = $('#hiddenId').val();
    let image = $('#image').val();
    if (isEmpty(id) && isEmpty(image)) {
        toastr.error(Lang.get('messages.common.required', {'attribute': 'Image'}));
        return false;
    }
    if (validatePostForm()) {
        $('.post-save-btn').submit();
        return  true;
    } else {
        return false;
    }
})
listen('change','#categoryFilter',function (){
    $.ajax({
        url : route('posts.categoryFilter'),
        type: 'POST',
        data: {
            cat_id: $(this).val(),
        },
        success:function (response){
            $('#subCategoryFilter').empty()
            $('#subCategoryFilter').
                append(
                    $('<option value=""></option>').text(Lang.get('messages.common.select_subcategory')))
            $.each(response.data, function (i, v) {
                $('#subCategoryFilter').
                    append($('<option></option>').attr('value', v).text(i))
            })

            if(subCategoryId) {
                $('#subCategoryFilter').val(subCategoryId).trigger('change')
            }
        }
    })
})
