using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using WebApi.Models;

namespace WebApi.Controllers
{
    public class CarroController : ApiController
    {
        Carro[] carros = new Carro[] { 
            new Carro{idCarro=1,marca="Mazda",modelo=2012},
            new Carro{idCarro=2,marca="Toyota",modelo=2015},
            new Carro{idCarro=3,marca="BMW",modelo=2014},        
        };

        public IEnumerable<Carro> GetAllCarro() {
            return carros;
        }

        public IHttpActionResult GetCarro(int id) {
            var carro = carros.FirstOrDefault((c)=>c.idCarro==id);
            if (carro != null)
            {
                return Ok(carro);
            }
            else
            {
                return NotFound();
            }
        
        }

    }
}
