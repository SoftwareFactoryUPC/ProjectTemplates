using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(Login_Facebook.Startup))]
namespace Login_Facebook
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
