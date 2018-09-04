<?php
//include_once "conferir-autenticacao.php";
include_once "mensagens.php"; 
$titulo =  $doacoesSa;
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
				</div> <!-- / .signin-text -->		

				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="solicitacao-de-orientacao.php">Solicitação de orientação</a>		
				</div> <!-- / .form-actions -->
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="professores.php">Professores</a>		
				</div> <!-- / .form-actions -->
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="aprovar-solicitacao-de-orientacao.php">Aprovar Solicitação de orientacao</a>		
				</div> <!-- / .form-actions -->
				<!-- <div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="cadastro-receptor.php">Receptor</a>		
				</div> / .form-actions -->
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="relatorio.php">Relatório</a>		
				</div> <!-- / .form-actions -->
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="index.php">Sair</a>		
				</div> <!-- / .form-actions -->			
		</div>
	</div>

	<script src="assets/javascripts/bootstrap.min.js"></script>
	<script src="assets/javascripts/pixel-admin.min.js"></script>


</body>