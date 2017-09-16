<?php
/**
 * Created by Paycores.
 * User: paycores-02
 * Date: 22/07/17
 * Time: 10:52 AM
 */
/**
 * Valores de configuracion
 * data-commerce_id="68650188"  //id comercio de prueba
 * data-key="n4hzrjarwllezz3g" //llaves de pruebas
 * data-secure="laa60pprnqjx2opy" //login de pruebas
 * data-code_product="<?= uniqid('a-Z1-0', false) ?>"  //codigo delproducto
 * data-environment="1"  //1:test, 2:real
 * */
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

<form method="POST" id="form-paycores-checkout">
    <script
        src="https://business.paycores.com/paycores-checkout/paycores-webcheckout.js" id="paycores-button"
        data-commerce_id="68650188"
        data-key="n4hzrjarwllezz3g"
        data-secure="laa60pprnqjx2opy"
        data-description="Portatil"
        data-curerncy="COP"
        data-amount="10000.00"
        data-amount_product="10000.00"
        data-code_product="<?= uniqid('', false) ?>"
        data-unit_price="10000.00"
        data-environment="1"
        data-tax="0.00"
        data-ret_tax="0.00"
        data-redirect="http://localhost/EncryptTest/getRedirect.php"
        >
    </script>
</form>
</body>
</html>