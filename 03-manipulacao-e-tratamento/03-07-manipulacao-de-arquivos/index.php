<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);

$file = __DIR__ . "/file.txt";

if (file_exists($file) && is_file($file)) {
    echo "<p>Existe</p>";
} else {
    echo "<p>Não existe.</p>";
}

/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);

if (!file_exists($file) || !is_file($file)) {
    $fileOpen = fopen($file, "w");
    fwrite($fileOpen, "Linha 01" . PHP_EOL);
    fwrite($fileOpen, "Linha 02" . PHP_EOL);
    fwrite($fileOpen, "Linha 03" . PHP_EOL);
    fwrite($fileOpen, "Caros amigos, a expansão dos mercados mundiais nos obriga à análise das condições financeiras e administrativas exigidas. Por outro lado, a hegemonia do ambiente político deve passar por modificações independentemente das direções preferenciais no sentido do progresso. É claro que o surgimento do comércio virtual possibilita uma melhor visão global das formas de ação." . PHP_EOL);

    fclose($fileOpen);
} else {
    var_dump(file($file), pathinfo($file));
}

echo file($file)[3];

$open = fopen($file, "r");

while(!feof($open)) {
    echo "<p>".fgets($open)."</p>";
}

fclose($open);

/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);

$getContents = __DIR__ . "/teste2.txt";

if (file_exists($getContents) && is_file($getContents)) {
    echo file_get_contents($getContents);
} else {
    $data = "<article>
<h1>Danilo</h1>
<p>SECOM</p>
<p>danilo.marques@presidencia.gov.br</p>
</article>";

    file_put_contents($getContents, $data);

    echo file_get_contents($getContents);
}

if ((file_exists($file) && is_file($file)) && (file_exists($getContents) && is_file($getContents))) {

    unlink($file);

    unlink($getContents);
}
