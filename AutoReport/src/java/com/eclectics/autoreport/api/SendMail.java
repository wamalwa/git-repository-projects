/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.eclectics.autoreport.api;

import com.eclectics.autoreport.utils.HTTPCalls;
import com.eclectics.autoreport.utils.Logging;
import com.eclectics.autoreport.utils.Utilities;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import javax.activation.DataHandler;
import javax.activation.DataSource;
import javax.activation.FileDataSource;
import javax.mail.BodyPart;
import javax.mail.MessagingException;
import javax.mail.Multipart;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.MimeBodyPart;
import javax.mail.internet.MimeMessage;
import javax.mail.internet.MimeMultipart;
import org.json.JSONException;
import org.json.JSONObject;
import org.apache.http.HttpResponse;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;

/**
 *
 * @author Jpetro
 */
@SuppressWarnings("deprecation")
public class SendMail {

//    final String senderEmail = "kenyaeclectics@gmail.com";
//    final String p = "eclectics.test";
//    final String receiverEmail = "mutura.charles@ekenya.co.ke";
    /**
     * session object
     */
    Session session;

    /**
     *
     */

    /**
     *
     * @param apiURL
     * @param requestObject
     * @return
     */
    public JSONObject sendtoPhpMailer_old(String apiURL, JSONObject requestObject) {

        JSONObject jsonResponseObject = new JSONObject();
        String jsonResponse = "";
        try {
            String message = requestObject.toString();
            Logging.applicationLog(Utilities.logPreString() + "JSON Request created:- " + message, "", "7");
            int timeout = 10;
            jsonResponse = HTTPCalls.httpsPOST(apiURL, message, timeout);
            Logging.applicationLog(Utilities.logPreString()
                    + "Response from Client : " + jsonResponse, "", "7");
            try {
                jsonResponseObject = new JSONObject(jsonResponse);
            } catch (JSONException e) {
                String errcode = "1022";
                jsonResponseObject.put("status", errcode);
                jsonResponseObject.put("statusDescription", e.getMessage());
                Logging.applicationLog(Utilities.logPreString() + "Exception in updating packet id: " + e.getMessage(), "", "5");
            }

        } catch (JSONException e) {
            String errcode = "955";
            jsonResponseObject.put("status", errcode);
            jsonResponseObject.put("statusDescription", e.getMessage());
            Logging.applicationLog(Utilities.logPreString()
                    + "POSTRequest Exception : " + e.toString(), "", "5");
        }

        return jsonResponseObject;

    }

    /**
     *
     * @param apiURL
     * @param requestObject
     * @return
     */
    @SuppressWarnings("deprecation")
    public JSONObject sendtoPHPMailer(String apiURL, JSONObject requestObject) {
        JSONObject jsonResponseObject = null;
        String jsonResponse = "";
        try {
            DefaultHttpClient httpClient = new DefaultHttpClient();
            HttpPost postRequest = new HttpPost(apiURL);

            String jsonRequest = requestObject.toString();
            Logging.applicationLog(Utilities.logPreString() + "JSON Request created:- " + jsonRequest, "", "7");

            StringEntity input = new StringEntity(jsonRequest);
            input.setContentType("application/json");
            postRequest.setEntity(input);

            HttpResponse response = httpClient.execute(postRequest);

            if (response.getStatusLine().getStatusCode() != 200) {
                Logging.applicationLog(Utilities.logPreString() + "Failed : HTTP error code : "
                        + response.getStatusLine().getStatusCode(), "", "7");
            }

            BufferedReader reader = new BufferedReader(
                    new InputStreamReader((response.getEntity().getContent())));
            final int SBSIZE = 128;
            StringBuilder stringBuilder = new StringBuilder(SBSIZE);
            String line = "";
            line = reader.readLine();
            while (line != null) {
                stringBuilder.append(line);
                line = reader.readLine();

            }
            jsonResponse = stringBuilder.toString();

            if (jsonResponse.isEmpty()) {
                jsonResponse = "{\"STATUS\":\"99\",\"statusDescription\":\"Service Unavailable\"}";
            }

            Logging.applicationLog(Utilities.logPreString() + "JSON Response created:- " + jsonResponse, "", "7");

            jsonResponseObject = new JSONObject(jsonResponse);
            httpClient.getConnectionManager().shutdown();
        } catch (IOException | UnsupportedOperationException | JSONException ex) {
            Logging.applicationLog(Utilities.logPreString() + "Error posting the JSON Request:- " + ex.getMessage(), "", "5");

            jsonResponse = "{\"STATUS\":\"99\",\"statusDescription\":\"Service Faiure: Cause:- " + ex.getMessage() + "\"}";
            jsonResponseObject = new JSONObject(jsonResponse);
        }
        return jsonResponseObject;
    }

    /**
     *
     * @param subject
     * @param body
     * @param filename
     * @param receiverEmails
     * @return
     */
//    public MimeMessage sendEmail(String subject, String body, String filename, String receiverEmails) {
//        MimeMessage msg = null;
//        try {
//            msg = new MimeMessage(session);
//            //set message headers
//            msg.addHeader("Content-type", "text/HTML; charset=UTF-8");
//            msg.addHeader("format", "flowed");
//            msg.addHeader("Content-Transfer-Encoding", "8bit");
//
////            msg.setFrom(new InternetAddress(senderEmail, "sender-jp-report"));
//
////            msg.setReplyTo(InternetAddress.parse(senderEmail, false));
//
//            msg.setSubject(subject, "UTF-8");
//
//            msg.setText(body, "UTF-8");
//
//            msg.setSentDate(new Date());//this is a library fuunction and cannot accept any class other than Date()
//
//            msg.setRecipients(Message.RecipientType.TO, InternetAddress.parse(receiverEmails, false));
//            msg = AddAttachment(msg, body, filename);
//            Logging.applicationLog(Utilities.logPreString() + "Mail Message is ready...", "", "7");
//        } catch (MessagingException | UnsupportedEncodingException ex) {
//            Logging.applicationLog(Utilities.logPreString() + "IOException  :::- " + ex.getMessage(), "", "5");
//        }
//        return msg;
//    }
    /**
     *
     * @param msg
     * @param body
     * @param filename
     * @return
     */
    public MimeMessage addAttachment(MimeMessage msg, String body, String filename) {
        try {
            // Create the message body part
            BodyPart messageBodyPart = new MimeBodyPart();

            // Fill the message
            messageBodyPart.setText(body);

            // Create a multipart message for attachment
            Multipart multipart = new MimeMultipart();

            // Set text message part
            multipart.addBodyPart(messageBodyPart);

            // Second part is attachment
            messageBodyPart = new MimeBodyPart();
            DataSource source = new FileDataSource(filename);
            messageBodyPart.setDataHandler(new DataHandler(source));
            messageBodyPart.setFileName(filename);
            multipart.addBodyPart(messageBodyPart);
            Logging.applicationLog(Utilities.logPreString() + "Mail Message with attatchment is ready...", "", "7");
            // Send the complete message parts
            msg.setContent(multipart);
        } catch (MessagingException ex) {
            Logging.applicationLog(Utilities.logPreString() + "MessagingException  :::- " + ex.getMessage(), "", "5");
        }
        return msg;
    }

    /**
     *
     * @param msg
     * @return
     */
    public boolean transpotMessage(MimeMessage msg) {
        boolean sendSuccess = false;
        try {
            Transport.send(msg);  //dose the actual sending of email
            sendSuccess = true;
            Logging.applicationLog(Utilities.logPreString() + "Email sent successfully. This process has been executed succefully!", "", "7");
        } catch (MessagingException ex) {
            Logging.applicationLog(Utilities.logPreString() + "MessagingException  :::- " + ex.getMessage(), "", "5");
        }
        return sendSuccess;

    }

}
