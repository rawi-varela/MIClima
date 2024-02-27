<?php
namespace Model;
class ActiveRecord {

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Alertas y Mensajes
    protected static $alertas = [];

    //Visibilidad de los atributos (Para que Intelephense no marque error, es innecesario )
    public $id;
    public $imagen;
    
    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database) {
        self::$db = $database;
    }

    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Validación
    public static function getAlertas() {
        return static::$alertas;
    }

    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    // Consulta SQL para crear un objeto en Memoria
    public static function consultarSQL($query) {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // liberar la memoria
        $resultado->free();

        // retornar los resultados
        return $array;
    }

    // Crea el objeto en memoria que es igual al de la BD
    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value ) {
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            // if($columna === 'id') continue; // Revisar, debería ir
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos antes de guardarlos en la BD
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Sincroniza BD con Objetos en memoria
    public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }

    // Registros - CRUD
    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

 
    public static function all($columna = '', $valor = '', $orden = 'id ASC', $limite = '') {
        $query = "SELECT * FROM " . static::$tabla;
        if ($columna) {
            $query .= " WHERE $columna = '$valor'"; // Asegúrate de manejar correctamente las comillas para valores string.
        }
        $query .= " ORDER BY $orden"; // Ordenamiento dinámico
    
        if ($limite) {
            $query .= " LIMIT $limite"; // Límite dinámico
        }
    
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    

    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = '$id'"; //Reviar, '' deberían ser innecesarios
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }
    
    // Obtener Registros con cierta cantidad
    public static function get($limite) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT $limite ORDER BY id ASC";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }
    //array_shift trae el primer resulado ("Lo saca del array")

    // // Busca un registro por su id para saber si existe
    // public static function where($columna, $valor) {
    //     $query = "SELECT * FROM " . static::$tabla  ." WHERE $columna = '$valor'";
    //     $resultado = self::consultarSQL($query);
    //     return array_shift( $resultado ) ;
    // }

    // Busca un registro por columna y valor para saber si existe
    public static function where($columna, $valor, $orden = 'ASC') {
        $query = "SELECT * FROM " . static::$tabla . " WHERE $columna = '$valor' ORDER BY id $orden LIMIT 1";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }
    

    // Busqueda Where con Múltiples opciones
    public static function whereArray($array = []) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE ";
        foreach($array as $key => $value) {
            if($key == array_key_last($array)) {
                $query .= " $key = '$value'";
            } else {
                $query .= " $key = '$value' AND ";
            }
        }
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Traer un total de registros
    public static function total($columna = '', $valor = '') {
        $query = "SELECT COUNT(*) FROM " . static::$tabla;
        if($columna) {
            $query .= " WHERE $columna = '$valor'";
        }
        
        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();
        
        return array_shift($total);
    }

    public static function promedio($columna = '', $valor = '', $campo1 = '', $campo1Valor = '', $campo2 = '', $campo2Valor = '') {
        // Consulta para obtener el total de registros que cumplen la primera condición adicional
        $queryTotalCondicion = "SELECT COUNT(*) FROM " . static::$tabla;
        $whereConditionsTotal = [];
        if ($campo1) {
            $whereConditionsTotal[] = "$campo1 = '$campo1Valor'";
        }
        if ($campo2) {
            $whereConditionsTotal[] = "$campo2 = '$campo2Valor'";
        }
        if (!empty($whereConditionsTotal)) {
            $queryTotalCondicion .= " WHERE " . implode(" AND ", $whereConditionsTotal);
        }
    
        $resultadoTotalCondicion = self::$db->query($queryTotalCondicion);
        $totalConPrimeraCondicion = $resultadoTotalCondicion->fetch_array()[0];
    
        // Si no hay registros que cumplan la primera condición adicional, devolver 0 para evitar división por cero
        if ($totalConPrimeraCondicion == 0) {
            return 0;
        }
    
        // Consulta para obtener el total de registros que cumplen todas las condiciones
        $queryCondicional = "SELECT COUNT(*) FROM " . static::$tabla;
        $whereConditions = [];
        if ($columna) {
            $whereConditions[] = "$columna = '$valor'";
        }
        if ($campo1) {
            $whereConditions[] = "$campo1 = '$campo1Valor'";
        }
        if ($campo2) {
            $whereConditions[] = "$campo2 = '$campo2Valor'";
        }
        if (!empty($whereConditions)) {
            $queryCondicional .= " WHERE " . implode(" AND ", $whereConditions);
        }
    
        $resultadoCondicional = self::$db->query($queryCondicional);
        $totalConTodasCondiciones = $resultadoCondicional->fetch_array()[0];
    
        // Calcular el promedio y redondear a 2 dígitos decimales
        $promedio = round(($totalConTodasCondiciones / $totalConPrimeraCondicion) * 100, 2);
        return $promedio;
    }
    
    // Revisa si existe registro
    public function existeRegistro($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE $columna = '$valor'";
        $resultado = self::$db->query($query);
        // if($resultado->num_rows) {
        //     self::$alertas['error'][] = 'El Anfitrión ya está registrado';
        // }
        return $resultado;
    }



    
    //Consulta Plana de SQL (Utilizar cuando los métodos del modelo no son suficientes)
    //La forma correcta es con una clase QueryBuilders que permite unir diferenets tablas
    public static function SQL($query) {
        $resultado = self::consultarSQL(($query));
        return $resultado;
    }

    //Guardar en BD con id AutoIncrementable
    public function crearAI() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
    
        // Quitar el ID del array de atributos si está presente
        unset($atributos['id']); // Asegúrate de que 'id' es el nombre de tu campo autoincrementable
    
        // Insertar en la base de datos
        $query = "INSERT INTO " . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= ") VALUES ('"; 
        $query .= join("', '", array_values($atributos));
        $query .= "')";
    
        // Resultado de la consulta
        $resultado = self::$db->query($query);
    
        return [
            'resultado' => $resultado,
            'id' => self::$db->insert_id // ID del registro recién insertado
        ];
    }    

    // crea un nuevo registro
    public function crear() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('"; 
        $query .= join("', '", array_values($atributos));
        $query .= "') ";
        
        
        // Resultado de la consulta
        $resultado = self::$db->query($query);
        return [
           'resultado' =>  $resultado,
           'id' => self::$db->insert_id
        ];
    }

    // Actualizar el registro
    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 
        
        // Actualizar BD
        $resultado = self::$db->query($query);
       
        return $resultado;
    }

    // Eliminar un Registro por su ID
    public function eliminar() {
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = '" . self::$db->escape_string($this->id) . "' LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }


    //Obtener

}