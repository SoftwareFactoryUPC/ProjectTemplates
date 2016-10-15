using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace Plantilla.Proyecto.MVC.ViewModel.Home
{
    public class EditEmpresaViewModel
    {

        public Int32? EmpresaId { get; set; }

        [Display(Name = "Nombre")]
        [Required]
        public String Nombre { get; set; }
        [Display(Name = "RazonSocial")]
        [Required]
        public String RazonSocial { get; set; }
        [Display(Name = "Estado")]
        public String Estado { get; set; }
        [Display(Name = "MetricaEmpresaId")]
        public Int32? MetricaEmpresaId { get; set; }
        [Display(Name = "Mensaje")]
        public String Mensaje { get; set; }


        public EditEmpresaViewModel()
        {
        }

        //public void CargarDatos(DatabaseEntities context, Int32? EmpresaId)
        //{
        //    this.EmpresaId = EmpresaId;

        //    if (EmpresaId.HasValue)
        //    {
        //        var Empresa = context.Empresa.First(x => x.EmpresaId == EmpresaId);
        //        this.EmpresaId = Empresa.EmpresaId;
        //        this.Nombre = Empresa.Nombre;
        //        this.RazonSocial = Empresa.RazonSocial;
        //        this.Estado = Empresa.Estado;
        //        this.MetricaEmpresaId = Empresa.MetricaEmpresaId;
        //        this.Mensaje = Empresa.Mensaje;
        //    }

        //}
    }
}