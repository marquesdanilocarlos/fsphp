<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php

    use Source\Support\Seo;

    require __DIR__ . "/../vendor/autoload.php";
    $seo = new Seo();
    echo $seo->render(
        'Formação FSPHP',
        "Curso de PHP da Upinside",
        'https://upinside.com.br/fsphp',
        'https://upinside.com.br/fsphp/images/cover.jpg'
    );
    ?>
</head>
<body>
<h1><?= $seo->title ?></h1>
<p><?= $seo->description ?></p>

<?= '<pre>', print_r($seo->getData(), true), '</pre>'; ?>
</body>
</html>