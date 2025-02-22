<?php
NexProperty\Assets::instance();
NexProperty\Customizer::instance();

locate_template( '/includes/theme-setup.php', true, true );

if(file_exists(get_stylesheet_directory() .'/addons/configuration.php')) {
    locate_template( '/addons/configuration.php', true, true );
} else {
    locate_template( '/includes/ocdi/configuration.php', true, true );
}

locate_template( '/includes/tgm_pa/configuration.php', true, true );
locate_template( '/includes/theme-customizer.php', true, true );
