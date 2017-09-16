<?php
class PaycoreHttpCurl
{
    private static $REQUEST_TYPE = array('GET', 'POST');

    /**
     * @param $requestType
     * @param $url
     * @param null $data
     * @return array
     * @throws PaycoresException
     * @throws PaycoresExceptionConfig
     * @throws PaycoresExceptionNetwork
     */
    public static function paycoreRequest($requestType, $url, $data = null)
    {
        if (empty($url)) {
            throw new PaycoresException('url vacia');
        }

        if (!in_array($requestType, self::$REQUEST_TYPE)) {
            throw new PaycoresExceptionConfig($requestType . ' Verifique el tipo de peticion');
        }

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $requestType);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($curl, CURLOPT_HEADER, false);

        if ($data) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);

        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

        $response = curl_exec($curl);
        $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if($response === false) {
            throw new PaycoresExceptionNetwork(curl_error($curl));
        }
        curl_close($curl);

        return array('code' => $httpStatus, 'PaycoreResponse' => trim($response));
    }
}