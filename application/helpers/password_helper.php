<?php

function generate_password($string){
    return md5(($string));
}

function generateRandomPassword($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
    $charactersLength = strlen($characters);
    $randomPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomPassword;
}

function generate_token() {
    $length=40;
    return bin2hex(random_bytes($length));
}

function generateMail($firstname,$lastname){
    return set_link($firstname.$lastname.rand(11,99)).'@mail.com';
}

function set_link($string){
	$s=str_replace("Ə","e", $string);
	$s=str_replace("ə","e", $s);
	$s=str_replace("İ","i", $s);
	$s=str_replace("Ğ","q", $s);
	$s=str_replace("Ö","o", $s);
	$s=str_replace("ö","o", $s);
	$s=str_replace("ğ","q", $s);
	$s=str_replace("Ş","s", $s);
	$s=str_replace("ş","s", $s);
	$s=str_replace("Ç","c", $s);
	$s=str_replace("ç","c", $s);
	$s=str_replace("Ü","u", $s);
	$s=str_replace("ü","u", $s);
	$s=str_replace("ı","i", $s);
	$s=str_replace('"','',$s);
	$s=str_replace("'",'',$s);
	$s=str_replace(",",'',$s);
	$s=str_replace("?",'',$s);
	$s=str_replace("&",'and',$s);
	$s=get_latin($s);
	$s=mb_strtolower($s);
	return str_replace(" ","-",$s);
}

function get_latin($string){
	$converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '',  'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
	);
	return strtr($string, $converter);
}
