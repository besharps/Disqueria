<?php

// models/Discos.php

/**
* Clase Discos
*
* @package Disquería
* @author Ramiro J. Oviedo <rjo250882@gmail.com>, Gabriel Sanchez <gabrielsanchez.frh@gmail.com>
* @version 1.1
*/
class Discos extends Model {
	
	/**
	* Función getTodos.
	*
	* Extrae de la base de datos todos los registros de la tabla discos y los devuelve en un array.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/
	public function getTodos(){
		$this->db->query("SELECT * FROM discos;");
		return $this->db->fetchAll();
	}
	
	/**
	* Función getTodosConArtista.
	*
	* Extrae de la base de datos todos los discos con sus artistas y los devuelve en un array, ordenados por el nombre del artista y el título del disco.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/
	public function getTodosConArtista(){
		$this->db->query("SELECT d.id_disco as id, a.nombre as artista, d.titulo as disco
						  FROM discos d JOIN artistas a ON d.id_artista = a.id_artista
						  ORDER BY artista, disco;");
		return $this->db->fetchAll();
	}
	
	/**
	* Función getTodosConDatos.
	*
	* Extrae de la base de datos todos los discos con todos sus datos y los devuelve en un array, ordenados por el nombre del artista y el título del disco.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/
	public function getTodosConDatos(){	
		$this->db->query("SELECT d.id_disco, d.alta, a.nombre, d.titulo, d.fecha_lanzamiento, d.lista_canciones, d.precio
						  FROM discos d JOIN artistas a ON d.id_artista=a.id_artista
						  ORDER BY a.nombre, d.titulo;");
		
		return $this->db->fetchAll();
	}
	
	/**
	* Función getDatosDeDisco.
	*
	* Extrae de la base de datos, los datos de un disco a partir de un número de identificación recibido como parámetro.
	*
	* @param integer $disco es un parámetro entero.
	* @return array retorna un array.
	*/
	public function getDatosDeDisco($disco){
		if(!ctype_digit($disco)) throw new Exception;
	
		$this->db->query("SELECT d.id_disco, d.alta, a.nombre, d.titulo, d.fecha_lanzamiento, d.lista_canciones, d.precio
						  FROM discos d JOIN artistas a ON d.id_artista=a.id_artista
						  WHERE id_disco=".$disco.";");
					
		$d = $this->db->fetch();
		
		return $d;
	}
	
	/**
	* Función existeDisco.
	*
	* Verifica existencia en la base de datos de un disco a partir de un número de identificación recibido como parámetro.
	* Retorna un valor booleano que indica si el disco existe o no.
	*
	* @param integer $disco es un parámetro entero.
	* @return bool retorna true si el disco existe, o false si el disco no existe.
	*/
	public function existeDisco($disco){
		$this->db->query("SELECT * FROM discos
						  WHERE id_disco=".$disco.";");
		if($this->db->numRows()!=1) return false;
		
		return true;
	}
	
	/**
	* Función getStock.
	*
	* Extrae de la base de datos, el stock de un disco a partir de un número de identificación recibido como parámetro.
	*
	* @param integer $disco es un parámetro entero.
	* @return integer retorna un entero.
	*/
	public function getStock($disco){
		$this->db->query("SELECT stock FROM stock
						  WHERE id_disco=".$disco.";");
								 
		$s = $this->db->fetch();
		
		$stock = $s['stock'];
		
		return $stock;
	}
	
	/**
	* Función setNuevoDisco.
	*
	* Inserta en la tabla disco un nuevo disco cuyos datos son recibidos como parámetros.
	*
	* @param string $d es un parámetro tipo cadena de caracteres.
	* @param integer $a es un parámetro entero.
	* @param string $t es un parámetro tipo cadena de caracteres.
	* @param string $l es un parámetro tipo cadena de caracteres.
	* @param string $c es un parámetro tipo cadena de caracteres.
	* @param float $p es un parámetro tipo flotante.
	*/
	public function setNuevoDisco($d, $a, $t, $l, $c, $p){
		$anio = substr($d,0,4);
		$mes = substr($d,5,2);
		$dia = substr($d,8,2);
		if(!checkdate($mes,$dia,$anio)) throw new Exception;
		$alta = $anio . "-" . $mes . "-" . $dia;
		
		if(!ctype_digit($a)) throw new Exception;
		if($a<1) throw new Exception;
		$artista=$_POST['artista'];
		
		if(strlen($t)<3) throw new Exception;
		$t=substr($t,0,50);
		$titulo=$t;
		
		$anio = substr($l,0,4);
		$mes = substr($l,5,2);
		$dia = substr($l,8,2);
		if(!checkdate($mes,$dia,$anio)) throw new Exception;
		$lanzamiento = $anio . "-" . $mes . "-" . $dia;
		
		if(strlen($c)<3) throw new Exception;
		$c=substr($c,0,500);
		$canciones=$c;
		
		if(!is_numeric($p)) throw new Exception;
		$precio=$p;
		
		$this->db->query("INSERT INTO discos
						(id_artista, titulo, fecha_lanzamiento, lista_canciones, alta, precio)
						 VALUES($artista,'$titulo','$lanzamiento','$canciones','$alta',$precio);");
		$id = $this->db->getId();
		
		$this->setStock($id, 0);
		return $id;
	}
	
	/**
	* Función setActualizarDisco.
	*
	* Actualiza en la tabla discos el precio de un disco cuyo id y nuevo precio son recibidos como parámetros.
	*
	* @param integer $disco es un parámetro entero.
	* @param float $precio es un parámetro flotante.
	*/
	public function setActualizarDisco($disco, $precio){
		if(!ctype_digit($disco)) throw new Exception;
		
		if(!is_numeric($precio)) throw new Exception;
	
		$this->db->query("UPDATE discos
						  SET precio=".$precio."
						  WHERE id_disco=".$disco.";");		
	}
	
	/**
	* Función setStock.
	*
	* Inserta en la tabla stock una nueva entrada de stock cuyos datos son recibidos como parámetros.
	*
	* @param integer $disco es un parámetro entero.
	* @param integer $cantidad es un parámetro entero.
	*/
	public function setStock($disco, $cantidad){
		$this->db->query("INSERT INTO stock
						  (id_disco, stock)
						  VALUES($disco,$cantidad);");
	}
	
	/**
	* Función incrementaStock.
	*
	* Incrementa el stock de un disco.
	* Tanto el disco como la cantidad a incrementar son recibidos como parámetros.
	*
	* @param integer $disco es un parámetro entero.
	* @param integer $cantidad es un parámetro entero.
	*/
	public function incrementaStock($disco, $cantidad){
		$this->db->query("UPDATE stock
						  SET stock=stock+".$cantidad."
						  WHERE id_disco=".$disco.";");
	}
	
	/**
	* Función decrementaStock.
	*
	* Decrementa el stock de un disco.
	* Tanto el disco como la cantidad a decrementar son recibidos como parámetros.
	*
	* @param integer $disco es un parámetro entero.
	* @param integer $cantidad es un parámetro entero.
	*/
	public function decrementaStock($disco, $cantidad){				
		$this->db->query("UPDATE stock
						  SET stock=stock-".$cantidad."
						  WHERE id_disco=".$disco.";");		
	}
	
	/**
	* Función eliminarDisco.
	*
	* Elimina de la tabla discos un disco a partir de un número de identificación recibido como parámetro.
	*
	* @param integer $disco es un parámetro entero.
	*/
	public function eliminarDisco($disco){
		if(!ctype_digit($disco)) throw new Exception;
		
		$this->db->query("DELETE FROM discos
						  WHERE id_disco=".$disco.";");
	}
	

}

?>