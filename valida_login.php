<?
	require ("conexao.php");

	$login = $_POST['usuario'];
	$hashSenha = hash('SHA512', $_POST['senha'], true);

	$sql_conexao = oci_parse($ora_conn, "SELECT login FROM usuario WHERE login = '$login' AND senha = '$hashSenha'");
	oci_execute($sql_conexao);
	
	if (oci_fetch($sql_conexao)) {
		session_start();
		$_SESSION['usuario'] = $login;

		header("location: relatorios.php");
	}else {
?> 
		<script type="text/javascript">
			alert("Usuário ou senha inválidos!");
			window.location="login.php";
		</script>
<?
	}
?>