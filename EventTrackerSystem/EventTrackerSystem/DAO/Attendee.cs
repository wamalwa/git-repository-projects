using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EventTrackerSystem.DAO
{
 public  class Attendee
    {
        public int ID { get; set; }
        public string UID { get; set; }
        public string FISRT_NAME { get; set; }
        public string LAST_NAME { get; set; }
        public string COMPANY_NAME { get; set; }
        public string EMAIL_ADDRESS { get; set; }
        public string PHONE_NUMBER { get; set; }



        public Attendee(string uid,string first_name,string last_name,string email_address,string phone_number,string company_name) {
            this.UID = uid;
            this.FISRT_NAME = first_name;
            this.LAST_NAME = last_name;
            this.EMAIL_ADDRESS = email_address;
            this.PHONE_NUMBER = phone_number;
            this.COMPANY_NAME = company_name;
        }

        public Attendee(int id,string uid, string first_name, string last_name, string email_address, string phone_number, string company_name)
        {
            this.ID = id;
            this.UID = uid;
            this.FISRT_NAME = first_name;
            this.LAST_NAME = last_name;
            this.EMAIL_ADDRESS = email_address;
            this.PHONE_NUMBER = phone_number;
            this.COMPANY_NAME = company_name;
        }

    }
}
