<?php

// models/Compras.php

/**
* Clase Compras
*
* @package Disquería
* @author Ramiro J. Oviedo <rjo250882@gmail.com>
* @version 1.0
*/
class Compras extends Model {
	
	/**
	* Función getTodas.
	*
	* Extrae de la base de datos todos los registros de la tabla compras y los devuelve en un array.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/	
	public function getTodas(){
		$this->db->query("SELECT * FROM compras;");
		return $this->db->fetchAll();
	}
	
	/**
	* Función setNuevaCompra.
	*
	* Inserta en la tabla compras una nueva compra cuyos datos son recibidos como parámetros.
	*
	* @param string $f es un parámetro tipo cadena de caracteres.
	* @param integer $d es un parámetro entero.
	* @param integer $c es un parámetro entero.
	*/
	public function setNuevaCompra($f, $d, $c){
		$anio = substr($f,0,4);
		$mes = substr($f,5,2);
		$dia = substr($f,8,2);
		if(!checkdate($mes,$dia,$anio)) throw new Exception;
		$fecha = $anio . "-" . $mes . "-" . $dia;
		
		if(!ctype_digit($d)) throw new Exception;
		if($d<1) throw new Exception;
		$disco=$d;
		
		if(!ctype_digit($c)) throw new Exception;
		if($c<1) throw new Exception;
		$cantidad=$c;
		
		$this->db->query("INSERT INTO compras
						  (fecha, id_disco, cantidad)
						  VALUES('$fecha',$disco,$cantidad);");
		
		$aumentastock = New Discos;
		$aumentastock->incrementaStock($disco, $cantidad);
	}
}

?>