<? require("conexao.php"); ?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Pesquisa de Clima Organizacional - Alteração de Senha</title>
		
		<link rel="stylesheet" href="css/estilo.css">
	</head>
	
	<body>
		<img src="img/header.gif" alt="DSAM">

		<hr id="top"/>
		<h2>Formulário para Alteração de Senha</h2>
		<hr id="bottom"/>
	
		<form  method="POST" action="alterar_senha.php">
			<table id="form_alterar_senha">
			<tr>
				<td>Senha atual:</td>
				<td><input type="password" name="senha_atual" size="8"></td>
			</tr>
			
					
			<tr>
				<td>Nova Senha:</td>
				<td><input type="password" name="nova_senha" size="8"> <span>(limite de 8 caracteres)</span></td>
			</tr>	
			 <tr>
				<td>Confirmar Senha:</td>
				<td><input type="password" name="conf_nova_senha" size="8"></td>
			 </tr>
			<tr>
				<td><input type="submit" value="Enviar"></td>
			</tr>
			
			</table>
		</form>
			
		<hr>	
	</body>
</html>
