<?php
include_once "conferir-autenticacao.php";
include_once "mensagens.php"; 
$titulo =  $relatorio;
include_once "head.php";
?>


<body class="theme-default page-signin">
	<script>
		var init = [];
	</script>
	<div id="page-signin-bg">
		<div class="overlay"></div>
		<img src="assets/demo/signin-bg-1.jpg" alt="">
	</div>
	<div class="signin-container">
		<div class="signin-form">
				<div class="signin-text">
					<span>Doações-SA</span>
				</div> <!-- / .signin-text -->		

				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="relatorio-usuario.php">Usuários</a>		
				</div> <!-- / .form-actions -->
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="relatorio-item.php">Itens</a>		
				</div> <!-- / .form-actions -->
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="relatorio-doacao.php">Doações</a>		
				</div> <!-- / .form-actions -->
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="pagina-inicial.php">Voltar</a>		
				</div> <!-- / .form-actions -->		
	</div>

	<script src="assets/javascripts/bootstrap.min.js"></script>
	<script src="assets/javascripts/pixel-admin.min.js"></script>
</body>

