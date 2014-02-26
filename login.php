<? require("conexao.php"); 
include "validaAcesso.inc";
include "header.php";
?>

		<h2>Login para acesso ao sistema</h2>
	
		<form id="form_login" name="form_login" METHOD = "POST" action="valida_login.php">
			Usuário: <input type="text" name="usuario" size="20"><br/><br/>
			Senha: &nbsp; <input type="password" name="senha" maxlength="8" size="12"><br/><br/><br/>

			<input id="btn_enviar" type="submit" value="Enviar">
		</form>

		<br/>

<? include "footer.php"; ?>