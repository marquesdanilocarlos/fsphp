<?php
$this->layout('test::base', ['title' => "Edição de usuario {$user->first_name}"]); ?>

<?php
$this->start('nav'); ?>
<a href="./">Voltar</a>
<?php
$this->stop(); ?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="firstName" value="<?= $user->first_name; ?>">
    <input type="text" name="lastName" value="<?= $user->last_name; ?>">
    <input type="text" name="email" value="<?= $user->email; ?>">
    <button>Atualizar usuário</button>
</form>