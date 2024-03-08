<?php
$this->layout('test::base', ['title' => $title]); ?>

<?php
foreach ($list as $user): ?>
    <article>
        <h1><?= "{$user->first_name} {$user->last_name}"; ?></h1>
        <p><?= $user->email; ?> - Registrado em <?= $user->created_at; ?></p>
        <a href="?id=<?= $user->id; ?>">Editar</a>
    </article>
<?php
endforeach ?>
