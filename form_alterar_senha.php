<? 
	require("valida_sessao_adm.php");
	require("conexao.php");
	include "header.php";
?>


		<h2>Formulário para Alteração de Senha</h2>
		
	
		<form  method="POST" action="alterar_senha.php">
			<table id="form_alterar_senha">
			<tr>
				<td>Senha atual:</td>
				<td><input type="password" name="senha_atual" maxlength="8" size="12"></td>
			</tr>
			<tr>
				<td>Nova Senha:</td>
				<td><input type="password" name="nova_senha" maxlength="8" size="12"> <span>(limite de 8 caracteres)</span></td>
			</tr>	
			 <tr>
				<td>Confirmar Senha:</td>
				<td><input type="password" name="conf_nova_senha" maxlength="8" size="12"></td>
			 </tr>
			<tr>
				<td><input type="submit" value="Enviar"></td>
			</tr>
			
			</table>
		</form>
			
		<hr>	
	<? include "footer.php"; ?>
