package com.eclectics.autoreport.utils;

import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.util.ArrayList;
import java.util.HashMap;

/**
 *
 * @author Jpetro
 */
public class DBFunctions {

    /**
     *
     */
    private Database database;
    /**
     *
     */
    final private Props props;
    /**
     *
     */
    private ArrayList<String> columns;

    /**
     *
     * @return
     */
    public ArrayList<String> getColumns() {
        return columns;
    }

    /**
     *
     * @param props
     */
    public DBFunctions(Props props) {
        this.props = props;
    }

    /**
     *
     */
    private void getDBConnection() {
        try {
            this.database = new Database(props);
        } catch (Exception ex) {
            Logging.applicationLog(Utilities.logPreString() + "Database connection failed. Review: "
                    + "SQL Connectivity: " + ex.getMessage(), "", "5");
        }
    }

    /**
     *
     * @param resultSet
     * @return
     */
    public ArrayList<String> getQueryColumns(ResultSet resultSet) {
        ArrayList<String> response = new ArrayList<>();
        try {
            ResultSetMetaData rsmd = resultSet.getMetaData();
            int col_size = rsmd.getColumnCount();
            int columnIndex = 0;

            while (columnIndex < col_size) {
                response.add(rsmd.getColumnName(columnIndex + 1));
                columnIndex++;
            }
        } catch (Exception ex) {
            Logging.applicationLog(Utilities.logPreString()
                    + "getQueryColumns :::: ERROR in Query Generation:- " + ex.getMessage(), "", "5");
        }
        return response;
    }

    /**
     * *
     *
     * @param _sqlquery
     * @param requestMap
     * @return
     */
    public ArrayList<ArrayList> getReportRecords(String _sqlquery, HashMap<String, String> requestMap) {

        ResultSet resultSet = null;
        ArrayList<ArrayList> rawValues = new ArrayList<>();
        try {

            getDBConnection();
            resultSet = database.executeSQLQuery(_sqlquery, requestMap);
            columns = getQueryColumns(resultSet);        //gets all the columns specified in the query statement    
            ArrayList<String> columnValues = new ArrayList<>(); //al the columns  

            while (resultSet.next()) {
                columnValues = new ArrayList<>();

                if (columns != null) {
                    int colSize = columns.size();

                    for (int column_i = 0; column_i < colSize; column_i++) {
                        columnValues.add(resultSet.getString(column_i + 1));
                    }
                    rawValues.add(columnValues);
                }
                
            }
            resultSet.close();
        } catch (Exception ex) {
            Logging.applicationLog(Utilities.logPreString() + "ERROR in Query Generation:- " + ex.getMessage(), "", "5");
        } finally {

            try {
                resultSet.close();
                database.closeDatabaseConnection();
            } catch (Exception ex) {
                Logging.applicationLog(Utilities.logPreString() + "ERROR in Query Generation:- " + ex.getMessage(), "", "5");
            }
        }
        return rawValues;
    }
/**
 * 
 * @param _spQuery
 * @param requestMap
 * @return 
 */
    public ArrayList<ArrayList> getSPRecords(String _spQuery, HashMap<String, String> requestMap) {

        ResultSet resultSet = null;
        ArrayList<ArrayList> rawValues = new ArrayList<>();
        try {

            getDBConnection();
            resultSet = database.executeSCallableStatement(_spQuery, requestMap);

            columns = getQueryColumns(resultSet);        //gets all the columns specified in the query statement    
            ArrayList<String> columnValues = new ArrayList<>(); //al the columns  

            while (resultSet.next()) {
                columnValues = new ArrayList<>();

                if (columns != null) {
                    int colSize = columns.size();

                    for (int column_i = 0; column_i < colSize; column_i++) {
                        columnValues.add(resultSet.getString(column_i + 1));
                    }
                    rawValues.add(columnValues);
                }
            }
            resultSet.close();
        } catch (Exception ex) {
            Logging.applicationLog( Utilities.logPreString()
                    + "ERROR in Query Generation:- " + ex.getMessage(), "", "5");
        } finally {

            try {
                resultSet.close();
                database.closeDatabaseConnection();
            } catch (Exception ex) {
                Logging.applicationLog( Utilities.logPreString() 
                        + "ERROR in Query Generation:- " + ex.getMessage(), "", "5");
            }
        }
        return rawValues;
    }

    /**
     *
     * @param _sqlquery
     * @param requestMap
     * @return
     */
    public int postUpdates(String _sqlquery, HashMap<String, String> requestMap) {

        int postIt = 0;
        try {
            getDBConnection();
            postIt = database.executeUpdate(_sqlquery, requestMap);
            database.closeDatabaseConnection();

        } catch (Exception ex) {
            Logging.applicationLog(Utilities.logPreString() + " ERROR in Query Generation:- " + ex.getMessage(), "", "5");
        }
        return postIt;
    }

}
