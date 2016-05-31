using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
//Importaciones
using Ado_Net.Models;
using Ado_Net.Funciones;

namespace Ado_Net.Controllers
{
    public class CarController : Controller
    {
        public ActionResult Index()
        {
            F_Car f_cars = new F_Car();
            List<Car> list = f_cars.List();
            return View(list);
        }

        public ActionResult Create()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Create(Car car)
        {
            try
            {
                F_Car f_cars = new F_Car();
                f_cars.Insert(car);
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
            F_Car f_cars = new F_Car();
            Car car=f_cars.Find(id);
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
            F_Car f_cars = new F_Car();
            Car car = f_cars.Find(id);
            if (car == null)
            {
                return View("~/Views/Shared/Error.cshtml");
            }
            return View(car);
        }

        [HttpPost]
        public ActionResult Edit(Car car)
        {
            try
            {
                F_Car f_cars = new F_Car();
                f_cars.Update(car);
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
            F_Car f_cars = new F_Car();
            Car car = f_cars.Find(id);
            if (car == null)
            {
                return View("~/Views/Shared/Error.cshtml");
            }
            return View(car);
        }

        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            F_Car f_cars = new F_Car();
            f_cars.Delete(id);
            return RedirectToAction("Index");
        }



        //Create
        //Delete
        //Details
        //Edit
        //Index (List)
    }
}