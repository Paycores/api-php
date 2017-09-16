<?php

/**
 * Created by Paycores.
 * User: paycores-02
 * Date: 02/08/17
 * Time: 9:15 AM
 *
 * Variables de configuracion del proyecto
 */
abstract class PaycoresConfig
{
    const PAYCORES_ENVIRONMENT  = '1'; /* 1:test:2:real */
    const PAYCORES_ACCESS_KEY   = 'n4hzrjarwllezz3g';//llaves de prueba
    const PAYCORES_ACCESS_LOGIN = 'laa60pprnqjx2opy';//login de prueba
    const PAYCORES_URL_RES      = 'https://paycores.com/error';
    const PAYCORES_URL_CONF     = 'https://paycores.com/success';
    static $PAYCORES_SITE       = 'http://sandbox.paycores.com';

    private static $OPTIONS = array(
        'paycores_environment'  => self::PAYCORES_ENVIRONMENT,
        'paycores_access_key'   => self::PAYCORES_ACCESS_KEY,
        'paycores_access_login' => self::PAYCORES_ACCESS_LOGIN,
        'paycores_url_res'      => self::PAYCORES_URL_RES,
        'paycores_url_conf'     => self::PAYCORES_URL_CONF,
    );
    public static function config($key){
        return self::$OPTIONS[$key];
    }
    public static function configAll(){
        return self::$OPTIONS;
    }
}
PaycoresUtils::setSite(PaycoresConfig::$PAYCORES_SITE . "/lib/order/createOrder.php");