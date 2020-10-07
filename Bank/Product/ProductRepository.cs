using Product.Models;
using Product.Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Product
{
    public class ProductRepository
    {
        public ProductM CreateProduct(ProductM ProductModel)
        {
            DbHelper dbInstance = new DbHelper();
            return dbInstance.CreateProduct(ProductModel);
        }
    }
}