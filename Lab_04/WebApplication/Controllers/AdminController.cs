using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Security;

namespace WebApplication.Controllers
{
    public class AdminController : Controller
    {
        // GET: Admin
        [AuthLog(Roles = "Admin")]
        public ActionResult Index()
        {
            return View();
        }
    }
}