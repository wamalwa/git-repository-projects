using System;
using System.Collections.Generic;
using System.Drawing;
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
    /// Interaction logic for CheckIn.xaml
    /// </summary>
    public partial class CheckIn : Page
    {
        DAO.EventTrackerDAO eventTracker = null;
        DAO.Attendee attendees = null;
        DAO.Picture picture = null;
        DispatcherTimer timer = new DispatcherTimer();
        double strV;
        string uid = null;
        public CheckIn()
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

        private void button1_Click(object sender, RoutedEventArgs e)
        {
            Loger.WriteLog(this.GetType() + "-" + Load_Button.Name + " Clicked");

            if(!string.IsNullOrEmpty(txtGetUID.Text))
            {
                 uid = txtGetUID.Text.Trim();
               
              attendees= eventTracker.GetAttendeeUID_Details(uid);
         

              if (attendees != null)
              {
                  int id = attendees.ID;
                  CheckIn_Button.Visibility = Visibility.Visible;
                  Loger.WriteLog(GetType() + "- attendees has data");
                  //loading data to controls
                  txtUID.Text = attendees.UID;
                  //load the picture
                  picture = eventTracker.GetPicture(id);
                  //coverting the byte array to Bitmap or Image
                  try { 
                  if (picture.PICTURE != null)
                  {
                      Bitmap b = Helper.byteArrayToImage(picture.PICTURE);
                      //load the image
                      imgPicture.Source = Helper.LoadBitmap(b);
                  }
                  else { }
                  }
                  catch (Exception ex) { Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace); }
                  txtNameCombined.Text = attendees.LAST_NAME + " " + attendees.FISRT_NAME;

              }
              else
              {
                  Helper.ShowPopUp("No records found for " + txtGetUID.Text, "No Record!");
                  Loger.WriteLog(this.GetType() + "- No Record found for " + txtGetUID.Text);
              }

            }
            else
            {

                Helper.ShowPopUp("Please enter Card number before you check!", "No Card Number");
              
                Loger.WriteLog(this.GetType() + "- Please enter Card number before you check!");
            }
        }

        private void CheckIn_Button_Click(object sender, RoutedEventArgs e)
        {
            Loger.WriteLog(this.GetType() + "-" + Load_Button.Name + " Clicked");
         

            if(uid!=null)
            {
                //check in
              if(eventTracker.CheckIn(uid))
              {
                  Loger.WriteLog(this.GetType() + "-Check in Successful!");
                  Helper.ShowPopUp("You have checked in successfully!", "CheckIn Success");
                  timer.Stop();
                          
                  //move to home page
                  Uri uri = new Uri("Menu.xaml", UriKind.Relative);
                  this.NavigationService.Navigate(uri); 
              }
              else
              {
                  Loger.WriteLog(this.GetType() + "- Check in Failed!");
                  Helper.ShowPopUp("You are already checked in!", "Checked In");
             
              }
            }
            else
            {
                Loger.WriteLog(this.GetType() + "- No UID!");
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
