<?php

			require '../view/config.php';
			require '../view/connection.php';
			$link = DBConnect();



					$nome = $_POST['nome'];
					$cpf = $_POST['cpf'];

					//Verifica se o campo foi preenchido para montar a query dinamica
					$where = array();
					 if( $nome ){ $where[] = "Nome LIKE '{$nome}%'"; } 
					 if( $cpf ){ $where[] = "CPF = {$cpf}"; }  
					//Monta a query dinamica
					 $sql = "SELECT Nome, CPF, Telefone FROM pessoa ";
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
			       			<td><?php echo $row['Telefone'] ?></td>
			       		</tr>
			       <?php
			     }     
			   }else{
			   	echo "Nenhum usuário encontrado com os filtros informados.";
			   }

			mysqli_close($link);
?>