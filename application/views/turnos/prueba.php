<?php
        require 'vendor/autoload.php';
// Agrega credenciales
        MercadoPago\SDK::setAccessToken('TEST-4595810000936907-072214-41c06a876bf09298517b02fda5442845-11138814');


        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = 100;
        $payment->description = "Título del producto";
        $payment->payment_method_id = "rapipago";
        $payment->payer = array(
            "email" => "test_user_19653727@testuser.com"
        );

        $payment->save();
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<form action="" method="POST">
  <script
   src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
   data-preference-id="<?php echo $preference->id; ?>">
  </script>
</form>
</body>
</html>