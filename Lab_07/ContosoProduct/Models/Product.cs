using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace ContosoProduct.Models
{
    public class Product
    {
        public int ID { get; set; }
        public int CategoryID { get; set; }
        public string Name { get; set; }
        public double Price { get; set; }

        public virtual Category Category { get; set; }
    }
}