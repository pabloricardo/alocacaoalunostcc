		<?php
		include_once "../model/conferir-autenticacao.php"; 
		include_once "mensagens.php"; 
		$titulo = "Relatório";
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
							<li class="active"><a href="#">Relatório<span class="sr-only">(current)</span></a></li>
							<li><a href="pagina-inicial.php">Página Inicial</a></li>
						</ul>
						<div>
							<h4 class="navbar-text navbar-right">Relatório</h4>
						</div>
					</div><!-- /.navbar-collapse -->

				</div><!-- /.container-fluid -->
			</nav>

		<div id="table-relatorio" class="table-info col-md-offset-1 col-md-10 padding-left-right-none">
			<div class="panel">
				<div class="panel-heading text-center">
					<span class="panel-title">Lista de orientações</span>
					<div class="text-right">
						<a class="btn btn-success btn-relatorio-usuario-download" id="btn-emitir-excel">
					      <i class="fa fa-download" aria-hidden="true"></i>Download 
					    </a>
					</div>
				</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">								
									<!-- Light table -->
								<div class="table-light">
									<table class="table table-bordered" id="tabela">
										<thead>
											<tr>
												<th>Matrícula</th>
												<th>Nome</th>
												<th>Orientador</th>
											</tr>
										</thead>
										<tbody>
<?php									

			require '../model/config.php';
			require '../model/connection.php';
			$link = DBConnect();

					 $sql = " SELECT *, p.nome AS profnome, p.matricula AS profmatricula, p.email AS profemail, p.disciplina AS profdisciplina
					 FROM solicitacao_de_orientacao so join professores p on so.matricula_professor = p.matricula
					 join alunos a on so.matricula_aluno = a.matricula WHERE so.status = 'Aprovado' ";					

				//Executa query
				$result = $link->query($sql);

				// $row = $result->fetch_assoc();
				// var_dump($row);
				// die();
				//Veririca se retornou alguma linha
				if ($result->num_rows > 0) {
			    // Pega cada linha retornada e executa os comandos

			      while($row = $result->fetch_assoc()) {
			       ?>
			       		<tr>
			       			<td><?php echo $row['matricula'] ?></td>
			       			<td><?php echo $row['nome'] ?></td>
			       			<td><?php echo $row['profnome'] ?></td>
			       		</tr>
			       <?php
			     }     
			   }else{
			   	echo ("Não econtrados");
			   }

			mysqli_close($link);
?>

											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
<script type="text/javascript">
		$("#btn-emitir-excel").click(function(){

  $("#tabela").table2excel({

    // exclude CSS class

    exclude: ".noExl",

    name: "Worksheet Name",

    filename: "Relatório de Item" //do not include extension

  });

});


</script>
	

			<!-- Pixel Admin's javascripts -->
			<script src="assets/javascripts/bootstrap.min.js"></script>
			<script src="assets/javascripts/pixel-admin.min.js"></script>

		<!-- Função ajax da pesquisa action="../model/pesquisa-usuario.php"-->
		<script>
			$(document).ready(function(){
				$('#btn-pesquisar').click(function(){
					var dados = $('#relatorio-form').serialize();
					jQuery.ajax({
						type: "POST",
						url: "../model/relatorio.php",
						data: dados,
						success: function(data)
						{
							$('tbody').html(data);
							$("#table-relatorio").show();
						}
					});			
					return false;
				});
			});
		</script>
	
		</body>
		</html>