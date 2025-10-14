<!DOCTYPE html>
<html lang="pt-BR">
<?php
require_once __DIR__ . "/../partials/head.php"
?>

<body>
    <header>
        <?php require_once __DIR__ . "/../partials/nav.php"; ?>
    </header>

    <main>
        <?= $conteudo ?>
    </main>
    <?php require_once __DIR__ . "/../partials/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>