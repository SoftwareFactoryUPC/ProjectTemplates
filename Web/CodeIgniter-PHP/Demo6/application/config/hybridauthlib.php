<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => '/hauth/endpoint',

		"providers" => array (
			// openid providers
			"OpenID" => array (
				"enabled" => true
			),

			"Yahoo" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ),
			),

			"AOL"  => array (
				"enabled" => true
			),

			"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "122969425422-catjsu1dp7jagm5b5o2ap89o0eh1sfo0.apps.googleusercontent.com", "secret" => "uNmdhpOfIIxpny0CycsVJ4se
" ),
				"redirect_uri"   => "http://localhost:8080/Demo2-redes/hauth/endpoint"   
			),

			"Facebook" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "623391354508668", "secret" => "37f0363a094e0dfdabcbfe579c7401d1" ),
				'scope'   => 'email, public_profile, user_friends',
                'trustForwarded' => false
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "BmkJcP6eCriKAnBZVviTKOI3G", "secret" => "34N2u7r1HZAjf1OhfiPFEcmuqfzVWhMOGifOWZcMHznUJ4U7am" )
			),

			// windows live
			"Live" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "a3601fff-8be2-4390-991e-bfc58ed24461
", "secret" => "rbaDxAGheU5nRSDROzbDbz6" )
			),

			"MySpace" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"LinkedIn" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "77sgmedux1xdcr
", "secret" => "ySSbZzsj3KJOnWuh" ),
				'scope' => 'r_basicprofile, r_emailaddress, rw_company_admin'
			),

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "MTJWROQEBDLAMMEJBWD2YQ1SBAF1OHBIN1KLTDJ1TYHOJY43", "secret" => "MPGKDX23ZOGKL1K1NDXLRTAQKJVPH4RWN1L3PRJPTANRDD1E" )
			),

			"Github"   => array (
			    "enabled" => true,
			    "keys"    => array (
			        "id"     => "6d9f79f7dea578d0d2bf",
			        "secret" => "47d9d6d20a73de2a7bb45e2568240ddb77bf1dc2")
			   ),

			 "Instagram" => array (
                "enabled" => true,
                "keys"    => array ( 
                	"id" => "8cc9b6de33df4aada0b11bbf4157ae0b", 
                	"secret" => "1ed5104ebffb4c0b96c8123c3063d353 " )

                ),
			 "Slack" => array (
                "enabled" => true,
                "keys"    => array ( 
                	"id" => "28833977922.79731141669", 
                	"secret" => "eaaba39e57763ce7c66608ecc9e371f0 " ),
                	"scope" => "read"

                )
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => (ENVIRONMENT == 'development'),

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */