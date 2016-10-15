using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
//Importaciones
using WebService.Funciones;
using WebService.Models;

namespace WebService
{
    /// <summary>
    /// Descripción breve de Service1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
    // [System.Web.Script.Services.ScriptService]
    public class Service1 : System.Web.Services.WebService
    {
        public Service1() { }

        [WebMethod]
        public List<Car> List()
        {
            F_Car f_cars = new F_Car();
            List<Car> list = f_cars.List();
            return list;
        }

        [WebMethod]
        public bool Create(Car car)
        {
            try
            {
                F_Car f_cars = new F_Car();
                f_cars.Insert(car);
                return true;
            }
            catch (Exception e)
            {
                return false;
            }
        }

        [WebMethod]
        public Car Find(int? id)
        {
            if (id == null)
            {
                return null;
            }
            F_Car f_cars = new F_Car();
            Car car = f_cars.Find(id);
            if (car == null)
            {
                return null;
            }
            return car;
        }

        [WebMethod]
        public bool Edit(Car car)
        {
            try
            {
                F_Car f_cars = new F_Car();
                f_cars.Update(car);
                return true;
            }
            catch (Exception e)
            {
                return false;
            }
        }

        [WebMethod]
        public void Delete(int id)
        {
            F_Car f_cars = new F_Car();
            f_cars.Delete(id);
        }
    }
}