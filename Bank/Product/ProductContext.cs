using Product.Models;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace Product
{
    public class ProductContext : DbContext
    {
        public DbSet<ProductM> ProductMs { get; set; }
    }
}