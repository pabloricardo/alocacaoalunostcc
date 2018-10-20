<?php
include_once "../model/conferir-autenticacao.php"; 
include_once "mensagens.php"; 
$titulo = $cadastrarSenha;
include_once "head.php"; 
?>

<body class="theme-default main-menu-animated">

	<script>var init = [];</script>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="aluno.php">Voltar</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>


	<div class="text-center mensagem-inserir alert alert-success"><h1>Arquivo importado</h1></div>
    <div id="btn-logar" class="text-center panel-default col-md-12">
		<a class="btn btn-primary btn-lg" href="aluno.php">Voltar</a>
	</div>

	
	
</body>
</html>