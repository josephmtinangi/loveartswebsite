/**
 * JavaScript helper to patch or destroy a laravel resource.
 *
 * Usage:
 *
 *  Patch a resource:
 *  <a href="posts/2" data-method="patch" data-token="{{ csrf_token() }}"> ... </a>
 *
 *  Destroy a resource:
 *  <a href="posts/2" data-method="delete" data-token="{{ csrf_token() }}"> ... </a>
 *
 * Or, request confirmation in the process:
 *  <a href="posts/2"
 *     data-confirm="Are you sure?"> ... </a>
 */

$(function() {

    var resource = {
        init: function() {
            this.methodLinks = $('a[data-method]');
            this.token = $('a[data-token]');
            this.registerEvents();
        },

        registerEvents: function() {
            this.methodLinks.on('click', this.handleMethod);
        },

        handleMethod: function(e) {
            var link = $(this);
            var httpMethod = link.data('method').toUpperCase();
            var form;

            // Ignore action if the data-method is not PATCH or DELETE.
            if ($.inArray(httpMethod, ['PATCH', 'DELETE']) === -1) {

                return;

            }

            // If available, handle the optional data-confirm.
            if (link.data('confirm')) {

                if (!resource.verifyConfirm(link)) {

                    return false;

                }

            }

            form = resource.createForm(link);
            form.submit();

            e.preventDefault();
        },

        verifyConfirm: function(link) {
            return confirm(link.data('confirm'));
        },

        createForm: function(link) {
            var form =
                $('<form>', {
                    'method': 'POST',
                    'action': link.attr('href')
                });

            var token =
                $('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': link.data('token')
                });

            var hiddenInput =
                $('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

            return form.append(token, hiddenInput).appendTo('body');
        }
    };

    resource.init();
});
