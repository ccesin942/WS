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
                       $ClaveProdServ_Parte,$NoIdentificacion_Parte,$Cantidad_Parte,$Unidad_Parte,$Descripcion_Parte,$ValorUnitario_Parte,$Importe_Parte, /*Parte*/
                            $NumeroPedimento_Parte/*InformacionAduana_Parte*/){

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
                      $this->Parte             = new Parte($ClaveProdServ_Parte,$NoIdentificacion_Parte,$Cantidad_Parte,$Unidad_Parte,$Descripcion_Parte,$ValorUnitario_Parte,$Importe_Parte,$NumeroPedimento_Parte);
  }

}

class ConceptosCFDI{
   public $Conceptos;

   function __construct(){
     $this->Conceptos =  array(new ConceptoCFDI('01010101','00001',1.5,'F52','TONELADA','ACERO',1500000,2250000,'$Descuento',
                                          2250000,'002','Tasa',0.160000,360000,                              /*Translado*/
                                          2250000,'003','Tasa',0.530000,1192500,                              /*Retenciones*/
                                          '$NumeroPedimento_ConceptoCFDI',                                                           /*InformacionAduana_ConceptoCFDI*/
                                          51888,                                                                                 /*Predial*/
                                          '01010101','055155',1.0,'UNIDAD','PARTE EJEMPLO',1.00,1.00, /*Parte*/
                                              '15  48  3009  0002777'/*InformacionAduana_Parte*/),
                                new ConceptoCFDI('01010101','00001',1.5,'F52','TONELADA','ACERO',1500000,2250000,'$Descuento',
                                          2250000,'002','Tasa',0.160000,360000,                              /*Translado*/
                                          2250000,'003','Tasa',0.530000,1192500,                              /*Retenciones*/
                                          '$NumeroPedimento_ConceptoCFDI',                                                           /*InformacionAduana_ConceptoCFDI*/
                                          51888,                                                                                 /*Predial*/
                                          '01010101','055155',1.0,'UNIDAD','PARTE EJEMPLO',1.00,1.00, /*Parte*/
                                             '15  48  3009  0002777'/*InformacionAduana_Parte*/)
                         );
   }

}

class ReceptorCFDITimbradoPlus {
   public $RFC;  //string
   public $RazonSocial;  //string
   public $ResidenciaFiscal; //string
   public $NumRegIdTrib; //string
   public $UsoCfdi;  //string

  //  function __construct(){
  //    $this->RFC              = '';
  //    $this->RazonSocial      = '';
  //    $this->ResidenciaFiscal = '';
  //    $this->NumRegIdTrib     = '';
  //    $this->UsoCfdi          = '';
  //  }

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
     $this->Relacionados  = new CFDISRelacionado($UUID);
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
        // $this->Serie             = 'A';
        // $this->Folio             = '167ABC';
        // $this->Fecha             = '2017-06-14T09:09:23';
        // $this->FormadePago       = '01';
        // $this->CondicionesDePago = 'CONDICIONES';
        // $this->Subtotal          = '2269400';
        // $this->Descuento         = '0.00';
        // $this->Moneda            = 'MXN';
        // $this->TipoCambio        = '1';
        // $this->Total             = '1436012.00';
        // $this->TipodeComprobante = 'I';
        // $this->MetodoPago        = 'PUE';
        // $this->LugarDeExpedicion = '45079';
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
     $this->Usuario          = 'ws@carsystem.mx';
     $this->Contrasena       = 'Ws5n6*cwq*1';
     $this->DatosCFDI        = '';//new DatosCFDI('Datos Adicionales','Mensaje Pdf','Email Mensaje');
     $this->CFDIRelacion     = new CFDISRelacionados('1','A39DA66B-52CA-49E3-879B-5C05185B0EF7');
     $this->ReceptorCFDI     = new ReceptorCFDI('1','Mail@mail.com','Contacto1','Contacto2','Telefono1','Telefono2');
     $this->ConceptosCFD     = new ConceptosCFDI();
     $this->Addenda          = '$Addenda';
  }
}

class GeneraCFDIV33{

    public $CFDIRequest;

    function __construct(){
      $this->CFDIRequest = new CFDIRequest();
    }
}

?>
