<?php

function formatDate($date) {
    $sp = explode('/', $date);

    return $sp[2] . '-' . $sp[1] . '-' . $sp[0];
}

function uploadFile($file) {
    $target_dir = "/images/";
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        if (move_uploaded_file($file["tmp_name"], '../' . $target_file)) {
            return $target_file;
        } else {
            throw new Exception('Erro ao enviar a imagem');  
        }
    } else {
        throw new Exception('Imagem inválida');
    }
}