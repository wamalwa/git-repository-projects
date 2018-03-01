using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using MySql.Data;

namespace EventTrackerSystem.DAO
{
     
   public class EventTrackerDAO
    {
        //connection string variables
        private string connectionString = "";
        private string dbServer = "localhost";
        private string database = "eventtracker";
        private string dbUsername = "root";
        private string dbPassword = "";
        // 

       public EventTrackerDAO()
        {
            connectionString = "SERVER=" + dbServer + "; DATABASE=" + database + "; USERNAME=" + dbUsername + "; PASSWORD=" + dbPassword + ";";
        }

       //save registration details
       public bool RegisterAttendee(string first_name,string last_name,string email_address,string phone_number,string company_name)
       {
           //start funtion
           Loger.WriteLog("Enter function:" + GetType() + "- RegisterAttendee");

           //UID  BTA1000001 or 4254000001D ateTime.Now.ToString("yyyyMMddHHmmssffff");
           string uid = DateTime.Now.ToString("yyHHddMMmmss");
           Loger.WriteLog("Data:" + GetType() + "-uid-" + uid + ",first_name-" + first_name + ",last_name-" + last_name + ",email_address-" + email_address + ",phone_number-" + phone_number + ",company_anme-" + company_name);
           string sql = "INSERT INTO `attendee`(`id`, `uid`, `first_name`, `last_name`, `email_address`, `phone_number`, `company_name`, `regtime`) VALUES (NULL,'"
               +uid+"','"+ first_name + "','" + last_name + "','" + email_address + "','" + phone_number + "','" + company_name + "',NULL)";

           //mysql connection, command and resder clasess
           MySqlConnection con;
           MySqlCommand cmd;
           //creating the objects for connection
          
           con = new MySqlConnection(connectionString);
           cmd = new MySqlCommand(sql, con);
           try
           {
               con.Open();//open connection
               cmd.ExecuteNonQuery();// execute the sql command
               Loger.WriteLog("In function :" + GetType() + "- RegisterAttendee Success!");
               return true;// return true value
           }

           catch (MySqlException ex)// incase of errors catch them here
           {
               Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace);
               return false;
           }
           finally
           {
               //end function
               Loger.WriteLog("Leave function :" + GetType() + "- RegisterAttendee");
               con.Close();
           }
           
       }
       
       //get the attendee details
       public Attendee GetAttendeeUID_Details(string uid)
       {
           Loger.WriteLog("Enter function" + GetType() + "- GetAttendeeUID_Details");
           string sql = "SELECT `id`, `uid`, `first_name`, `last_name`, `email_address`, `phone_number`, `company_name`, `regtime` FROM `attendee` WHERE `uid`='" + uid+"'";

         Attendee details =null;

           //mysql connection, command and resder clasess
           MySqlConnection con;
           MySqlCommand cmd;
           MySqlDataReader dr;
           //creating the objects for connection
           con = new MySqlConnection(connectionString);
           cmd = new MySqlCommand(sql, con);
           try
           {
               con.Open();//open connection
               dr = cmd.ExecuteReader();
               Loger.WriteLog("In function :" + GetType() + "- GetAttendeeUID_Details Success!");
               if (dr.Read())
               {
                   details = new Attendee((int)dr["id"], dr["uid"].ToString(), dr["first_name"].ToString(), dr["last_name"].ToString(),
                       dr["email_address"].ToString(), dr["phone_number"].ToString(), dr["company_name"].ToString());
                   
               }
           }

           catch (MySqlException ex)// incase of errors catch them here
           {
               Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace);
           }
           finally
           {
               con.Close();
           }
           Loger.WriteLog("Leave function" + GetType() + "- GetAttendeeUID_Details");

           return details;
       }


       public Attendee GetAttendeeDetails(int id)
       {
           Loger.WriteLog("Enter function" + GetType() + "- GetAttendeeDetails");
           string sql = "SELECT `id`, `uid`, `first_name`, `last_name`, `email_address`, `phone_number`, `company_name`, `regtime` FROM `attendee` WHERE `id`=" + id;

           Attendee details =null;

           //mysql connection, command and resder clasess
           MySqlConnection con;
           MySqlCommand cmd;
           MySqlDataReader dr;
           //creating the objects for connection
           con = new MySqlConnection(connectionString);
           cmd = new MySqlCommand(sql, con);
           try
           {
               con.Open();//open connection
               dr = cmd.ExecuteReader();
               Loger.WriteLog("In function :" + GetType() + "- GetAttendeeDetails Success!");
               if (dr.Read())
               {
                   details = new Attendee(dr["uid"].ToString(), dr["first_name"].ToString(), dr["last_name"].ToString(),
                       dr["email_address"].ToString(), dr["phone_number"].ToString(), dr["company_name"].ToString());
                 
               }
           }

           catch (MySqlException ex)// incase of errors catch them here
           {
               Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace);
           }
           finally
           {
               con.Close();
           }
           Loger.WriteLog("Leave function" + GetType() + "- GetAttendeeDetails");

           return details;
       }

       public int GetLastAttendeeID()
       {
           Loger.WriteLog("Enter function" + GetType() + "- GetLastAttendeeID");
           int id  = 0;
           string sql = "SELECT  MAX(`id`) AS maxID FROM `attendee` WHERE 1";
           MySqlCommand cmd;
           MySqlDataReader dr;
           using (MySqlConnection con = new MySqlConnection(connectionString))
           {
               cmd = new MySqlCommand(sql, con);
               try
               {
                   con.Open();//open connection
                   dr = cmd.ExecuteReader();
                   Loger.WriteLog("In function :" + GetType() + "- GetLastAttendeeID Success!");
                   if (dr.Read())
                   {
                       id = (int)dr["maxID"];

                   }

               }

               catch (MySqlException ex)// incase of errors catch them here
               {
                   Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace);
               }
               finally
               {
                   con.Close(); con.Dispose();
               }
           }
           //end function
           Loger.WriteLog("Leave function" + GetType() + "- GetLastAttendeeID");
           return id;
       }

       //save picture
       public bool SavePicture(int id,byte[] picdata)
       {
           //start funtion
           Loger.WriteLog("Enter function:" + GetType() + "- SavePicture");

           bool results = false;
           string sql = "INSERT INTO `picture`(`p_id`, `id`, `picture_data`) VALUES (NULL,@id,@photo)";
           //mysql connection, command and resder clasess
           MySqlCommand cmd;
           //creating the objects for connection
           using (MySqlConnection con = new MySqlConnection(connectionString))
           {
               cmd = new MySqlCommand(sql, con);

               try
               {
                   con.Open();//open connection
                   cmd.Parameters.Add("@photo", MySqlDbType.VarBinary, 0);
                   cmd.Parameters["@photo"].Value = picdata;

                   cmd.Parameters.Add("@id", MySqlDbType.Int32);
                   cmd.Parameters["@id"].Value = id;

                   int response = cmd.ExecuteNonQuery();
                   if (response == 1)
                   {  //indiacates success in query execution otherwise there is a problem.
                       Loger.WriteLog("In function :" + GetType() + "- SavePicture Success!");
                       results = true;                     
                   }
                   else
                   {
                       Loger.WriteLog("In function :" + GetType() + "- SavePicture Failed!");
                       results = false;
                   }

               }

               catch (MySqlException ex)// incase of errors catch them here
               {
                   Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace);
               }
               finally
               { //end function
                   Loger.WriteLog("Leave function :" + GetType() + "- SavePicture");
                   con.Close(); con.Dispose();
               }
           }
           return results;          
         

       }

       public Picture GetPicture(int id)
       {
           Loger.WriteLog("Enter function" + GetType() + "- GetPicture");
           Picture picture =null;
           string sql = "SELECT `p_id`, `id`, `picture_data` FROM `picture` WHERE `id`=" + id;
           MySqlCommand cmd;
           MySqlDataReader dr;
           using (MySqlConnection con = new MySqlConnection(connectionString))
           {
               cmd = new MySqlCommand(sql, con);
               try
               {
                   con.Open();//open connection
                   dr = cmd.ExecuteReader();
                   Loger.WriteLog("In function :" + GetType() + "- GetPicture Success!");
                   if (dr.Read())
                   {
                       picture = new Picture((int)dr["p_id"], (byte[])dr["picture_data"]);

                   }

               }

               catch (MySqlException ex)// incase of errors catch them here
               {
                   Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace);
               }
               finally
               {
                   con.Close(); con.Dispose();
               }
           }
           //end function
           Loger.WriteLog("Leave function" + GetType() + "- GetPicture");
           return picture;


       }

       //checkin
       public bool CheckIn(string uid)
       {
           //start funtion
           Loger.WriteLog("Enter function:" + GetType() + "- CheckIn");

           string sql = "INSERT INTO `checkin`(`checkin_id`, `uid`, `checkin_time`) VALUES (NULL,'"+uid+"',NULL)";

           //mysql connection, command and resder clasess
           MySqlConnection con;
           MySqlCommand cmd;
           //creating the objects for connection

           con = new MySqlConnection(connectionString);
           cmd = new MySqlCommand(sql, con);
           try
           {
               con.Open();//open connection
               cmd.ExecuteNonQuery();// execute the sql command
               Loger.WriteLog("In function :" + GetType() + "- CheckIn Success!");
               return true;// return true value
           }

           catch (MySqlException ex)// incase of errors catch them here
           {
               Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace);
               return false;
           }
           finally
           {
               //end function
               Loger.WriteLog("Leave function :" + GetType() + "- CheckIn");
               con.Close();
           }

       }


       public bool CheckOut(string uid)
       {

           //start funtion
           Loger.WriteLog("Enter function:" + GetType() + " - CheckOut");

           string sql = "DELETE FROM `checkin` WHERE `uid`='" + uid + "'";

           //mysql connection, command and resder clasess
           MySqlConnection con;
           MySqlCommand cmd;
           //creating the objects for connection

           con = new MySqlConnection(connectionString);
           cmd = new MySqlCommand(sql, con);
           try
           {
               con.Open();//open connection

               int doIt = cmd.ExecuteNonQuery();// execute the sql command
               if (doIt == 1) { 
                  Loger.WriteLog("In function :" + GetType() + "- CheckOut Success!");
                  return true;// return true value
               }
               else
               {
                   return false;
               }
            
           }

           catch (MySqlException ex)// incase of errors catch them here
           {
               Loger.WriteLog(this.GetType() + "-Exception:" + ex.Message + Environment.NewLine + "StackTrace:" + ex.StackTrace);
               return false;
           }
           finally
           {
               //end function
               Loger.WriteLog("Leave function :" + GetType() + "- CheckOut");
               con.Close();
           }

       }
    }
}
