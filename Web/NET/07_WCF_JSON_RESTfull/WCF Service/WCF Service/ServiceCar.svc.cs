using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
//Importaciones
using WCF_Service.Model;
using WCF_Service.Entity;

namespace WCF_Service
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the class name "ServiceCar" in code, svc and config file together.
    // NOTE: In order to launch WCF Test Client for testing this service, please select ServiceCar.svc or ServiceCar.svc.cs at the Solution Explorer and start debugging.
    public class ServiceCar : IServiceCar
    {
        public List<Car> findAll()
        {
            using (Software_FactoryEntities context = new Software_FactoryEntities())
            {
                return context.Car.Select(x => new Car
                {
                    car_id = x.car_id,
                    company = x.company,
                    name = x.name,
                    stock = x.stock
                }).ToList();
            }
        }

        public Car find(String id)
        {
            using (Software_FactoryEntities context = new Software_FactoryEntities())
            {
                int n_id = Convert.ToInt32(id);
                return context.Car.Where(x => x.car_id == n_id).Select(x => new Car
                {
                    car_id = x.car_id,
                    company = x.company,
                    name = x.name,
                    stock = x.stock
                }).First();
            }
        }

        public bool create(Car car)
        {
            using (Software_FactoryEntities context = new Software_FactoryEntities())
            {
                try
                {
                    CarEntity aux = new CarEntity();
                    aux.company = car.company;
                    aux.name = car.name;
                    aux.stock = car.stock;

                    context.Car.Add(aux);
                    context.SaveChanges();
                    return true;
                }
                catch (Exception)
                {
                    return false;
                }
            }
        }

        public bool edit(Car car)
        {
            using (Software_FactoryEntities context = new Software_FactoryEntities())
            {
                try
                {
                    CarEntity aux = context.Car.Single(x => x.car_id == car.car_id);
                    aux.company = car.company;
                    aux.name = car.name;
                    aux.stock = car.stock;
                    return true;
                }
                catch (Exception)
                {
                    return false;
                }
            }
        }

        public bool delete(Car car)
        {
            using (Software_FactoryEntities context = new Software_FactoryEntities())
            {
                try
                {
                    int n_id = Convert.ToInt32(car.car_id);
                    CarEntity aux = context.Car.Single(x => x.car_id == n_id);

                    context.Car.Remove(aux);
                    context.SaveChanges();
                    return true;
                }
                catch (Exception)
                {
                    return false;
                }
            }
        }
    }
}
