<!-- / Inicio modal -->
<form id="editar">
  <div class="modal fade" id="modal-editar-dados-area" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-warning">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Editar Dados Da Área</h4>
        </div>
		<div class="modal-body">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group no-margin-hr">
						<label class="control-label">Nome</label>
						<input type="text" name="editar-nome" id="editar-nome" class="form-control" placeholder="Nome">
					</div>
				</div>	
			</div>
				<input type="text" id="id-area"  name="id-area" hidden>
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
					url: "../model/editar-area.php",
					data: dados,
					success: function(data)
					{
						$('#btn-pesquisar').click();
						alert("Dados alterados com sucesso");
					}
				});			
				return false;
			});
		});
</script>