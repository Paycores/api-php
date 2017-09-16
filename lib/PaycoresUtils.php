<?php

/**
 * Created by Paycores.
 * User: paycores-02
 * Date: 02/08/17
 * Time: 9:15 AM
 *
 * Variables de configuracion de Paycores
 */
abstract class PaycoresUtils
{
    const PAYCORES_HOST     = PaycoresConfig::PAYCORES_ENVIRONMENT == 1 ? 'https://sandbox.paycores.com/' : "https://business.paycores.com/";

    private static $OPTIONS = array(
        'paycores_host'     => self::PAYCORES_HOST,
        'paycores_order'    => PAYCORES_ORDER,
    );
    public static function config($key){
        return self::$OPTIONS[$key];
    }
    public static function configAll(){
        return self::$OPTIONS;
    }

    public static function setSite($site){
        define("PAYCORES_ORDER", $site);
    }
}