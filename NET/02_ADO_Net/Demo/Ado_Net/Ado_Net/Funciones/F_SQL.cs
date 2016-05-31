using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
//Importaciones de base de datos
using System.Data;
using System.Data.SqlClient;

namespace Ado_Net.Funciones
{
    public class F_SQL
    {
        private string dataSource;
        private string user;
        private string password;
        private string database;
        private bool secure;

        /// <summary>
        /// Recibe los datos necesarios para establecer una conexion con la DB
        /// </summary>
        /// <param name="dataSource">Servidor</param>
        /// <param name="user">Usuario</param>
        /// <param name="password">Clave</param>
        /// <param name="database">Base de datos por defecto</param>
        public F_SQL(bool secure)
        {
            this.secure = secure;

            //Conexion con credenciales
            //Validacion de la cadena para doble slash
            this.dataSource = "USER\\SQLEXPRESS".Replace(@"\\", @"\");
            this.database = "Software_Factory";
            if(secure)
            {
                this.user = "sa";
                this.password = "victor";
            }
        }

        /// <summary>
        /// Conecta a la DB
        /// </summary>
        /// <returns></returns>
        public SqlConnection ObtenerConexion()
        {

            SqlConnection SqlConTemp = new SqlConnection();

            if(secure)
            {
                SqlConTemp.ConnectionString = "Data Source=" + dataSource + ";" +
                "Persist Security Info=False;" +
                "User ID=" + user + ";" +
                "Password=" + password + ";" +
                "Initial Catalog="+database+";";
            }
            else
            {
                SqlConTemp.ConnectionString = "Data Source=" + dataSource + ";" +
                "Integrated Security=SSPI;" +
                "Initial Catalog=" + database + ";";
            }

            return SqlConTemp;
        }
    }
}