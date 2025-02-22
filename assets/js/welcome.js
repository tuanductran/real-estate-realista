jQuery(function ($) {
    $('.real-estate-realista-install-plugin').on('click', function (event) {
        event.preventDefault();
        var $button = $(this);

        if ($button.hasClass('updating-message')) {
            return;
        }

        wp.updates.installPlugin({
            slug: $button.data('slug')
        });
    });

    $(document).on('click', '.real-estate-realista-activate-plugin', function (event) {
        event.preventDefault();
        var $button = $(this);
        $button.addClass('updating-message').html( );

        real_estate_realista_activate_plugin($button);

    });

    $(document).on('wp-plugin-installing', function (event, args) {
        event.preventDefault();

        $('.real-estate-realista-install-plugin').addClass('updating-message').html(importer_params.installing_text);

    });

    $(document).on('wp-plugin-install-success', function (event, response) {

        event.preventDefault();
        var $button = $('.real-estate-realista-install-plugin');

        $button.html(importer_params.activating_text);

        setTimeout(function () {
            real_estate_realista_activate_plugin($button);
        }, 1000);

    });

    function real_estate_realista_activate_plugin($button) {
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'real_estate_realista_activate_plugin',
                slug: $button.data('slug'),
                file: $button.data('filename'),
                _wpnonce: importer_params.wpnonce,
            },
        }).done(function (result) {
            var result = JSON.parse(result)
            if (result.success && importer_params.success_redirect == '1') {
                window.location.href = importer_params.importer_url;
            } else if (result.success) {
                $button.parent().append('<a href="'+importer_params.tgmpa_link+'" class="button button-primary">'+importer_params.success_import+'</a>')
                $button.remove();
            } else {
                $button.removeClass('updating-message').html(importer_params.error);
            }
        });
    }
});