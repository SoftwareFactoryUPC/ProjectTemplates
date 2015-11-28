using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Plantilla.Proyecto.MVC.Helpers
{
    public enum AppRol
    {
        ADM,SUP,ASE
    }

    public static class SessionHelper
    {

        public static object Get(HttpSessionStateBase Session, String Key)
        {
            return Session[Key];
        }
        public static Int32 GetUsuarioId(this HttpSessionStateBase Session)
        {
            String Key = "UsuarioId";
            return (Int32)Get(Session, Key);
        }
        public static object GetNombre(this HttpSessionStateBase Session)
        {
            String Key = "Nombre";
            return Get(Session, Key);
        }
        public static object GetApellido(this HttpSessionStateBase Session)
        {
            String Key = "Apellido";
            return Get(Session, Key);
        }

        public static AppRol GetRol(this HttpSessionStateBase Session)
        {
            String Key = "Rol";
            return (AppRol)Get(Session, Key);
        }
        public static object GetEmail(this HttpSessionStateBase Session)
        {
            String Key = "Email";
            return Get(Session, Key);
        }
        public static object GetCodigo(this HttpSessionStateBase Session)
        {
            String Key = "Codigo";
            return Get(Session, Key);
        }


        public static void Set(HttpSessionStateBase Session, String Key, object value)
        {
            Session[Key] = value;

        }
        public static void SetUsuarioId(this HttpSessionStateBase Session, object value)
        {
            String Key = "UsuarioId";
            Set(Session, Key, value);
        }
        public static void SetNombre(this HttpSessionStateBase Session, object value)
        {
            String Key = "Nombre";
            Set(Session, Key, value);
        }
        public static void SetApellido(this HttpSessionStateBase Session, object value)
        {
            String Key = "Apellido";
            Set(Session, Key, value);
        }
        public static void SetRol(this HttpSessionStateBase Session, object value)
        {
            String Key = "Rol";
            Set(Session, Key, value);
        }
        public static void SetEmail(this HttpSessionStateBase Session, object value)
        {
            String Key = "Email";
            Set(Session, Key, value);
        }
        public static void SetCodigo(this HttpSessionStateBase Session, object value)
        {
            String Key = "Codigo";
            Set(Session, Key, value);
        }

    }
}