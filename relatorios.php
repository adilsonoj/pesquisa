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
	<h2>Área de Administração</h2>
	<hr id="bottom"/>

	<ul id="sair">
		<li> <a href="form_alterar_senha.php" onclick="window.open('form_alterar_senha.php','Alteração de Senha','scrollbars=no,width=990,height=380'); return false;"> Alterar Senha</a> </li>
		<li> <a href="sair.php"> Sair </a> </li>
    </ul>

	<img id="img_netuno" src="img/netuno.png" alt="Programa Netuno">
	<p>
		Esta é a área de administração do Sistema de Pesquisas da DSAM. Aqui poderão ser visualizados relatórios estatísticos a fim de aferir os resultados de sua pesquisa. Futuramente, será possível também visualizar os resultados através de gráficos, para que se tenha uma visão ainda melhor dos resultados.
	</p>
	<br/><br/>

	<fieldset>
		<legend class="legend">Relatórios Estatísticos</legend>
		<br/>
		<a class="link_relatorio" href="relatorio_media_geral.php"><img src="img/relatorio_estatistico.png">Média do grau de satisfação por pergunta</a> <br><br><br>
		<a class="link_relatorio" href="relatorio_alternativas.php"><img src="img/relatorio_estatistico.png">Quantidade de votos por grau</a>
		<br/><br/>
	</fieldset>

	<fieldset>
		<legend class="legend">Gráfico</legend>
		<br/>
		<a class="link_relatorio" href="exibe_grafico_media.php"><img src="img/relatorio_estatistico.png">Gráfico da Média do grau de satisfação por pergunta</a> <br><br><br>
		
		<br/><br/>
	</fieldset>

	<br/><br/><br/>

</body>
</html>
