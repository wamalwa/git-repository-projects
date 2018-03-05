/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.eclectics.autoreport.utils;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import java.security.KeyManagementException;
import java.security.NoSuchAlgorithmException;
import java.security.SecureRandom;
import java.security.cert.X509Certificate;
import javax.net.ssl.HostnameVerifier;
import javax.net.ssl.HttpsURLConnection;
import javax.net.ssl.SSLContext;
import javax.net.ssl.SSLSession;
import javax.net.ssl.TrustManager;
import javax.net.ssl.X509TrustManager;

/**
 *
 * @author ERIC makes Htpp calls to Jambopay
 */
public class HTTPCalls {

    /**
     *
     * @param url
     * @param jsonString
     * @param timeout
     * @return
     */
    /**
     * default constructor
     */
    public HTTPCalls() {
    }

    public static String postRequest(String url, String jsonString, int timeout) {
        String resp = "";
        try {
            URL obj = new URL(url);
            HttpURLConnection con = (HttpURLConnection) obj.openConnection();
            con.setConnectTimeout(timeout);
            con.setReadTimeout(timeout);

            //add reuqest header
            con.setRequestMethod("POST");
            con.setRequestProperty("User-Agent", "Mozilla/5.0");
            con.setRequestProperty("Accept-Language", "en-US,en;q=0.5");
            con.setRequestProperty("content-type", "application/json");
            con.setDoOutput(true);

            try (DataOutputStream wr = new DataOutputStream(con.getOutputStream())) {
                wr.writeBytes(jsonString);
                wr.flush();
            }
            int max = 100;
            StringBuilder response = new StringBuilder(max);

            try (InputStreamReader input = new InputStreamReader(con.getInputStream())) {
                try (BufferedReader in = new BufferedReader(input)) {

                    String inputLine = in.readLine();

                    while (inputLine != null) {
                        response.append(inputLine);
                        inputLine = in.readLine();
                    }
                }
            }
            resp = response.toString();
        } catch (IOException ex) {
            resp = ex.getMessage();
            Logging.applicationLog(Utilities.logPreString() + "IOException:::" + resp, "", "5");
        }
        return resp;
    }

    /**
     *
     * @param https_url
     * @param message
     * @param timeout
     * @return
     */
    @SuppressWarnings("empty-statement")
    public static String httpsPOST(String https_url, String message, int timeout) {
        String resp = "";
        try {
            SSLContext ssl_ctx = SSLContext.getInstance("TLS");
            TrustManager[] trust_mgr = getTrustManager();
            ssl_ctx.init(null, // key manager
                    trust_mgr, // trust manager
                    new SecureRandom()); // random number generator
            HttpsURLConnection.setDefaultSSLSocketFactory(ssl_ctx.getSocketFactory());

            URL url = new URL(https_url);

            HttpsURLConnection conn = (HttpsURLConnection) url.openConnection();
            // Guard against "bad hostname" errors during handshake.
            conn.setHostnameVerifier(new HostnameVerifier() {
                @Override
                public boolean verify(String host, SSLSession sess) {
                    return true;
                }
            });

            conn.setRequestMethod("POST");
            conn.setDoOutput(true);
            conn.setDoInput(true);
            conn.setReadTimeout(timeout);
            conn.setConnectTimeout(timeout);
            conn.setRequestProperty("content-type", "application/json");
            OutputStreamWriter osw = new OutputStreamWriter(conn.getOutputStream());

            osw.write(message);
            osw.flush();

            int max = 100;
            StringBuilder response = new StringBuilder(max);
            InputStreamReader input = new InputStreamReader(conn.getInputStream());
            BufferedReader in = new BufferedReader(input);

            String inputLine = in.readLine();

            while (inputLine != null) {
                response.append(inputLine);
                inputLine = in.readLine();
            }

            resp = response.toString();
        } catch (IOException ex) {
            resp = ex.getMessage();
            Logging.applicationLog(Utilities.logPreString() + "IOException:::" + resp, "", "5");

        } catch (NoSuchAlgorithmException | KeyManagementException ex) {

            resp = ex.getMessage();
            Logging.applicationLog(Utilities.logPreString() + "NoSuchAlgorithmException | KeyManagementException :::" + resp, "", "5");

        }
        return resp;
    }

    /**
     *
     * @return
     */
    private static TrustManager[] getTrustManager() {
        TrustManager[] certs = new TrustManager[]{
            new X509TrustManager() {
                /**
                 * getAcceptedIssuers
                 */
                @Override
                public X509Certificate[] getAcceptedIssuers() {
                    X509Certificate[] x509cert = new X509Certificate[0];
                    return x509cert;
                }

                @Override
                public void checkClientTrusted(X509Certificate[] certs, String t) {
                }

                @Override
                public void checkServerTrusted(X509Certificate[] certs, String t) {
                }
            }
        };
        return certs;
    }
}
