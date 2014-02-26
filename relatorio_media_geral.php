<?
	require("valida_sessao_adm.php");
	require("conexao.php");

	$stmt_participantes = oci_parse($ora_conn, "SELECT COUNT(*) TOTAL FROM RESPONDENTE");
	oci_execute($stmt_participantes);
	$tot_participantes = oci_fetch_assoc($stmt_participantes);

	include "header.php";
?>



	<h4 id="tot_participantes">Total de Participantes: <?=$tot_participantes['TOTAL'];?></h4>

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
					$stmt_resp_aberta = oci_parse($ora_conn, "SELECT COUNT(*) TOTAL FROM RESPOSTA_ABERTA WHERE ID_PERGUNTA = $id_pergunta AND RESPOSTA IS NOT NULL");
					oci_execute($stmt_resp_aberta);
					$tot_resp_aberta = oci_fetch_assoc($stmt_resp_aberta);

					echo "<h4>". $row_pergunta['NUMERO'].") ".$row_pergunta['ENUNCIADO']."</h4>" . (($tot_resp_aberta['TOTAL'] > 0) ? "<i>(Total de respostas: <b>" .$tot_resp_aberta['TOTAL']. "</b>)</i>"  :  "<i>Não houve respostas para esta pergunta.</i>");

					if ($tot_resp_aberta['TOTAL'] > 0) {
						$sql = oci_parse($ora_conn,"SELECT RESPOSTA FROM RESPOSTA_ABERTA WHERE ID_PERGUNTA = $id_pergunta AND RESPOSTA IS NOT NULL");
						oci_execute($sql);

						while ($row_resposta = oci_fetch_assoc($sql)) {
							echo "<tr><td id='resposta_aberta'>".$row_resposta['RESPOSTA']."</td></tr>";
						}
					}
				}
			}
		?>
	</table>

	<? include "fecha_conexao.php"; 
	   include "footer.php"; ?>