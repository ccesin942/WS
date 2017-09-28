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
                       $Base_R,$Impuesto_R,$TipoFactor_R,$TasaOCuota_R,$Importe_R,                              /*Retenciones*/
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
                      $this->Retenciones       = new ImpuestoRetenido($Base_R,$Impuesto_R,$TipoFactor_R,$TasaOCuota_R,$Importe_R);
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
     $this->Conceptos =  array(new ConceptoCFDI('10101500','1',10.00,'MTR','Pza','Descrpicion de Prueba 1',1000.00,10000.00,'0.00',
                                          100000.00,'002','Tasa2',0.160000,24000.00,                         /*Translado*/
                                          100000.00,'002','Tasa' ,0.160000,24000.00,                         /*Retenciones*/
                                          '$NumeroPedimento_ConceptoCFDI',                                   /*InformacionAduana_ConceptoCFDI*/
                                          1,                                                                 /*Predial*/
                                          array(array('10101500','1',10.00,'Pza','Descripcion Parte Prueba 1',1000.00,10000.00, /*Parte*/
                                                    'null'/*'15  48  3009  0002777'InformacionAduana_Parte*/),
                                                array('10101500','1',10.00,'Pza','Descripcion Parte Prueba 2',1000.00,10000.00, /*Parte*/
                                                    'null'/*'15  48  3009  0002777'InformacionAduana_Parte*/)
                                          )
                               ),
                               new ConceptoCFDI('10101500','1',10.00,'MTR','Pza','Descrpicion de Prueba 1',1000.00,10000.00,'0.00',
                                        100000.00,'002','Tasa2',0.160000,24000.00,                         /*Translado*/
                                        100000.00,'002','Tasa' ,0.160000,24000.00,                         /*Retenciones*/
                                        '$NumeroPedimento_ConceptoCFDI',                                   /*InformacionAduana_ConceptoCFDI*/
                                        1,                                                                 /*Predial*/
                                        array(array('10101500','1',10.00,'Pza','Descripcion Parte Prueba 1',1000.00,10000.00, /*Parte*/
                                                        'null'/*'15  48  3009  0002777'InformacionAduana_Parte*/),
                                              array('10101500','1',10.00,'Pza','Descripcion Parte Prueba 2',1000.00,10000.00, /*Parte*/
                                                        'null'/*'15  48  3009  0002777'InformacionAduana_Parte*/),
                                              array('10101500','1',10.00,'Pza','Descripcion Parte Prueba 3',1000.00,10000.00, /*Parte*/
                                                        'null'/*'15  48  3009  0002777'InformacionAduana_Parte*/)
                                        )
                               )
                         );
   }

}

class ReceptorCFDITimbradoPlus {
   public $RFC;  //string
   public $Nombre;  //string
   //public $ResidenciaFiscal; //string
   public $NumRegIdTrib; //string
   public $UsoCfdi;  //string

   function __construct($RFC,$Nombre,/*$ResidenciaFiscal,*/$NumRegIdTrib,$UsoCfdi){
     $this->RFC              = $RFC;
     $this->Nombre           = $Nombre;
     //$this->ResidenciaFiscal = $ResidenciaFiscal;
     $this->NumRegIdTrib     = $NumRegIdTrib;
     $this->UsoCfdi          = $UsoCfdi;
   }

}

class ReceptorCFDI{
   public $NoCliente;
   public $Email;
   public $Contacto1;
   public $Contacto2;
   public $Telefono1;
   public $Telefono2;

   function __construct($NoCliente,$Email,$Contacto1,$Contacto2,$Telefono1,$Telefono2){
     $this->NoCliente = $NoCliente;
     $this->Email     = $Email;
     $this->Contacto1 = $Contacto1;
     $this->Contacto2 = $Contacto2;
     $this->Telefono1 = $Telefono1;
     $this->Telefono2 = $Telefono2;
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

class DatosCFDI{
   public $DatosAdicionales;
   public $MensajePDF;
   public $EmailMensaje;

   function __construct($DatosAdicionales,$MensajePDF,$EmailMensaje){
     $this->DatosAdicionales = $DatosAdicionales;
     $this->MensajePDF       = $MensajePDF;
     $this->EmailMensaje     = $EmailMensaje;
   }
}

class DatosCFDITimbradoPlus{
      public $Serie;              //string
      public $Folio;              //long
      public $Fecha;              //dateTime
      public $FormadePago;        //string
      public $CondicionesDePago;  //string
      public $Subtotal;           //double
      public $Descuento;          //double
      public $Moneda;             //string
      public $TipoCambio;         //double
      public $Total;              //double
      public $TipodeComprobante;  //string
      public $MetodoPago;         //string
      public $LugarDeExpedicion;  //string

      function __construct(){
        $this->Serie             = 'A';
        $this->Folio             = '12';
        $this->Fecha             = '2017-06-03';
        $this->FormadePago       = '01';
        $this->CondicionesDePago = 'Condiciones de pago';
        $this->Subtotal          = '20000.00';
        $this->Descuento         = '0.00';
        $this->Moneda            = 'MXN';
        $this->TipoCambio        = '0.00';
        $this->Total             = '20000.00';
        $this->TipodeComprobante = 'I';
        $this->MetodoPago        = 'PUE';
        $this->LugarDeExpedicion = '52340';
      }

}

class CFDIRequest{
   public $Usuario;
   public $Contrasena;
   public $DatosCFDI;
   public $CFDIRelacion;
   public $ReceptorCFDI;
   public $ConceptosCFD;
   public $Addenda;

   function __construct(){
     $this->Usuario          = 'digifact781@mail.com';
     $this->Contrasena       = '12345';
     $this->DatosCFDI        = new DatosCFDITimbradoPlus();//new DatosCFDI('DatosAdicionales','MensajePDF','EmailMensaje');
     $this->CFDIRelacion     = new CFDISRelacionados('1',array('D8F65023-B760-4128-BE8A-2EF17DCB49C4','F8F65023-B760-4128-BE8A-2EF17DCB49C4'));
     $this->ReceptorCFDI     = new ReceptorCFDI('1','Mail@mail.com','Contacto1','Contacto2','Telefono1','Telefono2'); // new ReceptorCFDITimbradoPlus('LEGT7610034S2','RECEPTOR Prueba 4','NumRegIdTrib','G01');
     $this->ConceptosCFD     = new ConceptosCFDI();
     $this->Addenda          = '';
  }
}

class GeneraCFDIV33{

    public $CFDIRequest;

    function __construct(){
      $this->CFDIRequest = new CFDIRequest();
    }
}

?>
