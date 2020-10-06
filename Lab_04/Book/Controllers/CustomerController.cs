using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Book.Models;
using Microsoft.AspNetCore.Mvc;

namespace Book.Controllers
{
    public class CustomerController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Create()
        {
            return View();
        }

        //POST: Customer/Create
        [HttpPost]
        [ValidateAntiForgeryToken]
        public IActionResult Create(
            [Bind("Name,Emailid")] CustomerModel customerModel)
        {
            if (ModelState.IsValid)
            {

                return RedirectToAction("Index");
            }
            return View(customerModel);
        }

    }
}
