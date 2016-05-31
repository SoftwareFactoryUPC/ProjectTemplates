using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Ado_Net.Controllers
{
    public class CarController : Controller
    {
        public ActionResult Index()
        {
            ServiceReference1.Service1SoapClient ws = new ServiceReference1.Service1SoapClient();
            return View(ws.List());
        }

        public ActionResult Create()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Create(Ado_Net.ServiceReference1.Car car)
        {
            try
            {
                ServiceReference1.Service1SoapClient ws = new ServiceReference1.Service1SoapClient();
                ws.Create(car);
                return RedirectToAction("Index");
            }
            catch (Exception e)
            {
                TempData["Error"] = e.Message.ToString();
                return RedirectToAction("Create");
            }
        }

        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return View("~/Views/Shared/Error.cshtml");
            }
            ServiceReference1.Service1SoapClient ws = new ServiceReference1.Service1SoapClient();
            Ado_Net.ServiceReference1.Car car=ws.Find(id);
            if (car == null)
            {
                return View("~/Views/Shared/Error.cshtml");
            }
            return View(car);
        }

        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return View("~/Views/Shared/Error.cshtml");
            }
            ServiceReference1.Service1SoapClient ws = new ServiceReference1.Service1SoapClient();
            Ado_Net.ServiceReference1.Car car = ws.Find(id);
            if (car == null)
            {
                return View("~/Views/Shared/Error.cshtml");
            }
            return View(car);
        }

        [HttpPost]
        public ActionResult Edit(Ado_Net.ServiceReference1.Car car)
        {
            try
            {
                ServiceReference1.Service1SoapClient ws = new ServiceReference1.Service1SoapClient();
                ws.Edit(car);
                return RedirectToAction("Index");
            }
            catch (Exception e)
            {
                TempData["Error"] = e.Message.ToString();
                return RedirectToAction("Edit");
            }
        }

        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return View("~/Views/Shared/Error.cshtml");
            }
            ServiceReference1.Service1SoapClient ws = new ServiceReference1.Service1SoapClient();
            Ado_Net.ServiceReference1.Car car = ws.Find(id);
            if (car == null)
            {
                return View("~/Views/Shared/Error.cshtml");
            }
            return View(car);
        }

        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            ServiceReference1.Service1SoapClient ws = new ServiceReference1.Service1SoapClient();
            ws.Delete(id);
            return RedirectToAction("Index");
        }



        //Create
        //Delete
        //Details
        //Edit
        //Index (List)
    }
}