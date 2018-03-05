/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.eclectics.autoreport.utils;

import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.HashMap;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.sql.DataSource;

/**
 *
 * @author Jpetro
 */
public class Database {

    private DataSource dataSource;
    private InitialContext initialContext;
    private Connection conn = null;
    private PreparedStatement preparedStatement = null;
    private CallableStatement callableStatement = null;
    private ResultSet resultSet = null;
//    private Statement statement = null;
//    private String _sqlString;

    /**
     *
     * @param props
     */
    public Database(Props props) {
//             String  url = "jdbc:sqlserver://" + props.getSERVER() + ";databaseName=" + props.getDATABASE(); //The database connection is here mssql 
//             
//            try {
//                try {
//                    Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver").newInstance(); //Call the driver for connecteion
//                } catch (InstantiationException | IllegalAccessException ex) {
//                  Logging.applicationLog(Utilities.logPreString() + Utilities.logPreString()
//                    + "IllegalAccessException | InstantiationException  Review ::: " + ex.getMessage(), "", "5");
//                }
//
//            } catch (ClassNotFoundException ex) {
//                Logging.applicationLog(Utilities.logPreString() + Utilities.logPreString()
//                    + "ClassNotFoundException  Review ::: " + ex.getMessage(), "", "5");
//            }
//
//        try {
//            conn = DriverManager.getConnection(url, props.getUSERNAME(), props.getPASSWORD());   //Initiate a connecteeion to the database
//                   Logging.applicationLog(Utilities.logPreString() + Utilities.logPreString()
//                    + "Conection atteined successfully...", "", "2");
//   
//        } catch (SQLException ex) {
//         Logging.applicationLog(Utilities.logPreString() + Utilities.logPreString()
//                    + "SQLException  Review ::: " + ex.getMessage(), "", "5");
//        }

        try {
            initialContext = new InitialContext();

            Logging.applicationLog(Utilities.logPreString() + "Loading Initial database context.....", "", "3");

            dataSource = (DataSource) initialContext.
                    lookup(props.getDatabaseContextURL());
//            Logging.applicationLog(Utilities.logPreString() +"Loading Initial database context completed.....","","3");

            Logging.applicationLog(Utilities.logPreString() + "Acquiring new connection to datasource.....", "", "3");
            conn = dataSource.getConnection();
            Logging.applicationLog(Utilities.logPreString() + "Connection initialization completed.....", "", "3");
        } catch (NamingException ex) {
            Logging.applicationLog(Utilities.logPreString() + "Context Initialization failed. Review: "
                    + "Context URL or Datasource: " + ex.getMessage(), "", "5");
        } catch (SQLException ex) {
            Logging.applicationLog(Utilities.logPreString() + "Context Initialization failed. Review: "
                    + "SQL Connectivity: " + ex.getMessage(), "", "5");
        }

    }

    /**
     *
     * @return @throws Exception
     */
    public Connection getDatabaseConnection() throws Exception {
        return this.conn;
    }

    /**
     *
     * @throws Exception
     */
    public void closeDatabaseConnection() throws Exception {

        if (resultSet != null) {
            resultSet.close();
        }
        if (preparedStatement != null) {
            preparedStatement.close();
        }
        if (callableStatement != null) {
            callableStatement.close();
        }
        if (conn != null) {
            this.conn.close();
        }
        dataSource = null;
        if (initialContext != null) {
            initialContext.close();
        }
        Logging.applicationLog(Utilities.logPreString() + "All connections Closed Successfully...", "", "2");
    }

    /**
     *
     * @param _sqlString the prepared statement
     * @param requestMap contains all the parameters passed to it in a request
     * Map
     * @return
     */
    public ResultSet executeSQLQuery(String _sqlString, HashMap<String, String> requestMap) {

        try {

            Logging.applicationLog(Utilities.logPreString() + "Query passed:" + _sqlString + ". PARAMS::: " + requestMap, "", "2");

            conn = getDatabaseConnection();
            preparedStatement = conn.prepareStatement(_sqlString);

            int mapIndex = 1;
            int mapSize = requestMap.size();
            while (mapIndex <= mapSize) {
                preparedStatement.setObject(mapIndex, requestMap.get("" + mapIndex));
                mapIndex++;
            }
            resultSet = preparedStatement.executeQuery();

        } catch (SQLException e) {
            Logging.applicationLog(Utilities.logPreString() + "ERROR: SQLException :::" + e.getMessage(), "", "5");
        } catch (Exception e) {
            Logging.applicationLog(Utilities.logPreString() + "ERROR: Exception :::" + e.getMessage(), "", "5");
        }

        return resultSet;
    }

    /**
     *
     * @param _spString the SP call statement
     * @param requestMap contains all the parameters passed to it in a request
     * Map
     * @return
     */
    public ResultSet executeSCallableStatement(String _spString, HashMap<String, String> requestMap) {
        try {

            Logging.applicationLog(Utilities.logPreString() + "Query passed:" + _spString + " PARAMS::: " + requestMap, "", "2");

            conn = getDatabaseConnection();
            callableStatement = conn.prepareCall(_spString);

            int mapIndex = 1;
            int mapSize = requestMap.size();

            while (mapIndex <= mapSize) {
                callableStatement.setString(mapIndex, requestMap.get("" + mapIndex));
                mapIndex++;
            }
            resultSet = callableStatement.executeQuery();

        } catch (SQLException e) {
            Logging.applicationLog(Utilities.logPreString() + "ERROR: SQLException :::" + e.getMessage(), "", "5");
        } catch (Exception e) {
            Logging.applicationLog(Utilities.logPreString() + "ERROR: Exception :::" + e.getMessage(), "", "5");
        }

        return resultSet;
    }

    /**
     *
     * @param _sqlString update string
     * @param requestMap
     * @return
     */
    public int executeUpdate(String _sqlString, HashMap<String, String> requestMap) {
        int affectedRows = 0;
        Logging.applicationLog(Utilities.logPreString() + "Query passed:" + _sqlString + " PARAMS::: " + requestMap, "", "2");

        try {
            conn = getDatabaseConnection();
            preparedStatement = conn.prepareStatement(_sqlString);
            int mapIndex = 1;
            int mapSize = requestMap.size();
            while (mapIndex <= mapSize) {
                preparedStatement.setObject(mapIndex, requestMap.get("" + mapIndex));
                mapIndex++;
            }
            affectedRows = preparedStatement.executeUpdate();

            Logging.applicationLog(Utilities.logPreString() + "Affected Rows: " + affectedRows, "", "2");

        } catch (Exception e) {
            Logging.applicationLog(Utilities.logPreString() + "ERROR :::" + e.getMessage(), "", "5");
        }
        return affectedRows;
    }

}
