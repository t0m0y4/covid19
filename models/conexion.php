<?php

class Conexion{

	public function conectar(){
        $pass = strval('');
		$link = new PDO("mysql:host=localhost;dbname=covid19;charset=utf8","root",$pass);

        return $link;

	}

}
?>
