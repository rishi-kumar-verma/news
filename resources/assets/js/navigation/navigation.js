'use strict';

document.addEventListener('DOMContentLoaded', leadNavigationDate);

function leadNavigationDate() {
    var navigationContainers = document.querySelectorAll(".draggable-zone");
    var foo = document.getElementById("accordionExample");
    Sortable.create(foo, {
        group: "accordionExample",
        store: {
            /**
             * Save the order of elements. Called onEnd (when the item is dropped).
             * @param {Sortable}  sortable
             */
            set: function (sortable) {
                var order = sortable.toArray();
                $.ajax({
                    url: route('navigation.update'),
                    type: 'POST',
                    data: {navigation_id :order},
                    success: function (result) {
                        if (result.success) {
                            displaySuccessMessage(result.message)
                        }
                    },
                    error: function (result) {
                        displayErrorMessage(result.responseJSON.message)
                    },
                })
            }
        }   
    })
   

    let dragOut = false
   

    $('#languageSelectId').select2({
        width: '100%',
    });

    listen('change','#languageSelectId',function (){
       let langId = $(this).val();
        $.ajax({
            url : route('language.change'),
            type: 'POST',
            data: {data:langId},
            success:function (result){
                location.reload();
                displaySuccessMessage(result.message);
            }
        })
    });

}
