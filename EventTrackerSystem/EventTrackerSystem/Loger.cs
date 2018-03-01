using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.IO;

/// <summary>
/// Summary description for WriteLog
/// </summary>
public class Loger
{

    public static void WriteLog(string message)
    {

        string file_name = System.IO.Directory.GetCurrentDirectory() + "\\log\\" + DateTime.Today.ToString("yyyyMMdd") + ".txt";
        if (!Directory.Exists(System.IO.Directory.GetCurrentDirectory() + "\\Log\\"))
        {
            //   Directory.CreateDirectory(System.Windows.Forms.Application.StartupPath + "\\Log\\");
            Directory.CreateDirectory(System.IO.Directory.GetCurrentDirectory() + "\\Log\\");
        }
        StreamWriter sw = null;
        FileStream fs = null;
        try
        {
            fs = new FileStream(file_name, FileMode.Append, FileAccess.Write, FileShare.Write);
            using (sw = new StreamWriter(fs))
            {
                sw.WriteLine(DateTime.Now.ToString("HH:mm:ss.fff") + " - " + message);
                sw.Flush();
                sw.Close();
            }
            fs.Close();
        }
        catch { }
        finally
        {
            if (sw != null) sw.Close();
            if (fs != null) fs.Close();
        }

    }


}