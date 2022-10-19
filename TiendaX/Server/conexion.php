<?php
    class Conexion extends PDO{
        private $host='localhost';
        private $nombre_de_base='id19725721_tiendax';
        private $usuario='id19725721_root';
        private $contrasena='zE4F}NZ-+c?/)<Ss';
        public function __construct(){
            try{
                parent::__construct("mysql:host={$this->host};dbname={$this->nombre_de_base};
                charset=utf8",$this->usuario,$this->contrasena, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                echo 'Conectado';
            }catch(PDOExeption $e){
                echo 'Error: '.$e->getMessage();
                exit;
            }
        }
    }
?>

