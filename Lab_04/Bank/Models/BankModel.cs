using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Bank.Models
{
    public class BankModel
    {
        public int Id { set; get; }
        public string BankName { set; get; }
        public string IFSC { set; get; }
    }
}