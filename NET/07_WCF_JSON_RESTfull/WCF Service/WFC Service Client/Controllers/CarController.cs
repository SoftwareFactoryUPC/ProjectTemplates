using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
//Importaciones
using WFC_Service_Client.Models;
using WFC_Service_Client.ViewModels;
using System.Web.Script.Serialization;

namespace WFC_Service_Client.Controllers
{
    public class CarController : Controller
    {
        // GET: Car
        public ActionResult Index()
        {
            CarServiceClient csc = new CarServiceClient();
            CarViewModel cvm = new CarViewModel();
            cvm.list = csc.findAll();
            return View(cvm);
        }

        public ActionResult Create()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Create(CarViewModel cvm)
        {
            CarServiceClient csc = new CarServiceClient();
            csc.create(cvm.car);
            return RedirectToAction("Index");
        }

        public ActionResult Delete(string id)
        {
            CarServiceClient csc = new CarServiceClient();
            csc.delete(csc.find(id));
            return RedirectToAction("Index");
        }

        public ActionResult Edit(string id)
        {
            CarServiceClient csc = new CarServiceClient();
            CarViewModel cvm = new CarViewModel();
            cvm.car = csc.find(id);
            return View("Edit",cvm);
        }

        [HttpPost]
        public ActionResult Edit(CarViewModel cvm)
        {
            CarServiceClient csc = new CarServiceClient();
            csc.edit(cvm.car);
            return RedirectToAction("Index");
        }
    }
}