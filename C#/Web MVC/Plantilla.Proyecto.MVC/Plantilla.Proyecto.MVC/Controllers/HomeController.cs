using Plantilla.Proyecto.MVC.ViewModel.Home;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Plantilla.Proyecto.MVC.Controllers
{
    public class HomeController : BaseController
    {
        // GET: Home
        public ActionResult Index()
        {
            return View();
        }

        //public ActionResult EditEmpresa(Int32 EmpresaId)
        //{
        //    try
        //    {
        //        using (var TransactionScope = new TransactionScope())
        //        {                    
        //            var Empresa = context.Empresa.First(x => x.EmpresaId == model.EmpresaId);
        //            context.Employ.Remove(Empresa);
        //            context.SaveChanges();

        //            PostMessage(MessageType.Success);
        //            return RedirectToAction("ListEmpresa");
        //        }
        //    }catch(){
        //            PostMessage(MessageType.Error);
        //            return RedirectToAction("ListEmpresa");
        //    }
        //}

        //public ActionResult EditEmpresa(Int32 EmpresaId)
        //{
        //    var viewModel = new EditEmpresaViewModel();
        //    viewModel.CargarDatos(context, EmpresaId);
        //    return View(viewModel);
        //}

        //[HttpPost]
        //public ActionResult Edit(EditEmpresaViewModel model)
        //{
        //    try
        //    {
        //        using (var TransactionScope = new TransactionScope())
        //        {
        //            if (!ModelState.IsValid)
        //            {
        //                model.CargarDatos(context, model.EmpresaId);
        //                TryUpdateModel(model);
        //                PostMessage(MessageType.Error, "");
        //                return View(model);
        //            }

        //            var Empresa = new Empresa();

        //            if (model.EmpresaId.HasValue)
        //            {
        //                Empresa = context.Empresa.First(x => x.EmpresaId == model.EmpresaId);
        //            }
        //            else
        //            {
        //                //Establecer las variables por defecto
        //                context.Empresa.Add(Empresa);
        //            }

        //            Empresa.Nombre = model.Nombre;
        //            Empresa.RazonSocial = model.RazonSocial;
        //            Empresa.Estado = model.Estado;
        //            Empresa.MetricaEmpresaId = model.MetricaEmpresaId;
        //            Empresa.Mensaje = model.Mensaje;

        //            context.SaveChanges();

        //            TransactionScope.Complete();

        //            PostMessage(MessageType.Success);
        //            return RedirectToAction("ListEmpresa");
        //        }
        //    }
        //    catch (Exception ex)
        //    {
        //        PostMessage(MessageType.Error);
        //        model.CargarDatos(context, model.EmpresaId);
        //        TryUpdateModel(model);
        //        return View(model);
        //    }
        //}

        //public ActionResult ListEmpresa(Int32? p)
        //{
        //    var viewModel = new ListEmpresaViewModel();
        //    viewModel.CargarDatos(context, p);
        //    return View(viewModel);
        //}

    }
}