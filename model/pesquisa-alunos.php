	<?php

			require 'config.php';
			require 'connection.php';
			$link = DBConnect();


					$nome = $_POST['nome'];
					$matricula = $_POST['matricula'];

					//Verifica se o campo foi preenchido para montar a query dinamica
					$where = array();
					 if( $nome ){ $where[] = "nome LIKE '{$nome}%'"; } 
					 if( $matricula ){ $where[] = "matricula = {$matricula}"; } 
					//Monta a query dinamica
					 $sql = "SELECT * FROM alunos ";
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
			       			<td><?php echo $row['nome'] ?></td>
			       			<td><?php echo $row['matricula'] ?></td>
							   <td><?php echo $row['email'] ?></td>
			       			<td class="acoes-pesquisa-usuario">
			       			<i class="btn btn-default btn-xs fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#modal-editar-dados-aluno"  onclick="editarAluno(<?php echo $row['matricula'] ?>)"></i>
			       			<button type="submit" onclick="deletarAluno(<?php echo $row['matricula'] ?>)" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i></button>
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