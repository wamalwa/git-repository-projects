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
using WebcamControl;
using System.IO;
using Microsoft.Expression.Encoder.Devices;
using System.Drawing;
using System.Diagnostics;
using System.Windows.Threading;

namespace EventTrackerSystem
{
    /// <summary>
    /// Interaction logic for Take_Photo.xaml
    /// </summary>
    public partial class Take_Photo : Page
    {
        byte[] picture = null;
        int id = 0;
        System.Collections.ObjectModel.Collection<EncoderDevice> vida = new System.Collections.ObjectModel.Collection<EncoderDevice>();
        DispatcherTimer timer = new DispatcherTimer();
        double strV;

        public Take_Photo()
        {
            InitializeComponent();
            Loger.WriteLog(this.GetType() + "- InitializeComponent");


            timer.Interval = TimeSpan.FromSeconds(1);
            timer.Tick += timer_Tick;
            timer.Start();
            // Find available a/v devices
            vida = EncoderDevices.FindDevices(EncoderDeviceType.Video);
           
            Binding binding_1 = new Binding("SelectedValue");
            binding_1.Source = VideoDevicesComboBox;
            WebcamCtrl.SetBinding(Webcam.VideoDeviceProperty, binding_1);            
            // Create directory for saving image files
            string imagePath = @"WebcamSnapshots";

            if (!Directory.Exists(imagePath))
            {
                Directory.CreateDirectory(imagePath);
            }

            //// Set some properties of the Webcam control
            WebcamCtrl.ImageDirectory = imagePath;
            VideoDevicesComboBox.ItemsSource = vida;;
            VideoDevicesComboBox.SelectedIndex = 0;

            //start the preview
            try
            {

                // Display webcam video
                WebcamCtrl.StartPreview();
            }
            catch (Microsoft.Expression.Encoder.SystemErrorException ex)
            {
                Helper.ShowPopUp("Device is in use by another application","Device Busy");
                Loger.WriteLog(this.GetType() + "-Exception:"+ex.Message+Environment.NewLine+ "StackTrace:"+ex.StackTrace);
            }
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
        public void ConvertImageandDisplay() {
            Loger.WriteLog("Enter function" + GetType() + "- ConvertImageandDisplay");
            try
            {
                //get the directory and the file name
            string file_name = System.IO.Directory.GetCurrentDirectory() + "\\WebcamSnapshots\\Snapshot.JPEG";
            //coverting the iamge from file to bitmap
            Bitmap bi = (Bitmap)Bitmap.FromFile(file_name);
            //displaying the image in the Image control WPF
            imagePrev.Source = Helper.LoadBitmap(bi);
            //converting the image to byte array ready to be saved to database.
            picture = File.ReadAllBytes(file_name);
            //disposing the image object before deleting
            bi.Dispose();
            File.Delete(file_name);//to save memory
            }
            catch (Exception ex)
            {
                Helper.ShowPopUp("An Error Occurred!! Please check log for errors","Exception");
                Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace);
            }
            
        }

        private void TakePhoto_button_Click(object sender, RoutedEventArgs e)
        {
            Loger.WriteLog(this.GetType() + "-" + TakePhoto_button.Name + "Clicked");
           // timer.Stop();
            try {
                // Take snapshot of webcam video.
                WebcamCtrl.TakeSnapshot();
               }
            catch (Exception ex)
            {
                Helper.ShowPopUp("An Error Occurred!! Please check log for errors", "Exception");
                Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace);
            }
      
           ConvertImageandDisplay();
          
        }

        private void Finish_button_Click(object sender, RoutedEventArgs e)
        {
            Loger.WriteLog(this.GetType() + "-" + Finish_button.Name + "Clicked");
            timer.Stop();
            try
            {
                DAO.EventTrackerDAO et = new DAO.EventTrackerDAO();
                //get the last Attendeee ID
                id= et.GetLastAttendeeID();
                //user id
                App.Current.Properties["UserID"] = id;
                if (et.SavePicture(id, picture))
                {
                    Loger.WriteLog(this.GetType() + "- SavePicture return true, navigate to the next page");
                    //move to next page
                    Uri uri = new Uri("Notification.xaml", UriKind.Relative);
                    this.NavigationService.Navigate(uri);
                }
                else
                {
                    Loger.WriteLog(this.GetType() + "- SavePicture return false, a message must be shown");
                    Helper.ShowPopUp("An Error Occurred while Saving Picture!", "Failed to Save");
                }
            

            }
            catch (Exception ex)
            {
                Helper.ShowPopUp("An Error Occurred!! Please check log for errors", "Exception");
                Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace);
            }
      

        }

        private void Back_button_Click(object sender, RoutedEventArgs e)
        {
            timer.Stop();
            Loger.WriteLog(this.GetType() + "-" + Back_button.Name + "Clicked");
            Uri uri = new Uri("Info_Submit.xaml", UriKind.Relative);
            this.NavigationService.Navigate(uri);
           
        }


        private void btnHome_Click(object sender, RoutedEventArgs e)
        {
            //move to home page
            Uri uri = new Uri("Menu.xaml", UriKind.Relative);
            this.NavigationService.Navigate(uri); 
        }

    }
}