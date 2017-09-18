<?php

include ('./GenerarCFDIV33_Clases.php');
include ('./generar-parametros.php');

// https://cfd.sicofi.com.mx/SicofiWS33/Digifact.asmx?WSDL     URL SERVICIO PRODUCCION
// https://demo.sicofi.com.mx/SicofiWS33/Digifact.asmx?WSDL 	URL SERVICIO DEMO
$servicio="https://demo.sicofi.com.mx/SicofiWS33/Digifact.asmx?WSDL";

//$CFDIRequest = new CFDIRequest;

  try {
    $client = new SoapClient($servicio);
    // echo '--------------------------------------FUNCTIONS--------------------------------------';
    // echo '<pre>';
    // $functions = $client->__getFunctions ();
    // var_dump($functions);
    // echo '----------------------------------------TYPES----------------------------------------';
    // echo '<pre>';
    // $type = $client->__getTypes ();
    // var_dump ($type);

    $CFDIV33 = new GeneraCFDIV33();
    $CFDIV33->CFDIRequest->Usuario = 'CARLOS CESIN';
    $CFDIV33->CFDIRequest->Contrasena ='*************'; 
    echo '<pre>';
    var_dump($CFDIV33);

    //$xmlstr = $client->GeneraCFDIV33(array('GeneraCFDIV33' => $CFDIV33));// funcioon del WS del SRI

    //echo "<pre>";var_dump($xmlstr);
  }
  catch (Exception $e) {
    throw new Exception($e, 1);
  }

?>
