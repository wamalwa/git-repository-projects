package com.eclectics.autoreport.utils;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.security.SecureRandom;
import java.time.ZonedDateTime;
import java.time.format.DateTimeFormatter;
import java.util.logging.Level;

/**
 * Created by Alex on 2/22/16. Modified by Jacob Petro 17/05/2017
 */
public final class Logging {

    /**
     * props
     */
    static Props props = new Props();
    /**
     * now
     */
    final static ZonedDateTime NOW = ZonedDateTime.now();

    /**
     * default constructor
     */
    private Logging() {
    }

    /**
     *
     * @param details
     * @param uniqueId
     * @param logLevel
     */
    public static void applicationLog(String details, String uniqueId, String logLevel) {

        String logs_path = props.getLogsPath();

        String typeOfLog = getLogType(logLevel);

        ZonedDateTime today = ZonedDateTime.now();
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd");
        String logDate = formatter.format(today);
        DateTimeFormatter logTimeformatter = DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm:ss.SSS");
        String logTime = logTimeformatter.format(today);

        File dir = new File(logs_path + File.separator + logDate + File.separator + typeOfLog);
        makeDir(dir);

        int maximum = 100000;

        try {

            String randomNum = generateRnadomNum(maximum, uniqueId);

            File[] fileList = dir.listFiles();
            String fileName = creatFile(fileList, uniqueId, randomNum);

            try (BufferedWriter writer = new BufferedWriter(new FileWriter(dir + fileName, true))) {
                writer.write(logTime + " ~ " + details + String.format("%n"));
                writer.newLine();
            }
        } catch (Exception e) {
            java.util.logging.Logger.getLogger(Logging.class.getSimpleName()).log(Level.SEVERE, "Exception Occurred:- " + e.getMessage(), e);
        }
    }

    /**
     *
     * @param logLevel
     * @return
     */
    private static String getLogType(String logLevel) {

        String typeOfLog = "";

        switch (logLevel) {
            case "1":
                typeOfLog = "Application";
                break;
            case "2":
                typeOfLog = "Databases";
                break;
            case "3":
                typeOfLog = "Jms";
                break;
            case "4":
                typeOfLog = "Data";
                break;
            case "5":
                typeOfLog = "Exceptions";
                break;
            case "6":
                typeOfLog = "RunTask";
                break;
            case "7":
                typeOfLog = "SendMail";
                break;

            default:
                typeOfLog = "Others";
                break;
        }
        return typeOfLog;

    }

    /**
     *
     * @param fileList
     * @param uniqueId
     * @param randomNum
     * @return
     */
    private static String creatFile(File[] fileList, String uniqueId, String randomNum) {
        String fileName = "";
        if (fileList.length > 0) {
            for (File fileList1 : fileList) {
                if (fileList1.length() < 25000000) {
                    fileName = File.separator + fileList1.getName();
                } else {
                    fileName = File.separator + Utilities.DATEFORMAT.get().format(NOW) + "-" + uniqueId + ".log";
                }
            }
        } else {
            fileName = File.separator + Utilities.DATEFORMAT.get().format(NOW) + "-" + randomNum + ".log";
        }
        return fileName;
    }

    /**
     *
     * @param dir
     */
    private static void makeDir(File dir) {
        if (dir.exists()) {
            dir.setWritable(true);
        } else {
            dir.mkdirs();
            dir.setWritable(true);
        }
    }
/**
 * 
 * @param maximum biggest random number size
 * @param uniqueId very unique numeric number
 * @return random number
 */
    private static String generateRnadomNum(int maximum, String uniqueId) {
        String randomNum = "";
        if (uniqueId.length() <= 0) {
            String minimum = "5";
            randomNum = minimum + (int) (new SecureRandom().nextInt() * maximum);

        } else {
            randomNum = "10" + (int) (new SecureRandom().nextInt() * maximum);
        }
        return randomNum;
    }
}
