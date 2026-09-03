<?php

function tcw_register_menus() {

    register_nav_menus(array(

        'primary' => __('Primary Menu', 'tcw'),

        'footer' => __('Footer Menu', 'tcw')

    ));

}

add_action('init', 'tcw_register_menus');