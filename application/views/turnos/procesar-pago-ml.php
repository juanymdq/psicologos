<?php
require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken(ENV_ACCESS_TOKEN);

// Crea un objeto de preferencia

$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 150;

$preference->items = array($item);

$preference->payment_methods = array(       
    "installments" => 1
  );
  
$preference->back_urls = array(
    "success" => base_url()."/turnos/redirectmp?type=1&idTurno=".$_GET['id'],
    "failure" => base_url()."/turnos/redirectmp?type=2",
    "pending" => base_url()."/turnos/redirectmp?type=3&idTurno=".$_GET['id'],
);
//$preference->auto_return = "approved";
$preference->save();

//DEVOLUCION DE LLAMADA GET A MERCADOPAGO CON TARJETA
/*http://localhost/pagos/checkout.php?
preference_id=593026235-d61e75af-bbd0-4db0-81dc-a1e5d76c5aea&
external_reference=&
back_url=&
payment_id=27411647
&payment_status=approved
&payment_status_detail=accredited
&merchant_order_id=1550168226
&processing_mode=aggregator
&merchant_account_id=

//----------------------------------------------------------------------------------

//DEVOLUCION DE LLAMADA GET A MERCADOPAGO EFECTIVO
http://localhost/pagos/checkout.php?
preference_id=593026235-2a0f2a10-4028-40e5-8f54-a7e537e858ba
&external_reference=
&back_url=http%3A%2F%2Floaclhost%2Fpagos%2Fpending.php%3Fcollection_id%3D27413010%26collection_status%3Dpending%26external_reference%3Dnull%26payment_type%3Dticket%26merchant_order_id%3D1550177887%26preference_id%3D593026235-2a0f2a10-4028-40e5-8f54-a7e537e858ba%26site_id%3DMLA%26processing_mode%3Daggregator%26merchant_account_id%3Dnull
&payment_id=27413010
&payment_status=pending
&payment_status_detail=pending_waiting_payment
&merchant_order_id=1550177887
&processing_mode=aggregator
&merchant_account_id=
*/
?>