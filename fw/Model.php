<?php

//fw/Model.php

/**
* Clase Model
*
* Esta es la clase principal de la que heredan todas las demás.
* Es abstracta, lo que significa que para instanciarla hay que heredarla en una subclase
* Todo lo que tiene es un constructor genérico que utilizan todas las restantes clases.
*
*
* @package Disquería
* @author Ramiro J. Oviedo <rjo250882@gmail.com>
* @version 1.0
*/
abstract class Model{
	protected $db;
	
	/**
	* Constructor genérico.
	*
	* Esta función construye la clase y una instancia a la base de datos.
	* No recibe ni retorna parámetros.
	*/
	public function __construct(){
		$this->db = Database::getInstance();
	}
	
}

?>