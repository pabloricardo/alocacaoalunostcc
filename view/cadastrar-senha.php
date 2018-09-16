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
					<li class="active"><a href="#">Cadastrar Senha<span class="sr-only">(current)</span></a></li>
					<li><a href="index.php">Login</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>


	<div class="text-center mensagem-inserir display-none alert"></div>
    <div id="btn-logar" class="display-none text-center panel-default col-md-12">
		<a class="btn btn-primary btn-lg" href="index.php">Logar</a>
	</div>

	<form id="cadastro">
		<div class="panel panel-default col-md-offset-1 col-md-10">
			<div class="panel-heading">
				<h1 class="panel-title text-center">Cadastrar Senha</h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
                        <div class="form-group no-margin-hr">
							<label class="control-label">Senha</label>
							<input type="text" name="senha" id="senha" class="form-control input-lg" placeholder="Senha" required >
						</div>
					</div>		
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
							<label class="control-label">Confirmação de Senha</label>
							<input type="text" name="confirmar_senha" id="confirmar_senha" class="form-control input-lg" placeholder="Confirmação de Senha" required >
						</div>
					</div>					
				</div><!-- row -->		
			</div>
			<div class="panel-footer text-right">
				<a class="btn btn-default" href="index.php">Cancelar</a>
				<button class="btn btn-primary" id="btn-salvar" type="submit">Salvar</button>
			</div>
		</div>
	</form>


<!-- Pixel Admin's javascripts -->
<script src="assets/javascripts/bootstrap.min.js"></script>
<script src="assets/javascripts/pixel-admin.min.js"></script>

<script src="assets/javascripts/localization/messages_pt_BR.js"></script>
<script type="text/javascript">
	$().ready(function(){
		$('#cadastro').validate({
			rules: {
				senha: { required: true, minlength: 7, maxlength:7 },
				confirmar_senha: { required: true, minlength: 7, maxlength:7, equalTo: "#senha" },
			},
			submitHandler: function(form){
				var dados = $(form).serialize();
				jQuery.ajax({
					type: "POST",
					url: "../model/cadastrar-senha.php",
					data: dados,
					success: function(data)
					{
						data = JSON.parse(data);
						$("div.mensagem-inserir").removeClass("alert-success alert-danger");
						if(data.status == true){
							$("div.mensagem-inserir").show();
							$("div.mensagem-inserir").addClass("alert-success");
	        				$("div.mensagem-inserir").html(data.mensagem);
	        				$('#cadastro').each (function(){this.reset();});
                            $('#cadastro').hide();
                            $('#btn-logar').show();

						}
						else{
							$("div.mensagem-inserir").show();
							$("div.mensagem-inserir").addClass("alert-danger");
	        				$("div.mensagem-inserir").html(data.mensagem);		
						}
					}
				});			
				return false;
			}
		});
	});
</script>
	
</body>
</html>