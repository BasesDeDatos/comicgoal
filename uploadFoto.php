<?php
    // ...
    // SERVER CODE that processes ajax upload and returns a JSON response. Your server action 
    // must return a json object containing initialPreview, initialPreviewConfig, & append.
    // An example for PHP Server code is mentioned below.
    // ...
    $p1 = $p2 = [];
    $ruta = "./profile_pics/"; //ruta carpeta donde queremos copiar las imágenes
    if (empty($_FILES['archivo']['name'])) {
        echo '{}';
        return;
    }
    for ($i = 0; $i < count($_FILES['archivo']['name']); $i++) {
        $key = '<code to parse your image key>';
        $url = '<your server action to delete the file>';
        
        $uploadfile_temporal = $_FILES['archivo']['tmp_name'];
        $uploadfile_nombre = $ruta.$_FILES['archivo']['name'];

        if (is_uploaded_file($uploadfile_temporal)) {
            move_uploaded_file($uploadfile_temporal, $uploadfile_nombre);
        }

        $name = $_FILES['archivo']['name'];
        $p1[$i] = "<img style='height:160px' src='{$ruta}{$name}' class='file-preview-image'>";
        $p2[$i] = ['caption' => "", 'width' => '120px', 'url' => $url, 'key' => $key];
    }
    echo json_encode([
        'initialPreview' => $p1, 
        'initialPreviewConfig' => $p2,   
        'append' => true // whether to append these configurations to initialPreview.
                         // if set to false it will overwrite initial preview
                         // if set to true it will append to initial preview
                         // if this propery not set or passed, it will default to true.
     ]);
?>