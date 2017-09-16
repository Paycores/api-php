## api-php Paycores.com ##
[link a Paycores Api](https://paycores.com/apiRest).

Librería en PHP para la conexión con los servicios de Paycores.com

Api Rest.
Paycores brinda soporte seguro y confiable, por esto ofrecemos nuestro servicio de Api rest en los diferentes lenguajes de programación como PHP y Java, teniendo dos tipos de Api en PHP: Tradicional y nuestra Api de ágil integración Short Api los cuales podrás integrar en pasos muy sencillos.
A continuación describimos los puntos que debes de tener en cuenta para integrar nuestra api de forma segura y sencilla.

A continuación se describe paso a paso como integrar nuestra API Paycores a su servicio de e-commerce.
Paso 1

**Paso 1:**
Se debe de descargar y configurar la librería de Paycores.

Archivos para configurar:

lib/PaycoresConfig.php

## PHP: ##


    const PAYCORES_ENVIRONMENT='1';

    const PAYCORES_ACCESS_KEY='111111111111';

    const PAYCORES_ACCESS_LOGIN='222222222222';

    const PAYCORES_URL_RES='https://YourProject/error';

    const PAYCORES_URL_CONF='https://YourProject/success';

    const $PAYCORES_SITE='https://YourProject/;


**PAYCORES_ENVIRONMENT:** El tipo de ambiente que se va a usar, (1) uno para pruebas, (2) dos para producción.

**PAYCORES_ACCESS_KEY:** Llave de acceso asignada en el panel de administración Paycores

**PAYCORES_ACCESS_LOGIN:** Llave de ingreso asignada en el panel de administración Paycores

**PAYCORES_URL_RES:** La url de respuesta de tu comercio.

**PAYCORES_URL_CONF:** La url de confirmación.

**$PAYCORES_SITE:** La url de la página web.

con eso la librería está lista para crear su primer pago a través de Paycores


##  CSS:  ##

    button{
    width: 20px;
    height: 28px;
    color: #fff;
    font-size: 28px;
    padding: 11px 15px;
    border-radius: 5px;
    background: #14ADE5;
    }

Paso 2: Luego se debe crear el formulario de pagos Paycores 

## HTML: ##

    <form id="form" method="post" onsubmit="javascript: startTransaction(); return false;">
    <input name="purchaseCode" type="hidden" id="purchaseCode"/>
    <input name="codeSecureForm" type="hidden" id="codeSecureForm"/>
    <input name="paycores_api_description" type="hidden" value="Test PayCores"/>
    <input name="paycores_api_currency" type="hidden" value="COP"/>
    <input name="paycores_api_amount" type="hidden" id="p_amount" value="150000.00"/>
 
    <input name="paycores_api_tax" type="hidden" value="0.00"/>
    <input name="paycores_api_tax_ret" type="hidden" value="0.00"/>
    <input name="paycores_api_usr_name" type="text" id="paycores_usr_name"/>
    <input name="paycores_api_usr_lastname" type="text" id="paycores_usr_lastname"/>
    <input name="paycores_api_usr_document" type="text" id="paycores_usr_document"/>
    <input name="paycores_api_usr_birth" type="text" id="paycores_usr_birth"/>
    <input name="paycores_api_usr_gender" type="text" id="paycores_usr_gender"/>
    <input name="paycores_api_usr_country" type="text" id="paycores_usr_country"/>
    <input name="paycores_api_usr_city" type="text" id="paycores_usr_city"/>
    <input name="paycores_api_usr_state" type="text" id="paycores_usr_state"/>
    <input name="paycores_api_usr_address" type="text" id="paycores_usr_address"/>
    <input name="paycores_api_usr_country_ad" type="text" id="paycores_usr_country_ad"/>
    <input name="paycores_api_usr_postal_code" type="text" id="paycores_usr_postal_code"/>
    <input name="paycores_api_usr_email" type="email" id="paycores_usr_email"/>
    <input name="paycores_api_usr_phone" type="text" id="paycores_usr_phone"/>
    <input name="paycores_api_usr_cellphone" type="text" id="paycores_usr_cellphone"/>
    <input name="paycores_api_cd_typeAcc" type="text" id="paycores_cd_typeAcc"/>
    <input name="paycores_api_cd_brand" type="text" id="paycores_cd_brand"/>
    <input name="paycores_api_cd_expMonth" type="text" id="paycores_cd_expMonth"/>
    <input name="paycores_api_cd_expYear" type="text" id="paycores_cd_expYear"/>
    <input name="paycores_api_cd_number" type="text" id="paycores_cd_number"/>
    <input name="paycores_api_cd_secCode" type="text" id="paycores_cd_secCode"/>
    <input name="paycores_api_cd_cardName" type="text" id="paycores_cd_cardName"/>
    <input name="paycores_api_cd_quota" type="text" id="paycores_cd_quota"/>
    <input name="paycores_api_gd_code" type="text" id="paycores_gd_code"/>
    <input name="paycores_api_gd_amount" type="text" id="paycores_gd_amount"/>
    <input name="paycores_api_gd_name" type="text" id="paycores_gd_name"/>
    <input name="paycores_api_gd_description" type="text" id="paycores_gd_description"/>
    <input name="paycores_api_gd_quantity" type="text" id="paycores_gd_quantity"/>
    <input name="paycores_api_gd_unitPrice" type="text" id="paycores_gd_unitPrice"/>
    <button id="PayButton" class="btn btn-success submit-button">
        <span class="align-middle">Enviar petición
        </span>
    </button>
 
    </form>



**purchaseCode:** Código de compra generado por Paycores.

**codeSecureForm:** Código de verificación de la compra enviado al correo.

**paycores_api_description:** Descripción de la compra.

**paycores_api_currency:**  Tipo de moneda COP | USD.

**paycores_api_amount:** Total de la compra.

**paycores_api_tax:** Iva.

**paycores_api_tax_ret:** Retorno del iva.

**paycores_api_usr_name:** Nombre del usuario.

**paycores_api_usr_lastname:** Apellido del usuario.

**paycores_api_usr_document:** Documento de identidad del usuario.

**paycores_api_usr_birth:** Fecha de nacimiento del usuario.

**paycores_api_usr_gender:** Género del usuario.

**paycores_api_usr_country:** País donde nació.

**paycores_api_usr_city:** Ciudad.

**paycores_api_usr_state:** Estado.

**paycores_api_usr_address:** Dirección del usuario.

**paycores_api_usr_country_ad:**País de residencia.

**paycores_api_usr_postal_code:** Código postal.

**paycores_api_usr_email:** Correo electrónico.

**paycores_api_usr_phone:** Número de Teléfono.

**paycores_api_usr_cellphone:** Número de Celular.

**paycores_api_cd_typeAcc:** Tipo de tarjeta (1 uno Crédito, 4 cuatro Débito).

**paycores_api_cd_brand:**  Franquicia.

**paycores_api_cd_expMonth:** Mes de expiración de la tarjeta.

**paycores_api_cd_expYear:** Año de expiración de la tarjeta.

**paycores_api_cd_number:** Número de la tarjeta.

**paycores_api_cd_secCode:** Código de seguridad CVC.

**paycores_api_cd_cardName:** Nombre en la tarjeta.

**paycores_api_cd_quota:**  cantidad de cuotas.

**paycores_api_gd_code:** Código del producto.

** paycores_api_gd_amount:** Total del producto.

**paycores_api_gd_name:** Nombre del producto.

**paycores_api_gd_description:** Descripción del producto.

 **paycores_api_gd_quantity:** Cantidad de productos.

**paycores_api_gd_unitPrice:** Precio unitario del producto.

Como Paycores envía un código al correo del usuario para confirmar la autenticidad del pago, es necesario validar el mismo.

 ## Paso 3: ##

**HTML:**

    <div class="modal fade" id="paycoresModal" role="dialog"
        data-backdrop="static" data-keyboard="false">
    <form id="formValCode" class="form-horizontal" method="post"
            onsubmit="javascript: ValSecureCode();return false;">
        <input id="codeSecure" placeholder="Codigo de seguridad"
                name="codeSecure" class="form-control formInput"
                style="margin-top: 0px;" type="text" maxlength="255" required="">
        <button id="valButton" class="btn btn-success submit-button">
            <span class="align-middle">
                Validar codigo
            </span>
        </button>
    </form>
    </div>



Importar archivos Al inicio del archivo en php justo antes de cerrar la etiqueta HEADER agregar <?php include_once("lib/Loader.php"); ?> Al final del archivo en php justo antes de cerrar la etiqueta BODY agregar 

**JAVA SCRIPT:**

    <script src="lib/auth/PaycoreAuthCode.js"> </script>

Felicitaciones ha integrado pagos a través de Paycores en su página web.

 ## Recomendaciones: ##

El servicio de nuestra Api requiere de que los servidores cuenten con un certificado TLS debidamente firmado, y el proyecto debe de estar bien estructurado con el código limpio para que el certificado TLS SSL funcione correctamente. 

No utilizar certificados de curva eliptica
O aquellos que cuenten con la suite de cifrado ECDHE_ECDSA_WITH_RC4_128_SHA en tus peticiones de pago esto de manera temporal. 

Servidor con configuración requerida
Su servidor debe de contar con la configuración requerida para que procese servicios en diferentes lenguajes, se recomienda que configure Java, C#, VB, PHP, y certificado de seguridad TLS, etc.
