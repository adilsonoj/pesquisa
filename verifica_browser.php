<?
	$useragent = $_SERVER['HTTP_USER_AGENT'];

	if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
		$browser = 'Internet Explorer';

		echo "<script type='text/javascript'>";
   	 		echo "alert('Não é indicada a utilização do navegador ".$browser. "\\nPorfavor, utilize o navegador Mozilla Firefox para obter uma melhor experiência.');";
	  	echo "</script>";
  	}
?>