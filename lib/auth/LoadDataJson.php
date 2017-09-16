<?php
/**
 * User: Paycores
 * Segmento de codigo que traduce los parametros de configuracion de Paycores a javascript para su uso
 * dentro de los archivos javascript
 */
$dataJson =  '<script type="text/javascript"> var paycores_conf = {';
foreach (PaycoresUtils::configAll() as $key => $value) {
    $dataJson.= '  ' . $key . ': ' . '"' . $value . '",' . "\n";
}
$dataJson .= "};</script>";
print $dataJson;