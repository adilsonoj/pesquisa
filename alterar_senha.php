<?
	require("valida_sessao_adm.php");
	require ("conexao.php");
	
	if ($_POST['nova_senha'] != $_POST['conf_nova_senha']) {
		echo "<script language=\"javascript\">alert(\"As senhas digitadas não conferem.\\nPor favor, tente digite corretamente a sua nova senha.\");history.go(-1);</script>";
		exit();
	}

	$login = $_SESSION['usuario'];
	$hashSenha = hash('SHA512', $_POST['nova_senha'], true);
	
	$statement = oci_parse($ora_conn, "UPDATE usuario SET senha = '$hashSenha' WHERE login = '$login'");
	
	if (oci_execute($statement)) {		//OCI_DEFAULT válido SOMENTE EM VERSOES ANTERIORES ao PHP 5.3.2. É utilizado para desativar commits automaticos.
		echo "<script language=\"javascript\">alert(\"Senha alterada com sucesso!\");window.close();</script>";
	} else {
		echo "<script language=\"javascript\">alert(\"ERRO: Ocorreu uma falha durante a gravação dos dados.\\nPor favor, tente novamente.\");history.go(-1);</script>";
	}
	
	include "fecha_conexao.php";
?>