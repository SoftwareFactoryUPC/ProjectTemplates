var messagebox = document.getElementById("messagebox");
var username = document.getElementById("username");
var chatcontainer = document.getElementById("chat");
var conn;

username.addEventListener('keypress', function(evt) {
    if (evt.keyCode != 13 || this.value == "")
        return;

    evt.preventDefault();

    var name = this.value;
    this.style.display = "none";
    chatcontainer.style.display = "block";

    conn = new Connection(name, "chatwindow", "127.0.0.1:2001","users");
});

messagebox.addEventListener('keypress', function(evt) {
    if (evt.keyCode != 13 || conn == undefined)
        return;

    evt.preventDefault();

    if (this.value == "")
        return;

    conn.sendMsg(this.value);

    this.value = "";
});
