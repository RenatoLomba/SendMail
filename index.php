<?php $erro_campos = isset($_GET['erro']); ?>
<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" 
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
		crossorigin="anonymous">

	</head>

	<body>

		<div class="container">

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
  				
					<div class="card-body font-weight-bold">
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
					</div>
				</div>
      		</div>
      	</div>

	</body>
</html>