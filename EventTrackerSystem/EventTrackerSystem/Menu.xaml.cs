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
using System.Windows.Threading;

namespace EventTrackerSystem
{
    /// <summary>
    /// Interaction logic for Menu.xaml
    /// </summary>
    public partial class Menu : Page
    {
        public Menu()
        {
            InitializeComponent(); 
            DispatcherTimer timer = new DispatcherTimer();
       
            Loger.WriteLog("Application Start within Menu");
            timer.Interval = TimeSpan.FromSeconds(1);
            timer.Tick += timer_Tick;
            timer.Start();
            lblToday.Content = DateTime.Now.ToLongDateString() + Environment.NewLine + "    " + DateTime.Now.ToLongTimeString();
            
        }
        void timer_Tick(object sender, EventArgs e)
        {
            lblToday.Content = DateTime.Now.ToLongDateString() + Environment.NewLine+"    "+ DateTime.Now.ToLongTimeString();
        }


        private void Register_Button_Click(object sender, RoutedEventArgs e)
        {
            Loger.WriteLog(this.GetType() + "-" + Register_Button.Name + " Clicked");
            //move to next page
            Uri uri = new Uri("Info_Submit.xaml", UriKind.Relative);
            this.NavigationService.Navigate(uri);          
        }


        private void Checkin_Button_Click(object sender, RoutedEventArgs e)
        {
            Loger.WriteLog(this.GetType() + "-" + Checkin_Button.Name + " Clicked");
            //move to next page
            Uri uri = new Uri("CheckIn.xaml", UriKind.Relative);
            this.NavigationService.Navigate(uri);  
        }

        private void button1_Click(object sender, RoutedEventArgs e)
        {
            Loger.WriteLog(this.GetType() + "-" + Checkin_Button.Name + " Clicked");
            //move to next page
            Uri uri = new Uri("CheckOut.xaml", UriKind.Relative);
            this.NavigationService.Navigate(uri);  
        }

    }
}
