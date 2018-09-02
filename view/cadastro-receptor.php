<?php
//include_once "conferir-autenticacao.php"; 
include_once "mensagens.php"; 
$titulo = $cadastroReceptor;
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
					<li class="active"><a href="#"><?=$cadastroReceptor?><span class="sr-only">(current)</span></a></li>
					<li><a href="pagina-inicial.php">Página Inicial</a></li>
					<li><a href="relatorio.php">Relatório</a></li>
				</ul>
				<div>
					<h4 class="navbar-text navbar-right">Doações-SA</h4>
				</div>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>


	<div class="text-center mensagem-inserir-receptor display-none alert"></div>
	<form id="adiciona-receptor">
		<div class="panel panel-default col-md-offset-1 col-md-10">
			<div class="panel-heading">
				<h1 class="panel-title text-center"><?=$cadastroReceptor?></h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group no-margin-hr">
							<label class="control-label">Nome</label>
							<input type="text" name="nome" class="form-control" placeholder="Nome" required autofocus>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group no-margin-hr">						
							<label class="control-label display-block">Tipo de Cadastro</label>
							<label class="radio-inline"><input type="radio" value="fisica" name = "tipo" checked>Pessoa Física</label>
							<label class="radio-inline"><input type="radio" value="juridica" name = "tipo">Pessoa Jurídica</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">Identificador</label>
							<input type="text" class="form-control" placeholder="Número do Identificador" id="identificador"  name="identificador">
						</div>
					</div>
					<div class="col-sm-3 display-none" id="div-cnpj">
						<div class="form-group no-margin-hr">
							<label class="control-label">CNPJ</label>
							<input type="text" class="form-control" placeholder="Número do CNPJ" id="cnpj"  name="cnpj">
						</div>
					</div>
				</div>
				<div class="row" id="div-cpf">
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">CPF</label>
							<input type="text" class="form-control" placeholder="Número do CPF" id="cpf"  name="cpf">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">Data de Nascimento</label>
							<div class="input-group date" id="bs-datepicker-component">
								<input type="text" id="dtNascimento" name="dtNascimento" class="form-control" required><span class="input-group-addon" required><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label for="sel1">Sexo</label>
							<select class="form-control" id="sel1" name="sexo" required>
								<option>Selecione</option>
								<option>Masculino</option>
								<option>Feminino</option>
							</select>
						</div>
					</div>
				</div><!-- row -->

				<div class="row">
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">Telefone</label>
							<input type="text" name="telefone" placeholder="Phone: (99) 999-9999" class="form-control" id="telefone" >
						</div>
					</div>	
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">CEP</label>
							<input type="text" name="cep" placeholder="CEP" class="form-control" id="cep" >
						</div>
					</div>	
					<div class="col-sm-5">
						<div class="form-group no-margin-hr">
							<label class="control-label">Endereço</label>
							<input type="text" name="endereco" placeholder="Endereço" class="form-control" id="endereco" >
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">Número</label>
							<input type="text" name="numero" placeholder="Número" class="form-control" id="numero">
						</div>
					</div>
				</div><!-- row -->
			</div>
			<div class="panel-footer text-right">
				<a class="btn btn-default" href="pagina-inicial.php">Cancelar</a>
				<button class="btn btn-primary" id="btn-salvar" >Salvar</button>
			</div>
		</div>
	</form>


	<!-- Pixel Admin's javascripts -->
	<script src="assets/javascripts/bootstrap.min.js"></script>
	<script src="assets/javascripts/pixel-admin.min.js"></script>

	<script>
		$(document).ready(function(){
			$('#btn-salvar').click(function(){
				var dados = $('#adiciona-receptor').serialize();
				jQuery.ajax({
					type: "POST",
					url: "../model/adiciona-receptor.php",
					data: dados,
					success: function(data)
					{

						data = JSON.parse(data);
						$("div.mensagem-inserir-receptor").removeClass("alert-success alert-danger");
						if(data.resp){
							$("div.mensagem-inserir-receptor").show();
							$("div.mensagem-inserir-receptor").addClass("alert-success");
	        				$("div.mensagem-inserir-receptor").html("Cadastro Realizado Com Sucesso");
	        				$("input[value='fisica']").get(0).click();
	        				$('#adiciona-receptor').each (function(){this.reset();});
						}
						if(!data.resp){
							$("div.mensagem-inserir-receptor").show();
							$("div.mensagem-inserir-receptor").addClass("alert-danger");
	        				$("div.mensagem-inserir-receptor").html("Preencha Todos os Campos.");		
						}

					}
				});	
				return false;		
			});
		});
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
			$('#cpf').mask('999.999.999-99');
			$("#cep").mask("99999-999");
			$('#cnpj').mask('99.999.999/9999-99');
			$("#identificador").mask("99999");
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

	<script>
		$(document).ready(function () {
		    /*você pode pegar o evento de change do seu radio*/
		    $('input:radio[name="tipo"]').change(function () {
		        /*Chama o método para setar a regra de validação*/
		        if ($(this).val() == 'fisica')
		            setPessoaFisicaValidation();
		        else
		            setPessoaJuridicaValidation();
		    });
		});

		function setPessoaFisicaValidation() {

		    $('#div-cpf').show();
		    $('#div-cnpj').hide();

		    /*seta validação da pessoa física
		    $('#cnpj').rules("add", {
		        required: true
		    });*/
		}

		function setPessoaJuridicaValidation() {
		    /*faz o mesmo da fisica só que inverso >D*/
		    $('#div-cnpj').show();
		    $('#div-cpf').hide();
		}
	</script>
	
</body>
</html>