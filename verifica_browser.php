<?
$useragent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
    $browser = 'Internet Explorer';
    
   	echo "<script type='text/javascript'>";
   	 	echo "alert('Não é indicado a utilização do navegador ".$browser. "\\nUtilize o navegador Firefox para obter uma melhor experiência');";
	  echo "</script>";
  } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched) || $matched[1] < 13) {
    $browser_version=$matched[1];
    $browser = 'Firefox';
    echo "<script type='text/javascript'>";
      echo "alert('Não é indicado a utilização do navegador ".$browser. " versão: ".$browser_version."\\nUtilize o Firefox mais recente com para obter uma melhor experiência');";
    echo "</script>";
  } 

?>