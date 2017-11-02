<?php
//modificado

include ('./GenerarCFDIV33_Clases.php');
include ('./generar-parametros.php');

// https://cfd.sicofi.com.mx/SicofiWS33/Digifact.asmx?WSDL     URL SERVICIO PRODUCCION
// https://demo.sicofi.com.mx/SicofiWS33/Digifact.asmx?WSDL 	URL SERVICIO DEMO
$servicio="https://demo.sicofi.com.mx/SicofiWS33/Digifact.asmx?WSDL";

  try {
    $client = new SoapClient($servicio);
    
    // echo'<hr>';
    // echo '<p style="text-align:center;">FUNCTIONS</p>';
    // echo'<hr>';
    // echo '<pre>';
    // $functions = $client->__getFunctions ();
    // var_dump($functions);
    // echo'<br>';
    // echo'<hr>';
    // echo '<p style="text-align:center;">TYPES</p>';
    // echo'<hr>';
    // echo '<pre>';
    // $type = $client->__getTypes ();
    // var_dump ($type);

    $parameters = new GeneraCFDIV33();
    // echo '<pre>';
    // var_dump($parameters);

     $GeneraCFDIV33Response = $client->GeneraCFDIV33($parameters);// funcioon del WS del SRI

     echo "<pre>";var_dump($GeneraCFDIV33Response);
     echo ($GeneraCFDIV33Response->GeneraCFDIV33Result->ErrorCFDI);
  }
  catch (Exception $e) {
    throw new Exception($e, 1);
  }

?>
