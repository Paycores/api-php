<?php
/**
 * Created by Paycores.
 * User: paycores-02
 * Date: 13/07/17
 * Time: 02:17 PM
 * código y derechos reservados
 * @paycores.com
 */
if(!empty($_POST)){
    include_once("../LoaderCreateOrder.php");
    $code_purchase = uniqid('', true);
    $PayCoreAuthorize = new Authorize();
    $PayCoreConfiguration       =   new Configuration();
    $PayCoreConfiguration       ->  codeSecureForm          = $_POST["codeSecureForm"];
    $PayCoreConfiguration       ->  paycores_access_key     = PaycoresConfig::PAYCORES_ACCESS_KEY;
    $PayCoreConfiguration       ->  paycores_access_login   = PaycoresConfig::PAYCORES_ACCESS_LOGIN;
    $PayCoreConfiguration       ->  paycores_environment    = PaycoresConfig::PAYCORES_ENVIRONMENT;
    $PayCoreConfiguration       ->  paycores_url_res        = PaycoresConfig::PAYCORES_URL_RES;
    $PayCoreConfiguration       ->  paycores_url_conf       = PaycoresConfig::PAYCORES_URL_CONF;

    $PayCorePurchaseData        =   new PurchaseData();
    $PayCorePurchaseData        ->  apiPurchaseCode         = $_POST["purchaseCode"];
    $PayCorePurchaseData        ->  apiCurrencyCode         = $_POST["paycores_api_currency"];
    $PayCorePurchaseData        ->  apiIva                  = $_POST["paycores_api_tax"];
    $PayCorePurchaseData        ->  apiIvaReturn            = $_POST["paycores_api_tax_ret"];
    $PayCorePurchaseData        ->  apiQuotaId              = $_POST["paycores_api_cd_quota"];
    $PayCorePurchaseData        ->  apiTotalAmount          = $_POST["paycores_api_amount"];

    $PayCoreCardData            =   new CardData();
    $PayCoreCardData            ->  apiAccountTypeId        = $_POST["paycores_api_cd_typeAcc"];
    $PayCoreCardData            ->  apiCardName             = $_POST["paycores_api_cd_cardName"];
    $PayCoreCardData            ->  apiBrand                = $_POST["paycores_api_cd_brand"];
    $PayCoreCardData            ->  apiExpiryMonth          = $_POST["paycores_api_cd_expMonth"];
    $PayCoreCardData            ->  apiExpiryYear           = $_POST["paycores_api_cd_expYear"];
    $PayCoreCardData            ->  apiNumber               = $_POST["paycores_api_cd_number"];
    $PayCoreCardData            ->  apiSecurityCode         = $_POST["paycores_api_cd_secCode"];

    $PayCoreBillingData         =   new Person();
    $PayCoreBillingData         ->  apiAddress              = $_POST["paycores_api_usr_address"];
    $PayCoreBillingData         ->  apiNames                = $_POST["paycores_api_usr_name"];
    $PayCoreBillingData         ->  apiLastNames            = $_POST["paycores_api_usr_lastname"];
    $PayCoreBillingData         ->  apiNumberIdentifier     = $_POST["paycores_api_usr_document"];
    $PayCoreBillingData         ->  apiGender               = $_POST["paycores_api_usr_gender"];
    $PayCoreBillingData         ->  apiBirthday             = $_POST["paycores_api_usr_birth"];
    $PayCoreBillingData         ->  apiNationality          = $_POST["paycores_api_usr_country"];

    $PayCoreAddresDataPerson    =   new AddressData();
    $PayCoreAddresDataPerson    ->  apiCity                 = $_POST["paycores_api_usr_city"];
    $PayCoreAddresDataPerson    ->  apiState                = $_POST["paycores_api_usr_state"];
    $PayCoreAddresDataPerson    ->  apiCountryCode          = $_POST["paycores_api_usr_country_ad"];
    $PayCoreAddresDataPerson    ->  apiEmail                = $_POST["paycores_api_usr_email"];
    $PayCoreAddresDataPerson    ->  apiPhoneNumber          = $_POST["paycores_api_usr_phone"];
    $PayCoreAddresDataPerson    ->  apiCellPhoneNumber      = $_POST["paycores_api_usr_cellphone"];
    $PayCoreAddresDataPerson    ->  apiPostalCode           = $_POST["paycores_api_usr_postal_code"];

    $PayCoreBillingData         ->  apiDataAddress          = $PayCoreAddresDataPerson;

    $ApiCoreGood                =   new Good();
    $ApiCoreGood                ->  apiItem                 = $_POST["paycores_api_gd_item"];
    $ApiCoreGood                ->  apiCode                 = $_POST["paycores_api_gd_code"];
    $ApiCoreGood                ->  apiAmount               = $_POST["paycores_api_gd_amount"];
    $ApiCoreGood                ->  apiPromotionCode        = $_POST["paycores_api_gd_promoCode"];
    $ApiCoreGood                ->  apiName                 = $_POST["paycores_api_gd_name"];
    $ApiCoreGood                ->  apiDescription          = $_POST["paycores_api_gd_description"];
    $ApiCoreGood                ->  apiQuantity             = $_POST["paycores_api_gd_quantity"];
    $ApiCoreGood                ->  apiUnitPrice            = $_POST["paycores_api_gd_unitPrice"];

    $PayCoreAuthorize           ->  apiPurchaseData         = $PayCorePurchaseData;
    $PayCoreAuthorize           ->  apiCardData             = $PayCoreCardData;
    $PayCoreAuthorize           ->  apiBillingData          = $PayCoreBillingData;
    $PayCoreAuthorize           ->  apiGood                 = $ApiCoreGood;
    $PayCoreAuthorize           ->  apiConfiguration        = $PayCoreConfiguration;

    $url = PaycoresUtils::PAYCORES_HOST . "web-checkout/paycoresTransfer";

    $final = array();
    $final["data"] = $PayCoreAuthorize;

    $response = PaycoreResponse::parseResponse(PaycoreHttp::senPost($url, http_build_query($final)));

    $data["res"]="done";
    $varResponse =  json_decode($response["PaycoreResponse"]);
    $data["codeResponse"]=$varResponse->data->errorCode;
    $data["messageResponse"]= $varResponse->data->errorMessage;
    $data["message"]= $varResponse->data->message;
    $data["baucherName"]= $varResponse->data->baucherName;

    return print(json_encode($data));
} else {
    $final = array();
    $final["status"]    = 200;
    $final["message"] = "Error 404";
    print(json_encode($final));
}
?>







