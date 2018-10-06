<?php  

	//Mostra informações sobre a variável
	var_dump($verificaStatus);

	//receber valor do post
	$senha = $_POST['senha'];

	//imprimir tipo da variável
	echo gettype($senha);

	//imprimir a variável
	echo $senha;

	//Executa a consulta
	$result = $link->query($sql);
	//Cria um array da com os dados da consulta
	$row = $result->fetch_assoc();
	//Imprime o array da com os dados da consulta
	print_r ($row);

	//verificar se a variável está vazia
	if(empty($nome) && empty($cpf))
	printf("Nome %u e CPF %s.",$nome,$cpf )

	//adicionar item unico array
	$where = Array();
	$where['nome'] = $nome; 
	$where['cpf'] = $cpf; 
	$where['sexo'] = $sexo;


	//receber valor do post
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$sexo = $_POST['sexo'];
	//Verifica se o campo foi preenchido para montar a query dinamica
	$where = array();//Cria um array
	 if( $nome ){ $where[] = "Nome LIKE '{$nome}%'"; } //Usando like
	 if( $cpf ){ $where[] = "CPF = {$cpf}"; } 
	 if( $sexo ){ $where[] = "Sexo = '{$sexo}'"; } 
	//Monta a query dinamica
	 $sql = "SELECT Nome, CPF, Sexo FROM pessoa ";
	if( sizeof( $where ) )
		$sql .= ' WHERE '.implode( ' AND ',$where );
		//echo $sql;  descomentar se precisar ver como ficou a consulta

	//Executa a consulta
	$result = $link->query($sql);
	//Veririca se retornou alguma linha
	if ($result->num_rows > 0) {
	// Pega cada linha retornada e executa os comandos
	  while($row = $result->fetch_assoc()) {
	   echo $row['Nome'];
	 }     
					   }


	//Executa a consulta
	$result = $link->query($sql);
	//Veririca se retornou alguma linha
	    if ($result->num_rows > 0) {
	    // Pega cada linha retornada e executa os comandos
	      while($row = $result->fetch_assoc()) {
	       $array = $row['senha'];
	       $retorno = array('senha' => $array, 'status' => true);
	       echo json_encode($retorno);
	     }     
	   }


	   
	   <div class="col-sm-5">
	   <div class="form-group no-margin-hr">
		   <label class="control-label">Nome</label>
		   <input type="text" name="nome" class="form-control" placeholder="Nome" autofocus>
	   </div>
   </div>


?>


<!--


					$nome = $_POST['nome'];
					$cpf = $_POST['cpf'];
					$sexo = $_POST['sexo'];
					
					//Verifica se o campo foi preenchido para montar a query dinamica
					$where = array();
					 if( $nome ){ $where[] = "Nome LIKE '{$nome}%'"; } 
					 if( $cpf ){ $where[] = "CPF = {$cpf}"; } 
					 if( $sexo ){ $where[] = "Sexo = '{$sexo}'"; } 
					//Monta a query dinamica
					 $sql = "SELECT Nome, CPF, Sexo FROM pessoa ";
					if( sizeof( $where ) )
						$sql .= ' WHERE '.implode( ' AND ',$where );

				//Executa a consulta
				$result = $link->query($sql);
				//Veririca se retornou alguma linha
				if ($result->num_rows > 0) {
			    // Pega cada linha retornada e executa os comandos
			      while($row = $result->fetch_assoc()) {
			       echo $row['Nome'];
			     }     
			   }
			-->