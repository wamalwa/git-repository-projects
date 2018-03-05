/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.eclectics.autoreport.utils;

import java.time.format.DateTimeFormatter;
import java.time.ZonedDateTime;
import java.util.Calendar;

/**
 *
 * @author ERIC
 */
public class Utilities {

    /**
     * to display current time
     */
    ZonedDateTime now;
    /**
     * default constructor
     */
    public Utilities() {
        now = ZonedDateTime.now();
    }
    /**
     * Utility methods to handle date
     */
    public static final ThreadLocal<DateTimeFormatter> DATEFORMAT = new ThreadLocal<DateTimeFormatter>() {
        @Override
        protected DateTimeFormatter initialValue() {
            return DateTimeFormatter.ofPattern("YY-MM-dd");
        }
    };
    /**
     * MONTHDAYFORMAT
     */
    public static final ThreadLocal<DateTimeFormatter> MONTHDAYFORMAT = new ThreadLocal<DateTimeFormatter>() {
        @Override
        protected DateTimeFormatter initialValue() {
            return DateTimeFormatter.ofPattern("MMDD");
        }
    };
    /**
     * TIMEFORMAT
     */
    public static final ThreadLocal<DateTimeFormatter> TIMEFORMAT = new ThreadLocal<DateTimeFormatter>() {
        @Override
        protected DateTimeFormatter initialValue() {
            return DateTimeFormatter.ofPattern("HHmmss");
        }
    };
    /**
     * DATETIMEFORMAT
     */
    public static final ThreadLocal<DateTimeFormatter> DATETIMEFORMAT = new ThreadLocal<DateTimeFormatter>() {
        @Override
        protected DateTimeFormatter initialValue() {
            return DateTimeFormatter.ofPattern("MMddHHmmss");
        }
    };

    /**
     * logPreString
     *
     * @return
     */
    public static String logPreString() {
        return "AAR Auto Report Service | " + Thread.currentThread().getStackTrace()[2].getClassName() + " | "
                + Thread.currentThread().getStackTrace()[2].getLineNumber() + " | "
                + Thread.currentThread().getStackTrace()[2].getMethodName() + "() | ";
    }
   
 
    /**
     * getDateToday
     *
     * @return
     */
    public static String getDateToday() {
        String formatedDate = "";
        try {
            int thisYear = Calendar.getInstance().get(Calendar.YEAR);
            int thisMonth = Calendar.getInstance().get(Calendar.MONTH) + 1;
            int thisDay = Calendar.getInstance().get(Calendar.DATE);

            if (thisMonth < 10) {
                formatedDate = thisYear + "-0" + thisMonth + "-" + thisDay;
            } else if (thisDay < 10) {
                formatedDate = thisYear + "-" + thisMonth + "-0" + thisDay;
            }
            if (thisDay < 10 && thisMonth < 10) {
                formatedDate = thisYear + "-0" + thisMonth + "-0" + thisDay;
            }
        } catch (Exception ex) {
            Logging.applicationLog(Utilities.logPreString() + "Exception :::- " + ex.getMessage(), "", "5");
        }
        return formatedDate;
    }
 

    /**
     *
     * @return
     */
   public static  String getFirstDateofThisMonth() {
        String formatedDate = "";
        try {
            int thisYear = Calendar.getInstance().get(Calendar.YEAR);
            int thisMonth = Calendar.getInstance().get(Calendar.MONTH) + 1;
            int thisDay = Calendar.getInstance().getActualMinimum(Calendar.DAY_OF_MONTH);

            if (thisMonth < 10) {
                formatedDate = thisYear + "-0" + thisMonth + "-" + thisDay;
            } else if (thisDay < 10) {
                formatedDate = thisYear + "-" + thisMonth + "-0" + thisDay;
            }
            if (thisDay < 10 && thisMonth < 10) {
                formatedDate = thisYear + "-0" + thisMonth + "-0" + thisDay;
            }
        } catch (Exception ex) {
            Logging.applicationLog(Utilities.logPreString() + "Exception :::- " + ex.getMessage(), "", "5");
        }
        return formatedDate;
    }

    /**
     *
     * @return
     */
    public static  String getLastDateofThisMonth() {
        String formatedDate = "";
        try {
            int thisYear = Calendar.getInstance().get(Calendar.YEAR);
            int thisMonth = Calendar.getInstance().get(Calendar.MONTH) + 1;
            int thisDay = Calendar.getInstance().getActualMaximum(Calendar.DAY_OF_MONTH);

            if (thisMonth < 10) {
                formatedDate = thisYear + "-0" + thisMonth + "-" + thisDay;
            } else if (thisDay < 10) {
                formatedDate = thisYear + "-" + thisMonth + "-0" + thisDay;
            }
            if (thisDay < 10 && thisMonth < 10) {
                formatedDate = thisYear + "-0" + thisMonth + "-0" + thisDay;
            }
        } catch (Exception ex) {
            Logging.applicationLog(Utilities.logPreString() + "Exception :::- " + ex.getMessage(), "", "5");
        }
        return formatedDate;
    }

}
