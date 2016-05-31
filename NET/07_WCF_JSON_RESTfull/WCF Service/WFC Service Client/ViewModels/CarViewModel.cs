using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
//Importaciones
using WFC_Service_Client.Models;

namespace WFC_Service_Client.ViewModels
{
    public class CarViewModel
    {
        public Car car { get; set; }
        public List<Car> list { get; set; }
    }
}