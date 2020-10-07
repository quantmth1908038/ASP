using Bank.Models;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace Bank
{
    public class BankContext: DbContext
    {
        public DbSet<Customer> Customers { get; set; }
    }
}