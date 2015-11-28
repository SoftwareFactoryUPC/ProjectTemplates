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
    /// Lógica de interacción para EditarEstudiantes.xaml
    /// </summary>
    public partial class EditarEstudiantes : Window
    {
        public EditarEstudiantes()
        {
            InitializeComponent();
        }

        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            DataEscuelaDataContext conn = new DataEscuelaDataContext();
            List<tblEstudiante> estudiantes = (from es in conn.tblEstudiante select es).ToList();

            EditarEstudianteGrid.ItemsSource = estudiantes;
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            tblEstudiante marcado = EditarEstudianteGrid.SelectedItem as tblEstudiante;
            if (marcado != null)
            {
                ActualizarEstudiantes actualizarEsudiantes = new ActualizarEstudiantes(marcado);
                actualizarEsudiantes.ShowDialog();
            }
            else
                MessageBox.Show("Debes marcar o seleccionar un estudiante");
        }

        private void Button_Click_1(object sender, RoutedEventArgs e)
        {
            tblEstudiante marcado = EditarEstudianteGrid.SelectedItem as tblEstudiante;
            if (marcado == null)
            {
                MessageBox.Show("Debes marcar o seleccionar un estudiante");
            }
            else
                if (MessageBoxResult.Yes == MessageBox.Show("Estas seguro", "Quieres borrar este estudiante", MessageBoxButton.YesNo, MessageBoxImage.Exclamation))
                {
                    Administrador.borrarEstudiante(marcado);
                    Window_Loaded(null, null);
                }


        }
    }
}
