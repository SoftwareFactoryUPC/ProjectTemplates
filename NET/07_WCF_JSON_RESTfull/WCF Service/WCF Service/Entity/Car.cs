using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace WCF_Service.Entity
{
    public class Car
    {
        public int car_id { get; set; }
        public string name { get; set; }
        public string company { get; set; }
        public Nullable<int> stock { get; set; }
    }
}