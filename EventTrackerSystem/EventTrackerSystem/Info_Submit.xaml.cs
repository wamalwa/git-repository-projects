using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
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
    /// Interaction logic for Info_Submit.xaml
    /// </summary>
    public partial class Info_Submit : Page
    {
        DispatcherTimer timer = new DispatcherTimer();
        double strV;
        public Info_Submit()
        {
            InitializeComponent();
        
            timer.Interval = TimeSpan.FromSeconds(1);
            timer.Tick += timer_Tick;
            timer.Start();
        }

        void timer_Tick(object sender, EventArgs e)
        {
            progressBarControl.Value=progressBarControl.Value+1;

            strV = progressBarControl.Maximum - progressBarControl.Value;
            txtValue.Text = strV + " s";
            if (progressBarControl.Value == progressBarControl.Maximum)
            {   timer.Stop();  
               // MessageBox.Show("Page Timeout!","Timeout");  
               //move to home page
               Uri uri = new Uri("Menu.xaml", UriKind.Relative);
               this.NavigationService.Navigate(uri);  
                         
            }
        }

        private void Next_button_Click(object sender, RoutedEventArgs e)
        {
            timer.Stop();
            Loger.WriteLog(this.GetType() + "-" + Next_button.Name + "Clicked");

            if (!string.IsNullOrEmpty(txtFirstName.Text) && !string.IsNullOrEmpty(txtLastName.Text) && !string.IsNullOrEmpty(txtEmailAddress.Text))
            {
                Loger.WriteLog(this.GetType() + "- The fields have data");
               
                //clean input data
               string firstName=txtFirstName.Text.Trim();
               string lastName=txtLastName.Text.Trim();
                string emailAddres=txtEmailAddress.Text.Trim();
                string phoneNumber=txtPhoneNumber.Text.Trim();
                string companyName = txtCompanyName.Text.Trim();

                DAO.EventTrackerDAO eventTracker = new DAO.EventTrackerDAO();
                if (eventTracker.RegisterAttendee(firstName, lastName, emailAddres, phoneNumber, companyName))
                {
                    Loger.WriteLog(this.GetType() + "- RegisterAttendee return true, navigate to the next page");
                    //move to next page
                    Uri uri = new Uri("Take_Photo.xaml", UriKind.Relative);
                    this.NavigationService.Navigate(uri);    
                }
                else
                {
                    Loger.WriteLog(this.GetType() + "- RegisterAttendee return false, a message must be shown");
                    Helper.ShowPopUp("Error Registering Attendee!","Registration Error!");
                }
                    
            }
            else
            {
                Helper.ShowPopUp("Please fill the fields and continue!","Empty Fields");
                Loger.WriteLog(this.GetType() + "- Empty fields");
            }

        }

        private void btnHome_Click(object sender, RoutedEventArgs e)
        {
            //move to home page
            Uri uri = new Uri("Menu.xaml", UriKind.Relative);
            this.NavigationService.Navigate(uri); 
        }
    }
}
