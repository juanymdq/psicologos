<?php
//----------CONFIG MERCADOPAGO--------------------------------------------------------
//USER DE PRUEBAS: test_user_9596410@testuser.com
//PASS: qatest697
define('ENV_PUBLIC_KEY','TEST-a9ce1460-6036-4fe9-83b4-417e668d196d');
define('ENV_ACCESS_TOKEN','TEST-4747615753113302-062610-ec6a0ed116443bcf715697849f259083-593026235');
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
	//SANDBOX ACCOUNT
	//sb-uvar72307262@business.example.com
	define("PayPalClientId", "AfeSAofRYcRnnG8UbnaTc0o4jDzIdFHsgiO-MMexWPCTEtoCHPngrqifL2KkkPqSxv9Whz--zV-5Kuvu");
	define("PayPalSecret", "EKY91TrmxX0my2bSIbxw8WCrPnSZN0HbJrSXZ3Og666CF1iPjgyN70OW475xX5tb1eSfNKQKAeNr7N2X");
	//define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");	
	define("PayPalBaseUrl", "http://localhost/paypal/");
	define("PayPalENV", "sandbox");
}
//---------------------------------------------------------------------------------------
?>