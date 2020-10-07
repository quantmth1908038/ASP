using Bank.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Bank.Repository
{
    public class DbHelper
    {
        public Customer CreateStudent(Customer studentModel)
        {
            using (var dbEntities = new BankContext())
            {
                var studentObj = new Customer()
                {
                    //ID is auto generated.
                    Name = studentModel.Name,
                    Gender = studentModel.Gender,
                    Amount = studentModel.Amount
                };
                dbEntities.Customers.Add(studentObj);
                dbEntities.SaveChanges();
                studentModel.Id = studentObj.Id;
            }
            return studentModel;
        }

    }
}