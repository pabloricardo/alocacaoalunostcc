<?php
//include_once "conferir-autenticacao.php"; 
include_once "mensagens.php"; 
$titulo = "SolicitacaoDeOrientacao";
include_once "head.php"; 
include_once "modal-visualizar-dados-item.php";
include_once "modal-editar-dados-item.php";
include_once "modal-efetuar-doacao.php";
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
					<li class="active"><a href="#">Solicitação de Orientação <span class="sr-only">(current)</span></a></li>
					<li><a href="pagina-inicial.php">Página Inicial</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>
	
	<!--action="../model/pesquisa-item.php" method="POST"-->
	<form id="pesquisar-form">
				<div class="panel panel-default col-md-offset-1 col-md-10">

			<div class="panel-heading">
				<h1 class="panel-title text-center">Solicitação de Orientação</h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group no-margin-hr">
							<label class="control-label">Nome do(a) Professor(a)</label>
							<input type="text" class="form-control" placeholder="Professor(a)" id="nomeProfessor"  name="nomeProfessor" autofocus>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group no-margin-hr">
							<label for="tipo">Área de orientação</label>
							<select class="form-control" name="areaorientacao" id="areaorientacao" >
							<option value="">Selecione</option>
				      		<optgroup label="Área de orientação x">
				      		<option value = "x1">x1</option>
					      	<option>x2</option>
					      	<option>x3</option>
					      	<option>x4</option>
					      	</optgroup>		
							<optgroup label="Área de orientação y">
				      		<option value = "y1">y1</option>
					      	<option>y2</option>
					      	</optgroup>				    	
							</select>
						</div>
					</div>
				</div><!-- row -->
			</div>
			<div class="panel-footer text-right">
				<a class="btn btn-warning" href="professor.php">Incluir</a>
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

		<div id="table-pesquisa-item" class="table-info display-none col-md-offset-1 col-md-10 padding-left-right-none">
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
						url: "../model/pesquisa-item.php",
						data: dados,
						success: function(data)
						{
							$('tbody').html(data);
							$("#table-pesquisa-item").show();
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

		<!-- Função ajax para visualizar-->
		<script>
			function visualizarItem(idItem){
				jQuery.ajax({
					type: "POST",
					url: "../model/visualizar-item.php",
					data: "idItem="+idItem,
					success: function(data)
						{

							data = JSON.parse(data);	
							$('#visualizar-idItem').val(data.IdItem);
							$('#visualizar-nome').val(data.NomeItem);
							$('#visualizar-dtCadastro').val(data.DataCadastro);
							$('#visualizar-tipo').val(data.TipoItem);
							$('#visualizar-tamanho').val(data.Tamanho);
							$('#visualizar-observacao').val(data.Observacao);

						}
					});						
			};
		</script>

		<!-- Função ajax para editar-->
		<script>
			function editarItem(idItem){
				jQuery.ajax({
					type: "POST",
					url: "../model/modal-editar-dados-item.php",
					data: "idItem="+idItem,
					success: function(data)
						{

							data = JSON.parse(data);	
							$('#editar-idItem').val(data.IdItem);
							$('#visualizar-nome').val(data.NomeItem);
							$('#visualizar-dtCadastro').val(data.DataCadastro);
							$('#visualizar-tipo').val(data.TipoItem);
							$('#visualizar-tamanho').val(data.Tamanho);
							$('#visualizar-observacao').val(data.Observacao);


						}
					});						
			};
		</script>
		<!-- Função ajax para doar item-->
		<script>
			function doarItem(idItem){
				jQuery.ajax({
					type: "POST",
					url: "../model/modal-efetuar-doacao.php",
					data: "idItem="+idItem,
					success: function(data)
						{

							data = JSON.parse(data);	
							$('#doar-idItem').val(data.IdItem);
							$('#doar-nome').val(data.NomeItem);
							$('#doar-dtCadastro').val(data.DataCadastro);
							$('#doar-tipo').val(data.TipoItem);
							$('#doar-tamanho').val(data.Tamanho);
							$('#doar-observacao').val(data.Observacao);


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