		<?php
		//include_once "../model/conferir-autenticacao.php"; 
		include_once "mensagens.php"; 
		$titulo = $aprovarsolicitcaodeorientacao;
		include_once "head.php"; 
		include_once "modal-visualizar-dados-usuario.php";
		include_once "modal-editar-dados-usuario.php";
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
							<li class="active"><a href="#">Aprovar Solicitação de Orientação <span class="sr-only">(current)</span></a></li>
							<li><a href="pagina-inicial.php">Página Inicial</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->

				</div><!-- /.container-fluid -->
			</nav>

			<!--action="../model/pesquisa-usuario.php" method="POST"-->
			<form id="pesquisar-form">
				<div class="panel panel-default col-md-offset-1 col-md-10">
					<div class="panel-heading">
						<h1 class="panel-title text-center">Aprovar Solicitação de Orientação</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-5">
								<div class="form-group no-margin-hr">
									<label class="control-label">Nome</label>
									<input type="text" name="nome" class="form-control" placeholder="Nome" autofocus>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group no-margin-hr">
									<label class="control-label">CPF</label>
									<input type="text" class="form-control" placeholder="Número do CPF" id="cpf"  name="cpf">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group no-margin-hr">
									<label for="sel1">Sexo</label>
									<select class="form-control" id="sel1" name="sexo">
										<option selected value>Selecione</option>
										<option >Masculino</option>
										<option>Feminino</option>
									</select>
								</div>
							</div>
						</div><!-- row -->
					</div>
					<div class="panel-footer text-right">
						<a class="btn btn-warning" href="cadastro-usuario.php">Incluir</a>
						<button class="btn btn-default" type="reset" onclick="focusPrimeiroCampo('table-pesquisa-usuario');">Limpar</button>
						<button class="btn btn-primary" id="btn-pesquisar" type="submit">Pesquisar</button>
					</div>
				</div>
			</form>

		<div id="table-pesquisa-usuario" class="table-info display-none col-md-offset-1 col-md-10 padding-left-right-none">
			<div class="panel">
				<div class="panel-heading text-center">
					<span class="panel-title">Resultado da pesquisa</span>
				</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">								
									<!-- Light table -->
								<div class="table-light">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Nome</th>
												<th>CPF</th>
												<th>Sexo</th>
												<th>Ações</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		
			<!-- Pixel Admin's javascripts -->
			<script src="assets/javascripts/bootstrap.min.js"></script>
			<script src="assets/javascripts/pixel-admin.min.js"></script>

		<!-- Função ajax da pesquisa action="../model/pesquisa-usuario.php"-->
		<script>
			$(document).ready(function(){
				$('#btn-pesquisar').click(function(){
					var dados = $('#pesquisar-form').serialize();
					jQuery.ajax({
						type: "POST",
						url: "../model/pesquisa-usuario.php",
						data: dados,
						success: function(data)
						{
							$('tbody').html(data);
							$("#table-pesquisa-usuario").show();
						}
					});			
					return false;
				});
			});
		</script>

		<!-- Função ajax para deletar-->
		<script>
			function deletarUsuario(cpf){
				var confirmacao = confirm("Confirma a exclusão?");
			    if (confirmacao == true) {
			        var dados = cpf;
					jQuery.ajax({
						type: "POST",
						url: "../model/deletar-usuario.php",
						data: "cpf="+cpf,
						success: function(data)
						{
							$('#btn-pesquisar').click();
							alert("Usuário Removido Com Sucesso");
						}
					});		
				}else {
			        alert("Operação Cancelada");
			    }					
			};
		</script>

		<!-- Função ajax para visualizar-->
		<script>
			function visualizarUsuario(cpf){
				jQuery.ajax({
					type: "POST",
					url: "../model/visualizar-usuario.php",
					data: "cpf="+cpf,
					success: function(data)
						{

							data = JSON.parse(data);	
							$('#visualizar-nome').val(data.Nome);
							$('#visualizar-email').val(data.Email);
							$('#visualizar-dtNascimento').val(data.DataNascimento);
							$('#visualizar-cpf').val(data.CPF);
							$('#visualizar-telefone').val(data.Telefone);
							$('#visualizar-sexo').val(data.Sexo);

						}
					});						
			};
		</script>

		<!-- Função ajax para editar-->
		<script>
			function editarUsuario(cpf){
				jQuery.ajax({
					type: "POST",
					url: "../model/modal-editar-dados-usuario.php",
					data: "cpf="+cpf,
					success: function(data)
						{

							data = JSON.parse(data);	
							$('#editar-nome').val(data.Nome);
							$('#editar-email').val(data.Email);
							$('#editar-dtNascimento').val(data.DataNascimento);
							$('#editar-cpf').val(data.CPF);
							$('#cpf-antigo').val(data.CPF);
							$('#editar-telefone').val(data.Telefone);
							$('#editar-sexo').val(data.Sexo);

						}
					});						
			};
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