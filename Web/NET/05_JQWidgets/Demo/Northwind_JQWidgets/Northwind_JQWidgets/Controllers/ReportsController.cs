using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using Northwind_JQWidgets.Models;

namespace Northwind_JQWidgets.Controllers
{
    public class ReportsController : Controller
    {
        private NORTHWNDEntities db = new NORTHWNDEntities();

        // GET: Reports
        public ActionResult Index()
        {
            return View();
        }

        public JsonResult GetEmployees()
        {
            var dbResult = db.Employees.ToList();
            var employees = (from employee in dbResult
                             select new
                             {
                                 FullName=employee.FirstName+' '+employee.LastName,
                                 employee.EmployeeID,
                                 employee.HireDate
                             });
            return Json(employees, JsonRequestBehavior.AllowGet);
        }
        
        public JsonResult GetOrders()
        {
            var dbResult = db.Orders.ToList();
            var orders = (from order in dbResult
                          group order by order.ShipCountry into result
                          select new
                          {
                              ShipCountry = result.Key,
                              Q = result.Count()
                          });
            return Json(orders, JsonRequestBehavior.AllowGet);
        }
    }
}