<!DOCTYPE html>
<html>
<head>
  <style>
  
.icono-pago {
    width: 50px;
    height: 50px;
}
.icono-paypal {
    width: 120px;
    height: 50px;
}
#mercadopago, #paypal {
    display: none;
}
  </style>

</head>
<body>  

<div class="container">
    
    <form name="pagos" action="<?=base_url('turnos/success_checkout')?>">

        <div class="mpago">
            <input type="radio" id="btn-pago" name="pago" value="mercadopago" onclick="pagar()" >
            <label for="btn-pago"></label> <img src="<?=base_url()?>application/assets/img/mercadopago.png" class="icono-pago">
            <label>Pagar con MercadoPago - Clientes de Argentina</label>
        </div> 
        <div class="paypal">
            <input type="radio" id="btn-pago" name="pago" value="paypal" onclick="pagar()">
            <label for="btn-pago"></label> <img src="<?=base_url()?>application/assets/img/paypal.png" class="icono-paypal">
            <label>Pagar con Paypal - Pago en dolares USD</label>
        </div> 
    </form> 


   
    
    <div class="mercadopago" id="mercadopago">
    <a 
        href="https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=11138814-fdf02b8c-d47f-49bb-8d44-92a4b0b9e01f" 
        target="blank"
        class="btn btn-success"
    >
        Pagar
    </a>
    </div>
   
  
    <div class="paypal" id="paypal">
        <?php 
        include('config.php');
        $productName = "Producto Demostración";
        $currency = "USD";
        $productPrice = 25;
        $productId = 123456;
        $orderNumber = 546;
        ?>
        <div class="container">
            <table class="table">
                <tr>          
                <td style="width:150px">$<?php echo $productPrice; ?></td>          
                <?php include 'paypalCheckout.php'; ?>
                </td>
                </tr>
            </table>		
        </div>

    </div>

    </div>

<script>        
    function pagar(){
        var radioButTrat = document.getElementsByName("pago");

        for (var i=0; i<radioButTrat.length; i++) {

            if (radioButTrat[i].checked == true) { 
                nombre = document.pagos.pago[i].value; 
                if(nombre=='mercadopago'){
                    $('#mercadopago').show(400);
                    $('#paypal').hide();
                }else{                    
                    $('#mercadopago').hide();
                    $('#paypal').show(400);
                }   
            }

        }
    }
    </script>

</body>
</html>