<?
	require("valida_sessao_adm.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pesquisa de Clima Organizacional - Relatórios</title>
	
	<link rel="stylesheet" href="css/estilo.css">
</head>

<body>
	<img src="img/header.gif" alt="DSAM">

	<hr id="top"/>
	<h2>Pesquisa de Clima Organizacional</h2>

	<h2>Relatórios</h2>
	<hr id="bottom"/>

	<ul id="sair">
		<li> <a href="form_alterar_senha.php" onclick="window.open('form_alterar_senha.php','Alteração de Senha','scrollbars=no,width=990,height=380'); return false;"> Alterar Senha</a> </li>
		<li> <a href="sair.php"> Sair </a> </li>
    </ul>

	<a class="link_relatorio" href="relatorio_media_geral.php"><img src="img/relatorio1.png">Média do grau de satisfação por pergunta</a> <br><br><br>
	<a class="link_relatorio" href="relatorio_alternativas.php"><img src="img/relatorio2.png">Quantidade de votos por grau</a>

	<br/><br/><br/>
	
</body>
</html>
