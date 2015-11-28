using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using Plantilla.Proyecto.MVC;

namespace Plantilla.Proyecto.MVC.Controllers
{
    public class BaseController : Controller
    {
        //public DatabaseNameEntities context;

        public enum MessageType{
            Success,Warning,Info,Error
        }

        public BaseController()
        {
            //context = new DatabaseNameEntities();
        }

        public void PostMessage(MessageType messageType)
        {
            switch (messageType)
            {
                case MessageType.Success: TempData["FlashMessage"] = "Los datos se guardaron con éxito"; TempData["FlashMessageType"] = "success"; break;
                case MessageType.Error: TempData["FlashMessage"] = "Sucedió un error al guardar los datos"; TempData["FlashMessageType"] = "danger"; break;
                case MessageType.Info: TempData["FlashMessage"] = "Revise los campos"; TempData["FlashMessageType"] = "info";  break;
                case MessageType.Warning: TempData["FlashMessage"] = ""; TempData["FlashMessageType"] = "warning"; break;
            }
            TempData["MessageType"] = messageType;
        }

        public void PostMessage(MessageType messageType, String body = null)
        {
            switch (messageType)
            {
                case MessageType.Success: TempData["FlashMessage"] = body; TempData["FlashMessageType"] = "success"; break;
                case MessageType.Error: TempData["FlashMessage"] = body; TempData["FlashMessageType"] = "danger"; break;
                case MessageType.Info: TempData["FlashMessage"] = body; TempData["FlashMessageType"] = "info"; break;
                case MessageType.Warning: TempData["FlashMessage"] = body; TempData["FlashMessageType"] = "warning"; break;
            }
        }

    }
}