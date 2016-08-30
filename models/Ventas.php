<?php

// models/Ventas.php

/**
* Clase Ventas
*
* @package Disquería
* @author Ramiro J. Oviedo <rjo250882@gmail.com>
* @version 1.0
*/
class Ventas extends Model {
	
	/**
	* Función getTodas.
	*
	* Extrae de la base de datos todos los registros de la tabla ventas y los devuelve en un array.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/
	public function getTodas(){
		$this->db->query("SELECT * FROM ventas;");
		return $this->db->fetchAll();
	}
	
	/**
	* Función getTodasConDatos.
	*
	* Extrae de la base de datos todas las ventas con todos sus datos y las devuelve en un array, ordenadas por fecha y número de factura.
	* No recibe parámetros
	*
	* @return array retorna un array.
	*/
	public function getTodasConDatos(){
		$this->db->query("SELECT v.id_venta, v.fecha, v.nro_factura, u.apellido as uapellido, u.nombre as unombre, 
								 a.nombre as artista, d.titulo, v.cantidad, d.precio
						  FROM ventas v
										JOIN usuarios u ON v.id_usuario=u.id_usuario
										JOIN discos d ON v.id_disco=d.id_disco
										JOIN artistas a ON d.id_artista=a.id_artista
						  ORDER BY v.fecha, v.nro_factura;");
						  
		return $this->db->fetchAll();
	}
	
	/**
	* Función getDatosDeVenta.
	*
	* Extrae de la base de datos, los datos de una venta a partir de un número de identificación recibido como parámetro.
	*
	* @param integer $venta es un parámetro entero.
	* @return array retorna un array.
	*/
	public function getDatosDeVenta($venta){
		if(!ctype_digit($venta)) throw new Exception;
	
		$this->db->query("SELECT v.id_venta, v.fecha, v.nro_factura, a.nombre as artista, d.titulo, v.cantidad, d.precio
						  FROM ventas v
										JOIN discos d ON v.id_disco=d.id_disco
										JOIN artistas a ON d.id_artista=a.id_artista
						  WHERE id_venta=".$venta.";");
					
		$d = $this->db->fetch();
		
		return $d;
	}
	
	/**
	* Función setNuevaVenta.
	*
	* Inserta en la tabla ventas una nueva venta cuyos datos son recibidos como parámetros.
	*
	* @param string $da es un parámetro tipo cadena de caracteres.
	* @param integer $f es un parámetro entero.
	* @param integer $di es un parámetro entero.
	* @param integer $c es un parámetro entero.
	* @param integer $u es un parámetro entero.
	*/
	public function setNuevaVenta($f, $da, $di, $c,$u){
		$anio = substr($da,0,4);
		$mes = substr($da,5,2);
		$dia = substr($da,8,2);
		if(!checkdate($mes,$dia,$anio)) throw new Exception;
		$fecha = $anio . "-" . $mes . "-" . $dia;
		
		if(!ctype_digit($f)) throw new Exception;
		if($f<1) throw new Exception;
		$factura=$f;
		
		if(!ctype_digit($di)) throw new Exception;
		if($di<1) throw new Exception;
		$disco=$di;
		
		if(!ctype_digit($c)) throw new Exception;
		if($c<1) throw new Exception;
		$cantidad=$c;
		
		if(!ctype_digit($u)) throw new Exception;
		if($u<1) throw new Exception;
		$usuario=$u;
		
		$control = new Discos;
		$existe = $control->existeDisco($disco);
		if(!$existe) throw new Exception;
		
		$stock=$control->getStock($disco);
		if($stock<$cantidad) throw new Exception;		
		
		$this->db->query("INSERT INTO ventas
						  (id_usuario, nro_factura, fecha, id_disco, cantidad)
						  VALUES($usuario, $factura,'$fecha',$disco,$cantidad);");
		
		$control->decrementaStock($disco, $cantidad);
	}
	
	/**
	* Función setActualizarVenta.
	*
	* Actualiza en la tabla ventas la cantidad de discos vendida en una venta cuyo id y nueva cantidad son recibidos como parámetros.
	*
	* @param integer $venta es un parámetro entero.
	* @param integer $cantidad es un parámetro entero.
	*/
	public function setActualizarVenta($venta, $cantidad){
		if(!ctype_digit($venta)) throw new Exception;
		
		if(!ctype_digit($cantidad)) throw new Exception;
	
		$this->db->query("UPDATE ventas
						  SET cantidad=".$cantidad."
						  WHERE id_venta=".$venta.";");		
	}
	
	/**
	* Función eliminarVenta.
	*
	* Elimina de la tabla ventas una venta a partir de un número de identificación recibido como parámetro.
	*
	* @param integer $venta es un parámetro entero.
	*/
	public function eliminarVenta($venta){
		if(!ctype_digit($venta)) throw new Exception;
		
		$this->db->query("DELETE FROM ventas
						  WHERE id_venta=".$venta.";");
	}
}

?>