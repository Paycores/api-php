<?php

/**
 * Class PaycoreHttp encargada de enviar las peticiones
 */
class PaycoreHttp {

    /**
     * Envia una peticion post
     * @param $url
     * @param $data
     * @return array
     */
    public static function senPost($url, $data){
        $response = PaycoreHttpCurl::paycoreRequest(TypeRequest::TAG_POST, $url, $data);
        return $response;
    }

    /**
     * Envia una peticion get
     * @param $url
     * @return array
     */
    public static function senGet($url){
        $response = PaycoreHttpCurl::paycoreRequest(TypeRequest::TAG_GET, $url);
        return $response;
    }
}