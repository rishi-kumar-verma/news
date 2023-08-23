'use strict';
$(document).ready(function (){
    if ($('#portfolio').length){
        $('#portfolio').mixItUp({

            selectors: {
                target: '.tile',
                filter: '.filter',
                sort: '.sort-btn'
            },

            animation: {
                animateResizeContainer: false,
                effects: 'fade scale'
            }

        });
    }
    
    const buttons = document.getElementsByClassName("nav-category");

    function setActive(el) {
        for (let i = 0; i < buttons.length; i++) {
            if (buttons[i] == el) {
                el.classList.toggle("active");
            } else {
                buttons[i].classList.remove('active');
            }
        }
    }

    for (let i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function () {
            setActive(this);
        });
    }

    if ($('#portfolio').length) {
        $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: 250
        });
    }
    
    let firstTimeOpen = false
    $('.tile>a').click(function (){
        if(!firstTimeOpen){
            let childAttr = $('#lightbox').children()
            $('#lightbox').empty().append(childAttr[1])
            $('#lightbox').append(childAttr[0])   
        }
        firstTimeOpen = true
    })
})

