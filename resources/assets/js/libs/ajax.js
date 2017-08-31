/**
 * Setup default values for future Ajax requests.
 *
 * See https://api.jquery.com/jQuery.ajaxSetup/
 */
$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});
