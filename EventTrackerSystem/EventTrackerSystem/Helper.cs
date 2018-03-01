using System;
using System.IO;
using System.Linq;
using System.Text;
using System.Collections.Generic;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Drawing;


namespace EventTrackerSystem
{
    //Design by Pongsakorn Poosankam
    class Helper
    {
        //Block Memory Leak
        [System.Runtime.InteropServices.DllImport("gdi32.dll")]
        public static extern bool DeleteObject(IntPtr handle);
        public static BitmapSource bs;
        public static IntPtr ip;
        public static BitmapSource LoadBitmap(System.Drawing.Bitmap source)
        {

            ip = source.GetHbitmap();

            bs = System.Windows.Interop.Imaging.CreateBitmapSourceFromHBitmap(ip, IntPtr.Zero, System.Windows.Int32Rect.Empty,

                System.Windows.Media.Imaging.BitmapSizeOptions.FromEmptyOptions());

            DeleteObject(ip);

            return bs;

        }
        public static void SaveImageCapture(BitmapSource bitmap)
        {
            JpegBitmapEncoder encoder = new JpegBitmapEncoder();
            encoder.Frames.Add(BitmapFrame.Create(bitmap));
            encoder.QualityLevel = 100;


            // Configure save file dialog box
            Microsoft.Win32.SaveFileDialog dlg = new Microsoft.Win32.SaveFileDialog();
            dlg.FileName = "Image"; // Default file name
            dlg.DefaultExt = ".Jpg"; // Default file extension
            dlg.Filter = "Image (.jpg)|*.jpg"; // Filter files by extension

            // Show save file dialog box
            Nullable<bool> result = dlg.ShowDialog();

            // Process save file dialog box results
            if (result == true)
            {
                // Save Image
                string filename = dlg.FileName;
                FileStream fstream = new FileStream(filename, FileMode.Create);
                encoder.Save(fstream);
                fstream.Close();
            }

        }

        public static Bitmap byteArrayToImage(byte[] byteArrayIn)
        {
            MemoryStream ms = new MemoryStream(byteArrayIn);
            return new Bitmap(Image.FromStream(ms));
        }

        public static void NavigatePage(Object o)
        {
            //navigating from a Window to a page. Create a navigationwindow object which you can use to open the other pages
            NavigationWindow navPage = new NavigationWindow();
            navPage.Navigate(o);
            navPage.WindowState = System.Windows.WindowState.Maximized;
            navPage.WindowStartupLocation = System.Windows.WindowStartupLocation.CenterScreen;
            navPage.Show();
            
        }

        public static void NavigatePageService(string page)
        {
            //navigating from a Window to a page. Create a navigationwindow object which you can use to open the other pages
            // Create a pack URI
            Uri uri = new Uri(page, UriKind.Relative);
            System.Windows.Controls.Page p = new System.Windows.Controls.Page();
            p.NavigationService.Navigate(uri);

        }


        public static void ShowPopUp(string message,string title)
        {
            Popup p = new Popup(message, title);
            p.Show();
        }
    }
}
