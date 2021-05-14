<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.10 - Upload de arquivos");

/*
 * [ upload ] sizes | move uploaded | url validation
 * [ upload errors ] http://php.net/manual/pt_BR/features.file-upload.errors.php
 */
fullStackPHPClassSession("upload", __LINE__);

$folder = __DIR__ . "/uploads";

if (!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 0755);
}

var_dump(ini_get("upload_max_filesize"), ini_get("post_max_size"));
var_dump(filetype(__FILE__), mime_content_type(__FILE__));

$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);

if ($_FILES && !empty($_FILES['file']['name'])) {
    $fileUpload = $_FILES["file"];

    $allowedTypes = [
        "image/jpg",
        "image/jpeg",
        "image/png",
        "application/pdf"
    ];

    $newFileName = time() . mb_strstr($fileUpload['name'], ".");

    if (in_array($fileUpload['type'], $allowedTypes)) {
        if (move_uploaded_file($fileUpload['tmp_name'], $folder . "/" . "$newFileName")) {
            echo "<p class='trigger success'>Arquivo enviado com sucesso!</p>";
        } else {
            echo "<p class='trigger error'>Whoops, erro inesperado!</p>";
        }
    } else {
        echo "<p class='trigger warning'>Whoops, tipo de arquivo não permitido!</p>";
    }

} elseif(!$_FILES && $getPost) {
    echo "<p class='trigger warning'>Whoops, parece que o arquivo é muito grande!</p>";
} elseif ($_FILES) {
    echo "<p class='trigger warning'>Selecione um arquivo antes de enviar!</p>";
}

include __DIR__ . "/form.php";

var_dump(scandir($folder));
