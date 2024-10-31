<?php
    class KITPDF_Cat {
        public function __construct() {
            add_filter('block_categories', array( $this, 'kitpdf_block_categories' ), 10, 2);
        }
        public function kitpdf_block_categories( $categories, $post ) {
            return array_merge(
                $categories,
                array(
                    array(
                        'slug' => 'kitpdf',
                        'title' => __( 'KITPDF Blocks', 'kit-pdf' ),
                        'icon'  => 'welcome-add-page',
                    ),
                )
            );
        }
    }
$kitpdf_categories = new KITPDF_Cat();