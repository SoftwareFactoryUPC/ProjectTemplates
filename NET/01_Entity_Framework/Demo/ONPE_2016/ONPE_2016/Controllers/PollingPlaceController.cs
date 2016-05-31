using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using ONPE_2016.Models;

namespace ONPE_2016.Controllers
{
    public class PollingPlaceController : Controller
    {
        private Software_FactoryEntities db = new Software_FactoryEntities();

        // GET: PollingPlace
        public ActionResult Index()
        {
            return View(db.polling_place.ToList());
        }

        // GET: PollingPlace/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            polling_place polling_place = db.polling_place.Find(id);
            if (polling_place == null)
            {
                return HttpNotFound();
            }
            return View(polling_place);
        }

        // GET: PollingPlace/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: PollingPlace/Create
        // Para protegerse de ataques de publicación excesiva, habilite las propiedades específicas a las que desea enlazarse. Para obtener 
        // más información vea http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "polling_place_id,name")] polling_place polling_place)
        {
            if (ModelState.IsValid)
            {
                db.polling_place.Add(polling_place);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(polling_place);
        }

        // GET: PollingPlace/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            polling_place polling_place = db.polling_place.Find(id);
            if (polling_place == null)
            {
                return HttpNotFound();
            }
            return View(polling_place);
        }

        // POST: PollingPlace/Edit/5
        // Para protegerse de ataques de publicación excesiva, habilite las propiedades específicas a las que desea enlazarse. Para obtener 
        // más información vea http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "polling_place_id,name")] polling_place polling_place)
        {
            if (ModelState.IsValid)
            {
                db.Entry(polling_place).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(polling_place);
        }

        // GET: PollingPlace/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            polling_place polling_place = db.polling_place.Find(id);
            if (polling_place == null)
            {
                return HttpNotFound();
            }
            return View(polling_place);
        }

        // POST: PollingPlace/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            polling_place polling_place = db.polling_place.Find(id);
            db.polling_place.Remove(polling_place);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
