<?php

Class Database{
 
	private $server = "mysql:host=localhost;dbname=doctorappointment";
	private $username = "root";
	private $password = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	public $pdo;
 	
	public function __construct(){
 		try{
             $link = new PDO($this->server, $this->username, $this->password, $this->options);
             $this->pdo = $link;
 			
 		}
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
 
    }
 
	
 
}



?>