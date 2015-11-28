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
    /// Lógica de interacción para VerEstudiantes.xaml
    /// </summary>
    public partial class VerEstudiantes : Window
    {
        public VerEstudiantes()
        {
            InitializeComponent();
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            DataEscuelaDataContext conn = new DataEscuelaDataContext();
            List<tblEstudiante> estudiantes = (from es in conn.tblEstudiante select es).ToList();

            VerEstudianteGrid.ItemsSource = estudiantes;
        }

        private void Button_Click_1(object sender, RoutedEventArgs e)
        {
            DialogResult = false;
        }
    }
}
