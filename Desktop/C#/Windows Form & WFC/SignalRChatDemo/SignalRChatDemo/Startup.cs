using System;
using System.Threading.Tasks;
using Microsoft.Owin;
using Owin;

[assembly: OwinStartup(typeof(SignalRChatDemo.Startup))]

namespace SignalRChatDemo
{
    public class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            app.UseStaticFiles();
            app.MapSignalR();

        }
    }
}
