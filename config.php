<?php
require_once('vendor/autoload.php');

//pruebas
/*$stripe = array(
    'secret_key' => 'sk_test_4qeORmbbBs4BOcFZnsToWH1l',
    'publishable_key' => 'pk_test_EGAPBj1LAN1cRR5LQ5cbcgzj',
);*/

$stripe = array(
    'secret_key' => 'sk_live_E7jBH8MBhkXPTysnpgb6JcLD',
    'publishable_key' => 'pk_live_6Yac8LKorkfVVfkLYqnXshoT',
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>