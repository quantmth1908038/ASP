using Bank.Models;
using Bank.Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Web.Http.Cors;

namespace Bank.Controllers
{
    public class CustomerController : ApiController
    {
        [HttpPost]
        [Authorize]
        public string PostStudentDetail(Customer studentModel)
        {
            DbHelper dbHelper = new DbHelper();
            studentModel = dbHelper.CreateStudent(studentModel);
            return "Success";
        }

    }
}
