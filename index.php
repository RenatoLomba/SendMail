<?php 
$erro_campos = isset($_GET['erro']);
$status_envio = isset($_GET['codigo'])
?>
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

						<?php
						if(!$status_envio) { 
							require "form.php";
						} else {
							require "resposta.php";
						}
						?>

					</div>
				</div>
      		</div>
      	</div>

	</body>
</html>