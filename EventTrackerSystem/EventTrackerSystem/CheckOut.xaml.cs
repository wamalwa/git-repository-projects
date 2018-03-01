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
    /// Interaction logic for CheckOut.xaml
    /// </summary>
    public partial class CheckOut : Page
    {
        DAO.EventTrackerDAO eventTracker = null;
        DispatcherTimer timer = new DispatcherTimer(); 
        double strV;
        string uid = null;
        public CheckOut()
        {
            InitializeComponent();
            Loger.WriteLog(this.GetType() + "- InitializeComponent");
            // CheckIn_Button.Visibility = Visibility.Hidden;
            eventTracker = new DAO.EventTrackerDAO();

            //
            timer.Interval = TimeSpan.FromSeconds(1);
            timer.Tick += timer_Tick;
            timer.Start();
        }

        void timer_Tick(object sender, EventArgs e)
        {
            progressBarControl.Value = progressBarControl.Value + 1;

            strV = progressBarControl.Maximum - progressBarControl.Value;
            txtValue.Text = strV + " s";
            if (progressBarControl.Value == progressBarControl.Maximum)
            {
                timer.Stop();
                // MessageBox.Show("Page Timeout!","Timeout");  
                //move to home page
                Uri uri = new Uri("Menu.xaml", UriKind.Relative);
                this.NavigationService.Navigate(uri);

            }
        }

        private void btnHome_Click(object sender, RoutedEventArgs e)
        {
            //move to home page
            Uri uri = new Uri("Menu.xaml", UriKind.Relative);
            this.NavigationService.Navigate(uri); 
        }

        private void CheckIn_Button_Click(object sender, RoutedEventArgs e)
        {
            Loger.WriteLog(this.GetType() + "-" + CheckIn_Button.Name + " Clicked");
        
            uid = txtGetUID.Text.Trim();
            if (!string.IsNullOrEmpty(uid))
            {
                //check in
                if (eventTracker.CheckOut(uid))
                {
                    Loger.WriteLog(this.GetType() + "-Check Out Successful!");
                    Helper.ShowPopUp("Thank You for Visiting this Exhibition!", "CheckOut Success");

                    timer.Stop();          
                    //move to home page
                    Uri uri = new Uri("Menu.xaml", UriKind.Relative);
                    this.NavigationService.Navigate(uri); 
                }
                else
                {
                    Loger.WriteLog(this.GetType() + "- Check Out Failed!");
                    Helper.ShowPopUp("You are already checked Out!", "Checked Out");

                }
            }
            else
            {
                Helper.ShowPopUp("No User ID!", "Check Out");
                Loger.WriteLog(this.GetType() + "- No UID!");
            }
           
                         
          
        }
    }
}
