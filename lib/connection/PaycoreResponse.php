<?php
/**
 * Created by Paycores.
 * User: paycores-02
 * Date: 17/07/17
 * Time: 10:37 AM
 */

class PaycoreResponse{

    /**
     * @param $response
     * @return mixed|null
     * @throws PaycoresExceptionServer
     */
    public static function parseResponse($response)
    {
        $httpStatus = $response['code'];

        $message =  $response ;


        if (json_last_error() == JSON_ERROR_SYNTAX) {
            throw new PaycoresExceptionServer('Error json response. PaycoreResponse: [' . $response['PaycoreResponse'] . ']');
        }

        if ($httpStatus == 200) {

            return $message;

        }
    }
}