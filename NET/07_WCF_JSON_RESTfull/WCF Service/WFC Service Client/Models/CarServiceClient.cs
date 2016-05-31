using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
//Importaciones
using WCF_Service_Result;


namespace WFC_Service_Client.Models
{
    public class CarServiceClient
    {
        WCF_Service_Result.CarServiceClient csc = new WCF_Service_Result.CarServiceClient();
        
        public  List<Car> findAll()
        {
            try
            {
                return ToListCarSC(csc.findAll());//Helper lista
            }
            catch
            {

                return null;
            }
        }
        public Car find(string id)
        {
            try
            {
                return ToCarSC(csc.find(id));//Helper car;
            }
            catch
            {

                return null;
            }
        }
        public bool create(Car car)
        {
            try
            {
                return csc.create(ToCarSR(car));
            }
            catch
            {

                return false;
            }
        }
        public bool edit(Car car)
        {
            try
            {
                return csc.edit(ToCarSR(car));
            }
            catch
            {

                return false;
            }
        }
        public bool delete(Car car)
        {
            try
            {
                return csc.delete(ToCarSR(car));
            }
            catch
            {

                return false;
            }
        }

        public WCF_Service_Result.Car ToCarSR(Car car)
        {
            WCF_Service_Result.Car aux = new WCF_Service_Result.Car();
            aux.car_id = car.car_id;
            aux.company = car.company;
            aux.name = car.name;
            aux.stock = car.stock;
            return aux;
        }
        public Car ToCarSC(WCF_Service_Result.Car car)
        {
            Car aux = new Car();
            aux.car_id = car.car_id;
            aux.company = car.company;
            aux.name = car.name;
            aux.stock = car.stock;
            return aux;
        }
        public List<Car> ToListCarSC(List<WCF_Service_Result.Car> list)
        {
            List<Car> result = new List<Car>();
            for (int i = 0; i < list.Count; i++)
            {
                Car aux = new Car();
                aux.car_id = list[i].car_id;
                aux.company = list[i].company;
                aux.name = list[i].name;
                aux.stock = list[i].stock;
                result.Add(aux);
            }
            return result;
        }
    }
}