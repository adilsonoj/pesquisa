<?

$ip = ip2long($_SERVER['REMOTE_ADDR']);

if ( ( ($ip < ip2long("10.0.144.2")) or ($ip > ip2long("10.0.159.255")) ) and
	 ( ($ip < ip2long("10.1.15.15")) or ($ip > ip2long("10.1.15.24")) ) and
	 ( ($ip < ip2long("10.2.16.41")) or ($ip > ip2long("10.2.16.87")) ) and
	 ( ($ip < ip2long("10.2.16.101")) or ($ip > ip2long("10.2.16.103")) ) and
	 ( ($ip < ip2long("10.2.16.151")) or ($ip > ip2long("10.2.16.168")) ) and
	 ( ($ip < ip2long("10.2.18.2")) or ($ip > ip2long("10.2.18.123")) )
   )
{
	header("location: acesso_negado.php");
}


?>