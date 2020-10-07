using Bank.Models;
using Bank.Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Bank
{
    public class CustomerRepository
    {
        public Customer PostStudentDetails(Customer CustomerModel)
        {
            DbHelper dbInstance = new DbHelper();
            return dbInstance.CreateStudent(CustomerModel);
        }

    }
}