<?php

require_once './libs/DB.php';

class ModeloBase extends DB {
    #comentado para ver si funciona public $db; 

    public function __construct() {
        /* de esta manera no es necesario crear la variable $db
        y se pueden llamar directamente a las funciones desde el objeto con 
        $this->
         $this->db = new DB();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); */
        parent::__construct();        
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    public function insertar($tabla, $datos) {

        $llaves = array_keys($datos);
        $sql = "INSERT INTO $tabla (" . implode(", ", $llaves) . ") \n";
        $sql .= "VALUES ( :" . implode(", :", $llaves) . ")";
        $q = $this->db->prepare($sql);
        return $q->execute($datos);
    }

    public function consultar($campos = null, $where = null, $tabla) {
        #$conexion = $this->conectar();
        try {
            #revisa y arma los campos seleccionados
            if(!empty($campos)){
                $cadCampos = '';
                foreach($campos as $campo){
                    $cadCampos .= $campo . ','; 
                }
                $cadCampos = substr($cadCampos,0, -1 );
            }else{
                $cadCampos = '*';
            }

            #revisa y arma las condicions para where
            if(!empty($where)){
                foreach($where as $condicion) {
                    $condiciones[] = $condicion['condicion'] . ' ' . $condicion['valor'] . ' ' . $condicion['operador'];
                }
                $cadCondiciones = implode(' ', $condiciones);
                $query = "SELECT ". $cadCampos . " FROM " . $tabla
                        . " WHERE " . $cadCondiciones;
            }else{
                $query = "SELECT ". $cadCampos . " FROM " . $tabla;
            }
            echo "Query: $query <br>";
            return $consulta = $this->db->query($query)->fetchAll();
        } catch(Exception $e) {
            exit('ERROR: ' . $e->getMessage());
        }
    }

    public function consultarRegistro($query) {
        try {
            $consulta = $this->db->query($query);
            #var_dump($consulta);
            if($consulta->rowCount() >= 1) {
                return $consulta;
            } else {
                return false;
            }
        } catch(Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

    public function obtenerTodos($query) {
        try {

           /*  $q = $this->prepare($query);           
            $q->execute();            
            return $q->fetchAll(); */

            return $this->query($query)->fetchAll();

        } catch (Excetption $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


}

?>