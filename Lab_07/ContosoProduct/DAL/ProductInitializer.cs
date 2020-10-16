using ContosoProduct.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace ContosoProduct.DAL
{
    public class ProductInitializer : System.Data.Entity.DropCreateDatabaseIfModelChanges<ProductContext>
    {
        protected override void Seed(ProductContext context)
        {
            var Categorys = new List<Category>
            {
                new Category{CategoryName="Food"},
            };

            Categorys.ForEach(s => context.Categories.Add(s));
            context.SaveChanges();

            var Products = new List<Product>
            {
                new Product{CategoryID=1, Name="noodles", Price=5000},
            };

            Products.ForEach(s => context.Products.Add(s));
            context.SaveChanges();
        }
    }
}