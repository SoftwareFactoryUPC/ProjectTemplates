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
    /// Lógica de interacción para AgregarClases.xaml
    /// </summary>
    public partial class AgregarClases : Window
    {
        public AgregarClases()
        {
            InitializeComponent();
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            DialogResult = false;
        }

        private void btnAgregar_Click(object sender, RoutedEventArgs e)
        {
            float creditos;
            bool resultado = true;

            if (txtMateria.Text.Trim().Length == 0)
            {
                MessageBox.Show("Digite el nombre de la materia.", 
                    "Materia Invalido",
                    MessageBoxButton.OK, 
                    MessageBoxImage.Warning);
                txtMateria.Focus();
                resultado = false;
            }

            if (txtDescripcion.Text.Trim().Length == 0)
            {
                MessageBox.Show("Digite la descripcion de la materia.", 
                    "Descripcion Invalido",
                    MessageBoxButton.OK, 
                    MessageBoxImage.Warning);
                txtDescripcion.Focus();
                resultado = false;
            }

            if(float.TryParse(txtCreditos.Text, out creditos) == false)
            {
                MessageBox.Show("El credito debe ser un numero.",
                    "Credito Invalido",
                    MessageBoxButton.OK,
                    MessageBoxImage.Warning);
                txtCreditos.Focus();
                resultado = false;
            }


            if (resultado)
            {
                try
                {
                    tblClase clase = new tblClase();
                    clase.NombreDeMateria = txtMateria.Text.Trim();
                    clase.DescripcionDeMateria = txtDescripcion.Text.Trim();
                    clase.CreditosHoras = creditos;
                    
                    Administrador.agregarClases(clase);


                    MessageBox.Show("La clase: " + clase.NombreDeMateria + " fue agregada al sistema");
                    
                    ClearControles(this);
                    txtMateria.Focus();
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error al agregar clase", ex.ToString());
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

        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            txtMateria.Focus();
        }

        private void txtMateria_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.Key == Key.Enter)
            {
                txtDescripcion.Focus();
            }
        }

        private void txtDescripcion_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.Key == Key.Enter)
            {
                txtCreditos.Focus();
            }
        }

        private void txtCreditos_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.Key == Key.Enter)
            {
                btnAgregar.Focus();
            }
        }
    }
}
