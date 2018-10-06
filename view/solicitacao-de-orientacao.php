<?php
include_once "../model/conferir-autenticacao.php";
include_once "mensagens.php"; 
$titulo = $solicitacaoDeOrientacao;
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
					<li class="active"><a href="#">Solicitação de Orientação <span class="sr-only">(current)</span></a></li>
					<li><a href="pagina-inicial.php">Página Inicial</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>
	<?php
					#chama o arquivo de configuração com o banco
					require './config.php';
					require './connection.php';
					$matriculaAluno = $_SESSION['matricula'];
					$link = DBConnect();
					$verificaStatus = "SELECT * FROM `solicitacao_de_orientacao` Where matricula_aluno = $matriculaAluno and status = 'Aprovado' ";
					$result = $link->query($verificaStatus);
					$retornoNoArray = $result->fetch_assoc();
					if ($result->num_rows == 0) {
					?>
	<!--action="../model/pesquisa-item.php" method="POST"-->
	<form id="pesquisar-form">
				<div class="panel panel-default col-md-offset-1 col-md-10">

			<div class="panel-heading">
				<h1 class="panel-title text-center">Solicitação de Orientação</h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<?php
					$sql = "SELECT nome FROM `professores` Where status = 'Ativo' and quantidade_orientacoes > 0 order by nome";
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

					<?php
					#chama o arquivo de configuração com o banco
					$link = DBConnect();
					#seleciona os dados da tabela produto
					$sqlArea = "SELECT * FROM `area` order by nome_da_area";
					$result = $link->query($sqlArea);
					?>
					<div class="col-sm-5">
						<div class="form-group no-margin-hr">
							<label for="sel1">Área</label>
							<select class="form-control" id="id_area" name="id_area">
								<option selected value>Selecione</option>
								<?php  while($row = $result->fetch_assoc()) {?>
								<option value="<?php echo $row['id_area'] ?>"><?php echo $row['nome_da_area'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div><!-- row -->
			</div>
			<div class="panel-footer text-right">
				<button class="btn btn-default" type="reset" onclick="focusPrimeiroCampo('table-pesquisa');">Limpar</button>
				<button class="btn btn-primary" id="btn-pesquisar" type="submit">Pesquisar</button>
			</div>
		</div>
	</form>

	<?php }else echo('<h1 class="col-md-offset-2 col-md-10">Sua solicitação de orientação já foi aprovada por um professor.</h1>') ?>

	<!-- Pixel Admin's javascripts -->
	<script src="assets/javascripts/bootstrap.min.js"></script>
	<script src="assets/javascripts/pixel-admin.min.js"></script>

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
												<th>Área</th>
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
						url: "../model/solicitacao-de-orientacao.php",
						data: dados,
						success: function(data)
						{
							$('tbody').html(data);
							$("#table-pesquisa").show();
						}
					});			
					return false;
				});
			});
		</script>

		<!-- Função ajax para solicitar orientação-->
		<script>

		function solicitarOrientacao(matricula, area){
			var confirmacao = confirm("Confirma a solicitação?");
			if (confirmacao == true) {
				var mydata = { matricula: matricula , area: area};
				jQuery.ajax({
					type: "POST",
					url: "../model/solicitar-orientacao.php",
					data: mydata,
					success: function(data)
					{					
						data = JSON.parse(data);
						alert(data.mensagem);
					}
				});		
			}else {
				alert("Operação Cancelada");
			}					
		};
		</script>	
</body>
</html>