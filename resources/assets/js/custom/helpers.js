'use strict';
window.listen = function (event, selector, callback) {
    $(document).on(event, selector, callback)
}
