<? require("conexao.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pesquisa de Clima Organizacional</title>
	
	<link rel="stylesheet" href="css/estilo.css">


</head>

<body>
	<img src="img/header.gif" alt="DSAM">

	<table>
		<tr>
			<th>QUESTÃO</th>
			<th>MÉDIA DO GRAU</th>
		</tr>

			<?
				$sql = oci_parse($ora_conn,"SELECT * FROM pergunta");
				OCI_Execute($sql);

				while (oci_fetch_assoc($sql)){}

				$numero_perguntas = oci_num_rows($sql);

				echo "";

				for ($i=1; $i<=$numero_perguntas; $i++) {

					$sql_media = oci_parse($ora_conn, "SELECT AVG(ID_ALTERNATIVA_RESPOSTA) FROM RESPOSTA_FECHADA WHERE ID_PERGUNTA=$i");
					OCI_Execute($sql_media);
					$row_media = oci_fetch_assoc($sql_media);

					$sql_pergunta = oci_parse($ora_conn, "SELECT NUMERO, ENUNCIADO FROM PERGUNTA WHERE ID=$i");
					OCI_Execute($sql_pergunta);
					$row_pergunta = oci_fetch_assoc($sql_pergunta);
					
					if (!$row_media['AVG(ID_ALTERNATIVA_RESPOSTA)']==NULL){

						echo "<tr><td>". $row_pergunta['NUMERO'].") ". $row_pergunta['ENUNCIADO']."</td>";
						echo "<td id='media'>".number_format($row_media['AVG(ID_ALTERNATIVA_RESPOSTA)'], 1)."</td></tr>";
						
					} else {

						$sql = oci_parse($ora_conn,"SELECT RESPOSTA FROM RESPOSTA_ABERTA WHERE ID_PERGUNTA=$i");
						OCI_Execute($sql);
					?>

	</table>
		
	<table>


				<?
					echo "<h4>". $row_pergunta['NUMERO'].") ".$row_pergunta['ENUNCIADO']."</h4>";

					while ($row_resposta = oci_fetch_assoc($sql)){
						
						echo "<tr><td id='resposta_aberta'>".$row_resposta['RESPOSTA']."</td></tr>";
					}

					
				}
			}
			
		?>
	</table>

	<? include "fecha_conexao.php"; ?>
	
</body>
</html>