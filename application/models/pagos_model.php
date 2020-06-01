<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagos_model extends CI_Model {

    function payment_mode(){
     /*   MercadoPago\SDK::setAccessToken("TEST_ACCESS_TOKEN");

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Producto 1';
        $item->quantity = 1;
        $item->unit_price = 300; //Detalle aca, si tu previamente tienes configurado en tu cuenta que eres de algun pais que no maneje decimales en el valor, el valor debe ser entero, sino mercadopago arrojara error
        $preference->items = array($item);
        $preference->save();
        echo $preference->status;*/


 
        $token = $_POST['stripeToken'];
        $email = $_POST['stripeEmail'];
        
        $customer = \Stripe\Customer::create([
        'email' => $email,
        'source'  => $token,
        ]);
        
        $charge = \Stripe\Charge::create([
        'customer' => $customer->id,
        'amount'   => 100,
        'currency' => 'eur',
        ]);
        
        return '<h1>Successfully charged 1€!</h1>';
            

    }


}