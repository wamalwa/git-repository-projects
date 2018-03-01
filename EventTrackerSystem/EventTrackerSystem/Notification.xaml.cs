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

namespace EventTrackerSystem
{
    /// <summary>
    /// Interaction logic for Notification.xaml
    /// </summary>
    public partial class Notification : Page
    {
        DAO.EventTrackerDAO eventTracker = null;
        DAO.Attendee attendees = null;
        DAO.Picture picture = null;
        int id = 0;
        public Notification()
        {
            InitializeComponent();
            Loger.WriteLog(this.GetType() + "- InitializeComponent");
            eventTracker = new DAO.EventTrackerDAO();
            try{
                id =(int)App.Current.Properties["UserID"];
            }
            catch(Exception ex)
            { 
                Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace); 
            
            }
            //get all the attendee's details
            attendees= eventTracker.GetAttendeeDetails(id);

            if(attendees!=null)
            {
                Loger.WriteLog(GetType() + "- attendees has data");
                //loading data to controls
                txtUID.Text = attendees.UID;
                //load the picture
                 picture= eventTracker.GetPicture(id);
                //coverting the byte array to Bitmap or Image
                Bitmap b =Helper.byteArrayToImage(picture.PICTURE);
                //load the image
                imgPicture.Source = Helper.LoadBitmap(b);

                txtNameCombined.Text = attendees.LAST_NAME + " " + attendees.FISRT_NAME;
            }
            else
            {
                Helper.ShowPopUp("No Record found for " + txtUID.Text, "Empty Records!");
                Loger.WriteLog(this.GetType() + "- No Record found for " + txtUID.Text);
            }
            
        }


        private void button1_Click(object sender, RoutedEventArgs e)
        {
            Helper.ShowPopUp("Click Ok to print your Card","Print Card?");
            Uri uri = new Uri("Menu.xaml", UriKind.Relative);
            this.NavigationService.Navigate(uri); 
        }


        private void Grid_Loaded(object sender, RoutedEventArgs e)
        {
         
        }

        private void btnHome_Click(object sender, RoutedEventArgs e)
        {
            Uri uri = new Uri("Menu.xaml", UriKind.Relative);
            this.NavigationService.Navigate(uri);  
        }
    }
}
