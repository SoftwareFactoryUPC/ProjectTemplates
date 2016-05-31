using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Microsoft.AspNet.SignalR;
//Importaciones
using System.Web.Mvc;
using System.Web.Script.Serialization;
using SignalRChat.Models;

namespace SignalRChat.Hubs
{
    public class ChatHub : Hub
    {
        static List<User> users = new List<User>();
        static long counter = 0;//Contar usuarios conectados

        public void Send(string name, string picture, string message)
        {
            // Call the addNewMessageToPage method to update clients.
            Clients.All.addNewMessageToPage(name,picture, message);
        }

        public void Update(string name,string url)
        {
            var context = GlobalHost.ConnectionManager.GetHubContext<ChatHub>();

            User aux = new User();
            aux.id=Context.ConnectionId;
            aux.name=name;
            aux.url = url;
            users.Add(aux);

            UpdateHub();//Actualiza listado
        }
        
        public override System.Threading.Tasks.Task OnConnected()
        {
            counter = counter + 1;//Nuevo usuario conectado
            var context = GlobalHost.ConnectionManager.GetHubContext<ChatHub>();
            context.Clients.All.online(counter);
            return base.OnConnected();
        }

        public override System.Threading.Tasks.Task OnReconnected()
        {
            counter = counter + 1;//Usuario re-conectado
            var context = GlobalHost.ConnectionManager.GetHubContext<ChatHub>();
            context.Clients.All.online(counter);
            return base.OnReconnected();
        }

        public override System.Threading.Tasks.Task OnDisconnected(bool stopCalled)
        {
            counter = counter - 1;//Usuario desconectado
            var context = GlobalHost.ConnectionManager.GetHubContext<ChatHub>();
            context.Clients.All.online(counter);

            string current_id = Context.ConnectionId;//Id de la conexion
            users.RemoveAll(x=>x.id==current_id);

            UpdateHub();//Actualiza listado
            return base.OnDisconnected(stopCalled);
        }

        public void UpdateHub()
        {
            var context = GlobalHost.ConnectionManager.GetHubContext<ChatHub>();
            //Actualizar usuarios
            JavaScriptSerializer jss = new JavaScriptSerializer();
            string output = jss.Serialize(users);

            context.Clients.All.getUsers(output);
        }
    }
}