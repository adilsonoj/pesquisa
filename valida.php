<?php
session_start();

require ("conexao.php");

$usuario = $_REQUEST['usuario'];
$senha = $_REQUEST['senha'];

	
		
		$sql_conexao = oci_parse($ora_conn,"SELECT LOGIN FROM USUARIO WHERE LOGIN='$usuario' AND SENHA=$senha");
		OCI_Execute($sql_conexao);
		if (oci_fetch($sql_conexao))
		{   
		 
			$_SESSION['usuario']=$usuario; 
			header("location: relatorios.php");
		}
		else
		{
?> 
			<script type="text/javascript">
				alert("Usuário ou senha inválida!");
				window.location="login.php";
			</script>
<?
		}
?>