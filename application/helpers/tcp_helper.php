<?php

function send_tcp_data($command){
    // Hedef URL
    $url = "http://localhost:321/send";

    // Göndermek istediğiniz veriler
    $data = [
        "data" => $command,
    ];

    // Verileri URL parametresi olarak ekle
    $url = $url . "?" . http_build_query($data);

    // cURL oturumu başlat
    $ch = curl_init();

    // cURL seçeneklerini ayarla
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Cevabı değişkene al

    // GET isteğini yap
    $response = curl_exec($ch);

    // Hata kontrolü
    if(curl_errno($ch)){
        echo 'Hata: ' . curl_error($ch);
    }

    // cURL oturumunu kapat
    curl_close($ch);

    // Cevabı ekrana yazdır
    return $response;

}
?>