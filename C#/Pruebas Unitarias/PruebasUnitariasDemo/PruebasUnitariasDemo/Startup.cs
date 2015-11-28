using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(PruebasUnitariasDemo.Startup))]
namespace PruebasUnitariasDemo
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
