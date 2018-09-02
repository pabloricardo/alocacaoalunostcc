<!-- / Inicio modal -->
<form id="alterar">
  <div class="modal fade" id="modal-doar" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Efetuar Doção</h4>
        </div>
		<div class="modal-body">
			<div class="row">
				<div class="col-sm-2">
					<div class="form-group no-margin-hr">
						<label class="control-label">Identificador</label>
						<input type="text" class="form-control" placeholder="Identificador" id="doar-idItem"  name="idItem" readonly>
					</div>
				</div>
	  			<div class="col-sm-5">
					<div class="form-group no-margin-hr">
						<label class="control-label">Nome</label>
						<input type="text" name="nome" id="doar-nome" class="form-control" placeholder="Nome" required autofocus disabled="disabled">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group no-margin-hr">
						<label class="control-label">Data de Cadastro</label>
						<div class="input-group date" id="bs-datepicker-component">
							<input type="text" id="doar-dtCadastro" name="dtCadastro" class="form-control" required disabled="disabled"><span class="input-group-addon" required><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="form-group no-margin-hr">
						<label class="control-label">Tipo</label>
						<input type="text" name="tipo" id="doar-tipo" class="form-control" placeholder="Tipo" required autofocus disabled="disabled">
					</div>
				</div>	
       			<div class="col-sm-5">
					<div class="form-group no-margin-hr">
						<label class="control-label">Tamanho</label>
						<input type="text" name="tamanho" id="doar-tamanho" class="form-control" placeholder="Tamanho" required autofocus disabled="disabled">
					</div>
				</div>				
	    		</div>
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group no-margin-hr">
							<label class="control-label">Observacao</label>
							<input type="text" name="observacao" id="doar-observacao" class="form-control" placeholder="Observacao" required autofocus disabled="disabled">
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group no-margin-hr">
							<label class="control-label">Identificador Receptor</label>
							<input type="text" name="idrecetor" id="visualizar-idReceptor" class="form-control" placeholder="Identificador Receptor" required autofocus>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="modal-footer">
		  <button id="doarItem" class="btn btn-primary">Salvar</button>
          <button type="button" id="fechar" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
	</form>
			<!-- Função ajax para Doar-->
		<script>
			$(document).ready(function(){
				$('#doarItem').click(function(){
					var dados = $('#alterar').serialize();
					jQuery.ajax({
						type: "POST",
						url: "../model/alterar-item.php",
						data: dados,
						success: function(data)
						{

							$('#fechar').click();
							alert("Alteração Realizada com Sucesso");
							
						}
					});			
					return false;
				});
			});

		</script>
