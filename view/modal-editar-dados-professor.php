<!-- / Inicio modal -->
<form id="editar">
  <div class="modal fade" id="modal-editar-dados-professor" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-warning">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Editar Dados Do Professor</h4>
        </div>
		<div class="modal-body">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group no-margin-hr">
						<label class="control-label">Nome</label>
						<input type="text" name="editar-nome" id="editar-nome" class="form-control" placeholder="Nome">
					</div>
				</div>	
				<div class="col-sm-2">
					<div class="form-group no-margin-hr">
						<label class="control-label">Matrícula</label>
						<input name="matricula-nova" id="matricula-nova" class="form-control" placeholder="Matrícula">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group no-margin-hr">
						<label class="control-label">E-mail</label>
						<input type="email" name="editar-email" id="editar-email" class="form-control">
					</div>
				</div>	
			</div>
				<input type="text" id="matricula-antiga"  name="matricula-antiga" hidden>
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
					url: "../model/editar-professor.php",
					data: dados,
					success: function(data)
					{
						$('#btn-pesquisar').click();
						alert(data);
					}
				});			
				return false;
			});
		});
</script>