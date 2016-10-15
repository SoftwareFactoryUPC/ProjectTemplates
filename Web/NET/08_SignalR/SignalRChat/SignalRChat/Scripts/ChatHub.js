$(function () {

    // Reference the auto-generated proxy for the hub.
    var chat = $.connection.chatHub;



    // Create a function that the hub can call back to display messages.
    chat.client.addNewMessageToPage = function (name,picture, message) {
        // Add the message to the page.
        $('#discussion').append('<li class="you">'
            + '<a class="user" href="#"><img alt="" src="' + htmlEncode(picture) + '" /></a>'
            + '<div class="date">' + htmlEncode(name) + '</div>'
            + '<div class="message">'
            + '<p>' + htmlEncode(message) + '</p></div></li>');
    };



    // Get the user name and store it to prepend to messages.
    var name = prompt('Enter your name:', '');
    if (name != null && name!='') {
        $('#displayname').val(name);
    }
    else
    {
        name = "Default";
        $('#displayname').val(name);
    }


    //Obtiene el avatar del usuario
    var picture = prompt('Enter the url of an image:', '');
    if (picture != null && picture != '') {
        $('#displaypicture').val(picture);
        $('#preview').attr('src', picture) ;
    }
    else {
        picture = "https://media.licdn.com/mpr/mpr/shrinknp_200_200/p/4/005/06e/3b0/05b5373.jpg"
        $('#displaypicture').val(picture);
        $('#preview').attr('src', picture);
    }



    // Set initial focus to message input box.
    $('#message').focus();



    // Start the connection.
    $.connection.hub.start().done(function () {

        $('#sendmessage').click(function () {
            // Call the Send method on the hub.
            chat.server.send($('#displayname').val(), $('#displaypicture').val(), $('#message').val());
            // Clear text box and reset focus for next comment.
            $('#message').val('').focus();
        });

        $('#confirm').click(function () {
            $('.container_chat').show();
            $('.container_user').hide();
            //Update nav
            $('#final_displayname').text(name);
            $('#final_displaypicture').attr('src', picture);

            // Call the New_User method on the hub.
            chat.server.update(name,picture);
        })
    });

    //Invoca la expresion dinamica que indica la cantidad de usuarios conectados
    chat.client.online = function (count) {
        $('#counter').text(count);
    }

    //Invoca la expresion dinamica que indica el listado de usuarios
    chat.client.getUsers = function (list) {
        $("#list_of_users").empty();
        var myObject = eval('(' + list + ')');
        for (i in myObject) {
            //Itero sobre solo el atributo name de la clase recibida en JSON
            $("#list_of_users").append("<li>" +
                "<img src='" + myObject[i]["url"] + "' alt='Avatar' height='30' width='30'> " +
                myObject[i]["name"] +
                "</li>");
        }        
    }
});
// This optional function html-encodes messages for display in the page.
function htmlEncode(value) {
    var encodedValue = $('<div />').text(value).html();
    return encodedValue;
}