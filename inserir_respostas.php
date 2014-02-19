<?
	require("conexao.php");

	$faixa_etaria = $_POST['faixa_etaria'];
	$posto = $_POST['posto'];
	$escolaridade = $_POST['escolaridade'];
	$tempo = $_POST['tempo'];
	$perguntas = $_POST['pergunta'];
	$total_perguntas = $_POST['total_perguntas'];
	$alternativas = $_POST['alternativa'];
	$respostas_abertas = $_POST['resposta_aberta'];
	
	$insert_error = false;
	$comprovante_pesq = uniqid();

	$query_respondente = "INSERT INTO respondente(faixa_etaria, posto, escolaridade, tempo_svc_dsam, comprovante_pesq, data_hora_resposta) VALUES('$faixa_etaria', '$posto', '$escolaridade', '$tempo', '$comprovante_pesq', SYSDATE) RETURNING id INTO :id";
	$statement_respondente = oci_parse($ora_conn, $query_respondente);
	oci_bind_by_name($statement_respondente, ":id", $respondente_id, 32);
	
	if (!oci_execute($statement_respondente, OCI_DEFAULT)) {	//OCI_DEFAULT válido SOMENTE EM VERSOES ANTERIORES ao PHP 5.3.2. É utilizado para desativar commits automaticos.
		$insert_error = true;
	}


	for ($i=1; $i<=$total_perguntas and $insert_error == false; $i++) {
		if (isset($alternativas[$i])) {

			$query_resposta_fechada = "INSERT INTO resposta_fechada(id_pergunta, id_alternativa_resposta, id_respondente) VALUES('$perguntas[$i]', '$alternativas[$i]', $respondente_id)";
			$statement_resposta_fechada = oci_parse($ora_conn, $query_resposta_fechada);
			
			if (!oci_execute($statement_resposta_fechada, OCI_DEFAULT)) {
				$insert_error = true;
			}
		}elseif (isset($respostas_abertas[$i])) {
			
			$query_resposta_aberta = "INSERT INTO resposta_aberta(id_pergunta, resposta, id_respondente) VALUES('$perguntas[$i]', '$respostas_abertas[$i]', '$respondente_id')";
			$statement_resposta_aberta = oci_parse($ora_conn, $query_resposta_aberta);
			
			if (!oci_execute($statement_resposta_aberta, OCI_DEFAULT)) {
				$insert_error = true;
			}
		}
	}

	if (!$insert_error) {
		$commit_success = oci_commit($ora_conn);
	}

	if ($commit_success) {
		session_start();
		$_SESSION['comprovante'] = $comprovante_pesq;
		
		header('Location: comprovante_pesquisa.php');
	}else {
		echo "<script language=\"javascript\">alert(\"ERRO: Ocorreu uma falha durante a gravação de suas respostas.\\nPor favor, tente enviá-las novamente.\");history.go(-1);</script>";
	}

	include "fecha_conexao.php";
?>