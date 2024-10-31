<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;



class KITPDF_Block {
    function __construct(){
        add_action( 'carbon_fields_register_fields', [$this, 'kitpdf_block_fun'] );       
    }
    function kitpdf_block_fun(){
        wp_enqueue_style( 'kitpdf-block-stylesheet', plugins_url("/block-kitpdf.css", __FILE__ ));
        Block::make( __( 'kitpdf pdf' ) )
        
        ->add_tab( __( 'pdf Style' ), array(
            Field::make( 'file', 'kitpdf_pdf_upload', __( 'File' ) )
                ->set_value_type( 'url' ),

            Field::make( 'radio', 'kitpdf_pdf_align', __( 'File alignment' ) )
                ->add_options( array(
                    'left' => __( 'Left' ),
                    'center' => __( 'Center' ),
                    'right' => __( 'Right' ),
                ) ),
                
            Field::make( 'text', 'kitpdf_pdf_width', __( 'File width' ) )
                ->set_attribute( 'placeholder', 'use px or %' ),
                
            Field::make( 'text', 'kitpdf_pdf_max_width', __( 'File max width' ) )
                ->set_attribute( 'placeholder', 'use px or %' ),

            Field::make( 'text', 'kitpdf_pdf_height', __( 'File Height' ) )
                ->set_attribute( 'placeholder', 'use px or %' ),

        ) )

        ->set_description( __( 'kitpdf An Advance Gutenberg Block For pdf' ) )
        ->set_category( 'kitpdf' )
        ->set_icon( 'welcome-add-page' )
        ->set_keywords( [ __( 'pdf' ), __( 'pdf upload' ), __( 'pdf url' ) ] )
        ->set_editor_style( 'kitpdf-block-stylesheet' )
        ->set_preview_mode( true )
        ->set_render_callback( function ( $fields, $attributes ) {

    ?>
    <?php
    
        $align = 'display: block; margin-left: auto; margin-right: auto;';
        $width = 'width: 100%;';
        $maxWidth = 'max-width: 100%;';
        $height = 'height: 200px;';
    
        $kitpdf_pdf_upload = isset($fields['kitpdf_pdf_upload']) ? $fields['kitpdf_pdf_upload'] : '';
        $kitpdf_pdf_align = isset($fields['kitpdf_pdf_align']) ? $fields['kitpdf_pdf_align'] : '';
        $kitpdf_pdf_width = isset($fields['kitpdf_pdf_width']) ? $fields['kitpdf_pdf_width'] : '';
        $kitpdf_pdf_max_width = isset($fields['kitpdf_pdf_max_width']) ? $fields['kitpdf_pdf_max_width'] : '';
        $kitpdf_pdf_height = isset($fields['kitpdf_pdf_height']) ? $fields['kitpdf_pdf_height'] : '';
        $kitpdf_pdf_upload_id = strlen($kitpdf_pdf_upload);
        
        if ($kitpdf_pdf_align === 'left') {
			$align = 'display: block; float: left;';
		}
		if ($kitpdf_pdf_align === 'right') {
			$align = 'display: block; float: right;';
        }
        if ($kitpdf_pdf_width) {
			$width = ' width: ' . $kitpdf_pdf_width . '!important;';
		}
        if ($kitpdf_pdf_max_width) {
			$maxWidth = ' max-width: ' . $kitpdf_pdf_width . '!important;';
		}
        if ($kitpdf_pdf_height) {
			$height = ' height: ' . $kitpdf_pdf_height . ';';
		}
    ?>
        <?php
            echo '<iframe class="pdf-some-' . $kitpdf_pdf_upload_id .'" src="https://docs.google.com/viewer?url=' . $kitpdf_pdf_upload . '&amp;embedded=true" style="' . $align . $height . $maxWidth . '" frameborder="1" marginheight="0px" marginwidth="0px" allowfullscreen></iframe>'; 
            echo '<style>.pdf-some-' . $kitpdf_pdf_upload_id .'{' . $width . '}</style>';
        ?>
    <?php
        } );
    }
}
new KITPDF_Block();