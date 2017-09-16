/**
 * Javascript encargado de la generacion y validacion de datos, escenciales para la
 * realizacion de la transferencia en los sistemas de Paycores, en donde se utilizan
 * las configuraciones definidas en los archivos lib/Paycoresconfig y lib/PaycoresUtils
 */
//funcion que genera la peticion para la creacion y registro del codigo de ventaunico para la transaccion.
paycoresAccessKey   = paycores_settings["paycores_access_key"];
paycoresAccessLogin = paycores_settings["paycores_access_login"];
var data = { 'paycoresKey':paycoresAccessKey,'paycoresLogin':paycoresAccessLogin };
$.ajax({
    url: paycores_conf["paycores_host"]+'business-tools/genPurCodeApi/',
    type:'POST',
    data: data,
    success : function(response){
    obj = JSON.parse(response);
        if(obj.res==="done"){
        valuePruchase = document.getElementById('purchaseCode').value = obj.purchaseCode;
        $('body').append( obj.fingerGen);
        }else{
            alert(obj.message);
        }
    }
});


/**
 * Funcion que inicia el proceso de transaccion, en el cual el primer paso es,
 * la generacion y envio al email ingresado, el codigo de seguridad para
 * la transaccion a ser realizada.
 */
function startTransaction() {
    valuePruchase   = document.getElementById('purchaseCode').value;
    valueEmail      = document.getElementById('paycores_api_usr_email').value;
    valueName       = document.getElementById('paycores_api_usr_name').value;
    //se valida la existencia de los valores requeridos
    if (!valueEmail ||  !valueName || valueEmail=="" ||  valueName=="" ){
        console.log("Valores del email y nombre de usuario nulos o vacios");
    }else{
        var data = { 'data':valuePruchase,'user':valueEmail,'name':valueName };
        $.ajax({
            url:paycores_conf["paycores_host"]+'business-tools/sendCodeBuyClientApi',
            type:'POST',
            data:data,
            success : function(response){
                obj = JSON.parse(response);
                console.log(obj.res);
                if(obj.res==="done"){
                    $("#paycoresModal").modal('show');
                }else{
                    alert(obj.message);
                    $("#paycoresModal").modal('show');
                }
            }
        });
    }
}

/**
 *Funcion encargada de validar el codigo de seguridad ingresado, con el
 * generado y registrado en el sistema, para proseguir con la trnasaccion
 */
function ValSecureCode() {
    valueCode       = document.getElementById('codeSecure').value;
    valuePruchase   = document.getElementById('purchaseCode').value;
    var data = { 'data':valueCode,'dataPur':valuePruchase };
    $.ajax({
        url: paycores_conf["paycores_host"]+'business-tools/validateCodeApi',
        type:'POST',
        data:data,
        success : function(response){
            obj = JSON.parse(response);
            if(obj.res==="done"){
            document.getElementById("codeSecureForm").value = valueCode;
            finishTransfer();
            }else{
                alert(obj.message);
            }
        }
    });
}

/**
 * Funcion que realiza el paso final de la transaccion,en donde
 * se envian los datos ingresados, se validan con los generados para
 * asegurar la integridad y seguridad de la misma, y retorna el resultado
 * de la misma.
 */
function finishTransfer()
{
    $.ajax({
        url:paycores_conf["paycores_order"],
        type:'POST',
        data: $("#paycors-form").serialize(),
        success : function(response){
            console.log(response);
            console.log("************************************************");
            obj =  JSON.parse(response);
            if(obj.res==="done"){
                $("#paycoresModal").modal('hide');
            }else{
                alert(obj.message);
            }
        }
    });
}
