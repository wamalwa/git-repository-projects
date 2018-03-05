/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.eclectics.autoreport.utils;

import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStream;
import java.util.ArrayList;
import java.util.List;
import java.util.Properties;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Jpetro
 */
public final class Props {

	private transient Properties props;;
	private static final String PROPS_FILE = File.separator+"srv"+File.separator+"applications"+File.separator+"EAP-6.4.0"+File.separator+"externalConfigs"+File.separator+"AutoReport.properties";
       //File.separator+"Users"+File.separator+"jpetro"+File.separator+"Documents"+File.separator+"NetBeansProjects"+File.separator+"AARDelinquencyAgent"+File.separator+"configs"+File.separator+"AARDelinquencyAgent.properties";

	String script_query = "";
	String schedule = "";
	String schedule_time = "";
	String logs_path = "";
	String databaseContextURL = "";

	/**
	 * props
	 */
	public Props() {
		loadProperties(PROPS_FILE);
	}

	/**
	 *
	 * @param propsFileName
	 */
	final public void loadProperties(final String propsFileName) {
		InputStream inputStream = null;
		try {
			inputStream = new FileInputStream(propsFileName);

			props = new Properties();

			props.load(inputStream);

			databaseContextURL = readString("databaseContextURL");// database
																	// connection
																	// properties
			script_query = readString("SCRIPT_QUERY"); // the sql query that		// the excel file is
														// goin to be stored
			logs_path = readString("LOGS_PATH"); // file path where all logs are
													// to be stored
			schedule = readString("SCHEDULE"); // this shows wether it is a
												// monthly or daily schedule
			schedule_time = readString("SCHEDULE_TIME");// shows the hour of the
								

		} catch (Exception ex) {
			Logger.getLogger(Props.class.getName()).log(Level.SEVERE, null, ex);

		} finally {
			try {
			   inputStream.close();
			} catch (IOException ex) {
				Logger.getLogger(Props.class.getName()).log(Level.SEVERE, null, ex);
			}
		}
	}

	/**
	 *
	 * @param propertyName
	 * @return
	 */
	public String readString(String propertyName) {
		String property = props.getProperty(propertyName);
		try {
			if (property.isEmpty()) {
				getLoadErrors().add(String.format("ERROR: %s may not have been set", propertyName));
			}
		} catch (Exception ex) {
			Logger.getLogger(Props.class.getName()).log(Level.SEVERE, null, ex);
		}
		return property;
	}

	/**
	 *
	 * @return
	 */
	public List<String> getLoadErrors() {
		List<String> loadErrors = new ArrayList<>();
		return loadErrors;
	}

	/**
	 *
	 * @return
	 */
	public String getScriptQuery() {
		return script_query;
	}

	/**
	 *
	 * @return
	 */
	public String getSchedule() {
		return schedule;
	}


	/**
	 *
	 * @return
	 */
	public String getLogsPath() {
		return logs_path;
	}

	/**
	 *
	 * @return
	 */
	public String getScheduleTime() {
		return schedule_time;
	}

	/**
	 *
	 * @return
	 */
	public String getDatabaseContextURL() {
		return databaseContextURL;
	}



}
