<!-- / Inicio modal -->
  <div class="modal fade" id="modal-editar" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-warning">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Editar Dados Do Item</h4>
        </div>
		<div class="modal-body">
		<form action="editar">
			<div class="row">
	  			<div class="col-sm-2">
					<div class="form-group no-margin-hr">
						<label class="control-label">Identificador</label>
						<input type="text" class="form-control" placeholder="Número do Identificador" id="editar-idItem"  name="idItem" required >
					</div>
				</div>
	  			<div class="col-sm-5">
					<div class="form-group no-margin-hr">
						<label class="control-label">Nome</label>
						<input type="text" name="nome" id="visualizar-nome" class="form-control" placeholder="Nome" required autofocus >
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group no-margin-hr">
						<label class="control-label">Data de Cadastro</label>
						<div class="input-group date" id="bs-datepicker-component">
							<input type="text" id="visualizar-dtCadastro" name="dtNascimento" class="form-control" required><span class="input-group-addon" required><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="form-group no-margin-hr">
						<label class="control-label">Tipo</label>
						<input type="text" name="tipo" id="visualizar-tipo" class="form-control" placeholder="Tipo" required autofocus>
					</div>
				</div>		
			</div>
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group no-margin-hr">
							<label class="control-label">Tamanho</label>
							<input type="text" name="tamanho" id="visualizar-tamanho" class="form-control" placeholder="Tamanho" required autofocus>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group no-margin-hr">
							<label class="control-label">Observacao</label>
							<input type="text" name="observacao" id="visualizar-observacao" class="form-control" placeholder="Observacao" required autofocus>
						</div>
					</div>	
				</div>
				</form>
			</div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="Salvar" onclick="editarItem();" class="btn btn-primary">Salvar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>