using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(VideoOnline.Startup))]
namespace VideoOnline
{
    public partial class Startup {
        public void Configuration(IAppBuilder app) {
            ConfigureAuth(app);
        }
    }
}
