package com.dicoski.kraj;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class AndroidMain extends AppCompatActivity {
    Button btn1, btn2, btn3, btn4;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_android_main);
        btn1 = (Button) findViewById(R.id.FunFactButton);
        btn2 = (Button) findViewById(R.id.MissionsButton);
        btn3 = (Button) findViewById(R.id.GalleryButton);
        btn4 = (Button) findViewById(R.id.StoriesButton);


        btn1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent nextScreen = new Intent(getApplicationContext(), FunFacts.class);
                startActivity(nextScreen);
            }
        });
        btn2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent nextScreen = new Intent(getApplicationContext(), Mission.class);
                startActivity(nextScreen);
            }
        });
        btn3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent nextScreen = new Intent(getApplicationContext(), Gallery.class);
                startActivity(nextScreen);

            }
        });
        btn4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent nextScreen = new Intent(getApplicationContext(), Stories.class);
                startActivity(nextScreen);
            }
        });
    }
}

