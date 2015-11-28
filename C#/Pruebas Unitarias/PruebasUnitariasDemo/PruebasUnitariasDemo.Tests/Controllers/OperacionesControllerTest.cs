using System;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using PruebasUnitariasDemo;
using PruebasUnitariasDemo.Controllers;
using System.Collections.Generic;

namespace PruebasUnitariasDemo.Tests.Controllers
{
    [TestClass]
    public class OperacionesControllerTest
    {
        [TestMethod]
        public void ProbarSuma()
        {
            //arrange
            var prueba = new OperacionesController();

            //act
            var resultado = prueba.Suma(3, 2);

            //assert
            Assert.AreEqual(resultado, 5, "Se esperaba cinco de resultado");
        }

        [TestMethod]
        public void ProbarPromedio()
        {
            var prueba = new OperacionesController();
            var resultado = prueba.CalcularPromedio(new List<double> { 20, 10, 30 });
            Assert.IsTrue(resultado > 0, "Se esperaba promedio mayor a cero");
        }

        [TestMethod]
        public void ProbarResta()
        {
            OperacionesController controller = new OperacionesController();
            int resultado = controller.Resta(3, 2);
            Assert.AreEqual(resultado, 1, "Se esperaba uno en el resultado");
        }

        [TestMethod]
        public void ProbarSumatoria()
        {
            OperacionesController controller = new OperacionesController();
            double resultado = controller.Sumatorio(new List<double> { 20, 10, 20 });
            Assert.AreEqual(resultado, 50, "Se esperaba 50 de resultado");
        }
    }
}
