using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

using ReglasDemo;
namespace WpfXamlDemo
{
    /// <summary>
    /// Lógica de interacción para ActualizarEstudiantes.xaml
    /// </summary>
    public partial class ActualizarEstudiantes : Window
    {
        private tblEstudiante estudiante;
        public ActualizarEstudiantes(tblEstudiante p_estudiante)
        {
            InitializeComponent();
            this.estudiante = p_estudiante;
        }

        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            txtNombre.Text = estudiante.Nombre.Trim();
            txtApellido.Text = estudiante.Apellido.Trim();
            
            if (estudiante.Sexo == 'H')
                rdbHombre.IsChecked = true;
            else
                rdbMujer.IsChecked = true;

            txtPromedio.Text = estudiante.Promedio.ToString();
        }

        private void btnActualizar_Click(object sender, RoutedEventArgs e)
        {
            estudiante.Nombre = txtNombre.Text.Trim();
            estudiante.Apellido = txtApellido.Text.Trim();
            if (rdbHombre.IsChecked == true)
                estudiante.Sexo = 'H';
            else
                estudiante.Sexo = 'M';
            estudiante.Promedio = Convert.ToDouble(txtPromedio.Text.Trim());

            Administrador.editarEstudiante(estudiante);

            MessageBox.Show("El estudiante: " + estudiante.Apellido + " fue actualizado");

            DialogResult = false;
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            DialogResult = false;
        }
    }
}
