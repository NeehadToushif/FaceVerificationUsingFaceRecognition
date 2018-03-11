package com.main.practice.facerecognitionclient;

import android.content.Context;
import android.os.AsyncTask;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

/**
 * Created by neehad on 25-02-2018.
 */

public class BackGroundMarkAttendance extends AsyncTask<String,String,String> {
    private Context context;

    BackGroundMarkAttendance(Context ctx){
        context = ctx;
    }
    @Override
    protected String doInBackground(String... params) {

        try {
            String user_name = params[0];
<<<<<<< HEAD
=======
         //   String date = params[1];
>>>>>>> 05004f7af20c96ba61b1dccbc9d780fc6557c6f8
            String sub = params[1];
            String login_url = params[2];

            // HttpURLConnection setup
            URL url = new URL(login_url);
            HttpURLConnection httpURLConnection = (HttpURLConnection)url.openConnection();
            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoOutput(true);
            httpURLConnection.setDoInput(true);

            // Sending request to the server
            OutputStream outputStream = httpURLConnection.getOutputStream();
            BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
            String post_data = URLEncoder.encode("user_name","UTF-8")+"="+URLEncoder.encode(user_name,"UTF-8")+"&"
                    +URLEncoder.encode("sub","UTF-8")+"="+URLEncoder.encode(sub,"UTF-8");
            bufferedWriter.write(post_data);
            bufferedWriter.flush();
            bufferedWriter.close();
            outputStream.close();

<<<<<<< HEAD
//            // Receiving response from the server
=======
            // Receiving response from the server
>>>>>>> 05004f7af20c96ba61b1dccbc9d780fc6557c6f8
            InputStream inputStream = httpURLConnection.getInputStream();
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
            String result="";
            String line="";
            while((line = bufferedReader.readLine())!= null) {
                result += line;
            }
            bufferedReader.close();
            inputStream.close();

            httpURLConnection.disconnect();

            return result;
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
        return null;
    }
}
