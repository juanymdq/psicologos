<?php
//----------CONFIG MERCADOPAGO--------------------------------------------------------
//USER DE PRUEBAS: test_user_9596410@testuser.com
//PASS: qatest697
define('ENV_PUBLIC_KEY','ENV_PUBLIC_KEY');
define('ENV_ACCESS_TOKEN','ENV_ACCESS_TOKEN');
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
	define("PayPalClientId", "PayPalClientId");
	define("PayPalSecret", "PayPalSecret");
	//define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");	
	define("PayPalBaseUrl", "http://localhost/paypal/");
	define("PayPalENV", "sandbox");
}
//---------------------------------------------------------------------------------------
?>