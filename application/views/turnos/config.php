<?php
define('ProPayPal', 0);
if(ProPayPal){
	define("PayPalClientId", "*********************");
	define("PayPalSecret", "*********************");
	define("PayPalBaseUrl", "https://api.paypal.com/v1/");
	
	define("PayPalENV", "production");
} else {
	define("PayPalClientId", "AfeSAofRYcRnnG8UbnaTc0o4jDzIdFHsgiO-MMexWPCTEtoCHPngrqifL2KkkPqSxv9Whz--zV-5Kuvu");
	define("PayPalSecret", "EKY91TrmxX0my2bSIbxw8WCrPnSZN0HbJrSXZ3Og666CF1iPjgyN70OW475xX5tb1eSfNKQKAeNr7N2X");
	//define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");	
	define("PayPalBaseUrl", "http://localhost/paypal/");
	define("PayPalENV", "sandbox");
}
?>