<?php
function generarCFDIRequest(){
  $CFDIRequest = new CFDIRequest(
      $user,
      $pass,
      $DatosCFDI = new DatosCFDI(
        $DatosAdicionales,
        $MensajePDF,
        $EmailMensaje
      ),
      $CFDISRelacionados = new CFDISRelacionados(
        $TipoRelacion,
        $Relacionados = new CFDISRelacionado(
          $UUID
        )
      ),
      $ReceptorCFDI = new $ReceptorCFDI(
        $NoCliente,
        $Email,
        $Contacto1,
        $Contacto2,
        $Telefono1,
        $Telefono2
      ),
      $ConceptosCFD = new ConceptosCFDI(
        $Conceptos = new ConceptoCFDI(
          $ClaveProdServ,
          $NoIdentificacion,
          $Cantidad,
          $claveUnidad,
          $Descripcion,
          $ValorUnitario,
          $Importe,
          $Descuento,
          $Traslados =new ImpuestoTrasladado(
            $Base,
            $Impuesto,
            $TipoFactor,
            $TasaOCuota,
            $Importe
          ),
          $Retenciones = new ImpuestoRetenido(
            $Base,
            $Impuesto,
            $TipoFactor,
            $TasaOCuota,
            $Importe
          ),
          $InformacionAduana = new InformacionAduanera(
            $NumeroPedimento
          ),
          $Predial = new CuentaPredial(
            $Numero
          ),
          $Parte = new Parte(
            $ClaveProdServ,
            $NoIdentificacion,
            $Cantidad,
            $Unidad,
            $Descripcion,
            $ValorUnitario,
            $Importe,
            $InformacionAduana = new InformacionAduanera(
                $NumeroPedimento
            )
          )
        )
      ),
      $Addenda,
      $ImpuestosLocales
  );
}

?>
