<?
	require("valida_sessao_adm.php");
	require("conexao.php");
?>

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
			<th colspan="2">RELATÓRIO DA MÉDIA DO GRAU DE SATISFAÇÃO POR PERGUNTA</th>
		</tr>

		<tr>
			<th>PERGUNTA</th>
			<th>MÉDIA DO GRAU DE SATISFAÇÃO</th>
		</tr>

		<?
			$sql_pergunta = oci_parse($ora_conn,"SELECT * FROM pergunta ORDER BY numero");
			oci_execute($sql_pergunta);

			while ($row_pergunta = oci_fetch_assoc($sql_pergunta)) {
				$id_pergunta = $row_pergunta['ID'];

				$sql_media = oci_parse($ora_conn, "SELECT AVG(A.ALTERNATIVA) MEDIA FROM RESPOSTA_FECHADA R, ALTERNATIVA A WHERE R.ID_PERGUNTA = $id_pergunta AND R.ID_ALTERNATIVA_RESPOSTA = A.ID");
				oci_execute($sql_media);
				$row_media = oci_fetch_assoc($sql_media);

				if (!$row_media['MEDIA']==NULL){
					echo "<tr><td>". $row_pergunta['NUMERO'].") ". $row_pergunta['ENUNCIADO']."</td>";
					echo "<td id='media'>".number_format($row_media['MEDIA'], 1)."</td></tr>";
				} else {
		?>

	</table>
		
	<table>

		<?
					$sql = oci_parse($ora_conn,"SELECT RESPOSTA FROM RESPOSTA_ABERTA WHERE ID_PERGUNTA = $id_pergunta");
					oci_execute($sql);

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