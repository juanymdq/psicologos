<?php

    //TODO: RECORDAR QUE HAY QUE AGREGAR ESTA PAGINA A LAS NOTIFICACIONES DE MERCADO PAGO
    //TODO: PARA COMPROBAR LOS PAGOS PRESENCIALES

    include 'config.php';

    MercadoPago\SDK::setAccessToken(ENV_ACCESS_TOKEN);

    $merchant_order = null;

    switch($_GET["topic"]) {
        case "payment":
            $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
            // Get the payment and the corresponding merchant_order reported by the IPN.
            $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
            break;
        case "merchant_order":
            $merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
            break;
    }

    $paid_amount = 0;
    foreach ($merchant_order->payments as $payment) {
        if ($payment['status'] == 'approved'){
            $paid_amount += $payment['transaction_amount'];
        }
    }

    // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items
    if($paid_amount >= $merchant_order->total_amount){       
        // The merchant_order don't has any shipments
        //redirige al controlador turnos, metodo ipn
        header("location:".base_url('turnos/ipn')."?merchant_order=".$merchant_order."&status=".$payment['status']);
    } else {
        print_r("El pago no ha sido realizado. El turno no se efectivizara hasta que el pago no se concrete.");
    }

?>