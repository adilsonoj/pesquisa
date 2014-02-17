<? require("conexao.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pesquisa de Clima Organizacional</title>
	
	<link rel="stylesheet" href="css/estilo.css">


</head>

<body>
	<img src="img/header.gif" alt="DSAM">
	
	<table id="rel_alternativas">
		<tr>
			<th>RELATÓRIO DE QUANTIDADE DO VOTOS POR GRAU</th>
			
			
		</tr>

			<?
				$sql = oci_parse($ora_conn,"SELECT * FROM pergunta");
				OCI_Execute($sql);
				while (oci_fetch_assoc($sql)){}
				$numero_perguntas = oci_num_rows($sql);

				for ($i=1; $i<=$numero_perguntas; $i++) {

					$sql_pergunta = oci_parse($ora_conn, "SELECT NUMERO, ENUNCIADO FROM PERGUNTA WHERE ID=$i");
					OCI_Execute($sql_pergunta);
					$row_pergunta = oci_fetch_assoc($sql_pergunta);
					echo "<tr ><td id='questao'>". $row_pergunta['NUMERO'].") ". $row_pergunta['ENUNCIADO']."</td></tr>";

					for ($y=1; $y<=5; $y++){

						$sql_count = oci_parse($ora_conn, "SELECT COUNT(ID_ALTERNATIVA_RESPOSTA) FROM RESPOSTA_FECHADA WHERE ID_PERGUNTA = $i AND ID_ALTERNATIVA_RESPOSTA = $y");
						OCI_Execute($sql_count);
						$row_count = oci_fetch_assoc($sql_count);
					
						//var_dump($row_count);
						echo "<tr><td id='count'>"."Grau: <b>".$y."</b> - Quantidade de votos: <b>".$row_count['COUNT(ID_ALTERNATIVA_RESPOSTA)']."</b></td></tr>";

					}

			 	}
		
			?>

	</table>
		
	<? include "fecha_conexao.php"; ?>
	
</body>
</html>