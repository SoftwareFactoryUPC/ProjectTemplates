<?php
	$this->load->helper('url');
	echo anchor('hauth/login/Google','Login With Google.').'<br />';
	
	echo anchor('hauth/login/Twitter','Login With Twitter.').'<br />';
	
	echo anchor('hauth/login/Facebook','Login With Facebook.').'<br />';
	
	echo anchor('hauth/login/Slack','Login With Slack.').'<br />';
	echo anchor('hauth/login/Github','Login With GitHub.').'<br />';
	echo anchor('hauth/login/Live','Login With Live.').'<br />';
    echo anchor('hauth/login/Foursquare','Login With Foursquare.').'<br />';


?>

<a href="<?php echo base_url()?>hauth/login/Google">Login With Google</a>
