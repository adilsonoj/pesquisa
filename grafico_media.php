<?php
require("valida_sessao_adm.php");
require("conexao.php");
require("classes/phplot.php");

$grafico = new PHPlot(800,600);

$dados_grafico = array();

$sql_pergunta = oci_parse($ora_conn,"SELECT * FROM pergunta ORDER BY numero");
oci_execute($sql_pergunta);

	while ($row_pergunta = oci_fetch_assoc($sql_pergunta)) {
		$id_pergunta = $row_pergunta['ID'];

		$sql_media = oci_parse($ora_conn, "SELECT AVG(A.ALTERNATIVA) MEDIA FROM RESPOSTA_FECHADA R, ALTERNATIVA A WHERE R.ID_PERGUNTA = $id_pergunta AND R.ID_ALTERNATIVA_RESPOSTA = A.ID");
		oci_execute($sql_media);
		$row_media = oci_fetch_assoc($sql_media);
		
		if (!$row_media['MEDIA']==NULL){
			array_push($dados_grafico, array($id_pergunta, $row_media['MEDIA']));
		}

	}

	
$grafico->SetDataValues($dados_grafico);
$grafico->SetImageBorderType('plain');
$grafico->SetPlotType("bars");
$grafico->DrawGraph();

?>
