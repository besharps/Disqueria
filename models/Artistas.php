<?php

// models/Artistas.php


/**
* Clase Artistas
*
* @package Disquería
* @author Ramiro J. Oviedo <rjo250882@gmail.com>
* @version 1.0
*/
class Artistas extends Model {
	
	/**
	* Función getTodos.
	*
	* Extrae de la base de datos todos los registros de la tabla artistas y los devuelve en un array.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/
	public function getTodos(){
		$this->db->query("SELECT * FROM artistas;");
		return $this->db->fetchAll();
	}
	
	/**
	* Función getTodosPorNombre.
	*
	* Extrae de la base de datos todos los registros de la tabla artistas y los devuelve en un array, ordenados por el campo nombre.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/
	public function getTodosPorNombre(){
		$this->db->query("SELECT * FROM artistas
						  ORDER BY nombre;");
		return $this->db->fetchAll();
	}
	
	/**
	* Función getTodosConGenero.
	*
	* Extrae de la base de datos todos los artistas con sus géneros y los devuelve en un array, ordenados por el campo nombre.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/
	public function getTodosConGenero(){
		$this->db->query("SELECT a.id_artista, a.nombre AS nombre, g.descripcion AS genero
					      FROM artistas a JOIN generos g ON a.id_genero=g.id_genero
						  ORDER BY nombre");
		return $this->db->fetchAll();
	}
	
	/**
	* Función getArtista.
	*
	* Extrae de la base de datos, los datos de un artista a partir de un número de identificación recibido como parámetro.
	*
	* @param integer $idartista es un parámetro entero.
	* @return array retorna un array.
	*/
	public function getArtista($idartista){
		$this->db->query("SELECT * 
						  FROM artistas
						  WHERE id_artista=".$idartista.";");
		return $this->db->fetchAll();
	}
	
	/**
	* Función setNuevoArtista.
	*
	* Inserta en la tabla artistas un nuevo artista cuyo nombre y género son recibidos como parámetros.
	*
	* @param string $n es un parámetro tipo cadena de caracteres.
	* @param integer $g es un parámetro entero.
	* @return array retorna un array.
	*/
	public function setNuevoArtista($n, $g){
		if(!ctype_digit($g)) throw new Exception;
		if($g<1) throw new Exception;
		$genero=$g;
				
		if(strlen($n)<3) throw new Exception;
		$n=substr($n,0,50);
		$nombre=$n;
		
		$this->db->query("INSERT INTO artistas
						  (nombre, id_genero)
						  VALUES('$nombre',$genero);");
	}
}

?>