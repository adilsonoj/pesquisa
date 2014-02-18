<? require("conexao.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pesquisa de Clima Organizacional - Relatório de Médias</title>
	
	<link rel="stylesheet" href="css/estilo.css">


</head>

<body>
	<img src="img/header.gif" alt="DSAM">

	<hr id="top"/>
	<h2>Pesquisa de Clima Organizacional</h2>
	<hr id="bottom"/>

	<table>
		<tr>
			<th colspan="2">RELATÓRIO DE MÉDIA DO GRAU DE SATISFAÇÃO POR PERGUNTA</th>
		</tr>

		<tr>
			<th>QUESTÃO</th>
			<th>MÉDIA DO GRAU</th>
		</tr>

			<?
				$sql_pergunta = oci_parse($ora_conn,"SELECT * FROM pergunta");
				OCI_Execute($sql_pergunta);

				while ($row_pergunta = oci_fetch_assoc($sql_pergunta)){
					$id_pergunta = $row_pergunta['ID'];

					$sql_media = oci_parse($ora_conn, "SELECT AVG(ID_ALTERNATIVA_RESPOSTA) FROM RESPOSTA_FECHADA WHERE ID_PERGUNTA= $id_pergunta");
					OCI_Execute($sql_media);
					$row_media = oci_fetch_assoc($sql_media);

					
					
					if (!$row_media['AVG(ID_ALTERNATIVA_RESPOSTA)']==NULL){

						echo "<tr><td>". $row_pergunta['NUMERO'].") ". $row_pergunta['ENUNCIADO']."</td>";
						echo "<td id='media'>".number_format($row_media['AVG(ID_ALTERNATIVA_RESPOSTA)'], 1)."</td></tr>";
						
					} else {

						$sql = oci_parse($ora_conn,"SELECT RESPOSTA FROM RESPOSTA_ABERTA WHERE ID_PERGUNTA=$id_pergunta");
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