﻿#pragma checksum "..\..\AgregarEstudiantes.xaml" "{406ea660-64cf-4c82-b6f0-42d48172a799}" "ED37D42EEAEE7DE63F94ECB3F4461353"
//------------------------------------------------------------------------------
// <auto-generated>
//     Este código fue generado por una herramienta.
//     Versión de runtime:4.0.30319.18444
//
//     Los cambios en este archivo podrían causar un comportamiento incorrecto y se perderán si
//     se vuelve a generar el código.
// </auto-generated>
//------------------------------------------------------------------------------

using System;
using System.Diagnostics;
using System.Windows;
using System.Windows.Automation;
using System.Windows.Controls;
using System.Windows.Controls.Primitives;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Ink;
using System.Windows.Input;
using System.Windows.Markup;
using System.Windows.Media;
using System.Windows.Media.Animation;
using System.Windows.Media.Effects;
using System.Windows.Media.Imaging;
using System.Windows.Media.Media3D;
using System.Windows.Media.TextFormatting;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Windows.Shell;


namespace WpfXamlDemo {
    
    
    /// <summary>
    /// AgregarEstudiantes
    /// </summary>
    public partial class AgregarEstudiantes : System.Windows.Window, System.Windows.Markup.IComponentConnector {
        
        
        #line 11 "..\..\AgregarEstudiantes.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.RadioButton rdbHombre;
        
        #line default
        #line hidden
        
        
        #line 12 "..\..\AgregarEstudiantes.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.RadioButton rdbMujer;
        
        #line default
        #line hidden
        
        
        #line 13 "..\..\AgregarEstudiantes.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox txtNombre;
        
        #line default
        #line hidden
        
        
        #line 14 "..\..\AgregarEstudiantes.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox txtApellido;
        
        #line default
        #line hidden
        
        
        #line 15 "..\..\AgregarEstudiantes.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox txtPromedio;
        
        #line default
        #line hidden
        
        
        #line 16 "..\..\AgregarEstudiantes.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btnAgregar;
        
        #line default
        #line hidden
        
        private bool _contentLoaded;
        
        /// <summary>
        /// InitializeComponent
        /// </summary>
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.0.0.0")]
        public void InitializeComponent() {
            if (_contentLoaded) {
                return;
            }
            _contentLoaded = true;
            System.Uri resourceLocater = new System.Uri("/WpfXamlDemo;component/agregarestudiantes.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\AgregarEstudiantes.xaml"
            System.Windows.Application.LoadComponent(this, resourceLocater);
            
            #line default
            #line hidden
        }
        
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.0.0.0")]
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Never)]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Design", "CA1033:InterfaceMethodsShouldBeCallableByChildTypes")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Maintainability", "CA1502:AvoidExcessiveComplexity")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1800:DoNotCastUnnecessarily")]
        void System.Windows.Markup.IComponentConnector.Connect(int connectionId, object target) {
            switch (connectionId)
            {
            case 1:
            
            #line 4 "..\..\AgregarEstudiantes.xaml"
            ((WpfXamlDemo.AgregarEstudiantes)(target)).Loaded += new System.Windows.RoutedEventHandler(this.Window_Loaded);
            
            #line default
            #line hidden
            return;
            case 2:
            this.rdbHombre = ((System.Windows.Controls.RadioButton)(target));
            
            #line 11 "..\..\AgregarEstudiantes.xaml"
            this.rdbHombre.KeyDown += new System.Windows.Input.KeyEventHandler(this.rdbHombre_KeyDown);
            
            #line default
            #line hidden
            return;
            case 3:
            this.rdbMujer = ((System.Windows.Controls.RadioButton)(target));
            
            #line 12 "..\..\AgregarEstudiantes.xaml"
            this.rdbMujer.KeyDown += new System.Windows.Input.KeyEventHandler(this.rdbMujer_KeyDown);
            
            #line default
            #line hidden
            return;
            case 4:
            this.txtNombre = ((System.Windows.Controls.TextBox)(target));
            
            #line 13 "..\..\AgregarEstudiantes.xaml"
            this.txtNombre.KeyDown += new System.Windows.Input.KeyEventHandler(this.txtNombre_KeyDown);
            
            #line default
            #line hidden
            return;
            case 5:
            this.txtApellido = ((System.Windows.Controls.TextBox)(target));
            
            #line 14 "..\..\AgregarEstudiantes.xaml"
            this.txtApellido.KeyDown += new System.Windows.Input.KeyEventHandler(this.txtApellido_KeyDown);
            
            #line default
            #line hidden
            return;
            case 6:
            this.txtPromedio = ((System.Windows.Controls.TextBox)(target));
            
            #line 15 "..\..\AgregarEstudiantes.xaml"
            this.txtPromedio.KeyDown += new System.Windows.Input.KeyEventHandler(this.txtPromedio_KeyDown);
            
            #line default
            #line hidden
            return;
            case 7:
            this.btnAgregar = ((System.Windows.Controls.Button)(target));
            
            #line 16 "..\..\AgregarEstudiantes.xaml"
            this.btnAgregar.Click += new System.Windows.RoutedEventHandler(this.btnAgregar_Click);
            
            #line default
            #line hidden
            return;
            case 8:
            
            #line 17 "..\..\AgregarEstudiantes.xaml"
            ((System.Windows.Controls.Button)(target)).Click += new System.Windows.RoutedEventHandler(this.Button_Click);
            
            #line default
            #line hidden
            return;
            }
            this._contentLoaded = true;
        }
    }
}

