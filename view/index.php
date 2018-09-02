<?php
include_once "mensagens.php"; 
$titulo =  $login;
include_once "head.php"; 
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
				<li><i class="fa fa-sitemap signin-icon"></i>Solicitação de orientação</li>
				<li><i class="fa fa-outdent signin-icon"></i>Aprovoção de orientação</li>
				<li><i class="fa fa-heart signin-icon"></i> Relatórios</li>
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
					<input type="text" name="cpf" id="cpf" class="form-control input-lg" placeholder="CPF (Somente os números do CPF)" required title="Digite apenas os números do seu CPF">
					<span class="fa fa-user signin-form-icon"></span>
				</div> <!-- / Username -->

				<div class="form-group w-icon">
					<input type="password" name="matriciula" id="matricula" class="form-control input-lg" placeholder="Matrícula" maxlength= "6" required>
					<span class="fa fa-lock signin-form-icon"></span>
				</div> <!-- / Password -->
				<div>
					<a href="#" class="forgot-password link-esquecer-senha" data-toggle="modal" data-target="#modal-recuperar-senha" id="recuperar-senha">Equeceu sua senha?</a>
				</div>
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



<!-- Função ajax do login
<script>
	$(document).ready(function(){
		$('#btn-login').click(function(){
			var dados = $('#login-form').serialize();
			jQuery.ajax({
				type: "POST",
				url: "conferir-login.php",
				data: dados,
				success: function(data)
				{
					if(data == 1)
						window.location.href = "pagina-inicial.php";
					else{
						$("div.mensagem-erro").show();
        				$("div.mensagem-erro").html(data);
        				$("input[id=cpf]").focus();			
					}
				}
			});			
			return false;
		});
	});
</script>-->

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

<script>
jQuery("#cpf").mask("99999999999");
jQuery.validator.addMethod("cpf", function(value, element) {
   value = jQuery.trim(value);

    value = value.replace('.','');
    value = value.replace('.','');
    cpf = value.replace('-','');
    while(cpf.length < 11) cpf = "0"+ cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
    for (i=0; i<11; i++){
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
    b = 0;
    c = 11;
    for (y=0; y<10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

    var retorno = true;
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

    return this.optional(element) || retorno;

}, "Informe um CPF válido");

$("#login-form").validate({
  rules: {
    cpf: {
      cpf: true,
      required: true,
    },
     senha: {
      required: true,
      minlength: 3
    }
  },
  messages: {
    cpf: {
      required: "Campo Obrigatório",
      cpf: 'CPF inválido'
    },
    senha: {
      required: "Campo Obrigatório",
      minlength: jQuery.validator.format("No mínimo {0} characters!")
    }
  },
  submitHandler: function(form) {
      	var dados = $('#login-form').serialize();
			jQuery.ajax({
				type: "POST",
				url: "conferir-login.php",
				data: dados,
				success: function(data)
				{
					if(data == 1)
						window.location.href = "pagina-inicial.php";
					else{
						$("div.mensagem-erro").show();
        				$("div.mensagem-erro").html(data);
        				$("input[id=cpf]").focus();			
					}
				}
			});			
			return false;
  }
});
</script>

<script>
jQuery("#cpf-recuperar-senha").mask("99999999999");
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
