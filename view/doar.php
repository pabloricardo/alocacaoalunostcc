<?php
include_once "conferir-autenticacao.php"; 
include_once "mensagens.php"; 
$titulo = "Item";
include_once "head.php"; 
include_once "modal-visualizar-dados-item.php";
include_once "modal-editar-dados-item.php";
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
					<li class="active"><a href="#">Item <span class="sr-only">(current)</span></a></li>
					<li><a href="pagina-inicial.php">Página Inicial</a></li>
					<li><a href="doacao.php">Cadastrar Item</a></li>
					<li><a href="relatorio.php">Relatório</a></li>
				</ul>
				<div>
					<h4 class="navbar-text navbar-right">Doações-SA</h4>
				</div>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>
	
	<!--action="../model/pesquisa-item.php" method="POST"-->
	<form id="pesquisar-form">
				<div class="panel panel-default col-md-offset-1 col-md-10">

			<div class="panel-heading">
				<h1 class="panel-title text-center">Doação</h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">Identificador</label>
							<input type="text" class="form-control" placeholder="Identificador" id="idItem"  name="idItem" autofocus>
						</div>
					</div>

					<div class="col-sm-5">
						<div class="form-group no-margin-hr">
							<label class="control-label">Nome</label>
							<input type="text" name="nome" class="form-control" placeholder="Nome">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label for="sel1">Tipo</label>
							<select class="form-control" name="tipo" id="sel1" >
							<option>Selecione</option>
				      		<optgroup label="Roupa">
				      		<option>Blusa</option>
					      	<option>Camiseta</option>
					      	<option>Vestido</option>
					      	<option>Calça</option>
					      	<option>Outro Tipo de Roupa</option>
					      	</optgroup>
					    	<optgroup label="Calçados">
				      		<option>Sapato</option>
					      	<option>Tênis</option>
					      	<option>Botina</option>
					      	<option>Sandália</option>
					      	<option>Chinelo</option>
					      	<option>Outro Tipo de Calçado</option>
					      	</optgroup>
					      	<optgroup label="Acessório">
				      		<option>Mochila</option>
					      	<option>Chapéu</option>
					      	<option>Boné</option>
					      	<option>Relogio</option>
					      	<option>Outro Tipo de Acessório</option>
					      	</optgroup>
							</select>
						</div>
					</div>
				</div><!-- row -->
			</div>
			<div class="panel-footer text-right">
				<a class="btn btn-warning" href="doacao.php">Incluir</a>
				<button class="btn btn-default" type="reset" onclick="focusPrimeiroCampo('table-pesquisa-item');">Limpar</button>
				<button class="btn btn-primary" id="btn-pesquisar" type="submit">Pesquisar</button>
			</div>
		</div>
	</form>

	<script type="text/javascript">
		function mensgemConfrimacao(){
			alert("Item Cadastrado Com Sucesso");
		}

	</script>

	<!-- Pixel Admin's javascripts -->
	<script src="assets/javascripts/bootstrap.min.js"></script>
	<script src="assets/javascripts/pixel-admin.min.js"></script>

		<div id="table-efetuar-docao" class="table-info display-none col-md-offset-1 col-md-10 padding-left-right-none">
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
												<th>Identificador</th>
												<th>Nome</th>
												<th>Tipo</th>
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
			
		<!-- Função ajax da pesquisa action="../model/pesquisa-item.php"-->
		<script>
			$(document).ready(function(){
				$('#btn-pesquisar').click(function(){
					var dados = $('#pesquisar-form').serialize();
					jQuery.ajax({
						type: "POST",
						url: "../model/efetuar-docao.php",
						data: dados,
						success: function(data)
						{
							$('tbody').html(data);
							$("#table-efetuar-docao").show();
						}
					});			
					return false;
				});
			});
		</script>

		<!-- Função ajax para deletar-->
		<script>
			function deletarItem(idItem){
				var confirmacao = confirm("Confirma a exclusão?");
			    if (confirmacao == true) {
			        var dados = idItem;
					jQuery.ajax({
						type: "POST",
						url: "../model/deletar-item.php",
						data: "idItem="+idItem,
						success: function(data)
						{
							$('#btn-pesquisar').click();
							alert("Item Removido Com Sucesso");
						}
					});		
				}else {
			        alert("Operação Cancelada");
			    }					
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