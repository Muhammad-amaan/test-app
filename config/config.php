<?php

 define('DB_DRIVER', 'mysql');
 define('DB_HOST', 'localhost');
 define('DB_NAME', 'testchat');
 define('DB_USER', 'root');
 define('DB_PASS', '');
 
 try{
 $db = new PDO(DB_DRIVER.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
 if($db){
	//echo "Connected.";	 
 }
 }
 catch(PDOException $ex){
  echo $ex->getMessage();	
  echo "Error on line number: " .$ex->getMessage();	 
 }

?>