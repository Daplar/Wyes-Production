<?php require "view_begin.php"; ?>


<h1>
    <?= e($title) ?>
</h1>

<p>
    <?= e($message) ?>
</p>

<a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Retourner à la page précèdente</a>

<?php require "view_end.php"; ?>
