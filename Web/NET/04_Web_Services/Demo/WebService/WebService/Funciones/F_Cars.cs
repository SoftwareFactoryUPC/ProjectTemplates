using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
//Importaciones
using WebService.Models;
//Importaciones de base de datos
using System.Data;
using System.Data.SqlClient;


namespace WebService.Funciones
{
    public class F_Car
    {
        //Interactuar con SQL
        private F_SQL funciones_SQL = new F_SQL(false);

        //Conexion
        private SqlConnection SqlCon;

        //Query
        private SqlCommand SqlCmd;

        //Tipos de Reportes
        DataTable Dt;


        /// <summary>
        /// Extrae los datos de la tabla Car en SQL
        /// </summary>
        /// <returns>Listado de carros</returns>
        public List<Car> List()
        {
            List<Car> Listado = new List<Car>();
            Dt = new DataTable("Resultado");

            try
            {
                //Conexion
                SqlCon = funciones_SQL.ObtenerConexion();
                SqlCon.Open();

                SqlCmd = new SqlCommand();
                SqlCmd.CommandTimeout = 0;//Para correr queries pesados
                SqlCmd.Connection = SqlCon;

                //Mapear BD del Servidor
                SqlCmd.CommandText = "use [Software_Factory] select * from Car";
                SqlCmd.CommandType = CommandType.Text;
                SqlDataAdapter SqlDat = new SqlDataAdapter(SqlCmd);
                SqlDat.Fill(Dt);
                foreach (DataRow fila in Dt.Rows)
                {
                    Car aux = new Car();
                    //El nombre de la fila debe ser igual al obtenido en el Query
                    aux.car_id = Int32.Parse(fila["car_id"].ToString()); ;
                    aux.name = fila["name"].ToString();
                    aux.company = fila["company"].ToString();
                    aux.stock = Int32.Parse(fila["stock"].ToString());

                    //Nuevo elemento en la lista
                    Listado.Add(aux);
                }
                Dt = null;
            }
            catch (Exception E)
            {
                throw new Exception("F_Car/Listar: " +
                    E.Message, E);
            }
            finally
            {
                if (SqlCon != null && SqlCon.State == ConnectionState.Open)
                {
                    SqlCon.Close();
                }
            }
            return Listado;
        }

        public Car Find(int? id)
        {
            Car car = new Car();
            Dt = new DataTable("Resultado");

            try
            {
                //Conexion
                SqlCon = funciones_SQL.ObtenerConexion();
                SqlCon.Open();

                SqlCmd = new SqlCommand();
                SqlCmd.CommandTimeout = 0;//Para correr queries pesados
                SqlCmd.Connection = SqlCon;

                //Mapear BD del Servidor
                SqlCmd.CommandText = "use [Software_Factory] select * from Car where car_id=@id";
                SqlCmd.Parameters.AddWithValue("@id", id);
                SqlCmd.CommandType = CommandType.Text;

                SqlDataAdapter SqlDat = new SqlDataAdapter(SqlCmd);
                SqlDat.Fill(Dt);

                if (Dt != null)
                {
                    DataRow fila = Dt.Rows[0];
                    //El nombre de la fila debe ser igual al obtenido en el Query
                    car.car_id = Int32.Parse(fila["car_id"].ToString()); ;
                    car.name = fila["name"].ToString();
                    car.company = fila["company"].ToString();
                    car.stock = Int32.Parse(fila["stock"].ToString());
                }
                Dt = null;
            }
            catch (Exception E)
            {
                throw new Exception("F_Car/Details: " +
                    E.Message, E);
            }
            finally
            {
                if (SqlCon != null && SqlCon.State == ConnectionState.Open)
                {
                    SqlCon.Close();
                }
            }
            return car;
        }
        public bool Insert(Car car)
        {
            bool exito = false;
            try
            {
                //Conexion
                SqlCon = funciones_SQL.ObtenerConexion();
                SqlCon.Open();

                SqlCmd = new SqlCommand();
                SqlCmd.CommandTimeout = 0;//Para correr queries pesados
                SqlCmd.Connection = SqlCon;

                //Mapear BD del Servidor
                SqlCmd.CommandText = "use [Software_Factory] insert into Car (name,company,stock) VALUES (@p1,@p2,@p3)";
                SqlCmd.Parameters.AddWithValue("@p1", car.name);
                SqlCmd.Parameters.AddWithValue("@p2", car.company);
                SqlCmd.Parameters.AddWithValue("@p3", car.stock);
                SqlCmd.CommandType = CommandType.Text;

                SqlCmd.ExecuteNonQuery();

                exito = true;
            }
            catch (Exception E)
            {
                throw new Exception("F_Car/Create: " +
                    E.Message, E);
            }
            finally
            {
                if (SqlCon != null && SqlCon.State == ConnectionState.Open)
                {
                    SqlCon.Close();
                }
            }
            return exito;
        }
        public bool Delete(int id)
        {
            bool exito = false;
            try
            {
                //Conexion
                SqlCon = funciones_SQL.ObtenerConexion();
                SqlCon.Open();

                SqlCmd = new SqlCommand();
                SqlCmd.CommandTimeout = 0;//Para correr queries pesados
                SqlCmd.Connection = SqlCon;

                //Mapear BD del Servidor
                SqlCmd.CommandText = "use [Software_Factory] delete from Car where car_id=@p1";
                SqlCmd.Parameters.AddWithValue("@p1", id);
                SqlCmd.CommandType = CommandType.Text;

                SqlCmd.ExecuteNonQuery();

                exito = true;
            }
            catch (Exception E)
            {
                throw new Exception("F_Car/Delete: " +
                    E.Message, E);
            }
            finally
            {
                if (SqlCon != null && SqlCon.State == ConnectionState.Open)
                {
                    SqlCon.Close();
                }
            }
            return exito;
        }
        public bool Update(Car car)
        {
            bool exito = false;
            try
            {
                //Conexion
                SqlCon = funciones_SQL.ObtenerConexion();
                SqlCon.Open();

                SqlCmd = new SqlCommand();
                SqlCmd.CommandTimeout = 0;//Para correr queries pesados
                SqlCmd.Connection = SqlCon;

                //Mapear BD del Servidor
                SqlCmd.CommandText = "use [Software_Factory] update Car set name=@p1, company=@p2, stock=@p3 where car_id=@p4";
                SqlCmd.Parameters.AddWithValue("@p1", car.name);
                SqlCmd.Parameters.AddWithValue("@p2", car.company);
                SqlCmd.Parameters.AddWithValue("@p3", car.stock);
                SqlCmd.Parameters.AddWithValue("@p4", car.car_id);
                SqlCmd.CommandType = CommandType.Text;

                SqlCmd.ExecuteNonQuery();

                exito = true;
            }
            catch (Exception E)
            {
                throw new Exception("F_Car/Update: " +
                    E.Message, E);
            }
            finally
            {
                if (SqlCon != null && SqlCon.State == ConnectionState.Open)
                {
                    SqlCon.Close();
                }
            }
            return exito;
        }
    }

}