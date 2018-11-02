<?php
include_once "../model/conferir-autenticacao.php"; 
include_once "mensagens.php"; 
$titulo = $cadastrarProfessores;
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
					<li class="active"><a href="#">Cadastrar Professores<span class="sr-only">(current)</span></a></li>
					<li><a href="pagina-inicial.php">Página Inicial</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>


	<div class="text-center mensagem-inserir-usuario display-none alert"></div>
	<form id="cadastro-professor">
		<div class="panel panel-default col-md-offset-1 col-md-10">
			<div class="panel-heading">
				<h1 class="panel-title text-center">Cadastrar Professores</h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group no-margin-hr">
							<label class="control-label">Nome</label>
							<input type="text" name="nome" class="form-control" placeholder="Nome" autofocus>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">Matrícula</label>
							<input id="matricula" name="matricula" class="form-control" placeholder="Matrícula" maxlength= "6">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group no-margin-hr">
							<label class="control-label">E-Mail</label>
							<input type="text" name="email" class="form-control" placeholder="E-Mail">
						</div>
					</div>
				</div><!-- row -->
				<div class="row">
					<div class="col-sm-2">
						<label for="sel1">Disciplina</label>
						<select class="form-control" id="disciplina" name="disciplina">
							<option value="" selected>Selecione</option>
							<option >TCC01</option>
							<option>TCC02</option>
							<option>Ambas</option>
						</select>
					</div>
					<div class="col-sm-5">
					<?php
					#chama o arquivo de configuração com o banco
					require '../model/config.php';
					require '../model/connection.php';
					#chama o arquivo de configuração com o banco
					$link = DBConnect();
					#seleciona os dados da tabela produto
					$sqlArea = "SELECT * FROM `area` order by nome_da_area";
					$result = $link->query($sqlArea);
					?>
					<select class="form-control" multiple="multiple" id="areas" name="areas[]">		
								<?php  while($row = $result->fetch_assoc()) {?>
								<option value="<?php echo $row['id_area'] ?>"><?php echo $row['nome_da_area'] ?></option>
								<?php } ?>
					</select>
					</div>
					<div class="col-sm-3">
						<div class="form-group no-margin-hr">
							<label class="control-label">Quantidade de orientações</label>
							<input id="quantidade_orientacoes" name="quantidade_orientacoes" class="form-control" placeholder="Quantidade de orientações">
						</div>
					</div>
					<div class="col-sm-2">
						<label for="sel1">Status</label>
						<select class="form-control" id="status" name="status">
							<option selected>Ativo</option>
							<option>Inativo</option>
						</select>
					</div>							
				</div><!-- row -->
				<div class="row">
					<div class="col-sm-12">
						<label class="control-label" for="sel1">Descrição</label>
						<textarea class="form-control" name="descricao" id="descricao" cols="10" rows="10"></textarea>
					</div>		
				</div><!-- row -->		
			</div>
			<div class="panel-footer text-right">
				<a class="btn btn-default" href="professores.php">Cancelar</a>
				<button class="btn btn-primary" id="btn-salvar" type="submit">Salvar</button>
			</div>
		</div>
	</form>


<!-- Pixel Admin's javascripts -->
<script src="assets/javascripts/bootstrap.min.js"></script>
<script src="assets/javascripts/pixel-admin.min.js"></script>
<script>
$('#areas').multiSelect({
  selectableHeader: "<div class='custom-header'>Areas existente</div>",
  selectionHeader: "<div class='custom-header'>Areas selecionadas</div>"
})
	init.push(function () {

		$('#bs-datepicker-inline').datepicker();
			$(document).ready(function(){
				$('#semestre-letivo').datepicker({
				    format: 'dd/mm/yyyy',
			        minDate: new Date(1999, 10, 10),

				});

			});
	});
	window.PixelAdmin.start(init);
</script>


<script src="assets/javascripts/localization/messages_pt_BR.js"></script>
<script type="text/javascript">
	$().ready(function(){
		$('#cadastro-professor').validate({
			rules: {
				nome: { required: true },
				matricula: { required: true, minlength: 6, maxlength:6, number: true },
				email: { required: true, email:true },
				quantidade_orientacoes: {required: true, number: true},
				disciplina: { required: true },
			},
			submitHandler: function(form){
				var dados = $(form).serialize();
				jQuery.ajax({
					type: "POST",
					url: "http://alocacaotcc.esy.es/api-alocacao-alunos-tcc/public/api/professor/cadastrar",
					data: dados,
					success: function(data)
					{	
						$("div.mensagem-inserir-usuario").removeClass("alert-success alert-danger");						
						if(data.status == true){
							$("div.mensagem-inserir-usuario").show();
							$("div.mensagem-inserir-usuario").addClass("alert-success");
	        				$("div.mensagem-inserir-usuario").html(data.message);
							$('#areas').multiSelect('deselect_all');
	        				$('#cadastro-professor').each (function(){this.reset();});
						}
						else{
							$("div.mensagem-inserir-usuario").show();
							$("div.mensagem-inserir-usuario").addClass("alert-danger");
	        				$("div.mensagem-inserir-usuario").html(data.message);		
						}
						setTimeout(function(){ $("div.mensagem-inserir-usuario").hide();}, 3000);
					}
				});			
				return false;
			}
		});
	});
</script>

</body>
</html>