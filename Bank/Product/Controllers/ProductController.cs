using Product.Models;
using Product.Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace Product.Controllers
{
    public class ProductController : ApiController
    {
        [HttpPost]
        [Authorize]
        public string CreateProduct(ProductM productModel)
        {
            DbHelper dbHelper = new DbHelper();
            productModel = dbHelper.CreateProduct(productModel);
            return "Success";
        }

        [HttpGet]
        [Authorize]
        public List<ProductM> GetAllProduct(List<ProductM> productModel)
        {
            DbHelper dbHelper = new DbHelper();
            productModel = dbHelper.GetAllProduct(productModel);
            return productModel;
        }

        [HttpDelete]
        [Authorize]
        public string DeleteProduct(ProductM productModel, int id)
        {
            DbHelper dbHelper = new DbHelper();
            productModel = dbHelper.DeleteProduct(productModel, id);
            return "Success";
        }

        [HttpPost]
        [Authorize]
        public string UpdateProduct(ProductM productModel)
        {
            DbHelper dbHelper = new DbHelper();
            productModel = dbHelper.UpdateProduct(productModel);
            return "Success";
        }
    }
}
