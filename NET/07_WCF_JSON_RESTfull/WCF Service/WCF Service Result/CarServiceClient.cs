using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
//Importaciones
using System.Net;
using System.Web.Script.Serialization;
using System.Runtime.Serialization.Json;
using System.IO;
using System.Text;

namespace WCF_Service_Result
{
    public class CarServiceClient
    {
        private string base_url = "http://localhost:15217/ServiceCar.svc";

        public List<Car> findAll()
        {
            try
            {
                var webClient = new WebClient();
                string url = base_url + "/findAll";
                var json = webClient.DownloadString(url);
                var jss = new JavaScriptSerializer();

                //Convierte una cadena en formato JSON en un formato especifico
                return jss.Deserialize<List<Car>>(json);
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
                var webClient = new WebClient();
                string url = string.Format(base_url + "/find/{0}", id);
                var json = webClient.DownloadString(url);
                var jss = new JavaScriptSerializer();

                //Convierte una cadena en formato JSON en un formato especifico
                return jss.Deserialize<Car>(json);
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
                DataContractJsonSerializer ser = new DataContractJsonSerializer(typeof(Car));
                MemoryStream mem = new MemoryStream();
                ser.WriteObject(mem, car);
                string data = Encoding.UTF8.GetString(mem.ToArray(), 0, (int)mem.Length);
                WebClient webClient = new WebClient();
                webClient.Headers["Content-type"] = "application/json";
                webClient.Encoding = Encoding.UTF8;
                string url = base_url + "/create";
                webClient.UploadString(url, "POST", data);

                //Convierte una cadena en formato JSON en un formato especifico
                return true;
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
                DataContractJsonSerializer ser = new DataContractJsonSerializer(typeof(Car));
                MemoryStream mem = new MemoryStream();
                ser.WriteObject(mem, car);
                string data = Encoding.UTF8.GetString(mem.ToArray(), 0, (int)mem.Length);
                WebClient webClient = new WebClient();
                webClient.Headers["Content-type"] = "application/json";
                webClient.Encoding = Encoding.UTF8;
                string url = base_url + "/edit";
                webClient.UploadString(url, "PUT", data);

                //Convierte una cadena en formato JSON en un formato especifico
                return true;
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
                DataContractJsonSerializer ser = new DataContractJsonSerializer(typeof(Car));
                MemoryStream mem = new MemoryStream();
                ser.WriteObject(mem, car);
                string data = Encoding.UTF8.GetString(mem.ToArray(), 0, (int)mem.Length);
                WebClient webClient = new WebClient();
                webClient.Headers["Content-type"] = "application/json";
                webClient.Encoding = Encoding.UTF8;
                string url = base_url + "/delete";
                webClient.UploadString(url, "DELETE", data);

                //Convierte una cadena en formato JSON en un formato especifico
                return true;
            }
            catch
            {

                return false;
            }
        }
    }
}
