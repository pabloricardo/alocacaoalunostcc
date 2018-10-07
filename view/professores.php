<?php
include_once "../model/conferir-autenticacao.php"; 
include_once "mensagens.php"; 
$titulo = $professores;
include_once "head.php"; 
include_once "modal-visualizar-dados-professor.php";
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
					<li class="active"><a href="#">Professores<span class="sr-only">(current)</span></a></li>
					<li><a href="pagina-inicial.php">Página Inicial</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>

	<form id="pesquisar-form">
		<div class="panel panel-default col-md-offset-1 col-md-10">
			<div class="panel-heading">
				<h1 class="panel-title text-center">Professores</h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<?php
					#chama o arquivo de configuração com o banco
					require './config.php';
					require './connection.php';
					$link = DBConnect();
					include_once "modal-editar-dados-professor.php";
					#seleciona os dados da tabela produto
					$sql = "SELECT nome FROM `professores`";
					$result = $link->query($sql);
					?>
					<div class="col-sm-6">
						<div class="form-group no-margin-hr">
							<label for="sel1">Nome</label>
							<select class="form-control" id="nome" name="nome">
								<option selected value>Selecione</option>
								<?php  while($row = $result->fetch_assoc()) {?>
								<option value="<?php echo $row['nome'] ?>"><?php echo $row['nome'] ?></option>
								<?php } ?>
							</select>
						</div>
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
				<a class="btn btn-warning" href="cadastro-professor.php">Incluir</a>
				<button class="btn btn-default" type="reset" onclick="focusPrimeiroCampo('table-pesquisa-professores');">Limpar</button>
				<button class="btn btn-primary" id="btn-pesquisar" type="submit">Pesquisar</button>
			</div>
		</div>
	</form>

	<div id="table-pesquisa-professores" class="table-info display-none col-md-offset-1 col-md-10 padding-left-right-none">
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
											<th>Status</th>
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
						url: "../model/pesquisa-professores.php",
						data: dados,
						success: function( data )
						{
							$('tbody').html(data);
							$("#table-pesquisa-professores").show();
						}
					});
					return false;
				}
			});
		});
	</script>

	<!-- Função ajax para visualizar-->
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
						$('#visualizar-descricao').val(data.descricao);
					}
				});						
		};
	</script>

	<!-- Função ajax para editar-->
	<script>
		function editarProfessor(matricula){
			jQuery.ajax({
				type: "POST",
				url: "../model/modal-editar-dados-professor.php",
				data: "matricula="+matricula,
				success: function(data)
					{
						data = JSON.parse(data);	
						$('#editar-nome').val(data.nome);
						$('#editar-email').val(data.email);
						$('#editar-disciplina').val(data.disciplina);
						$('#editar-quantidade_orientacoes').val(data.quantidade_orientacoes);
						$('#editar-status').val(data.status);
						$('#editar-descricao').val(data.descricao);
						$('#editar-matricula').val(data.matricula);
					}
				});						
		};
	</script>

</body>
</html>