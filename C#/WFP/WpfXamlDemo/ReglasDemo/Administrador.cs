using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

//patron mvvm
//modelo -> Administrador.cs
//vista -> VerEstudiante.xaml
//vista-modelo -> VerEstudiante.xaml.cs

namespace ReglasDemo
{
    public static class Administrador
    {
        public static void agregarEstudiantes(tblEstudiante estudiante)
        {
            DataEscuelaDataContext conn = new DataEscuelaDataContext();
            conn.tblEstudiante.InsertOnSubmit(estudiante);
            conn.SubmitChanges();
        }

        public static void agregarClases(tblClase clase)
        {
            DataEscuelaDataContext conn = new DataEscuelaDataContext();
            conn.tblClase.InsertOnSubmit(clase);
            conn.SubmitChanges();
        }

        public static void editarEstudiante(tblEstudiante estudiante)
        {
            DataEscuelaDataContext conn = new DataEscuelaDataContext();
            { 
                tblEstudiante estudianteQuery = (from es in conn.tblEstudiante 
                                                 where es.EstudianteID == estudiante.EstudianteID
                                                 select es).FirstOrDefault();

                estudianteQuery.Nombre = estudiante.Nombre;
                estudianteQuery.Apellido = estudiante.Apellido;
                estudianteQuery.Promedio = estudiante.Promedio;
                estudianteQuery.Sexo = estudiante.Sexo;
                conn.SubmitChanges();
            }
        }

        public static void borrarEstudiante(tblEstudiante estudiante)
        {
            DataEscuelaDataContext conn = new DataEscuelaDataContext();
            {
                var estudianteQuery = from estu in conn.tblEstudiante
                                      where estu.EstudianteID == estudiante.EstudianteID
                                      select estu;

                conn.tblEstudiante.DeleteAllOnSubmit(estudianteQuery);
                conn.SubmitChanges();
            }

        }
    }
}
