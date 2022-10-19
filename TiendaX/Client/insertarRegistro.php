<?php
    $nombre=$_POST['Nombre'];
    $marca=$_POST['Marca'];
    $tamano=$_POST['Tamano'];
    $cantidad=$_POST['Cantidad'];

    $cliente=new SoapClient(
        null,array(
            'location'=>'https://wsptiendax.000webhostapp.com/TiendaX/Server/tiendaService.php',
            'uri'=>'https://wsptiendax.000webhostapp.com/TiendaX/Server/tiendaService.php',
            'trace'=>1
        )
    );

    try{
        $respuesta=$cliente-> __soapCall('InsertarBebida',[$nombre,$marca,$tamano,$cantidad]);
        $result=json_encode($respuesta);
        var_dump($result);
    }catch(SOAPFault $e){
        echo 'Error: '.$e->getMessage();
    }
?>