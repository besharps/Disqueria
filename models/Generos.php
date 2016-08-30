<?php

// models/Generos.php

/**
* Clase Generos
*
* @package Disquería
* @author Ramiro J. Oviedo <rjo250882@gmail.com>
* @version 1.0
*/
class Generos extends Model {
	
	/**
	* Función getTodos.
	*
	* Extrae de la base de datos todos los registros de la tabla generos y los devuelve en un array.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/	
	public function getTodos(){
		$this->db->query("SELECT * FROM generos;");
		return $this->db->fetchAll();
	}
	
	/**
	* Función getTodosPorDescripcion.
	*
	* Extrae de la base de datos todos los registros de la tabla generps y los devuelve en un array, ordenados por el campo descripcion.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/
	public function getTodosPorDescripcion(){
		$this->db->query("SELECT * FROM generos
						  ORDER BY descripcion;");
		return $this->db->fetchAll();	
	}
}

?>