<?php

try {
	$db=new PDO("mysql:host=localhost;dbname=kurtakip",'root','');
	$db->exec("set names utf8");
} catch(PDOException $e){
	echo $e->getMessage();
}

?>