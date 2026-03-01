<?php
function conectarBD(){
	static $con = null; // evita múltiples conexiones

	if ($con === null) {
        $server   = '127.0.0.1';
        $port     = '5432';
        $dbname   = 'tdiw-e8';
        $user     = 'tdiw-e8';
        $password = '3_Njobj5';
		$con = pg_connect("host=$server port=$port dbname=$dbname user=$user password=$password") or die("DB Error: ".pg_last_error());
	}
	return $con;
}
?>
