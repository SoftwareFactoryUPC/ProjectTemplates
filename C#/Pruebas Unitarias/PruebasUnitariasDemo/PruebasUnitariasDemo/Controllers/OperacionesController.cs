using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace PruebasUnitariasDemo.Controllers
{
    public class OperacionesController : Controller
    {
        //
        // GET: /Operaciones/
        public int Suma(int pA, int pB)
        {
            return pA + pB;
        }

        public int Resta(int pA, int pB)
        {
            return pA - pB;
        }

        public double Sumatorio(List<double> pNumeros)
        {
            return pNumeros.Sum();
        }

        public double CalcularPromedio(List<double> pNumeros)
        {
            return pNumeros.Sum() / pNumeros.Count();
        }

	}
}