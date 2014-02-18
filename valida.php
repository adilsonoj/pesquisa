<?php
session_start();
require ("conexao.php");
ini_set( 'default_charset', 'utf-8');
$usuario = $_REQUEST['usuario'];

	
		
		$sql = oci_parse($ora_conn,"SELECT cod_usr_bd FROM dsamger.ge_usr_bd where cod_usr_bd='$usuario'");
		OCI_Execute($sql);
		if (oci_fetch($sql))
		{   
		 
			$_SESSION['usuario']=$usuario; 
			header("location: relatorios.php");
		}
		else
		{?> 
			


			<script type="text/javascript">
				alert("Usuário ou senha inválida!");
				window.location="login.php";
			</script>
	<?}?>