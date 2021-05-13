<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.08 - Gestão de diretórios");

/*
 * [ verificar, criar e abrir ] file_exists | is_dir | mkdir  | scandir
 */
fullStackPHPClassSession("verificar, criar e abrir", __LINE__);


$folder = __DIR__ . "/uploads";

if (!file_exists($folder) && !is_dir($folder)) {
    mkdir($folder, 0755);
} else {
    var_dump(scandir($folder));
}

/*
 * [ copiar e renomear ] copy | rename
 */
fullStackPHPClassSession("copiar e renomear", __LINE__);
$file = __DIR__ . "/newFile.txt";

if (!file_exists($file) && !is_file($file)) {
    fopen($file, "w");
} else {
    copy($file, $folder . "/" . basename($file));
    //var_dump(filemtime($file), filemtime(__DIR__ . "/uploads/newFile.txt"));
    rename(
        __DIR__ . "/uploads/newFile.txt",
        __DIR__ . "/uploads/newFile-" . time() . "." . pathinfo($file)['extension']
    );
}

var_dump(pathinfo($file), scandir($folder), scandir(__DIR__));


/*
 * [ remover e deletar ] unlink | rmdir
 */
fullStackPHPClassSession("remover e deletar", __LINE__);

$dirRemove = __DIR__ . "/remove/";
$dirFiles = scandir($dirRemove);
$filesRemove = array_diff($dirFiles, [".", ".."]);
$filesCount = count($filesRemove);

if ($filesCount >= 1) {
    echo "<h1>Clearing directory...</h1>";
    foreach ($dirFiles as $fileItem) {
        $fileItem = $dirRemove . $fileItem;
        if (file_exists($fileItem) && is_file($fileItem)) {
            unlink($fileItem);
        }
    }
} else {
    rmdir($dirRemove);
}
