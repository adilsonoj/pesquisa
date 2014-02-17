<? 
	session_start();
	
	if (!isset($_SESSION['comprovante'])) {
		echo "<script language=\"javascript\">";
			echo "alert(\"Sua sessão expirou ou você está tentando acessar diretamente a página de emissão de comprovante.\\nPor favor, responda a pesquisa e o seu comprovante de participação será emitido.\");";
			echo "location.href=\"pesquisa.php\";";
		echo "</script>";
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Pesquisa de Clima Organizacional</title>
		<link rel="stylesheet" href="css/estilo.css">
	</head>
	<body  id="comprovante">
		<fieldset>
			<img src="img/netuno.png" alt="Netuno">
			<p><b>PESQUISA DE CLIMA ORGANIZACIONAL</b></p>
			
			<p>Obrigado por sua participação!</p>
			<p id="uniqid"><b> Comprovante Nº: <?=$_SESSION['comprovante']?></b></p>
			<p><a href=javascript:print();>Imprima</a> seu comprovante de participação na pesquisa.</p>
		</fieldset>
	</body>
</html>