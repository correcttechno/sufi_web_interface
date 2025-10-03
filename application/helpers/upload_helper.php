<?php


function get_multiple_files($string){
    $ar=json_decode($string,true);
    if(isset($ar['uploaded_files'])){
        return $ar['uploaded_files'];
    }
    else{
        return false;
    }
}


function get_file($path){
    return base_url('uploads/files/'.$path);
}

?>