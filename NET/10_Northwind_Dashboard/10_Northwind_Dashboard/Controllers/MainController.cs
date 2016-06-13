using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using _10_Northwind_Dashboard.Models;

namespace _10_Northwind_Dashboard.Controllers
{
    public class MainController : Controller
    {
        private NORTHWNDEntities db = new NORTHWNDEntities();

        // GET: Main
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult Shop()
        {
            return View();
        }

        public ActionResult About()
        {
            return View();
        }

        public JsonResult GetProducts()
        {
            var dbResult = db.Products.ToList().Where(x=>x.Discontinued==false);
            var result = (from row in dbResult
                          select new
                          {
                              row.ProductID,
                              row.ProductName,
                              row.UnitPrice,
                              row.UnitsInStock
                          });
            return Json(result, JsonRequestBehavior.AllowGet);
        }
    }
}