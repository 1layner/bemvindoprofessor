<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Bem Vindo Professor!</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
	<section class="vh-100">
	  <div class="container-fluid h-custom">
		<div class="row d-flex justify-content-center align-items-center h-100">
		  <div class="col-md-9 col-lg-6 col-xl-5">
			<img src="img/logoBemVindoProfessor.png" class="img-fluid" alt="Sample image">
		  </div>
		  <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
			<form action="index.php" method="post">

			  	<!-- Email input -->
				<div class="form-floating mb-4">
					<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
					<label for="floatingInput">Email</label>
				</div>

				<!-- Password input -->
				<div class="form-floating mb-4">
					<input type="password" class="form-control" id="floatingPassword" placeholder="Senha" name="senhapessoa">
					<label for="floatingInput">Senha</label>
				</div>

			  <div class="d-flex justify-content-between align-items-center">
				<!-- Checkbox -->
				<a href="#!" class="text-body">Solicitar nova senha?</a>
			  </div>

			  <div class="text-center text-lg-start mt-4 pt-2">
				<button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
				  style="padding-left: 2.5rem; padding-right: 2.5rem;">Acessar</button>
			  </div>
			</form>

			<?php

				require "restrito/conexao_bd.php";
				if(isset($_POST['email']) AND isset($_POST['senhapessoa'])){
					$email = mysqli_escape_string($conexao, trim($_POST['email']));
					$senhapessoa = mysqli_escape_string($conexao, md5($_POST['senhapessoa']));

					$sql = "select * from table_pessoa where email='$email' AND senhapessoa='$senhapessoa'";

					echo "<script>console.log('Número de registro);</script>";

					if($result = mysqli_query($conexao, $sql)){
						$num_registros = mysqli_num_rows($result);

						echo "<script>console.log('Número de registro $num_registros');</script>";
						
						if($num_registros == 1){
							$linha = mysqli_fetch_assoc($result);

							if(($email == $linha['email']) AND ($senhapessoa == $linha['senhapessoa'])){
								session_start();
								$_SESSION['user'] = $email;
								header("location: restrito");
								exit;
							} else{
								echo "Usuário Inválido";
							}
						} else{
							echo "E-mail ou usuário não encontrados ou inválido.";
						} 

						} else{
							echo "Nenhum resultado do Banco de Dados";
						}
				}
			?>


		  </div>
		</div>
	  </div>
	  <div
		class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
		<!-- Copyright -->
		<div class="text-white mb-3 mb-md-0">
		  Copyright © 2026. All rights reserved.
		</div>
		<!-- Copyright -->

		<!-- Right -->
		<div>
		  <a href="#!" class="text-white me-4">
			<i class="fab fa-facebook-f"></i>
		  </a>
		  <a href="#!" class="text-white me-4">
			<i class="fab fa-twitter"></i>
		  </a>
		  <a href="#!" class="text-white me-4">
			<i class="fab fa-google"></i>
		  </a>
		  <a href="#!" class="text-white">
			<i class="fab fa-linkedin-in"></i>
		  </a>
		</div>
		<!-- Right -->
	  </div>
	</section>
  

</body></html>