<?php
// prevent the server from timing out
set_time_limit(0);

// include the web sockets server script (the server is started at the far bottom of this file)
require 'clases/class.PHPWebSocket.php';

// when a client sends data to the server
function wsOnMessage($clientID, $message, $messageLength, $binary) 
{
	global $Server;
	$ip = long2ip( $Server->wsClients[$clientID][6] );

	// check if message length is 0
	if ($messageLength == 0) {
		$Server->wsClose($clientID);
		return;
	}

	//The speaker is the only person in the room. Don't let them feel lonely.
	if ( sizeof($Server->wsClients) == 1 )
		$Server->wsSend($clientID, "");
	else
		//Send the message to everyone but the person who said it
		foreach ( $Server->wsClients as $id => $client )
			//if ( $id != $clientID )
				//$Server->wsSend($id, "Visitor $clientID ($ip) said \"$message\"");
				//aqui recibimos la accion con los demas parametros e identificadores
				$Server->wsSend($id,$message);
}

// when a client connects
function wsOnOpen($clientID)
{
	global $Server;
	$ip = long2ip( $Server->wsClients[$clientID][6] );

	$Server->log( "" );

	//Send a join notice to everyone but the person who joined
	foreach ( $Server->wsClients as $id => $client )
		if ( $id != $clientID )
			$Server->wsSend($id, "");
}

// when a client closes or lost connection
function wsOnClose($clientID, $status) {
	global $Server;
	$ip = long2ip( $Server->wsClients[$clientID][6] );

	$Server->log( "" );

	foreach ( $Server->wsClients as $id => $client )
		$Server->wsSend($id, "");
}

$Server = new PHPWebSocket();
$Server->bind('message', 'wsOnMessage');
$Server->bind('open', 'wsOnOpen');
$Server->bind('close', 'wsOnClose');

$Server->wsStartServer('127.0.0.1',2000);

?>