<?php
require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken(ENV_ACCESS_TOKEN);


// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 100;
$preference->items = array($item);
$preference->save();

?>