using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
//Importaciones
using WCF_Service.Entity;
using System.ServiceModel.Web;

namespace WCF_Service
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the interface name "IServiceCar" in both code and config file together.
    [ServiceContract]
    public interface IServiceCar
    {
        [OperationContract]
        [WebInvoke(Method="GET", UriTemplate="findAll",
            ResponseFormat=WebMessageFormat.Json)]
        List<Car> findAll();

        [OperationContract]
        [WebInvoke(Method = "GET", UriTemplate = "find/{id}", 
            ResponseFormat = WebMessageFormat.Json)]
        Car find(String id);

        [OperationContract]
        [WebInvoke(Method = "POST", UriTemplate = "create", 
            ResponseFormat = WebMessageFormat.Json, RequestFormat=WebMessageFormat.Json)]
        bool create(Car car);

        [OperationContract]
        [WebInvoke(Method = "PUT", UriTemplate = "edit",
            ResponseFormat = WebMessageFormat.Json, RequestFormat = WebMessageFormat.Json)]
        bool edit(Car car);

        [OperationContract]
        [WebInvoke(Method = "DELETE", UriTemplate = "delete",
            ResponseFormat = WebMessageFormat.Json, RequestFormat = WebMessageFormat.Json)]
        bool delete(Car car);


    }
}
