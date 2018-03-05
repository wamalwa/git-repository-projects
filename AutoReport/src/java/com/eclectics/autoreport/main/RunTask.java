package com.eclectics.autoreport.main;
import com.eclectics.autoreport.utils.DBFunctions;
import com.eclectics.autoreport.utils.Logging;
import com.eclectics.autoreport.utils.Props;
import com.eclectics.autoreport.utils.Utilities;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.HashMap;
import java.util.TimerTask;
import org.json.JSONObject;

/**
 *
 * @author Jpetro
 */
public class RunTask extends TimerTask {


    /**
     *
     */
    private DBFunctions dbFunctions;
    /**
     *
     */
    private Props props;
    /**
     *
     */
    private String sqlQuery;
    /**
     *
     */

    /**
     *
     * @param props
     */
    
    public RunTask(Props props) {
        this.props = props;
        dbFunctions = new DBFunctions(this.props);
        sqlQuery = props.getScriptQuery().trim();
    }
    
      

    @Override
    /**
     * run
     */
    public void run() {
        int thisHour = Calendar.getInstance().get(Calendar.HOUR); //current hour 12 as of NOw
        int thisMinute = Calendar.getInstance().get(Calendar.MINUTE); //current Munite as of Now
        String thisTime = thisHour + ":" + thisMinute; //current time in terms of Hour and Minutes
        String thisDay = Utilities.getDateToday(); //The current date today in yyyy-mm-dd
            
       System.out.println(thisDay+", The time is "+ thisTime);
        //IMPLEMENT YOUR STAFF HERE HERE HERE!!!!
        //The two cases are independent
//      if(AutoReport.scheduleHourValues.contains(""+thisHour) && thisMinute == AutoReport.scheduledMinute){
//          //do something--run SP
//          //this is for daily schedules
//          //this section is used to execute SPs that runs after every interval during the day.
//          //it checks the hour and see if its the one, checks the minute and see if its the one
//          //this will be used for Agents SP
//            System.out.println("Schedule has been found!! hour is in schedule....Hour "+thisHour);
//            //call Agent Deliquency SP
//            
//      }
      
      if(thisHour == AutoReport.dailySchedule && thisMinute == AutoReport.scheduledMinute){
          //here is for
          //this works every day at this particular time
          //it is used to run Salary Advance SP.
            System.out.println("Daily schedule found and system is calling the relevant SP...Hour: "+thisHour+" Minutes: "+thisMinute);
            //Call Salary Advance SP
      }
        
    }
    


}
