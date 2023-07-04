<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);
$file = __DIR__ . "/file.txt";

if (file_exists($file) && is_file($file)) {
    echo "O arquivo {$file} existe.";
} else {
    echo "O arquivo {$file} não existe.";
}


/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);

if (!file_exists($file) || !is_file($file)) {
    $newFile = fopen($file, "w");
    fwrite($newFile, "Linha 01" . PHP_EOL);
    fwrite($newFile, "Linha 01" . PHP_EOL);
    fwrite($newFile, "Linha 02" . PHP_EOL);
    fwrite($newFile, "Linha 03" . PHP_EOL);
    fwrite($newFile, "Lorem ipsum dolor sit amet..." . PHP_EOL);
    fclose($newFile);
} else {
    var_dump(
        file($file),
        pathinfo($file)
    );
}

echo file($file)[4];

$fileRead = fopen($file, 'r');

while (!feof($fileRead)) {
    echo "<p>" . fgets($fileRead) . "</p>";
}
fclose($fileRead);


/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);

$getContent = __DIR__ . "/teste2.txt";

if (file_exists($getContent) && is_file($getContent)) {
    echo file_get_contents($getContent);
} else {
    $data = "<article><h1>Danilo</h1><h2>Marques</h2></article>";
    file_put_contents($getContent, $data);
    echo file_get_contents($getContent);
}

if (file_exists($file) && is_file($file)) {
    unlink($file);
}

if (file_exists($getContent) && is_file($getContent)) {
    unlink($getContent);
}