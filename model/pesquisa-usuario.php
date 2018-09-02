	<?php

			require '../view/config.php';
			require '../view/connection.php';
			$link = DBConnect();



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
					//echo $sql; imrpime a query montada
				//Executa query
				$result = $link->query($sql);
				//Veririca se retornou alguma linha
				if ($result->num_rows > 0) {
			    // Pega cada linha retornada e executa os comandos

			      while($row = $result->fetch_assoc()) {
			       ?>
			       		<tr>
			       			<td><?php echo $row['Nome'] ?></td>
			       			<td><?php echo $row['CPF'] ?></td>
			       			<td><?php echo $row['Sexo'] ?></td>
			       			<td class="acoes-pesquisa-usuario">
			       			<button type="button" class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#modal-editar"  onclick="editarUsuario(<?php echo $row['CPF'] ?>)"></i></button>
			       			<button type="submit" onclick="deletarUsuario(<?php echo $row['CPF'] ?>)" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i></button>
			       			<button type="button"  data-toggle="modal" data-target="#modal-visualizar" onclick="visualizarUsuario(<?php echo $row['CPF'] ?>)" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button>
			       			</td>
			       		</tr>
			       <?php
			     }     
			   }else{
			   	echo "Nenhum usuário encontrado com os filtros informados.";
			   }

			mysqli_close($link);
			?>