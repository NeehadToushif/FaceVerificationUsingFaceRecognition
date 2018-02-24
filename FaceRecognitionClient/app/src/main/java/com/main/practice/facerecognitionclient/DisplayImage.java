package com.main.practice.facerecognitionclient;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Base64;
import android.widget.ImageView;

public class DisplayImage extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_display_image);

        Intent i = this.getIntent();

        String img = i.getStringExtra("image");

        byte[] data = Base64.decode(img, Base64.DEFAULT);

        Bitmap image = BitmapFactory.decodeByteArray(data, 0, data.length);

        ImageView imageView = (ImageView) findViewById(R.id.imageView);

        imageView.setImageBitmap(image);

    }
}
