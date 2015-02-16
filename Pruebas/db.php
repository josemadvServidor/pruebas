<?php
/* Clase encargada de gestionar las conexiones a la base de datos */

// Datos de configuración. Estos podrían ir en otro fichero
$db_conf=array(
	'servidor'=>'127.0.0.1',
	'usuario'=>'root',
	'password'=>'',
	'base_datos'=>'practica'
);


Class Db {

	
	private $base_datos;
	private $link;

	static $_instance;

	/*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
	private function __construct(){
		
		$this->Conectar($GLOBALS['db_conf']);
	}

	/*Evitamos el clonaje del objeto. Patrón Singleton*/
	private function __clone(){ }

	/*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
	public static function getInstance(){
		if (!(self::$_instance instanceof self)){
			self::$_instance=new self();
		}
		return self::$_instance;
	}

	/*Realiza la conexión a la base de datos.*/
	private function Conectar($conf)
	{

		$this->link=new mysqli($conf['servidor'], $conf['usuario'], $conf['password']);

		$this->base_datos=$conf['base_datos'];
		/* check connection */
		
		$this->link->select_db($this->base_datos);
		$this->link->query("SET NAMES 'utf8'");
	}

	
	public function num_filas($tabla,$condicion)
	{
		$sql="select count(*) as total from $tabla where $condicion";
		
		//echo "<pre>$sql</pre>";
		
		//echo "<pre>"; print_r($this); echo "</pre>";
		
		$rs=$this->link->query($sql);
		
		//echo "<p>Rs:"; var_dump($rs); echo "</p>";
		$reg=$rs->fetch_array();
		
		
		return $reg['total'];
	}
	
	
	/**
	 * Ejecuta una consulta SQL y devuelve el resultado de esta
	 * @param string $sql
	 * @return mixed
	 */
	public function Consulta($sql)
	{
		return $this->link->query($sql);
	}
	
    

	/**
	 * Devuelve el siguiente registro del result set devuelto por una consulta.
	 * 
	 * @param mixed $result
	 * @return array | NULL
	 */
	public function LeeRegistro($result)
	{
		return $result->fetch_array();;
	}

	/**
	 * Devuelve el valor del último campo autonumérico insertado
	 * @return int
	 */
	public function LastID()
	{
		return $this->link->insert_id;
	}

	/**
	 * Devuelve el primer registro que cumple la condición indicada
	 * @param string $tabla
	 * @param string $condicion
	 * @param string $campos
	 * @return array|NULL
	 */
	public function LeeUnRegistro($tabla, $condicion, $campos='*')
	{
		$sql="select $campos from $tabla where $condicion limit 1";
		$rs=$this->link->query($sql);
		if($rs)
		{
			return $rs->fetch_array();
		}
		else
		{
			return NULL;
		}
	}
}
?>