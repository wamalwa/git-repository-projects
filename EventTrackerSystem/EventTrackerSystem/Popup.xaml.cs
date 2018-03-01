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
using System.Windows.Threading;

namespace EventTrackerSystem
{
    /// <summary>
    /// Interaction logic for Popup.xaml
    /// </summary>
    public partial class Popup : Window
    {
        DispatcherTimer timer = new DispatcherTimer();
        double strV;
        public Popup(string message,string title)
        {
            InitializeComponent();
            Loger.WriteLog(this.GetType() + "- InitializeComponent");
            this.WindowState = System.Windows.WindowState.Maximized;
            //
            timer.Interval = TimeSpan.FromSeconds(1);
            timer.Tick += timer_Tick;
            timer.Start();
            this.Title = title;
            popupText.Text = message;
        }


        void timer_Tick(object sender, EventArgs e)
        {
            progressBarControl.Value = progressBarControl.Value + 5;

            strV = progressBarControl.Maximum - progressBarControl.Value;
            txtValue.Text = strV + " s";
            if (progressBarControl.Value == progressBarControl.Maximum)
            {
                timer.Stop();
                this.Close();

            }
        }

        private void button1_Click(object sender, RoutedEventArgs e)
        {
            timer.Stop();
            this.Close();
        }
    }
}
