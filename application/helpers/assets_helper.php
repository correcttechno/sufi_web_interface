<?php

function get_img($image_name){
    return base_url()."assets/images/".$image_name.'?ver=1.0';
}

function get_css($filename){
    $ver="?ver=20.0";
    return base_url()."assets/css/".$filename.$ver;
}

function get_js($filename){
    $ver="?ver=18.0";
    return base_url()."assets/js/".$filename.$ver;
}


?>