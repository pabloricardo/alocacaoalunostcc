<!-- / Inicio modal -->
		<form id="editar">
  <div class="modal fade" id="modal-editar" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-warning">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Editar Dados Do Usuário</h4>
        </div>
		<div class="modal-body">
			<div class="row">
	  			<div class="col-sm-5">
					<div class="form-group no-margin-hr">
						<label class="control-label">Nome</label>
						<input type="text" name="editar-nome" id="editar-nome" class="form-control" placeholder="Nome" required autofocus>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group no-margin-hr">
						<label class="control-label">CPF</label>
						<input type="text" class="form-control" placeholder="Número do CPF" id="editar-cpf"  name="editar-cpf" required>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group no-margin-hr">
						<label class="control-label">Data de Nascimento</label>
						<div class="input-group date" id="bs-datepicker-component">
							<input type="text" id="editar-dtNascimento" name="editar-dtNascimento" class="form-control" required><span class="input-group-addon" required><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group no-margin-hr">
						<label for="sel1">Sexo</label>
						<select class="form-control" id="editar-sexo" name="editar-sexo" required>
							<option>Selecione</option>
							<option>Masculino</option>
							<option>Feminino</option>
						</select>
					</div>
				</div>		
			</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group no-margin-hr">
							<label class="control-label">Telefone</label>
							<input type="text" name="editar-telefone" placeholder="Phone: (99) 999-9999" class="form-control form-group-margin" id="editar-telefone">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group no-margin-hr">
							<label class="control-label">Email</label>
							<input type="email" name="editar-email" id="editar-email" class="form-control" required>
						</div>
					</div>	
				</div>
				<input type="text" id="cpf-antigo"  name="cpf-antigo" hidden>
			</div>
        </div>
        <div class="modal-footer">
          <button id="editar-dados" class="btn btn-primary">Salvar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
				</form>

    		<script>
			$(document).ready(function(){
				$('#editar-dados').click(function(){
					var dados = $('#editar').serialize();
					jQuery.ajax({
						type: "POST",
						url: "../model/editar-usuario.php",
						data: dados,
						success: function(data)
						{
							$('#btn-pesquisar').click();
							alert("Alteração Realizada com Sucesso");
						}
					});			
					return false;
				});
			});
		</script>