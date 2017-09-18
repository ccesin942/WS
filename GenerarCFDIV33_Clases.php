<?php

class InformacionAduanera{
  public $NumeroPedimento;

  // function __construct($NumeroPedimento){
  //     $this->NumeroPedimento = $NumeroPedimento;
  // }

}

class CuentaPredial{
  public $Numero;

  // function __construct($Numero){
  //     $this->Numero = $Numero;
  // }

}

class Parte{
  public $ClaveProdServ;
  public $NoIdentificacion;
  public $Cantidad;
  public $Unidad;
  public $Descripcion;
  public $ValorUnitario;
  public $Importe;
  public $InformacionAduana /*= */;

  function __construct(){
  //   $this->ClaveProdServ      = $ClaveProdServ;
  //   $this->NoIdentificacion   = $NoIdentificacion;
  //   $this->Cantidad           = $Cantidad;
  //   $this->Unidad             = $Unidad;
  //   $this->Descripcion        = $Descripcion;
  //   $this->ValorUnitario      = $ValorUnitario;
  //   $this->Importe            = $Importe;
    $this->InformacionAduana  = new InformacionAduanera();
  }

}

class ImpuestoRetenido{
  public $Base;
  public $Impuesto;
  public $TipoFactor;
  public $TasaOCuota;
  public $Importe;

  // function __construct($Base,$Impuesto,$TipoFactor,$TasaOCuota,$Importe){
  //   $this->Base       = $Base;
  //   $this->Impuesto   = $Impuesto;
  //   $this->TipoFactor = $TipoFactor;
  //   $this->TasaOCuota = $TasaOCuota;
  //   $this->Importe    = $Importe;
  // }

}

class ImpuestoTrasladado{
  public $Base;
  public $Impuesto;
  public $TipoFactor;
  public $TasaOCuota;
  public $Importe;

  // function __construct($Base,$Impuesto,$TipoFactor,$TasaOCuota,$Importe){
  //   $this->Base       = $Base;
  //   $this->Impuesto   = $Impuesto;
  //   $this->TipoFactor = $TipoFactor;
  //   $this->TasaOCuota = $TasaOCuota;
  //   $this->Importe    = $Importe;
  // }

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

  function __construct(){
  //   $this->ClaveProdServ     = $ClaveProdServ;
  //   $this->NoIdentificacion  = $NoIdentificacion;
  //   $this->Cantidad          = $Cantidad;
  //   $this->claveUnidad       = $claveUnidad;
  //   $this->Unidad            = $Unidad;
  //   $this->Descripcion       = $Descripcion;
  //   $this->ValorUnitario     = $ValorUnitario;
  //   $this->Importe           = $Importe;
  //   $this->Descuento         = $Descuento;
    $this->Traslados         = new ImpuestoTrasladado();
    $this->Retenciones       = new ImpuestoRetenido();
    $this->InformacionAduana = new InformacionAduanera();
    $this->Predial           = new CuentaPredial();
    $this->Parte             = new Parte();
  }

}

class ConceptosCFDI{
   public $Conceptos;

   function __construct(){
     $this->Conceptos =  new ConceptoCFDI();
   }

}

class ReceptorCFDI{
   public $NoCliente;
   public $Email;
   public $Contacto1;
   public $Contacto2;
   public $Telefono1;
   public $Telefono2;

   // function __construct($NoCliente,$Email,$Contacto1,$Contacto2,$Telefono1,$Telefono2){
   //   $this->NoCliente = $NoCliente;
   //   $this->Email     = $Email;
   //   $this->Contacto1 = $Contacto1;
   //   $this->Contacto2 = $Contacto2;
   //   $this->Telefono1 = $Telefono1;
   //   $this->Telefono2 = $Telefono2;
   // }

}

class CFDISRelacionado{
   public $UUID;

   // function __construct($UUID){
   //   $this->UUID = $UUID;
   // }

}

class CFDISRelacionados{
   public $TipoRelacion;
   public $Relacionados;

   function __construct(){
     //$this->$TipoRelacion = $TipoRelacion;
     $this->Relacionados  = new CFDISRelacionado();
   }

}

class DatosCFDI{
   public $DatosAdicionales;
   public $MensajePDF;
   public $EmailMensaje;

   // function __construct($DatosAdicionales,$MensajePDF,$EmailMensaje){
   //   $this->DatosAdicionales = $DatosAdicionales;
   //   $this->MensajePDF       = $MensajePDF;
   //   $this->EmailMensaje     = $EmailMensaje;
   // }
}

class CFDIRequest{
   public $Usuario;
   public $Contrasena;
   public $DatosCFDI;
   public $CFDIRelacion;
   public $ReceptorCFDI;
   public $ConceptosCFD;
   public $Addenda;
   public $ImpuestosLocales;

   function __construct(){
     // $this->Usuario          = $user;
     // $this->Contrasena       = $pass;
     $this->DatosCFDI        = new DatosCFDI();
     $this->CFDIRelacion     = new CFDISRelacionados();
     $this->ReceptorCFDI     = new ReceptorCFDI();
     $this->ConceptosCFD     = new ConceptosCFDI();
     // $this->Addenda          = $Addenda;
     // $this->ImpuestosLocales = $ImpuestosLocales;
   }
}

class GeneraCFDIV33{

    public $CFDIRequest;

    function __construct(){
      $this->CFDIRequest = new CFDIRequest();
    }
}

?>
