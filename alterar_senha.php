<?
	require ("conexao.php");

	$login = $_POST['usuario'];
	$hashSenha = hash('SHA512', $_POST['senha'], true);

	$statement = oci_parse($ora_conn, "UPDATE usuario SET senha = '$hashSenha' WHERE login = '$login'");
	
	if (oci_execute($statement, OCI_DEFAULT)) {		//OCI_DEFAULT válido SOMENTE EM VERSOES ANTERIORES ao PHP 5.3.2. É utilizado para desativar commits automaticos.
		if (oci_commit($ora_conn)) {
			echo "<script language=\"javascript\">alert(\"Senha alterada com sucesso!\");</script>";
			exit();
		}
	}

	echo "<script language=\"javascript\">alert(\"ERRO: Ocorreu uma falha durante a gravação dos dados.\\nPor favor, tente novamente.\");history.go(-1);</script>";

	include "fecha_conexao.php";
?>