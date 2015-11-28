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
    /// Lógica de interacción para AgregarEstudiantes.xaml
    /// </summary>
    public partial class AgregarEstudiantes : Window
    {
        public AgregarEstudiantes()
        {
            InitializeComponent();
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            DialogResult = false;
        }

        private void txtNombre_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.Key == Key.Enter)
            {
                txtApellido.Focus();
            }
        }

        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            txtNombre.Focus();
        }

        private void txtApellido_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.Key == Key.Enter)
            {
                rdbHombre.Focus();
                rdbHombre.IsChecked = true;
            }
        }

        private void rdbHombre_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.Key == Key.Enter)
            {
                txtPromedio.Focus();
            }
        }

        private void rdbMujer_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.Key == Key.Enter)
            {
                txtPromedio.Focus();
            }
        }

        private void txtPromedio_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.Key == Key.Enter)
            {
                btnAgregar.Focus();
            }
        }

        private void btnAgregar_Click(object sender, RoutedEventArgs e)
        {
            float promedio;
            bool resultado = true;

            if (txtNombre.Text.Trim().Length == 0)
            {
                MessageBox.Show("Digite el nombre del estudiante.",
                    "Nombre Invalido",
                    MessageBoxButton.OK,
                    MessageBoxImage.Warning);
                txtNombre.Focus();
                resultado = false;
            }

            if (txtApellido.Text.Trim().Length == 0)
            {
                MessageBox.Show("Digite el Apellido del estudiante.",
                    "Apellido Invalido",
                    MessageBoxButton.OK,
                    MessageBoxImage.Warning);
                txtApellido.Focus();
                resultado = false;
            }

            if (rdbHombre.IsChecked == false && rdbMujer.IsChecked == false)
            {
                MessageBox.Show("Seleccione el sexo del estudiante.",
                    "Sexo Invalido",
                    MessageBoxButton.OK,
                    MessageBoxImage.Warning);
                rdbHombre.Focus();
                rdbHombre.IsChecked = true;
                resultado = false;
            }

            if(float.TryParse(txtPromedio.Text, out promedio) == false)
            {
                MessageBox.Show("El promedio debe ser un numero.",
                    "Valor Invalido",
                    MessageBoxButton.OK,
                    MessageBoxImage.Warning);
                txtPromedio.Focus();
                resultado = false;
            }

            if (resultado)
            {
                try
                {
                    tblEstudiante estudiante = new tblEstudiante();
                    estudiante.Nombre = txtNombre.Text.Trim();
                    estudiante.Apellido = txtApellido.Text.Trim();
                    if (rdbHombre.IsChecked == true)
                        estudiante.Sexo = 'H';
                    else
                        estudiante.Sexo = 'M';
                    estudiante.Promedio = promedio;

                    
                    Administrador.agregarEstudiantes(estudiante);

                    MessageBox.Show("El estudiante: " + estudiante.Apellido + " fue agregado al sistema");
                    ClearControles(this);
                    txtNombre.Focus();

                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error al agregar estudiante", ex.ToString());
                    throw;
                }                
                               
            }
        }

        void ClearControles(DependencyObject obj)
        {
            TextBox tb = obj as TextBox;
            RadioButton rb = obj as RadioButton;
            if (tb != null)
                tb.Text = "";
            if (rb != null)
                rb.IsChecked = false;

            for (int i = 0; i < VisualTreeHelper.GetChildrenCount(obj as DependencyObject); i++)
                ClearControles(VisualTreeHelper.GetChild(obj, i));
        }
    }
}
