<?php
require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken(ENV_ACCESS_TOKEN);

// Crea un objeto de preferencia

$preference = new MercadoPago\Preference();

// Crea un ítem en la preferenci
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 150;

$preference->items = array($item);

$preference->payment_methods = array(       
    "installments" => 1
  );
  
$preference->back_urls = array(
    "success" => base_url()."/turnos/redirectmp?type=1&idTurno=".$_GET['id_turno'],
    "failure" => base_url()."/turnos/redirectmp?type=2",
    "pending" => base_url()."/turnos/redirectmp?type=3&idTurno=".$_GET['id_turno'],
);
//$preference->auto_return = "approved";
$preference->save();



?>