<?php

//fw/Database.php

	class Database {
		
		private static $instancia;
		private $cn;
		private $res;
		
		private function __construct(){ }
		
		public static function getInstance(){
			if(! self::$instancia)
				self::$instancia = new Database();
				
			return self::$instancia;
		}
		
		private function connect() {
			$this->cn = mysqli_connect("localhost","root","","disqueria");

			/*Esta función es necesaria porque al leer de la base de datos palabras con acentos o caracteres especiales y mostralos en pantalla, no se verían correctamente*/ 
			mysqli_set_charset($this->cn,"utf8");
		}
		
		public function query($q) {
			if(!$this->cn) $this->connect();
			$this->res = mysqli_query($this->cn,$q);
			
			if(mysqli_error($this->cn)!="")
				echo mysqli_error($this->cn);
		}
		
		public function fetch() {
			return mysqli_fetch_assoc($this->res);
		}
		
		public function fetchAll() {
			$temp = array();
			while($fila = $this->fetch()) {
				$temp[] = $fila;
			}
			return $temp;
		}
		
		public function numRows() {
			return mysqli_num_rows($this->res);
		}
		
		public function escape($str) {
			if(!$this->cn) $this->connect();
			return mysqli_escape_string($this->cn,$str);
		}
		
		public function getId(){
			$id=mysqli_insert_id($this->cn);
			return $id;
		}
		
	}
	
?>