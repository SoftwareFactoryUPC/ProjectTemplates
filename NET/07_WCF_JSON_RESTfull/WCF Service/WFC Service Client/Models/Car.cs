using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
//Importaciones
using System.ComponentModel.DataAnnotations;

namespace WFC_Service_Client.Models
{
    public class Car
    {
        [Display(Name="Id")]
        public int car_id { get; set; }
        [Display(Name = "Name")]
        public string name { get; set; }
        [Display(Name = "Company")]
        public string company { get; set; }
        [Display(Name = "Stock")]
        public Nullable<int> stock { get; set; }
    }
}