<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );

function wisdom_attachments( $attachments ) {
    $post_id = null;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    if ( ! $post_id || get_post_format( $post_id ) != "gallery" ) {
        return;
    }

    $fields = array(
        array(
            'name'  => 'title',
            'type'  => 'text',
            'label' => __( 'Title', 'wisdom' ),
        ),
    );

    $args = array(

        'label'       => 'Gallery',
        'post_type'   => array( 'post' ),
        'filetype'    => array( "image" ),
        'note'        => 'Add Gallery Images',
        'button_text' => __( 'Attach Image', 'wisdom' ),
        'fields'      => $fields,
    );

    $attachments->register( 'gallery', $args );
}

add_action( 'attachments_register', 'wisdom_attachments' );