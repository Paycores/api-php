<?php
/**
 * User: Paycores
 * Segmento de codigo que traduce los parametros de configuracion del Cliente a javascript para su uso
 * dentro de los archivos javascript
 */
$dataJson =  '<script type="text/javascript"> var paycores_settings = {';
foreach (PaycoresConfig::configAll() as $key => $value) {
    $dataJson.= '  ' . $key . ': ' . '"' . $value . '",' . "\n";
}
$dataJson .= "};</script>";
print $dataJson;