using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace WebApplication.Controllers
{
    public class UserController : Controller
    {
        // GET: User
        [AuthLog(Roles = "User")]
        public ActionResult Index()
        {
            return View();
        }
    }
}