<?php
class InformacionAduanera{
  public $NumeroPedimento;
  function __construct($NumeroPedimento){
      $this->NumeroPedimento = $NumeroPedimento;
  }
}
class CuentaPredial{
  public $Numero;
  function __construct($Numero){
      $this->Numero = $Numero;
  }
}
class Parte{
  public $ClaveProdServ;
  public $NoIdentificacion;
  public $Cantidad;
  public $Unidad;
  public $Descripcion;
  public $ValorUnitario;
  public $Importe;
  public $InformacionAduana;
  function __construct($ClaveProdServ,$NoIdentificacion,$Cantidad,$Unidad,$Descripcion,$ValorUnitario,$Importe,
                        /*InformacionAduana*/$NumeroPedimento){
    $this->ClaveProdServ      = $ClaveProdServ;
    $this->NoIdentificacion   = $NoIdentificacion;
    $this->Cantidad           = $Cantidad;
    $this->Unidad             = $Unidad;
    $this->Descripcion        = $Descripcion;
    $this->ValorUnitario      = $ValorUnitario;
    $this->Importe            = $Importe;
    $this->InformacionAduana  = new InformacionAduanera($NumeroPedimento);
  }
}
class ImpuestoRetenido{
  public $Base;
  public $Impuesto;
  public $TipoFactor;
  public $TasaOCuota;
  public $Importe;
  function __construct($Base,$Impuesto,$TipoFactor,$TasaOCuota,$Importe){
    $this->Base       = $Base;
    $this->Impuesto   = $Impuesto;
    $this->TipoFactor = $TipoFactor;
    $this->TasaOCuota = $TasaOCuota;
    $this->Importe    = $Importe;
  }
}
class ImpuestoTrasladado{
  public $Base;
  public $Impuesto;
  public $TipoFactor;
  public $TasaOCuota;
  public $Importe;
  function __construct($Base,$Impuesto,$TipoFactor,$TasaOCuota,$Importe){
    $this->Base       = $Base;
    $this->Impuesto   = $Impuesto;
    $this->TipoFactor = $TipoFactor;
    $this->TasaOCuota = $TasaOCuota;
    $this->Importe    = $Importe;
  }
}
class ConceptoCFDI{
  public $ClaveProdServ;
  public $NoIdentificacion;
  public $Cantidad;
  public $claveUnidad;
  public $Unidad;
  public $Descripcion;
  public $ValorUnitario;
  public $Importe;
  public $Descuento;
  public $Traslados;
  public $Retenciones;
  public $InformacionAduana;
  public $Predial;
  public $Parte;
  function __construct($ClaveProdServ,$NoIdentificacion,$Cantidad,$claveUnidad,$Unidad,$Descripcion,$ValorUnitario,$Importe,$Descuento,
                       $Base_T,$Impuesto_T,$TipoFactor_T,$TasaOCuota_T,$Importe_T,                              /*Translado*/
                       //$Base_R,$Impuesto_R,$TipoFactor_R,$TasaOCuota_R,$Importe_R,                              /*Retenciones*/
                       $NumeroPedimento_ConceptoCFDI,                                                           /*InformacionAduana_ConceptoCFDI*/
                       $Numero,                                                                                 /*Predial*/
                       $Data){                                                                                  /* ARRAY PARTE*/
    $this->ClaveProdServ     = $ClaveProdServ;
    $this->NoIdentificacion  = $NoIdentificacion;
    $this->Cantidad          = $Cantidad;
    $this->claveUnidad       = $claveUnidad;
    $this->Unidad            = $Unidad;
    $this->Descripcion       = $Descripcion;
    $this->ValorUnitario     = $ValorUnitario;
    $this->Importe           = $Importe;
    $this->Descuento         = $Descuento;
    $this->Traslados         = new ImpuestoTrasladado($Base_T,$Impuesto_T,$TipoFactor_T,$TasaOCuota_T,$Importe_T);
    $this->Retenciones       = '';//new ImpuestoRetenido($Base_R,$Impuesto_R,$TipoFactor_R,$TasaOCuota_R,$Importe_R);
    $this->InformacionAduana = new InformacionAduanera($NumeroPedimento_ConceptoCFDI);
    $this->Predial           = new CuentaPredial($Numero);
    foreach ($Data as $value) {
        $this->Parte[] = new Parte($value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6],$value[7]);
    }
  }
}
class ConceptosCFDI{
   public $Conceptos;
   function __construct(){
     $this->Conceptos =  array(new ConceptoCFDI('52161500','',1.00,'H87','Pza','Descrpicion de Prueba 1',1.00,1.00,0.00,
                                          1.00,'001','Tasa',0.1600,1.1600,                                         /*Translado*/
                                          //0.00,'','' ,0.00,0.00,                                               /*Retenciones*/
                                          '',                                                                 /*InformacionAduana_ConceptoCFDI*/
                                          '',                                                                 /*Predial*/
                                          array(//array('10101500','1',10.00,'Pza','Descripcion Parte Prueba 1',1000.00,10000.00, /*Parte*/
                                                //    'null'/*'15  48  3009  0002777'InformacionAduana_Parte*/),
                                                //array('10101500','1',10.00,'Pza','Descripcion Parte Prueba 2',1000.00,10000.00, /*Parte*/
                                                //    'null'/*'15  48  3009  0002777'InformacionAduana_Parte*/)
                                          )
                               )
                         );
   }
}
// class ReceptorCFDITimbradoPlus {
//    public $RFC;  //string
//    public $Nombre;  //string
//    public $ResidenciaFiscal; //string
//    public $NumRegIdTrib; //string
//    public $UsoCfdi;  //string
//    function __construct($RFC,$Nombre,$ResidenciaFiscal,$NumRegIdTrib,$UsoCfdi){
//      $this->RFC              = $RFC;
//      $this->Nombre           = $Nombre;
//      $this->ResidenciaFiscal = $ResidenciaFiscal;
//      $this->NumRegIdTrib     = $NumRegIdTrib;
//      $this->UsoCfdi          = $UsoCfdi;
//    }
// }
class ReceptorCFDI{
   public $NoCliente;
   public $Email;
   public $Contacto1;
   public $Contacto2;
   public $Telefono1;
   public $Telefono2;
   public $RFC;//----------------------heredadas ReceptorCFDITimbradoPlus \
   public $RazonSocial;       //                                           |    
   public $ResidenciaFiscal;  //                                           |    
   public $NumRegIdTrib;     //                                         <-/    
   public $UsoCfdi;
   function __construct(/*$NoCliente,$Email,$Contacto1,$Contacto2,$Telefono1,$Telefono2,$RFC,$Nombre,$ResidenciaFiscal,$NumRegIdTrib,$UsoCfdi*/){
     $this->NoCliente         = '0423';
     $this->Email             = 'Email@dominio.com';
     $this->Contacto1         = 'Contacto1';
     $this->Contacto2         = 'Contacto2';
     $this->Telefono1         = '$Telefono1';
     $this->Telefono2         = '$Telefono2';
     $this->RFC               = 'BSO100212641';
     $this->RazonSocial       = 'BLAC SOLUTIONS, SA DE CV';
     $this->ResidenciaFiscal  = 'HOMERO, #1425 Col. Polanco V Sección, Ciudad de Mexico';
     $this->NumRegIdTrib      = '';
     $this->UsoCfdi           = 'G03';     
   } 
}
class CFDISRelacionado{
   public $UUID;
   function __construct($UUID){
     $this->UUID = $UUID;
   }
}
class CFDISRelacionados{
   public $TipoRelacion;
   public $Relacionados;
   function __construct($TipoRelacion,$UUID){
     $this->TipoRelacion = $TipoRelacion;
     $this->Relacionados  = array(new CFDISRelacionado($UUID[0]),(new CFDISRelacionado($UUID[1])));
   }
}


class OtroImpuesto{
    public $Nombre;   //=> "s:string"/>
    public $Tipo;     //=> "s:string"/>
    public $Tasa;     //=> "s:double"/>
    public $Importe;  //=> "s:double"/>
    function __construct(){
      $this->Nombre   = '';
      $this->Tipo     = '';
      $this->Tasa     = '';
      $this->Importe  = '';      
    }
}

class ComplementosCFDI{
    public $LeyendasFiscales; //tns:ArrayOfLeyenda  => "Leyenda" type="s1:Leyenda"
    public $INE;              //s2:INE              => "s2:INE" 
    public $Aerolineas;       //s3:Aerolineas       => "s3:Aerolineas"
    public $ImpuestosLocales; //tns:OtrosImpuestos  => "tns:OtrosImpuestos"  => "tns:ArrayOfOtroImpuesto" => array("tns:OtroImpuesto")
    public $NotarioPublicos;  //s4:NotariosPublicos => "s4:NotariosPublicos" 

    function __construct(){
        $this->LeyendasFiscales ='';
        $this->INE              ='';
        $this->Aerolineas       ='';
        $this->ImpuestosLocales ='';
        $this->NotarioPublicos  ='';       
    }
}



class DatosCFDI{
   public $DatosAdicionales;
   public $MensajePDF;
   public $EmailMensaje;
   public $Serie;              //string ----------------------------heredados de DatosCFDITimbradoPlus \
   public $Folio;              //long                                                                   |
   public $Fecha;              //dateTime                                                               |
   public $FormadePago;        //string                                                              <-/
   public $CondicionesDePago;  //string
   public $Subtotal;           //double
   public $Descuento;          //double
   public $Moneda;             //string
   public $TipoCambio;         //double
   public $Total;              //double
   public $TipodeComprobante;  //string
   public $MetodoPago;         //string
   public $LugarDeExpedicion;  //string
   public $Complementos;       //ComplementosCFDI
   
   function __construct(/*$DatosAdicionales,$MensajePDF,$EmailMensaje,Complementos*/){
      $this->DatosAdicionales = '$DatosAdicionales';
      $this->MensajePDF       = '';
      $this->EmailMensaje     = '$EmailMensaje';
      $this->Serie             = 'B';
      $this->Folio             = 1;
      $this->Fecha             = '2017-10-28T01:23:59';
      $this->FormadePago       = '1';
      $this->CondicionesDePago = 'Contado';
      $this->Subtotal          = 1.00;
      $this->Descuento         = 0.00;
      $this->Moneda            = 'MXN';
      $this->TipoCambio        = 1.00;
      $this->Total             = 1.00;
      $this->TipodeComprobante = 'FA';
      $this->MetodoPago        = 'PUE';
      $this->LugarDeExpedicion = '11560';
      $this->Complementos      = '';//new ComplementosCFDI();
   }
}
// class DatosCFDITimbradoPlus{
//       public $Serie;              //string
//       public $Folio;              //long
//       public $Fecha;              //dateTime
//       public $FormadePago;        //string
//       public $CondicionesDePago;  //string
//       public $Subtotal;           //double
//       public $Descuento;          //double
//       public $Moneda;             //string
//       public $TipoCambio;         //double
//       public $Total;              //double
//       public $TipodeComprobante;  //string
//       public $MetodoPago;         //string
//       public $LugarDeExpedicion;  //string
//       function __construct(){
//         $this->Serie             = 'B';
//         $this->Folio             = '12';
//         $this->Fecha             = '2017-06-03';
//         $this->FormadePago       = '01';
//         $this->CondicionesDePago = 'Condiciones de pago';
//         $this->Subtotal          = '20000.00';
//         $this->Descuento         = '0.00';
//         $this->Moneda            = 'MXN';
//         $this->TipoCambio        = '0.00';
//         $this->Total             = '20000.00';
//         $this->TipodeComprobante = 'I';
//         $this->MetodoPago        = 'PUE';
//         $this->LugarDeExpedicion = '52340';
//       }
// }

class CFDIRequest{
   public $Usuario;
   public $Contrasena;
   public $DatosCFDI;
   public $CFDIRelacion;
   public $ReceptorCFDI;
   public $ConceptosCFD;
   public $Addenda;
   function __construct(/*$DatosCFDI,$ReceptorCFDI,$ConceptosCFD*/){
     $this->Usuario          = 'ws@carsystem.mx';
     $this->Contrasena       = 'Ws5n6*cwq*1';
     $this->DatosCFDI        = new DatosCFDI();
     $this->CFDIRelacion     = '';//new CFDISRelacionados('1',array('D8F65023-B760-4128-BE8A-2EF17DCB49C4','F8F65023-B760-4128-BE8A-2EF17DCB49C4'));
     $this->ReceptorCFDI     = new ReceptorCFDI(); // new ReceptorCFDITimbradoPlus('LEGT7610034S2','RECEPTOR Prueba 4','NumRegIdTrib','G01');
     $this->ConceptosCFD     = new ConceptosCFDI();
     $this->Addenda          = '';
  }
}
class GeneraCFDIV33{
    public $CFDIRequest;
    function __construct(/*$DatosCFDI,$ReceptorCFDI,$ConceptosCFD*/){
    $this->CFDIRequest = new CFDIRequest(/*$DatosCFDI,$ReceptorCFDI,$ConceptosCFD*/);
    }
}
?>

