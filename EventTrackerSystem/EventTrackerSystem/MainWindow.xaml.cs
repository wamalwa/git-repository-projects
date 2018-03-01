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
using WebcamControl;
using Microsoft.Expression.Encoder.Devices;
using System.IO;
using System.Windows.Threading;

namespace EventTrackerSystem
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow :Window
    {
        public MainWindow()
        {
            Loger.WriteLog("Application Start within MainWindow");
            InitializeComponent();
            this.WindowState = System.Windows.WindowState.Maximized;
            //Page p = new Menu();
            //this.Content = p;
            Helper.NavigatePage(new Menu());
            this.Close();
        }


    }
}
