<?php

	require '../view/config.php';
	require '../view/connection.php';
	$link = DBConnect();

	$nome = $_POST['nome'];
	$id_area = $_POST['id_area'];

	//Verifica se o campo foi preenchido para montar a query dinamica
	$where = array();
	if( $id_area ){ $where[] = "a.id_area = '{$id_area}'"; }
	if( $nome ){ $where[] = "p.nome = '{$nome}'"; }
	//Monta a query dinamica

	if(!$id_area && !$nome)
	{
		$sql = "SELECT * FROM professores";
	}
	else if($id_area && !$nome)
	{
		$sql = "SELECT * FROM professores p join area_professores ap on p.matricula = ap.matricula
		join area a on ap.id_area = a.id_area";
		if( sizeof( $where ) )
		$sql .= ' WHERE '.implode( ' AND ',$where );
		$result = $link->query($sql);
		$area = "SELECT * FROM area where id = $id_area";
		$result2 = $link->query($area);
		$row2 = $result->fetch_assoc();
		if ($result->num_rows > 0) {?>
		<tr>
			<td><?php echo ("Essa opção permite escolher pela área sem definir o professor"); ?></td>
			<td><?php echo $row2['nome_da_area'] ?></td>
			<td class="acoes-pesquisa-usuario">
			<button type="submit" onclick="solicitarOrientacao(<?php echo 1 ?>)" class="btn btn-primary btn-xs">Solicitar Orientação</button>
			</td>
		</tr>
		<?php } else echo "Dados não encontrado com os filtros informados.";
	}
	else if( ($id_area && $nome))
	{
		$sql = "SELECT * FROM professores p join area_professores ap on p.matricula = ap.matricula
		join area a on ap.id_area = a.id_area";
		if( sizeof( $where ) )
		$sql .= ' WHERE '.implode( ' AND ',$where );
	}
	else if($nome)
	{
		$sql = "SELECT * FROM professores WHERE nome = '$nome'";
	}
	else{
		echo("Não foi possível relizar a consulta");
	}		
	//echo ($sql); imrpime a query montada
	//Executa query
	$result = $link->query($sql);
	if ($result->num_rows > 0) {
		// Pega cada linha retornada e executa os comandos
			while($row = $result->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $row['nome'] ?></td>
					<?php if($id_area){?>
					<td><?php echo $row['nome_da_area'] ?></td>
					<?php } ?>
					<?php if(!$id_area){?>
					<td><?php echo ("Área não informada") ?></td>
					<?php } ?>
					<td class="acoes-pesquisa-usuario">
					<!-- <i class="btn btn-default btn-xs fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#modal-editar-dados-area"  onclick="editarArea(<?php echo $row['id_area'] ?>)"></i> -->
					<button type="submit" onclick="solicitarOrientacao(<?php echo $row['matricula'] ?>)" class="btn btn-primary btn-xs">Solicitar Orientação</button>
					<!-- <i class="btn btn-default btn-xs fa fa-eye" aria-hidden="true" data-toggle="modal" data-target="#modal-visualizar-professor" onclick="visualizarProfessor(<?php echo $row['matricula'] ?>)"></i> -->
					</td>
				</tr>
			<?php
			}     
		}else{
		echo "Dados não encontrado com os filtros informados.";
		}

	mysqli_close($link);
?>