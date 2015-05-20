<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$loaders[] = array(
    'conditions' => array(
        'pages' => array('document_general_info','document_product_info','page','product_free_shipping_info','product_info','product_music_info','product_reviews','product_reviews_write') 
    ),
    'jscript_files' => array(
        '//code.jquery.com/jquery-1.11.2.min.js' => 1,
        'jquery/jquery_zen_lightbox.php' => 3,
    ),
    'css_files' => array(
        'stylesheet_zen_lightbox.css' => 1,)
);
