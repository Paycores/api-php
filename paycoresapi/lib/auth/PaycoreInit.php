<?php
/**
 * User: Paycores
 * Clase que contiene la estructura para la generacion de la marca de seguridad,
 * de la transaccion
 */
class PaycoreInit{
    private static $iframeStart = '<iframe src="%s" width="0" height="0" style="display: none;"></iframe>';
    private static $iframeUrl = '/business-tools/generateFingerprint/';

    /**
     * Crea el fingerprint necesario para la transaccion
     * @param $purchaseCode
     */
    function createFinger($purchaseCode){
        print sprintf(self::$iframeStart, PaycoresUtils::PAYCORES_HOST.self::$iframeUrl . $purchaseCode);
    }
}
