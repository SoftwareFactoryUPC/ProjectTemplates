using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using _10_Northwind_Dashboard.Models;

namespace _10_Northwind_Dashboard.Controllers
{
    public class AdminSalesController : Controller
    {
        private NORTHWNDEntities db = new NORTHWNDEntities();

        // GET: AdminSales
        public ActionResult Index()
        {
            return View();
        }
        public JsonResult GetOrders()
        {
            var dbResult = db.SF_GetOrdersFromCountryPerYear().ToList();
            var orders = (from row in dbResult
                          select new
                          {
                              row.ShipCountry,
                              row.q_96,
                              row.q_97,
                              row.q_98,
                              row.cash_96,
                              row.cash_97,
                              row.cash_98
                          });
            return Json(orders, JsonRequestBehavior.AllowGet);
        }
        public JsonResult GetOrdersPerPeriod(string filter)
        {
            var dbResult = db.SF_GetSalesPerPeriod().ToList().Where(x=>x.anio==Int32.Parse(filter));
            var orders = (from row in dbResult
                          select new
                          {
                              row.full_date,
                              row.q,
                              row.cash
                          });
            return Json(orders, JsonRequestBehavior.AllowGet);
        }
    }
}