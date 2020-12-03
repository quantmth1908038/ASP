using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using HRM.Models;

namespace HRM.Controllers
{
    public class HomeController : Controller
    {
        private IHRMRepository repository;

        public HomeController(IHRMRepository repo)
        {
            repository = repo;
        }

        public ViewResult Index() => View(repository.Employees);
    }
}
