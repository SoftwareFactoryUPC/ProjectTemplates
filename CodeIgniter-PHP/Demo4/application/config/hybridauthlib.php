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
				"keys"    => array ( "id" => "", "secret" => "" ),
			),

			"Facebook" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "1026594830788708", "secret" => "c8f6b988b0f638ec44dd3bb146c62f44" ),
				"scope"   => "email, public_profile"
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "BmkJcP6eCriKAnBZVviTKOI3G", "secret" => "34N2u7r1HZAjf1OhfiPFEcmuqfzVWhMOGifOWZcMHznUJ4U7am" )
			),

			// windows live
			"Live" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"MySpace" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"LinkedIn" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"Github" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "6d9f79f7dea578d0d2bf", "secret" => "47d9d6d20a73de2a7bb45e2568240ddb77bf1dc2" )
			),
			"Tumblr" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "AFKu48GKbP3cgUSP33txCxqThH4298YQSlTKkXTnrOwXP8J1uz", "secret" => "ZTViiZDOc1sq5Ix6wQaruU8ddhMTDTv885NF6z19Q2hTq0V3vJ" )
			)

		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => (ENVIRONMENT == 'development'),

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */