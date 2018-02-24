package com.main.practice.facerecognitionclient;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.concurrent.ExecutionException;

public class LoadPic extends AppCompatActivity {
    private EditText usernameEt, passwordEt;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_load_pic2);

        usernameEt = (EditText)findViewById(R.id.etUserName);
        passwordEt = (EditText)findViewById(R.id.etPassword);
    }

    public void onLogin(View view) throws ExecutionException, InterruptedException, JSONException {
        SharedPreferences sharedPreferences = this.getSharedPreferences("com.main.practice.facerecognitionclient", Context.MODE_PRIVATE);
        String ip = sharedPreferences.getString("ip", "127.0.0.1");

        if(ip.equals("127.0.0.1")) {
            Snackbar.make(this.getWindow().getDecorView(), "Please set the Ip address", Snackbar.LENGTH_LONG)
                    .setAction("Settings", new View.OnClickListener() {
                        @Override
                        public void onClick(View v) {
                            Intent i = new Intent(getApplicationContext(), SettingsActivity.class);
                            startActivity(i);
                        }
                    }).show();

        } else {
            String login_url = "http://" + ip + "/trialIndex.php";
            String username = usernameEt.getText().toString();
            String password = passwordEt.getText().toString();

            BackGroundWorker backgroundWorker = new BackGroundWorker(this);
            String result = backgroundWorker.execute(username, password, login_url).get();
            JSONObject jsonObject = new JSONObject(result);

            Log.i("LogPic", "executed: "+result);
            if (!result.equals("login not success")) {
                Intent intent = new Intent(this, DisplayImage.class);
                intent.putExtra("image", jsonObject.getString("image"));
                startActivity(intent);
            }
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.login_menu, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if(item.getItemId() == R.id.settings) {
            Intent i = new Intent(getApplicationContext(), SettingsActivity.class);
            startActivity(i);
        }

        return super.onOptionsItemSelected(item);
    }
}


