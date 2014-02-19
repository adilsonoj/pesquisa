<?
	require ("conexao.php");

	session_start();

	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	
	$sql_conexao = oci_parse($ora_conn, "SELECT login FROM usuario WHERE login = '$usuario' AND senha = '$senha'");
	oci_execute($sql_conexao);
	
	if (oci_fetch($sql_conexao)) {
		$_SESSION['usuario'] = $usuario; 
		header("location: relatorios.php");
	}else {
?> 
		<script type="text/javascript">
			alert("Usuário ou senha inválida!");
			window.location="login.php";
		</script>
<?
	}
?>