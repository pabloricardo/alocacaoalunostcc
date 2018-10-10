<?php
include_once "mensagens.php"; 
$titulo =  $login;
include_once "head.php"; 
session_start();
session_destroy();
?>


<body class="theme-default page-signin">
	
	<script>var init = [];</script>

	<!-- Page background -->
	<div id="page-signin-bg">
		<!-- Background overlay -->
		<div class="overlay"></div>
		<!-- Replace this with your bg image -->
		<img src="assets/demo/signin-bg-1.jpg" alt="">
	</div>
	<!-- / Page background -->

	<!-- Container -->
	<div class="signin-container">

		<!-- Left side -->
		<div class="signin-info">
			<a href="index.php" class="logo">
				<img src="assets/demo/logo-big.png" alt="" style="margin-top: -5px;">&nbsp;
				Orientação de TCC
			</a> <!-- / .logo -->
			<div class="slogan">
				 Solicitação de orientação em TCC.
			</div> <!-- / .slogan -->
			<ul>
				<!-- <li><i class="fa fa-sitemap signin-icon"></i>Solicitação de orientação</li>
				<li><i class="fa fa-outdent signin-icon"></i>Aprovoção de orientação</li>
				<li><i class="fa fa-heart signin-icon"></i> Relatórios</li> -->
			</ul> <!-- / Info list -->
		</div>
		<!-- / Left side -->

		<!-- Right side -->
		<div class="signin-form">

			<!-- Div que recebe a mensagem de erro-->
			<div class="alert alert-danger mensagem-erro display-none">
			</div>


			<!-- Form -->
			<form id="login-form">
				<div class="signin-text">
					<span>Acesso</span>
				</div> <!-- / .signin-text -->

				<div class="form-group w-icon">
					<input type="text" name="matricula" id="matricula" class="form-control input-lg" placeholder="Matrícula" maxlength= "6" required autofocus>
					<span class="fa fa-lock signin-form-icon"></span>
				</div> <!-- / Password -->

				<div class="form-group w-icon">
					<input type="password" name="senha" id="senha" class="form-control input-lg" placeholder="Senha" required >
					<span class="fa fa-user signin-form-icon"></span>
				</div> <!-- / Username -->


				<!-- <div>
					<a href="#" class="forgot-password link-esquecer-senha" data-toggle="modal" data-target="#modal-recuperar-senha" id="recuperar-senha">Equeceu sua senha?</a>
				</div> -->
				<div class="form-actions text-right">
					<button type="submit" id="btn-login" value="acessar" class="btn btn-primary btn-lg">Acessar</button>		
				</div> <!-- / .form-actions -->
			</form>				
			<!-- / Form -->
		</div>
		<!-- Right side -->
	</div>
	<!-- / Container -->


	<!-- / Inicio modal-recuperar-senha -->
		<div class="modal fade" tabindex="-1" role="dialog" id="modal-recuperar-senha">
		  <div class="modal-dialog" role="document">
	 <form id="conferir-recuperar-senha">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Recuperar Senha</h4>
		      </div>
		      <div class="modal-body">

		      <div class="mensagem-recuperar-senha display-none alert">
			</div>

		      <div class="row">
			      	<div class="form-group col-md-6">
			        	<label class="control-label">CPF:</label>
			            <input type="text" name="cpf-recuperar-senha" id="cpf-recuperar-senha" class="form-control" placeholder="CPF (Somente os números do CPF)" title="Digite apenas os números do seu CPF" autofocus>
			        </div>

			       	<div class="col-md-6">		          
			           	<label class="control-label">Data de Nascimento:</label>
			            <div class="input-group date" id="bs-datepicker-component">
			            <input type="text" class="form-control" id="data-nascimento-recuperar-senha" placeholder="Data de Nascimento" name="datanascimento"/><span class="input-group-addon" required><i class="fa fa-calendar"></i></span>
		          		</div>
		      		</div>
	        	</div>

	        	<div class="row">
		        	<div class="form-group col-md-12">
			            <label class="control-label">E-mail</label>
			            <input type="E-mail" name="email" class="form-control" id="email-recuperar-senha" placeholder="E-mail"/>
		          	</div>
		        </div>
	
		      <div class="modal-footer">
		      	<button type="reset" onclick="esconderMensagem('div.mensagem-recuperar-senha');" class="btn btn-default" data-dismiss="modal">Fechar</button>
		        <button type="button" id="btn-recuperar-senha" class="btn btn-primary">Recuperar</button>
		      </div>
		    </div><!-- /.modal-content -->
	</form>
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- / Fim do modal-recuperar-senha -->


<!-- Função ajax recuperar senha-->
<script>
	$(document).ready(function(){
		$('#btn-recuperar-senha').click(function(){
			var dados = $('#conferir-recuperar-senha').serialize();
			jQuery.ajax({
				type: "POST",
				url: "conferir-recuperar-senha.php",
				data: dados,
				success: function(data)
				{

					data = JSON.parse(data);					
					$("div.mensagem-recuperar-senha").removeClass("alert-success alert-danger");
					if(data.status == true){
						$("div.mensagem-recuperar-senha").show();
						$("div.mensagem-recuperar-senha").addClass("alert-success");
        				$("div.mensagem-recuperar-senha").html("Sua senha é "+ data.senha);
        				$("input[id=cpf-recuperar-senha]").focus();
					}
					else{
						$("div.mensagem-recuperar-senha").show();
						$("div.mensagem-recuperar-senha").addClass("alert-danger");
        				$("div.mensagem-recuperar-senha").html(data.message);
        				$("input[id=cpf-recuperar-senha]").focus();			
					}
					
				}
			});			
			return false;
		});
	});
</script>



<!-- Pixel Admin's javascripts -->
<script src="assets/javascripts/bootstrap.min.js"></script>
<script src="assets/javascripts/pixel-admin.min.js"></script>
<script src="assets/javascripts/localization/messages_pt_BR.js"></script>
<script>
$("#login-form").validate({
  rules: {
    senha: {
      required: true
    },
	matricula: {
      required: true,
      number: true,
    }
  },
  submitHandler: function(form) {
      	var dados = $('#login-form').serialize();
			jQuery.ajax({
				type: "POST",
				url: "../model/conferir-login.php",
				data: dados,
				success: function(data)
				{
					if(data == 1)
						window.location.href = "pagina-inicial.php";
					else if(data == 2)
					window.location.href = "cadastrar-senha.php";
					else{
						$("div.mensagem-erro").show();
        				$("div.mensagem-erro").html(data);	
					}
				}
			});			
			return false;
  }
});
</script>

<script>
	init.push(function () {

		$('#bs-datepicker-inline').datepicker();
			$(document).ready(function(){
				$('#data-nascimento-recuperar-senha').datepicker({
				    format: 'dd/mm/yyyy',
			        minDate: new Date(1999, 10, 10),

				});

			});
	});
	window.PixelAdmin.start(init);
</script>

<script>
	function esconderMensagem(mensagem){
		$(mensagem).hide();
	}
</script>


</body>
</html>
