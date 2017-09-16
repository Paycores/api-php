<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Api Paycores</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php include_once("lib/Loader.php"); ?>
</head>
<body>

<div class="container">
    <h2>Ejemplo Api</h2>
    <!-- Trigger the modal with a button -->
    <form id="paycors-form" method="post" onsubmit="javascript: startTransaction(); return false;">
        <!-- llaves de acceso del cliente -->
        <input name="purchaseCode"                  type="hidden" id="purchaseCode" />
        <input name="codeSecureForm"                type="hidden" id="codeSecureForm" />
        <input name="paycores_api_description"      type="hidden" value="PayCores Prueba real" />
        <input name="paycores_api_currency"         type="hidden" value="COP" />
        <input name="paycores_api_amount"           type="hidden" id="p_amount" value="10000.00" />
        <input name="paycores_api_tax"              type="hidden" value="0.00"  />
        <input name="paycores_api_tax_ret"          type="hidden" value="0.00" />
        <input name="paycores_api_gd_item"          type="hidden" value="id_producto" />

        <!-- user data -->
        <input name="paycores_api_usr_name"         type="text" id="paycores_api_usr_name" />
        <input name="paycores_api_usr_lastname"     type="text" id="paycores_api_usr_lastname" />
        <input name="paycores_api_usr_document"     type="text" id="paycores_api_usr_document" />
        <input name="paycores_api_usr_birth"        type="text" id="paycores_api_usr_birth" />
        <input name="paycores_api_usr_gender"       type="text" id="paycores_api_usr_gender" />
        <input name="paycores_api_usr_country"      type="text" id="paycores_api_usr_country" />
        <input name="paycores_api_usr_city"         type="text" id="paycores_api_usr_city" />
        <input name="paycores_api_usr_state"        type="text" id="paycores_api_usr_state" />
        <input name="paycores_api_usr_address"      type="text" id="paycores_api_usr_address" />
        <input name="paycores_api_usr_country_ad"   type="text" id="paycores_api_usr_country_ad" />
        <input name="paycores_api_usr_postal_code"  type="text" id="paycores_api_usr_postal_code" />

        <input name="paycores_api_usr_email"        type="email" id="paycores_api_usr_email" />
        <input name="paycores_api_usr_phone"        type="text" id="paycores_api_usr_phone" />
        <input name="paycores_api_usr_cellphone"    type="text" id="paycores_api_usr_cellphone" />

        <!-- <CreditCard> -->
        <input name="paycores_api_cd_typeAcc"       type="text" id="paycores_api_cd_typeAcc" />
        <input name="paycores_api_cd_brand"         type="text" id="paycores_api_cd_brand" />
        <input name="paycores_api_cd_expMonth"      type="text" id="paycores_api_cd_expMonth" />
        <input name="paycores_api_cd_expYear"       type="text" id="paycores_api_cd_expYear" />
        <input name="paycores_api_cd_number"        type="text" id="paycores_api_cd_number" />
        <input name="paycores_api_cd_secCode"       type="password" id="paycores_api_cd_secCode" />
        <input name="paycores_api_cd_cardName"      type="text" id="paycores_api_cd_cardName" />
        <input name="paycores_api_cd_quota"         type="text" id="paycores_api_cd_quota" />
        <!-- </CreditCard> -->

        <!-- <Good> -->
        <input name="paycores_api_gd_code"          type="text" id="paycores_api_gd_code" />
        <input name="paycores_api_gd_amount"        type="text" id="paycores_api_gd_amount" />
        <input name="paycores_api_gd_name"          type="text" id="paycores_api_gd_name" />
        <input name="paycores_api_gd_description"   type="text" id="paycores_api_gd_description" />
        <input name="paycores_api_gd_quantity"      type="text" id="paycores_api_gd_quantity" />
        <input name="paycores_api_gd_unitPrice"     type="text" id="paycores_api_gd_unitPrice" />
        <!-- </Good> -->

        <button id="PayButton" class="btn  btn-success submit-button">
            <span class="align-middle">Enviar peticion</span>
        </button>
    </form>



    <!-- Modal -->
    <div class="modal fade" id="paycoresModal" role="dialog" data-backdrop="static" data-keyboard="false">
        <form id="formValCode" class="form-horizontal" method="post" onsubmit="javascript: ValSecureCode(); return false;">
            <input id="codeSecure" placeholder="Codigo de seguridad" name="codeSecure" class="form-control formInput" style="margin-top: 0px;" type="text" maxlength="255" required="">

            <button id="valButton" class="btn  btn-success submit-button">
                <span class="align-middle">Validar codigo</span>
            </button>
        </form>
    </div>

</div>
<script src="lib/auth/PaycoreAuthCode.js"></script>
<script>
    document.getElementsByName('paycores_api_usr_name')[0].value           = "Yulian";
    document.getElementsByName('paycores_api_usr_lastname')[0].value       = "Martinez Diaz";
    document.getElementsByName('paycores_api_usr_document')[0].value       = "10936906";
    document.getElementsByName('paycores_api_usr_birth')[0].value          = "1993-08-23";
    document.getElementsByName('paycores_api_usr_gender')[0].value         = "M";
    document.getElementsByName('paycores_api_usr_country')[0].value        = "CO";
    document.getElementsByName('paycores_api_usr_city')[0].value           = "Armenia";
    document.getElementsByName('paycores_api_usr_state')[0].value          = "Quindio";
    document.getElementsByName('paycores_api_usr_address')[0].value        = "Barrio alameda Mz 1 12";
    document.getElementsByName('paycores_api_usr_country_ad')[0].value     = "CO";
    document.getElementsByName('paycores_api_usr_postal_code')[0].value    = "60003";

    document.getElementsByName('paycores_api_usr_email')[0].value          = "guitarskate@hotmail.com";
    document.getElementsByName('paycores_api_usr_phone')[0].value          = "3105117473";
    document.getElementsByName('paycores_api_usr_cellphone')[0].value      = "3105117473";

    document.getElementsByName('paycores_api_cd_typeAcc')[0].value         = "1";
    document.getElementsByName('paycores_api_cd_brand')[0].value           = "MASTERCARD";
    document.getElementsByName('paycores_api_cd_expMonth')[0].value        = "12";
    document.getElementsByName('paycores_api_cd_expYear')[0].value         = "2018";
    document.getElementsByName('paycores_api_cd_number')[0].value          = "4005580000050003";
    document.getElementsByName('paycores_api_cd_secCode')[0].value         = "130";
    document.getElementsByName('paycores_api_cd_cardName')[0].value        = "Yulian MArtinez D.";
    document.getElementsByName('paycores_api_cd_quota')[0].value           = "1";

    document.getElementsByName('paycores_api_gd_code')[0].value            = "12345678900";
    document.getElementsByName('paycores_api_gd_amount')[0].value          = "10000.00";
    document.getElementsByName('paycores_api_gd_name')[0].value            = "Tenis";
    document.getElementsByName('paycores_api_gd_description')[0].value     = "Tenis negros";
    document.getElementsByName('paycores_api_gd_quantity')[0].value        = "1";
    document.getElementsByName('paycores_api_gd_unitPrice')[0].value       = "10000.00";
</script>

</body>
</html>