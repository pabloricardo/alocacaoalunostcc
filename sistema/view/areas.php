		<?php
		//include_once "../model/conferir-autenticacao.php"; 
		include_once "mensagens.php"; 
		$titulo = $areas;
		include_once "head.php"; 
		include_once "modal-editar-dados-area.php";
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
					<li class="active"><a href="#">Área<span class="sr-only">(current)</span></a></li>
					<li><a href="pagina-inicial.php">Página Inicial</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>

	<div class="text-center mensagem-inserir-usuario display-none alert"></div>
	<form id="pesquisar-area">
		<div class="panel panel-default col-md-offset-1 col-md-10">
			<div class="panel-heading">
				<h1 class="panel-title text-center">Áreas</h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-5">
						<label class="control-label">Área</label>
						<input type="text" id = "area" name="area" class="form-control" placeholder="Área">
					</div>
				</div>
			</div>
			<div class="panel-footer text-right">
				<a class="btn btn-warning" href="cadastro-area.php">Incluir</a>
				<button class="btn btn-default" id="limpar" type="reset" onclick="focusPrimeiroCampo('table-area');">Limpar</button>
				<button class="btn btn-primary" id="btn-pesquisar" type="submit">Pesquisar</button>
			</div>
		</div>
	</form>

	<div id="table-area" class="table-info display-none col-md-offset-1 col-md-10 padding-left-right-none">
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
	

	<script src="assets/javascripts/localization/messages_pt_BR.js"></script>
	<script type="text/javascript">
		$().ready(function(){
			$('#pesquisar-area').validate({
				rules: {					
				},
				submitHandler: function(form){
					var dados = $(form).serialize();
					$.ajax({
						type: "POST",
						url: "../model/pesquisa-area.php",
						data: dados,
						success: function( data )
						{
							$('tbody').html(data);
							$("#table-area").show();
						}
					});
					return false;
				}
			});
		});
	</script>

	<!-- Função ajax para deletar-->
	<script>
		function deletarArea(id_area){
			var confirmacao = confirm("Confirma a exclusão?");
			if (confirmacao == true) {
				var dados = id_area;
				jQuery.ajax({
					type: "POST",
					url: "../model/deletar-area.php",
					data: "id_area=" + id_area,
					success: function(data)
					{
						alert(data);
						$('#btn-pesquisar').click();
						alert("Removido Com Sucesso");
					}
				});		
			}else {
				alert("Operação Cancelada");
			}					
		};
	</script>


	<!-- Função ajax para editar -->
	<script>
		function editarArea(id_area){
			jQuery.ajax({
				type: "POST",
				url: "../model/modal-editar-dados-area.php",
				data: "id_area="+id_area,
				success: function(data)
					{
						data = JSON.parse(data);	
						$('#editar-nome').val(data.nome_da_area);
						$('#id-area').val(data.id_area);
					}
				});						
		};
	</script>


	<!-- Javascript -->
	<script>
		init.push(function () {

			$('#bs-datepicker-inline').datepicker();
				$(document).ready(function(){
					$('#semestre-letivo').datepicker({
						format: 'mm/yyyy',
						minDate: new Date(1999, 10, 10),

					});

				});
		});
		window.PixelAdmin.start(init);
	</script>
</body>
</html>