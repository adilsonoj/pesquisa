<?
	require("valida_sessao_adm.php");
	require("conexao.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pesquisa de Clima Organizacional - Relatório Quantitativo</title>
	
	<link rel="stylesheet" href="css/estilo.css">


</head>

<body>
	<img src="img/header.gif" alt="DSAM">

	<hr id="top"/>
	<h2>Pesquisa de Clima Organizacional</h2>
	<hr id="bottom"/>

	<table id="rel_alternativas">
		<tr>
			<th>RELATÓRIO DE QUANTIDADE DO VOTOS POR GRAU</th>
		</tr>

			<?
				

					$sql_pergunta = oci_parse($ora_conn, "SELECT DISTINCT (P.ID), P.NUMERO, P.ENUNCIADO FROM PERGUNTA P, ALTERNATIVA A WHERE P.ID = A.ID_PERGUNTA");
					OCI_Execute($sql_pergunta);
					while ($row_pergunta = oci_fetch_assoc($sql_pergunta)) {
							echo "<tr ><td id='questao'>". $row_pergunta['NUMERO'].") ". $row_pergunta['ENUNCIADO']."</td></tr>";
							$id_pergunta = $row_pergunta['ID'];


							$sql_alternativa = oci_parse ($ora_conn, "SELECT alternativa FROM alternativa WHERE id_pergunta = $id_pergunta");
							oci_execute($sql_alternativa);
							while ($row_alternativa = oci_fetch_assoc($sql_alternativa)){
								$alternativa = $row_alternativa['ALTERNATIVA'];

								$sql_count = oci_parse($ora_conn, "SELECT COUNT(ID_ALTERNATIVA_RESPOSTA) FROM RESPOSTA_FECHADA WHERE ID_PERGUNTA =  $id_pergunta AND ID_ALTERNATIVA_RESPOSTA = $alternativa");
								OCI_Execute($sql_count);
								$row_count = oci_fetch_assoc($sql_count);
							
								
								echo "<tr><td id='count'>"."Grau: <b>".$alternativa."</b> - Quantidade de votos: <b>".$row_count['COUNT(ID_ALTERNATIVA_RESPOSTA)']."</b></td></tr>";

							}

					}
				
				
		
			?>

	</table>
		
	<? include "fecha_conexao.php"; ?>
	
</body>
</html>