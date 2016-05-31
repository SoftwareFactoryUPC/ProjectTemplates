using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace WCF_Service_Result
{
    public class Car
    {
        public int car_id { get; set; }
        public string name { get; set; }
        public string company { get; set; }
        public Nullable<int> stock { get; set; }
    }
}
