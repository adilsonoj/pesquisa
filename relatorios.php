<?
	require("valida_sessao_adm.php");
	include "header.php";
?>


	<ul id="sair">
		<li> <a href="form_alterar_senha.php" onclick="window.open('form_alterar_senha.php','Alteração de Senha','scrollbars=no,width=990,height=380'); return false;"> Alterar Senha</a> </li>
		<li> <a href="sair.php"> Sair </a> </li>
    </ul>

	<img id="img_netuno" src="img/netuno.png" alt="Programa Netuno">
	<p>
		Esta é a área de administração do Sistema de Pesquisas da DSAM. Aqui poderão ser visualizados relatórios estatísticos e gráficos que lhe permitirão avaliar os resultados de sua pesquisa.
	</p>

	<p>
		Utilize os links abaixo para acessar os relatórios.
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
		<legend class="legend">Relatórios Gráficos</legend>
		<br/>
		<a class="link_relatorio" href="exibe_grafico_media.php"><img src="img/relatorio_grafico2_branco.png">Gráfico da média do grau de satisfação por pergunta</a> <br><br><br>
		
		<br/><br/>
	</fieldset>

	<? include "footer.php"; ?>
