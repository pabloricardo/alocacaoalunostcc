	<?php

			require '../view/config.php';
			require '../view/connection.php';
			$link = DBConnect();



					$idItem = $_POST['idItem'];
					$nome = $_POST['nome'];
					$tipo = $_POST['tipo'];

					//Verifica se o campo foi preenchido para montar a query dinamica
					$where = array();
					 if( $nome ){ $where[] = "NomeItem LIKE '{$nome}%'"; } 
					 if( $idItem ){ $where[] = "IdItem = {$idItem}"; } 
					 if( $tipo ){ $where[] = "TipoItem = '{$tipo}'"; } 
					//Monta a query dinamica
					 $sql = "SELECT IdItem, NomeItem, TipoItem FROM item ";
					if( sizeof( $where ) )
						$sql .= ' WHERE '.implode( ' AND ',$where );
					//echo $sql; imprime a query montada
				//Executa query
				$result = $link->query($sql);
				//Veririca se retornou alguma linha
				if ($result->num_rows > 0) {
			    // Pega cada linha retornada e executa os comandos

			      while($row = $result->fetch_assoc()) {
			       ?>
			       		<tr>
							<td><?php echo $row['IdItem'] ?></td>
			       			<td><?php echo $row['NomeItem'] ?></td>
			       			<td><?php echo $row['TipoItem'] ?></td>
			       			<td class="acoes-efetuar-doacao">
			       			<button type="button" class="btn btn-default btn-xs"><i class="fa fa-check-circle-o" aria-hidden="true" data-toggle="modal" data-target="#modal-efetuar-doacao"  onclick="alterarItem(<?php echo $row['IdItem'] ?>)"></i></button>
			       		</tr>
			       <?php
			     }     
			   }else{
			   	echo "Nenhum item encontrado com os filtros informados.";
			   }

			mysqli_close($link);
			?>