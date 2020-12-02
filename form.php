<form method="post" action="requisicao.php">
    <div class="form-group">
        <label for="destino">Para</label>
        <input type="text" name="destino" class="form-control" id="destino" placeholder="email@dominio.com.br">
    </div>

    <div class="form-group">
        <label for="assunto">Assunto</label>
        <input type="text" name="assunto" class="form-control" id="assunto" placeholder="Assundo do e-mail">
    </div>

    <div class="form-group">
        <label for="mensagem">Mensagem</label>
        <textarea class="form-control" name="mensagem" id="mensagem"></textarea>
    </div>

    <!-- Validação dos campos -->
    <?php if($erro_campos) {?>
        <div class="text-danger"><?=$_GET['erro']?></div>
        <?php if($_GET['erro'] == "Destino inválido") {?>
            <script>document.getElementById("destino").classList.add("border-danger");</script>
        <?php } else if($_GET['erro'] == "Assunto inválido") {?>
            <script>document.getElementById("assunto").classList.add("border-danger");</script>
        <?php } else if($_GET['erro'] == "Mensagem inválida") {?>
            <script>document.getElementById("mensagem").classList.add("border-danger");</script>
        <?php } else if($_GET['erro'] == "Acesso Negado") {?>
            <script>
                document.getElementById("destino").classList.add("border-danger");
                document.getElementById("assunto").classList.add("border-danger");
                document.getElementById("mensagem").classList.add("border-danger");
            </script>
        <?php }?>
    <?php } ?>

    <button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
</form>