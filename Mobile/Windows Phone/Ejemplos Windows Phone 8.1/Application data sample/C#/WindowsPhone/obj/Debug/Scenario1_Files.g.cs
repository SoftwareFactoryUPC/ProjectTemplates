﻿

#pragma checksum "D:\Andres\Descargas\Windows Phone 8.1 samples\Application data sample\C#\WindowsPhone\Scenario1_Files.xaml" "{406ea660-64cf-4c82-b6f0-42d48172a799}" "C9B13E9CA40C979DFDB2F61EC07B0A8D"
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

namespace ApplicationDataSample
{
    partial class Files : global::Windows.UI.Xaml.Controls.Page, global::Windows.UI.Xaml.Markup.IComponentConnector
    {
        [global::System.CodeDom.Compiler.GeneratedCodeAttribute("Microsoft.Windows.UI.Xaml.Build.Tasks"," 4.0.0.0")]
        [global::System.Diagnostics.DebuggerNonUserCodeAttribute()]
 
        public void Connect(int connectionId, object target)
        {
            switch(connectionId)
            {
            case 1:
                #line 43 "..\..\Scenario1_Files.xaml"
                ((global::Windows.UI.Xaml.Controls.Primitives.ButtonBase)(target)).Click += this.Increment_Local_Click;
                 #line default
                 #line hidden
                break;
            case 2:
                #line 45 "..\..\Scenario1_Files.xaml"
                ((global::Windows.UI.Xaml.Controls.Primitives.ButtonBase)(target)).Click += this.Increment_LocalCache_Click;
                 #line default
                 #line hidden
                break;
            case 3:
                #line 47 "..\..\Scenario1_Files.xaml"
                ((global::Windows.UI.Xaml.Controls.Primitives.ButtonBase)(target)).Click += this.Increment_Roaming_Click;
                 #line default
                 #line hidden
                break;
            case 4:
                #line 49 "..\..\Scenario1_Files.xaml"
                ((global::Windows.UI.Xaml.Controls.Primitives.ButtonBase)(target)).Click += this.Increment_Temporary_Click;
                 #line default
                 #line hidden
                break;
            }
            this._contentLoaded = true;
        }
    }
}


