<?php
include_once "../model/conferir-autenticacao.php";
include_once "mensagens.php"; 
$titulo = $aprovarSolicitacaoDeOrientacao;
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
					<li class="active"><a href="#">Aprovar Solicitação de Orientação<span class="sr-only">(current)</span></a></li>
					<li><a href="pagina-inicial.php">Página Inicial</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>
	
	<!--action="../model/pesquisa-item.php" method="POST"-->
	<!-- Pixel Admin's javascripts -->
	<script src="assets/javascripts/bootstrap.min.js"></script>
	<script src="assets/javascripts/pixel-admin.min.js"></script>

		<div id="table-pesquisa" class="table-info col-md-offset-1 col-md-10 padding-left-right-none">
			<div class="panel">
				<div class="panel-heading text-center">
					<span class="panel-title">Solicitações de Orientação</span>
				</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">								
									<!-- Light table -->
								<div class="table-light">
									<table class="table table-bordered">
										<thead>
											<tr>			
												<th>Nome do Aluno</th>
												<th>Área que o aluno solicitou orientação</th>
												<th>Ações</th>
											</tr>
										</thead>
										<tbody>
										<?php
											require '../model/config.php';
											require '../model/connection.php';
											$matriculaProfessor = $_SESSION['matricula'];
											$link = DBConnect();

													
											//Verifica se o campo foi preenchido para montar a query dinamica
											// $where = array();
											// if( $area ){ $where[] = "nome_da_area LIKE '{$area}%'"; }
											//Monta a query
											$sql = "SELECT * FROM solicitacao_de_orientacao so 
											JOIN professores p on so.matricula_professor =  p.matricula 
											JOIN alunos al on so.matricula_aluno = al.matricula											
											WHERE so.matricula_professor = $matriculaProfessor";
											// if( sizeof( $where ) )
											// $sql .= ' WHERE '.implode( ' AND ',$where );
											//echo $sql; imrpime a query montada
											//Executa query
											$result = $link->query($sql);
											// $num_rows = mysqli_num_rows($result);
											// print_r ($num_rows);
											// print_r ($sql);
											

											//Veririca se retornou alguma linha
											if ($result->num_rows > 0) {
											// Pega cada linha retornada e executa os comandos									
											
											while($row = $result->fetch_assoc()) {
												
											?>
										 			<tr>
										 				<td><?php echo $row['nome'] ?></td>
													<?php	 if($row['nome_da_area'] != '1'){?>
														 <td><?php echo $row['nome_da_area'] ?></td>
													<?php } else { ?><td><?php echo ("Aluno deseja sua orientação sem importar a área") ?></td><?php } ?>
										 				<td class="acoes-pesquisa-usuario">
														 <i class="btn btn-default btn-xs fa fa-check" title="Aprovar" aria-hidden="true" onclick="aceitarSolicitacao(<?php echo $row['matricula'] ?>)"></i>
														 <i class="btn btn-danger btn-xs fa fa-times" title="Rejeitar" aria-hidden="true" onclick="rejeitarSolicitacao(<?php echo $row['matricula'] ?>)"></i>
										 				</td>
										 			</tr>
										 	<?php
										 	}     
										 }else{
										 	echo "<td> Não há Solicitações </td> <td> Não há Solicitações </td> <td> Não há Solicitações </td>";
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