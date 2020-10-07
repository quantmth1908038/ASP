using Product.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Product.Repository
{
    public class DbHelper
    {
        public ProductM CreateProduct(ProductM productModel)
        {
            using (var dbEntities = new ProductContext())
            {
                var productObj = new ProductM()
                {
                    //ID is auto generated.
                    Name = productModel.Name,
                    Price = productModel.Price
                    
                };
                dbEntities.ProductMs.Add(productObj);
                dbEntities.SaveChanges();
                productModel.Id = productObj.Id;
            }
            return productModel;
        }

        public List<ProductM> GetAllProduct(List<ProductM> productModel)
        {
            using (var dbEntities = new ProductContext())
            {
                var productObj = dbEntities.ProductMs.ToList();
                productModel = productObj;
            }
            return productModel;
        }

        public ProductM DeleteProduct(ProductM productModel, int id)
        {
            using (var dbEntities = new ProductContext())
            {
                var productObj = dbEntities.ProductMs.SingleOrDefault(e => e.Id == id);

                dbEntities.ProductMs.Remove(productObj);
                dbEntities.SaveChanges();
                productModel.Id = productObj.Id;
            }
            return productModel;
        }

        public ProductM UpdateProduct(ProductM productModel)
        {
            using (var dbEntities = new ProductContext())
            {
                var productObj = new ProductM()
                {
                    //ID is auto generated.
                    Id = productModel.Id,
                    Name = productModel.Name,
                    Price = productModel.Price

                };

                dbEntities.Entry(productObj).State = System.Data.Entity.EntityState.Modified; ;
                dbEntities.SaveChanges();
                productModel.Id = productObj.Id;
            }
            return productModel;
        }
    }
}