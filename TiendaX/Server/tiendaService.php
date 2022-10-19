<?php
    //Metodos
    class TiendaSW{
        //Metodo Insert
        public function InsertarBebida($nombre,$marca,$tamano,$cantidad){
            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("INSERT INTO Bebidas (Nombre,Marca,Tamano,Cantidad) 
            VALUES (:nombre,:marca,:tamano,:cantidad)");
            $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $consulta->bindParam(":marca",$marca,PDO::PARAM_STR);
            $consulta->bindParam(":tamano",$tamano,PDO::PARAM_STR);
            $consulta->bindParam(":cantidad",$cantidad,PDO::PARAM_STR);
            $consulta->execute();
            return 1;
        }
        //Metodo Read
        public function ObtenerBebidas(){
            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("SELECT * FROM Bebidas");
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();
        }
        //Metodo Update
        public function ModificarBebida($id,$nombre,$marca,$tamano,$cantidad){
            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("UPDATE Bebidas SET Nombre=:nombre,Marca=:marca,Tamano=:tamano,Cantidad=:cantidad where Id=:id");
            $consulta->bindParam(":id",$id,PDO::PARAM_INT);
            $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $consulta->bindParam(":marca",$marca,PDO::PARAM_STR);
            $consulta->bindParam(":tamano",$tamano,PDO::PARAM_STR);
            $consulta->bindParam(":cantidad",$cantidad,PDO::PARAM_INT);
            $consulta->execute();
            return 1;
        }
        //Metodo Delete
        public function EliminarBebida($id){
            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("DELETE FROM Bebidas where Id=:id");
            $consulta->bindParam(":id",$id,PDO::PARAM_INT); 
            $consulta->execute();
            return 1;
        }
    }
    
    try{
        $server=new SoapServer(
            null,
            [
                'uri'=>'https://wsptiendax.000webhostapp.com/TiendaX/Server/tiendaService.php',
            ]
            );
        $server->setClass('TiendaSW');
        $server->handle();
    }catch(SOAPFault $e){
        echo 'Error: '.$e->getMessage();
                exit;
    }

?>