<?
	require ("conexao.php");

	$login = $_POST['usuario'];
	$hashSenha = hash('SHA512', $_POST['senha'], true);

	$statement = oci_parse($ora_conn, "INSERT INTO usuario(login, senha) VALUES('$login', '$hashSenha')");
	
	if (!oci_execute($statement) {
		echo "<script language=\"javascript\">alert(\"ERRO: Ocorreu uma falha durante a gravação dos dados.\\nPor favor, tente novamente.\");history.go(-1);</script>";
	}

	include "fecha_conexao.php";
?>