<?php
//----------CONFIG MERCADOPAGO--------------------------------------------------------
define('ENV_PUBLIC_KEY','TEST-228223e9-bf5e-44e8-addc-ce07719c2ed4');
define('ENV_ACCESS_TOKEN','TEST-4595810000936907-072214-41c06a876bf09298517b02fda5442845-11138814');
define('ENV_BASE_URL',base_url());
//------------------------------------------------------------------------------------
//--------------CONFIG PAYPAL---------------------------------------------------------
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
//---------------------------------------------------------------------------------------
?>