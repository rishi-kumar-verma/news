'use strict';

$(document).ready(function () {
    let fullScreen = document.getElementById('gotoFullScreen');
    fullScreen.addEventListener(
        'click',
        function () {
            if (window.innerHeight == screen.height) {
                document.exitFullscreen();
            }
            document.body.requestFullscreen();
        },
        false,
    );
});
