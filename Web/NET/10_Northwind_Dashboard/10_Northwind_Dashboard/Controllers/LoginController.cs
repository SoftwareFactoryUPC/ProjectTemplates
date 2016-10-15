using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

using _10_Northwind_Dashboard.Models;

namespace _10_Northwind_Dashboard.Controllers
{
    public class LoginController : Controller
    {
        private NORTHWNDEntities db = new NORTHWNDEntities();

        // GET: Login
        public ActionResult Index()
        {
            return View();
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Index([Bind(Include = "user_name,phone,email,pass,role")] User user)
        {
            if (ModelState.IsValid)
            {
                //Solo creo usuarios normales (role=0), los admin se crear en la BD (role=1)
                user.role = 0;
                db.User.Add(user);
                db.SaveChanges();

                Session["user"]=user.user_name.ToString();
                Session["role"] = user.role.ToString();

                return RedirectToAction("Index","Main");
            }
            return View("Index");
        }

        public ActionResult Sign_In()
        {
            return View();
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Sign_In([Bind(Include = "user_name,phone,email,pass,role")] User user)
        {
            if (user.user_name == null)
            {
                ViewBag.Error = "Datos incompletos";
                return View("Sign_In");
            }
            User aux = db.User.Find(user.user_name);
            if (aux == null)
            {
                ViewBag.Error = "No existe el usuario";
                return View("Sign_In");
            }
            if(aux.pass!=user.pass)
            {
                ViewBag.Error = "Datos incorrectos";
                return View("Sign_In");
            }
            Session["user"] = aux.user_name.ToString();
            Session["role"] = aux.role.ToString();

            switch (Session["role"].ToString())
            {
                case "0":
                    return RedirectToAction("Index", "Main");
                case "1":
                    return RedirectToAction("Index", "Dashboard");
                default:
                    //Error de rol
                    return View("Sign_In");
            }
        }

        public ActionResult Log_Out()
        {
            Session.Abandon();
            return RedirectToAction("Sign_In", "Login");
        }

    }
}