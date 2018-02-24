package com.main.practice.facerecognitionclient;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;

public class SettingsActivity extends AppCompatActivity {

    private EditText etIp;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_settings);

        etIp = (EditText) findViewById(R.id.etIp);

        SharedPreferences sharedPreferences = this.getSharedPreferences("com.main.practice.facerecognitionclient", Context.MODE_PRIVATE);

        etIp.setText(sharedPreferences.getString("ip", "127.0.0.1"));
    }

    public void saveSettings(View view) {
        SharedPreferences sharedPreferences = this.getSharedPreferences("com.main.practice.facerecognitionclient", Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();

        editor.putString("ip", etIp.getText().toString()).apply();

        Intent i = new Intent(getApplicationContext(), LoadPic.class);
        startActivity(i);
    }
}
