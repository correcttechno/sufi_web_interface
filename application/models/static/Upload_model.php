<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function upload_image() {
        // Yükleme ayarları
        $config['upload_path'] = './uploads/images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;  // 2MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            // Yükleme hatası durumunda mesaj göster
            $error = $this->upload->display_errors();
            return false;
        } else {
            // Yükleme başarılı
            $data = $this->upload->data();
            $file_path = $data['full_path'];

            // Base64'e dönüştürme
            $base64_image = $this->convert_to_base64($file_path);

            // Yüklenen resmi ve base64 çıktısını döndürme
            return [
                'uploaded_image' => base_url('uploads/' . $data['file_name']),
                'base64_image' => $base64_image
            ];
        }
    }

    private function convert_to_base64($file_path) {
        $image_data = file_get_contents($file_path);
        $base64_image = base64_encode($image_data);
        $mime_type = mime_content_type($file_path);
        return 'data:' . $mime_type . ';base64,' . $base64_image;
    }


    public function upload_multiple_files() {
        $this->load->library('upload'); // Upload kütüphanesini yükle
        $uploaded_files = [];           // Yüklenen dosyaları tutacak array
        $errors = [];                   // Hataları tutacak array
        if(isset($_FILES['files'])){
            $files = $_FILES['files'];      // `files` form alanındaki dosyaları alın
            $file_count = count($files['name']);
        
            for ($i = 0; $i < $file_count; $i++) {
                // Her bir dosya için $_FILES arrayini düzenle
                $_FILES['file']['name'] = $files['name'][$i];
                $_FILES['file']['type'] = $files['type'][$i];
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['file']['error'] = $files['error'][$i];
                $_FILES['file']['size'] = $files['size'][$i];
        
                // Upload ayarları
                $config['upload_path']   = './uploads/files';
                $config['allowed_types'] = 'jpg|png|gif|pdf|docx|doc|xls|xlsx|ppt|pptx|xml';
                $config['max_size']      = 2048; // Maksimum boyut (KB)
                $config['file_name']     = time() . '_' . $files['name'][$i];
                $config['encrypt_name'] = TRUE;
        
                $this->upload->initialize($config);
        
                // Dosyayı yüklemeye çalış
                if ($this->upload->do_upload('file')) {
                    // Başarılıysa, dosya bilgisini kaydet
                    $uploaded_files[] = $this->upload->data();
                } else {
                    // Hata varsa kaydet
                    $errors[] = [
                        'file_name' => $files['name'][$i],
                        'error'     => $this->upload->display_errors(),
                    ];
                }
            }
        
            // Sonuçları döndür
            if (!empty($uploaded_files)) {
                $response['status'] = 'success';
                $response['uploaded_files'] = $uploaded_files;
            }
        
            if (!empty($errors)) {
                $response['status'] = 'error';
                $response['errors'] = $errors;
            }
        
            return json_encode($response);
        }
        else{
            return '';
        }
    }
    
}
