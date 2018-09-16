<!-- / Inicio modal -->
<div class="modal fade" id="modal-visualizar-professor" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header modal-header-info">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title text-center">Dados Do Usuário</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group no-margin-hr">
							<label class="control-label">Nome</label>
							<input type="text" name="nome" id="visualizar-nome" class="form-control" placeholder="Nome" disabled="disabled">
						</div>
					</div>	
					<div class="col-sm-2">
						<div class="form-group no-margin-hr">
							<label class="control-label">Matrícula</label>
							<input name="matricula" id="visualizar-matricula" class="form-control" placeholder="Matrícula" disabled="disabled">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group no-margin-hr">
							<label class="control-label">E-mail</label>
							<input type="email" id="visualizar-email" class="form-control" disabled="disabled">
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="col-sm-12">
						<label class="control-label" for="sel1">Descrição</label>
						<textarea class="form-control" name="visualizar-descricao" id="visualizar-descricao" cols="10" rows="10" disabled="disabled"></textarea>
					</div>		
				</div><!-- row -->		
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>
