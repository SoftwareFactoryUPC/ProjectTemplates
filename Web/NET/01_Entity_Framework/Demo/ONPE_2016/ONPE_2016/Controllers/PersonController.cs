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
    public class PersonController : Controller
    {
        private Software_FactoryEntities db = new Software_FactoryEntities();

        // GET: Person
        public ActionResult Index()
        {
            var person = db.person.Include(p => p.polling_place);
            return View(person.ToList());
        }

        // GET: Person/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            person person = db.person.Find(id);
            if (person == null)
            {
                return HttpNotFound();
            }
            return View(person);
        }

        // GET: Person/Create
        public ActionResult Create()
        {
            ViewBag.polling_place_id = new SelectList(db.polling_place, "polling_place_id", "name");
            return View();
        }

        // POST: Person/Create
        // Para protegerse de ataques de publicación excesiva, habilite las propiedades específicas a las que desea enlazarse. Para obtener 
        // más información vea http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "person_id,name,last_name,dni,polling_place_id")] person person)
        {
            try
            {
                if (ModelState.IsValid)
                {
                    db.person.Add(person);
                    db.SaveChanges();
                    return RedirectToAction("Index");
                }

                ViewBag.polling_place_id = new SelectList(db.polling_place, "polling_place_id", "name", person.polling_place_id);
                return View(person);
            }
            catch (Exception e)
            {
                TempData["Error"] = e.Message.ToString();
                return RedirectToAction("Create");
            }

            
        }

        // GET: Person/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            person person = db.person.Find(id);
            if (person == null)
            {
                return HttpNotFound();
            }
            ViewBag.polling_place_id = new SelectList(db.polling_place, "polling_place_id", "name", person.polling_place_id);
            return View(person);
        }

        // POST: Person/Edit/5
        // Para protegerse de ataques de publicación excesiva, habilite las propiedades específicas a las que desea enlazarse. Para obtener 
        // más información vea http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "person_id,name,last_name,dni,polling_place_id")] person person)
        {
            if (ModelState.IsValid)
            {
                db.Entry(person).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.polling_place_id = new SelectList(db.polling_place, "polling_place_id", "name", person.polling_place_id);
            return View(person);
        }

        // GET: Person/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            person person = db.person.Find(id);
            if (person == null)
            {
                return HttpNotFound();
            }
            return View(person);
        }

        // POST: Person/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            person person = db.person.Find(id);
            db.person.Remove(person);
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
