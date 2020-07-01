<?php
if(!empty($_GET['paymentID']) && !empty($_GET['payerID']) && !empty($_GET['token']) && !empty($_GET['pid']) ){
        $paymentID = $_GET['paymentID'];
        $payerID = $_GET['payerID'];
        $token = $_GET['token'];
        $pid = $_GET['pid'];   
        ?>
        <div class="alert alert-success">
          <strong>Success!</strong> Your order processed successfully.
        </div>
        <table>       
            <tr>
              <td>Payment Id:  <?php echo $paymentID; ?></td>
              <td>Payer Id: <?php echo $payerID; ?></td>
              <td>product Id: <?php echo $pid; ?></td>
              <td><?php  ?></td>
            </tr>       
        </table>
    <?php   
    } else {
        header('Location:'.base_url());
    }

    /*
REQUEST DE PAGO PAYPAL
http://localhost/paypal/orderDetails.php
?paymentID=PAYID-L35PTCI57L35591N8867284J
&payerID=6GTHNUCQG96VG
&token=EC-2A6530726S322835U
&pid=1

*/
?>