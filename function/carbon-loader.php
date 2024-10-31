<?php
    use Carbon_Fields\Container;
    use Carbon_Fields\Field;
    function kitpdf_carbon_loader( $array ) { 
        require_once KITPDF_PLUGIN_DIR . '/lib/carbon-fields/vendor/autoload.php';
        \Carbon_Fields\Carbon_Fields::boot();

    }; 
    add_action( 'plugins_loaded', 'kitpdf_carbon_loader', 10, 1 ); 




