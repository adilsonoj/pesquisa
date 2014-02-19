<?
	session_start();
	
	if (!isset($_SESSION['usuario'])) {
		echo "<script language=\"javascript\">";
			echo "alert(\"Sua sessão expirou ou você está tentando acessar diretamente a área de administração do site.\\nPor favor, efetue o seu login antes de prosseguir.\");";
			echo "location.href=\"login.php\";";
		echo "</script>";
	}	
?>