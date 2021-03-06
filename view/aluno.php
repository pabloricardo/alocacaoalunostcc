		<?php
		//include_once "../model/conferir-autenticacao.php"; 
		include_once "mensagens.php"; 
		$titulo = $alunos;
		include_once "head.php"; 
		//include_once "modal-visualizar-dados-professor.php";
		include_once "modal-editar-dados-aluno.php";
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
					<li class="active"><a href="#">Alunos<span class="sr-only">(current)</span></a></li>
					<li><a href="pagina-inicial.php">Página Inicial</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>

	<form class="form-horizontal" action="../model/importar-alunos-csv.php" method="post" name="uploadCSV" enctype="multipart/form-data">
		<div id="import">
			<label class="col-md-offset-3 col-md-2 control-label">Importar Alunos Pelo CSV</label> 
			<input type="file" name="file" id="file" accept=".csv" class="btn btn-default">
			<div class="col-sm-2">
				<label for="sel1">Disciplina</label>
				<select class="form-control" id="disciplina" name="disciplina">
					<option value="" selected>Selecione</option>
					<option >TCC01</option>
					<option>TCC02</option>
				</select>
			</div>
			<button type="submit" id="submit" name="import" class="btn btn-primary">Importar</button>
			<br />
		</div>
		<div id="labelError"></div>
	</form>

	<form id="pesquisar-form">
		<div class="panel panel-default col-md-offset-1 col-md-10">
			<div class="panel-heading">
				<h1 class="panel-title text-center">Alunos</h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-5">
						<label class="control-label">Nome</label>
						<input type="text" id = "nome" name="nome" class="form-control" placeholder="Nomes">
					</div>		
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">Matrícula</label>
							<input id="matricula" name="matricula" class="form-control" placeholder="Matrícula" maxlength= "6">
						</div>
					</div>		
				</div><!-- row -->						
			</div>
			<div class="panel-footer text-right">
				<a class="btn btn-warning" href="cadastro-aluno.php">Incluir</a>
				<button class="btn btn-default" type="reset" onclick="focusPrimeiroCampo('table-pesquisa');">Limpar</button>
				<button class="btn btn-primary" id="btn-pesquisar" type="submit">Pesquisar</button>
			</div>
		</div>
	</form>

	<div id="table-pesquisa" class="table-info display-none col-md-offset-1 col-md-10 padding-left-right-none">
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
											<th>Matrícula</th>
											<th>E-mail</th>
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
	

	<script src="assets/javascripts/localization/messages_pt_BR.js"></script>
	<script type="text/javascript">
		$().ready(function(){
			$('#pesquisar-form').validate({
				rules: {
					matricula: { minlength: 6, maxlength:6, number: true },
				},
				submitHandler: function(form){
					var dados = $(form).serialize();
					$.ajax({
						type: "POST",
						url: "../model/pesquisa-alunos.php",
						data: dados,
						success: function( data )
						{
							$('tbody').html(data);
							$("#table-pesquisa").show();
						}
					});
					return false;
				}
			});
		});
	</script>

	<!-- Função ajax para deletar-->
	 <script>
		function deletarAluno(matricula){
			var confirmacao = confirm("Confirma a exclusão?");
			if (confirmacao == true) {
				var dados = matricula;
				jQuery.ajax({
					type: "POST",
					url: "../model/deletar-aluno.php",
					data: "matricula="+matricula,
					success: function(data)
					{
						$('#btn-pesquisar').click();
						alert("Removido Com Sucesso");
					}
				});		
			}else {
				alert("Operação Cancelada");
			}					
		};
	</script>

	<!-- Função ajax para visualizar
	<script>
		function visualizarProfessor(matricula){
			jQuery.ajax({
				type: "POST",
				url: "../model/visualizar-professor.php",
				data: "matricula="+matricula,
				success: function(data)
					{
						data = JSON.parse(data);	
						$('#visualizar-nome').val(data.nome);
						$('#visualizar-email').val(data.email);
						$('#visualizar-matricula').val(data.matricula);
					}
				});						
		};
	</script> -->

	<!-- Função ajax para editar-->
	<script>
		function editarAluno(matricula){
			jQuery.ajax({
				type: "POST",
				url: "../model/modal-editar-dados-aluno.php",
				data: "matricula="+matricula,
				success: function(data)
					{
						data = JSON.parse(data);	
						$('#editar-nome').val(data.nome);
						$('#editar-email').val(data.email);
						$('#matricula-nova').val(data.matricula);
						$('#matricula-antiga').val(data.matricula);
					}
				});						
		};
	</script>

</body>
</html>