<div id="paypal-button-container" style="width: 200px; height:50px;"></div>
<div id="paypal-button" style="width: 200px; height:50px;"></div>
	
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>

	paypal.Button.render({
	env: '<?php echo PayPalENV; ?>',
	client: {
		<?php if(ProPayPal) { ?>  
		production: '<?php echo PayPalClientId; ?>'
		<?php } else { ?>
		sandbox: '<?php echo PayPalClientId; ?>'
		<?php } ?>	
	},
	payment: function (data, actions) {
		return actions.payment.create({
		transactions: [{
			amount: {
			total: '<?php echo $productPrice; ?>',
			currency: '<?php echo $currency; ?>'
			}
		}]
		});
	},
	onAuthorize: function (data, actions) {
		return actions.payment.execute()
		.then(function () {			
			document.getElementById('paymentID').value = data.paymentID;
			document.getElementById('payerID').value = data.payerID;
			document.getElementById('paymentToken').value = data.paymentToken;
			$('#formpp').submit();
			//window.location = "<?=base_url()?>turnos/redirectpaypal?paymentID="+data.paymentID+"&payerID="+data.payerID+"&idh=<?=$idh?>"+"&coments="+"&token="+data.paymentToken+"&pid=<?php echo $productId; ?>";
			
		});
	}
	}, '#paypal-button');

</script>

