<?php
include_once "conferir-autenticacao.php"; 
include_once "mensagens.php"; 
$titulo = $cadastroUsuario;
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
					<li class="active"><a href="#">Cadastro de Usuário <span class="sr-only">(current)</span></a></li>
					<li><a href="pagina-inicial.php">Página Inicial</a></li>
					<li><a href="doacao-menu.php">Cadastrar Item</a></li>
					<li><a href="relatorio.php">Relatório</a></li>
				</ul>
				<div>
					<h4 class="navbar-text navbar-right">Doações-SA</h4>
				</div>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>


	<div class="text-center mensagem-inserir-usuario display-none alert"></div>
	<form id="adiciona-usuario">
		<div class="panel panel-default col-md-offset-1 col-md-10">
			<div class="panel-heading">
				<h1 class="panel-title text-center">Cadastro de Usuário</h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group no-margin-hr">
							<label class="control-label">Nome</label>
							<input type="text" name="nome" class="form-control" placeholder="Nome" required autofocus>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">CPF</label>
							<input type="text" class="form-control" placeholder="Número do CPF" id="cpf"  name="cpf" required>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">Data de Nascimento</label>
							<div class="input-group date" id="bs-datepicker-component">
								<input type="text" id="dtNascimento" name="dtNascimento" class="form-control" required><span class="input-group-addon" required><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label for="sel1">Sexo</label>
							<select class="form-control" id="sel1" name="sexo" required>
								<option>Selecione</option>
								<option>Masculino</option>
								<option>Feminino</option>
							</select>
						</div>
					</div>
				</div><!-- row -->

				<div class="row">
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">Telefone</label>
							<input type="text" name="telefone" placeholder="Phone: (99) 999-9999" class="form-control" id="telefone" >
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group no-margin-hr">
							<label class="control-label">Senha</label>
							<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" maxlength="12" required>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group no-margin-hr">
							<label for="jq-validation-password-confirmation" class="control-label">Confirmar senha</label>
							<input type="password" class="form-control" id="jq-validation-password-confirmation" name="jq-validation-password-confirmation" placeholder="Confirmar senha" maxlength="12" required>
						</div>
					</div>					
				</div><!-- row -->
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group no-margin-hr">
							<label class="control-label">Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="no-margin-hr">
							<label class="control-label">Confirmação de Email</label>
							<input type="email" name="confirmacao-email" class="form-control" required>
						</div>
					</div>	
				</div>
			</div>
			<div class="panel-footer text-right">
				<a class="btn btn-default" href="usuario.php">Cancelar</a>
				<button class="btn btn-primary" id="btn-salvar" type="submit">Salvar</button>
			</div>
		</div>
	</form>


	<!-- Pixel Admin's javascripts -->
	<script src="assets/javascripts/bootstrap.min.js"></script>
	<script src="assets/javascripts/pixel-admin.min.js"></script>

	<script>
		$(document).ready(function(){
			$('#btn-salvar').click(function(){
				var dados = $('#adiciona-usuario').serialize();
				jQuery.ajax({
					type: "POST",
					url: "../model/adiciona-usuario.php",
					data: dados,
					success: function(data)
					{
						data = JSON.parse(data);

						$("div.mensagem-inserir-usuario").removeClass("alert-success alert-danger");
						if(data.status == true){
							$("div.mensagem-inserir-usuario").show();
							$("div.mensagem-inserir-usuario").addClass("alert-success");
	        				$("div.mensagem-inserir-usuario").html(data.mensagem);
	        				$('#adiciona-usuario').each (function(){this.reset();});
						}
						else{
							$("div.mensagem-inserir-usuario").show();
							$("div.mensagem-inserir-usuario").addClass("alert-danger");
	        				$("div.mensagem-inserir-usuario").html(data.mensagem);		
						}
					}
				});			
				return false;
			});
		});
	</script>

	<!-- Javascript -->
	<script>
		init.push(function () {

			$('#bs-datepicker-inline').datepicker();
			$(document).ready(function(){
				$('#dtNascimento').datepicker({
					format: 'dd/mm/yyyy',
				});

			});

			$("#telefone").mask("(99) 99999-9999");
			$("#cpf").mask("99999999999");
			$("#masked-inputs-examples-ssn").mask("999-99-9999");
			$("#masked-inputs-examples-product-key").mask("a*-999-a999", {
				placeholder: " ",
				completed: function(){
					alert("You typed the following: " + this.val());
				}
			});
		});
		window.PixelAdmin.start(init);
	</script>
	
</body>
</html>