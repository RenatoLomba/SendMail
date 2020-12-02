<div>
    <?php if($_GET['codigo'] == 'Sucesso') { ?>
        <h1 class="display-4 text-success"><?= $_GET['codigo'] ?></h1>
        <p class="lead"><?= $_GET['descricao'] ?></p>
        <a href="index.php" class="btn btn-success btn-lg">Voltar</a>
    <?php } else if($_GET['codigo'] == 'Fracasso') { ?>
        <h1 class="display-4 text-danger"><?= $_GET['codigo'] ?></h1>
        <p class="lead"><?= $_GET['descricao'] ?></p>
        <a href="index.php" class="btn btn-danger btn-lg">Voltar</a>
    <?php } ?>
</div>