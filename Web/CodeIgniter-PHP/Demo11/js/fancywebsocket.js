var FancyWebSocket = function(url)
{
	var callbacks = {};
	var ws_url = url;
	var conn;
	
	this.bind = function(event_name, callback)
	{
		callbacks[event_name] = callbacks[event_name] || [];
		callbacks[event_name].push(callback);
		return this;
	};
	
	this.send = function(event_name, event_data)
	{
		this.conn.send( event_data );
		return this;
	};
	
	this.connect = function() 
	{
		if ( typeof(MozWebSocket) == 'function' )
		this.conn = new MozWebSocket(url);
		else
		this.conn = new WebSocket(url);
		
		this.conn.onmessage = function(evt)
		{
			dispatch('message', evt.data);
		};
		
		this.conn.onclose = function(){dispatch('close',null)}
		this.conn.onopen = function(){dispatch('open',null)}
	};
	
	this.disconnect = function()
	{
		this.conn.close();
	};
	
	var dispatch = function(event_name, message)
	{
		if(message == null || message == "")//aqui es donde se realiza toda la accion
			{
			}
			else
			{
				moverpieza(message);
			}
	}
};

var Server;
function send( text ) 
{
    Server.send( 'message', text );
}
$(document).ready(function() 
{
	Server = new FancyWebSocket('ws://127.0.0.1:2000');
    Server.bind('open', function()
	{
    });
    Server.bind('close', function( data ) 
	{
    });
    Server.bind('message', function( payload ) 
	{
    });
    Server.connect();
});

