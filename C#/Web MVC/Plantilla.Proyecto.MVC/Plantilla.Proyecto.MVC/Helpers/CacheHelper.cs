using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Plantilla.Proyecto.MVC.Helpers
{
    public class CacheHelper
    {
        public static Dictionary<Int32, List<CacheOperador>> DictOperadoresEmpresa = new Dictionary<int, List<CacheOperador>>();
        public static Dictionary<Int32, CacheOperador> DictOperadores = new Dictionary<Int32, CacheOperador>();
        public static List<UsuarioTemp> LstUsuariosConectados = new List<UsuarioTemp>();

        public static void CambiarEstadoOperador(Int32 empresaId, Int32 usuarioId, Boolean estaActivo)
        {
            if (DictOperadores.ContainsKey(usuarioId))
            {
                DictOperadores[usuarioId].EstaActivo = estaActivo;
            }
            else if (estaActivo)
            {
                var operador = new CacheOperador();
                operador.UsuarioId = usuarioId;
                operador.EstaActivo = true;
                operador.LstChatId = new List<Int32>();

                DictOperadores.Add(usuarioId, operador);

                if (!DictOperadoresEmpresa.ContainsKey(empresaId))
                    DictOperadoresEmpresa.Add(empresaId, new List<CacheOperador>());

                DictOperadoresEmpresa[empresaId].Add(operador);
            }
        }

        public static Int32? AsignarChat(Int32 empresaId, Int32 chatId)
        {
            if (DictOperadoresEmpresa.ContainsKey(empresaId))
            {
                var operador = DictOperadoresEmpresa[empresaId].OrderBy(x => x.LstChatId.Count).FirstOrDefault(x => x.EstaActivo);
                if (operador != null)
                    return operador.UsuarioId;
            }

            return null;
        }
    }
    public class CacheOperador
    {
        public Int32 UsuarioId { get; set; }
        public List<Int32> LstChatId { get; set; }
        public bool EstaActivo { get; set; }
    }

    public class UsuarioTemp
    {
        public String Nombre { get; set; }
        public String Id { get; set; }
    }
}