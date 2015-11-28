using PagedList;
using Plantilla.Proyecto.MVC.Helpers;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Plantilla.Proyecto.MVC.ViewModel.Home
{
    public class ListEmpresaViewModel
    {
        public Int32 p { get; set; }
        //public IPagedList<T> LstEmpresa { get; set; }

        //public ListEmpresaViewModel()
        //{
        //}

        //public void CargarDatos(DatabaseEntities context, Int32? p)
        //{
        //    this.p = p ?? 1;
        //    IQueryable<T> queryEmpresa = context.Empresa.AsQueryable();
        //    queryEmpresa = queryEmpresa.OrderBy(x => x.EmpresaId);
        //    LstEmpresa = queryEmpresa.ToPagedList(this.p, ConstantHelpers.PAGE_SIZE);
        //}
    }
}