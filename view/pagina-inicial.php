<?php
include_once "../model/conferir-autenticacao.php";
include_once "mensagens.php"; 
$titulo = $menu;
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
				<?php if($_SESSION['permissao'] == 3){?>	
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="aluno.php">Alunos</a>		
				</div> <!-- / .form-actions -->	
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="professores.php">Professores</a>		
				</div> <!-- / .form-actions -->
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="areas.php">Áreas</a>		
				</div> <!-- / .form-actions -->
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="pages-404.php">Relatório</a>		
				</div> <!-- / .form-actions -->
				<?php }	?>	
				<?php if($_SESSION['permissao'] == 1 || $_SESSION['permissao'] == 3){?>	
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="solicitacao-de-orientacao.php">Solicitação de orientação</a>		
				</div> <!-- / .form-actions -->
				<?php }	?>
				<?php if($_SESSION['permissao'] == 2 || $_SESSION['permissao'] == 3){?>	
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="aprovacao-de-orientacao.php">Aprovar Solicitação de orientacao</a>		
				</div> <!-- / .form-actions -->
				<?php }	?>
				<div class="form-actions">
					<a class="btn btn-primary btn-block btn-lg" href="index.php">Sair</a>		
				</div> <!-- / .form-actions -->			
		</div>
	</div>

	<script src="assets/javascripts/bootstrap.min.js"></script>
	<script src="assets/javascripts/pixel-admin.min.js"></script>


</body>