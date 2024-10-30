


<?php
$user = 'kepler';
$passwd = 'kepler123';
$db = 'oliansa';
$port = 51933;
$host = '127.0.0.1';

$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
echo "Conexion exitosa <hr>";
?>


	


  