<?
    require "conexao.php";

    for ($i=1; $i<=24; $i++) {
    	for ($j=1; $j<=5; $j++) {
    		$sql = ociparse($ora_conn, "insert into alternativa (alternativa, id_pergunta) values('$j', $i)");
    		OCIExecute($sql);
    	}
    }
?>