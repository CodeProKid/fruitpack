<?php
include(dirname(__FILE__)) . '/actions/save.php';
add_action( 'wp_ajax_save_fruitpack', 'save_fruitpack_options' );