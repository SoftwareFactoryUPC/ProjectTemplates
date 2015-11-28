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
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace WpfXamlDemo
{
    /// <summary>
    /// Lógica de interacción para MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            this.InkCanvas.Strokes.Clear();
        }

        private void MenuItem_LlamarEstudiantes(object sender, RoutedEventArgs e)
        {
            VerEstudiantes estudiantes = new VerEstudiantes();
            estudiantes.ShowDialog();
        }

        private void MenuItem_LlamarClases(object sender, RoutedEventArgs e)
        {
            VerClases clases = new VerClases();
            clases.ShowDialog();
        }

        private void MenuItem_AgregarEstudiante(object sender, RoutedEventArgs e)
        {
            AgregarEstudiantes estudiantes = new AgregarEstudiantes();
            estudiantes.ShowDialog();
        }

        private void MenuItem_AgregarClase(object sender, RoutedEventArgs e)
        {
            AgregarClases clases = new AgregarClases();
            clases.ShowDialog();
        }        

        private void MenuItem_EditarEstudiantes(object sender, RoutedEventArgs e)
        {
            EditarEstudiantes estudiantes = new EditarEstudiantes();
            estudiantes.ShowDialog();
        }
    }
}
