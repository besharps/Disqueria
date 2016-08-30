<?php

// models/Usuarios.php

/**
* Clase Usuarios
*
* @package Disquería
* @author Ramiro J. Oviedo <rjo250882@gmail.com>
* @version 1.0
*/
class Usuarios extends Model {
	
	/**
	* Función getTodos.
	*
	* Extrae de la base de datos todos los registros de la tabla usuarios y los devuelve en un array.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/		
	public function getTodos(){
		$this->db->query("SELECT * FROM usuarios;");
		return $this->db->fetchAll();
	}
	
	/**
	* Función getDatosUsuario.
	*
	* Extrae de la base de datos, los datos de un usuario a partir de un número de identificación recibido como parámetro.
	*
	* @param integer $u es un parámetro entero.
	* @return array retorna un array.
	*/
	public function getDatosUsuario($u){
		$this->db->query("SELECT * FROM usuarios
						  WHERE usuario = '$u' ");
		$datos=$this->db->fetch();
		return $datos;
	}
	
	/**
	* Función getIdUsuario.
	*
	* Extrae de la base de datos, el Id. de un usuario a partir de un nombre de usuario recibido como parámetro.
	*
	* @param stringr $u es un parámetro tipo cadena de caracteres.
	* @return integer retorna un entero.
	*/
	public function getIdUsuario($u){
		$this->db->query("SELECT id_usuario
						  FROM usuarios
						  WHERE usuario = '$u' ");
						  
		if($this->db->numRows()!=1) throw new Exception;
		
		return $this->db->fetch();

	}
	
	/**
	* Función chequearLogin.
	*
	* Verifica existencia en la base de datos de un usuario a partir de un número de identificación y una contraseña, ambos recibidos como parámetros.
	* Retorna un valor booleano que indica si el usuario existe o no.
	*
	* @param string $u es un parámetro entero.
	* @param string $c es un parámetro entero.
	* @return bool retorna true si el usuario existe, o false si el usuario no existe.
	*/
	public function chequearLogin($u, $c){
		$this->db->query("SELECT *
						  FROM usuarios
						  WHERE usuario = '$u' ");
						  
		if($this->db->numRows()!=1) throw new Exception;
		
		$user = $this->db->fetch();
		
		if($user['contrasena'] != $c) return false;		
		
		return true;
	}
}

?>