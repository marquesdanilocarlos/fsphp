<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .paginator {
            list-style: none;
            padding: 0;
            margin-top: 30px;
            display: block;
            text-align: center;
        }

        .paginator_item {
            display: inline-block;
            margin: 0 10px;
            padding: 4px 12px;
            background: #A287E7;
            color: #fff;
            text-decoration: none;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .paginator_item:hover {
            background: #8A6ED5;
        }

        .paginator_active,
        .paginator_active:hover {
            background: #cccccc;
        }
    </style>
    <title><?= $title ?></title>
</head>
<body>
<header>
    <h3 class="trigger accept">
        <?= $title ?>
    </h3>
</header>
<?php
if ($this->section('nav')): ?>
    <nav class="trigger info">
        <?= $this->section('nav'); ?>
    </nav>
<?php
else: ?>
    <p class="trigger info">Lista de usuários</p>
<?php
endif; ?>
<?= $this->section('content'); ?>
</body>
</html>