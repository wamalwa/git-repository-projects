﻿#pragma checksum "..\..\CheckIn.xaml" "{406ea660-64cf-4c82-b6f0-42d48172a799}" "603F8315EB3C2C1D0FE2C9ED6A05696C"
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//     Runtime Version:4.0.30319.34209
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
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


namespace EventTrackerSystem {
    
    
    /// <summary>
    /// CheckIn
    /// </summary>
    public partial class CheckIn : System.Windows.Controls.Page, System.Windows.Markup.IComponentConnector {
        
        
        #line 14 "..\..\CheckIn.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBlock txtCheckIn;
        
        #line default
        #line hidden
        
        
        #line 16 "..\..\CheckIn.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox txtGetUID;
        
        #line default
        #line hidden
        
        
        #line 17 "..\..\CheckIn.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button CheckIn_Button;
        
        #line default
        #line hidden
        
        
        #line 20 "..\..\CheckIn.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Image imgPicture;
        
        #line default
        #line hidden
        
        
        #line 22 "..\..\CheckIn.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBlock txtUID;
        
        #line default
        #line hidden
        
        
        #line 23 "..\..\CheckIn.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBlock txtNameCombined;
        
        #line default
        #line hidden
        
        
        #line 25 "..\..\CheckIn.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button Load_Button;
        
        #line default
        #line hidden
        
        
        #line 26 "..\..\CheckIn.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ProgressBar progressBarControl;
        
        #line default
        #line hidden
        
        
        #line 27 "..\..\CheckIn.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBlock txtValue;
        
        #line default
        #line hidden
        
        
        #line 28 "..\..\CheckIn.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btnHome;
        
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
            System.Uri resourceLocater = new System.Uri("/EventTrackerSystem;component/checkin.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\CheckIn.xaml"
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
            this.txtCheckIn = ((System.Windows.Controls.TextBlock)(target));
            return;
            case 2:
            this.txtGetUID = ((System.Windows.Controls.TextBox)(target));
            return;
            case 3:
            this.CheckIn_Button = ((System.Windows.Controls.Button)(target));
            
            #line 17 "..\..\CheckIn.xaml"
            this.CheckIn_Button.Click += new System.Windows.RoutedEventHandler(this.CheckIn_Button_Click);
            
            #line default
            #line hidden
            return;
            case 4:
            this.imgPicture = ((System.Windows.Controls.Image)(target));
            return;
            case 5:
            this.txtUID = ((System.Windows.Controls.TextBlock)(target));
            return;
            case 6:
            this.txtNameCombined = ((System.Windows.Controls.TextBlock)(target));
            return;
            case 7:
            this.Load_Button = ((System.Windows.Controls.Button)(target));
            
            #line 25 "..\..\CheckIn.xaml"
            this.Load_Button.Click += new System.Windows.RoutedEventHandler(this.button1_Click);
            
            #line default
            #line hidden
            return;
            case 8:
            this.progressBarControl = ((System.Windows.Controls.ProgressBar)(target));
            return;
            case 9:
            this.txtValue = ((System.Windows.Controls.TextBlock)(target));
            return;
            case 10:
            this.btnHome = ((System.Windows.Controls.Button)(target));
            
            #line 28 "..\..\CheckIn.xaml"
            this.btnHome.Click += new System.Windows.RoutedEventHandler(this.btnHome_Click);
            
            #line default
            #line hidden
            return;
            }
            this._contentLoaded = true;
        }
    }
}

