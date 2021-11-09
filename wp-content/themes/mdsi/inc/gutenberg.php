<?php
/**
 * Custom Gutenberg functions
 */

function mdsi_gutenberg_default_styles()
{
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name' => 'White',
                'slug' => 'white',
                'color' => '#ffffff'
            ),
            array(
                'name' => 'Light Gray',
                'slug' => 'lightgray',
                'color' => '#f5f5f9'
            ),
            array(
                'name' => 'Med Gray',
                'slug' => 'white',
                'color' => '#E7E9F1'
            ),
            array(
                'name' => 'Dark Gray',
                'slug' => 'darkgray',
                'color' => '#404040'
            ),
            array(
                'name' => 'Dark Blue',
                'slug' => 'darkblue',
                'color' => '#0682F6'
            ),
            array(
                'name' => 'Blue',
                'slug' => 'blue',
                'color' => '#4CA7FC'
            ),
            array(
                'name' => 'Green',
                'slug' => 'green',
                'color' => '#00BDAA'
            )
        )
    );

    add_theme_support(
        'editor-font-sizes',
        array(
            array(
                'name' => 'Normal',
                'slug' => 'normal',
                'size' => 16
            ),
            array(
                'name' => 'Large',
                'slug' => 'large',
                'size' => 24
            )
        )
    );
}
add_action( 'init', 'mdsi_gutenberg_default_styles' );

function mdsi_gutenberg_blocks() {
    wp_register_script( 'custom-block-js', get_template_directory_uri() . '/js/customBlocks.js', array( 'wp-blocks' ));

    register_block_type( 'mdsi/custom-mdsi', array(
        'editor_script' => 'custom-block-js'
    ) );
}

add_action( 'init', 'mdsi_gutenberg_blocks' );
