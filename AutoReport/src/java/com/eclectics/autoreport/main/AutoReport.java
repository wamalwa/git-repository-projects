/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.eclectics.autoreport.main;

import com.eclectics.autoreport.utils.Props;
import com.eclectics.autoreport.utils.Utilities;
import java.util.ArrayList;
import java.util.Timer;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.annotation.PostConstruct;
import javax.ejb.Singleton;
import javax.ejb.Startup;

/**
 *
 * @author Jpetro
 */
@Singleton
@Startup
public class AutoReport {

    /**
     * props
     */
    Props props;
    /**
     * Instantiate Timer Object
     */
    Timer time;
    /**
     * Instantiate RunTask class
     */
    RunTask runTask;
  /**
   * 
   */
    public static ArrayList<String> scheduleHourValues;
    
    public static int dailySchedule;
    public static int scheduledMinute;
    /**
     * AARCreditReportGeneratorService
     */
    public AutoReport() {
        props = new Props();
        time = new Timer(); // Instantiate Timer Object
        runTask = new RunTask(props); // Instantiate SheduledTask class 

    }

    /**
     */
    @PostConstruct    
    public void main( ) {

        try {
            Logger.getLogger(AutoReport.class.getName()).log(Level.INFO, "{0}Initializing Main Thread.....", Utilities.logPreString());

            int threadSleepTime = 1000 *60; //miliseconds seconds
            int schedule = Integer.parseInt(props.getSchedule().trim());
            String [] scheduletimestr = props.getScheduleTime().trim().split(":");            
            AutoReport.dailySchedule = Integer.parseInt(scheduletimestr[0]);        
            AutoReport.scheduledMinute = Integer.parseInt(scheduletimestr[1]);
            
            AutoReport autoReportSerivice = new AutoReport(); //        //get the time for the schedule to run
            int delay = 10;
            AutoReport.scheduleHourValues = autoReportSerivice.CreateSchedules(schedule, dailySchedule);            
            autoReportSerivice.time.schedule(autoReportSerivice.runTask, delay, threadSleepTime);
        } 
        catch (Exception ex) {
            Logger.getLogger(AutoReport.class.getName()).log(Level.SEVERE,
                    "Exception on loading Main thread", ex);
        }

    }
    /**
     * 
     * @param schedule wich indicate the cycle of the even. if its 1-24 1 is after every 1 hour,24 after every 24hours
     * @param scheduleTime
     * @return
     */
   private ArrayList<String> CreateSchedules(int schedule, int dailySchedule) {
        ArrayList<String> scheduleHourValues = new ArrayList<>(); //al the time schedules
        scheduleHourValues.add(0, "" + dailySchedule);

        //check if schedule is not 24 that is one day at a time 
        if (schedule != 24) {

            for (int i = 1; i < 13; i++) {
                int lastSchedule = Integer.parseInt(scheduleHourValues.get(i - 1));
                dailySchedule = lastSchedule + schedule;

                if (dailySchedule == 24) { //if it is 24hours
                	dailySchedule = 0;//next day
                } else if (dailySchedule > 24) {
                	dailySchedule = dailySchedule - 24;
                }
                if (dailySchedule > 12) {
                	dailySchedule = dailySchedule - 12;
                }

                scheduleHourValues.add(i, "" + dailySchedule);
            }

        }
        return scheduleHourValues;
    }
    
    

}
