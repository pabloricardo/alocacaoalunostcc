<!-- / Inicio modal -->
  <div class="modal fade" id="modal-visualizar" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Dados Do Usuário</h4>
        </div>
		<div class="modal-body">
			<div class="row">
	  			<div class="col-sm-5">
					<div class="form-group no-margin-hr">
						<label class="control-label">Nome</label>
						<input type="text" name="nome" id="visualizar-nome" class="form-control" placeholder="Nome" required autofocus disabled="disabled">
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group no-margin-hr">
						<label class="control-label">CPF</label>
						<input type="text" class="form-control" placeholder="Número do CPF" id="visualizar-cpf"  name="cpf" required disabled="disabled">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group no-margin-hr">
						<label class="control-label">Data de Nascimento</label>
						<div class="input-group date" id="bs-datepicker-component">
							<input type="text" id="visualizar-dtNascimento" name="dtNascimento" class="form-control" required disabled="disabled"><span class="input-group-addon" required><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group no-margin-hr">
						<label for="sel1">Sexo</label>
						<select class="form-control" id="visualizar-sexo" name="sexo" required disabled="disabled">
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
							<input type="text" name="telefone" placeholder="Phone: (99) 999-9999" class="form-control form-group-margin" id="visualizar-telefone" disabled="disabled">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group no-margin-hr">
							<label class="control-label">Email</label>
							<input type="email" id="visualizar-email" class="form-control" required disabled="disabled">
						</div>
					</div>	
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
