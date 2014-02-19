<? require "conexao.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pesquisa de Clima Organizacional</title>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
	
	
	<link rel="stylesheet" href="css/estilo.css">


</head>

<body>
	<img src="img/header.gif" alt="DSAM">

	<hr id="top"/>
	<h2>Pesquisa de Clima Organizacional</h2>
	<hr id="bottom"/>
	
	<img id="img_netuno" src="img/netuno.png" alt="Programa Netuno">
	<p>
		Este questionário destina-se à coleta de dados que contribuam para mensurar o nível de satisfação dos militares e servidores civis da DSAM, com relação aos aspectos do ambiente organizacional e a maneira como as pessoas interagem. As informações receberão um tratamento estatístico, com sigilo RESERVADO. Não é necessária a identificação do respondente.
	</p>
	
	

	<form action="inserir.php" method="post" >

		<fieldset>
			<legend class="legend">DADOS PESSOAIS</legend>
			<fieldset class="dados_pessoais">
				<legend>Faixa etátia</legend>
				<select name="faixa_etaria">
					
				  	
					<option  value="18-23">18-23 anos</option>";
					<option  value="24-33">24-33 anos</option>";
					<option  value="33-48">33-48 anos</option>";
					<option  value="48+">acima de 48 anos</option>";
					
				  
				</select>
			</fieldset>

			<fieldset class="dados_pessoais">
			<legend>Posto</legend>
			<select name="posto">
				
			  	<option  value="Marinheiro, Soldado ou Cabo">Marinheiro, Soldado ou Cabo</option>";
			  	<option  value="Sargento ou Suboficial">Sargento ou Suboficial</option>";
			  	<option  value="Oficial intermediário ou subalterno">Oficial intermediário ou subalterno</option>";
			  	<option  value="Oficial superior">Oficial superior</option>";
			  	<option  value="Civil">Civil</option>";
			  
			</select>
			</fieldset>

			<fieldset class="dados_pessoais">
			<legend>Escolaridade</legend>
			<select name="escolaridade">
				
			  	<option  value="Stricto Sensu">Stricto Sensu</option>";
			  	<option  value="Lato Sensu">Lato Sensu</option>";
			  	<option  value="Ensino Superior">Ensino Superior</option>";
			  	<option  value="Ensino Médio">Ensino Médio</option>";
			  	<option  value="Ensino Fundamental">Ensino Fundamental</option>";
			  
			</select>
			</fieldset>

			<fieldset class="dados_pessoais">
				<legend>Tempo de Serviço DSAM</legend>
				<select name="tempo">
					
			  	<option  value="0-1">Menos de 1 ano</option>";
			  	<option  value="1-3">de 1 a 3 anos</option>";
			  	<option  value="4-8">de 4 a 8 anos</option>";
			  	<option  value="8+">Superior a 8 anos</option>";
				  
				</select>
			</fieldset>
		</fieldset>
			
			<fieldset class="legenda">
				<legend class="legend">GRAU DE SATISFAÇÃO</legend>
				<ul>
					<li><b>1)</b> Muito insatisfeito</li>
					<li><b>2)</b> Insatisfeito</li>
					<li><b>3)</b> Indiferente</li>
					<li><b>4)</b> Satisfeito</li>
					<li><b>5)</b> Muito Satisfeito</li>
				</ul>
			</fieldset>

			<fieldset>
				<legend>Escolha seu grau de satisfação com relação a/ao(s):</legend>
					<table id="tabela">
						
							<?
								 $numero_perguntas_fechadas = 0;
								
								 $sql = oci_parse($ora_conn, "SELECT id,enunciado,numero FROM pergunta order by numero");
  								 OCI_Execute($sql);

   					
			  					  while ($row = oci_fetch_assoc($sql)){
										
									echo "<tr><td id='td_pesquisa'><input type='hidden' name='pergunta[".$row['ID']."]' value=".$row['ID'].">";
									echo "".$row['NUMERO'].") ".$row['ENUNCIADO']."</td></tr>"; 
									echo "<tr><td>";
										
										$id_pergunta = $row['ID'];
										$sql2 = oci_parse($ora_conn, "SELECT id,alternativa,id_pergunta FROM alternativa WHERE id_pergunta=$id_pergunta ORDER BY ordem_alternativa");

  								 		OCI_Execute($sql2);


  								 		if ($row2 = oci_fetch_assoc($sql2)){
  								 			$numero_perguntas_fechadas += 1; 
				  					  		do{

												echo "<input id='alternativa' type='radio' name='alternativa[".$row['ID']."]' value='".$row2['ALTERNATIVA']."'><span class='alternativa'>".$row2['ALTERNATIVA']."</span></input>";
												
											}while ($row2 = oci_fetch_assoc($sql2));						
											

										} else {
											echo "<textarea rows='4' cols='115' name='resposta_aberta[".$row['ID']."]'></textarea>";

										}
										

									echo "</td></tr>";
								  }


								  echo "<input type='hidden' id='total_perguntas' name='total_perguntas' value=" .oci_num_rows($sql). ">";
								   echo "<input type='hidden' id='numero_perguntas_fechadas' name='numero_perguntas_fechadas' value=" .$numero_perguntas_fechadas. ">";
							?>
						  	
							
								
					  	
				  	</table>
				
			</fieldset>

		

		<input class="button" type="submit" name="enviar" value="">


		
	</form>
</body>
</html>

<? //include "fecha_conexao.php"; ?>