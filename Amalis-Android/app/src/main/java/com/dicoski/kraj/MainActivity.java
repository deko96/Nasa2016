package com.dicoski.kraj;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {
    Button btn1,btn2;
    public static boolean flag= false;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_main);
        btn1=(Button) findViewById(R.id.button1);
        btn2=(Button) findViewById(R.id.button2);

        btn1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v){
                Intent nextScreen = new Intent(getApplicationContext(), MainActivityVR.class);
                startActivity(nextScreen);
            }
        });
        btn2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v){
                Intent nextScreen = new Intent(getApplicationContext(), AndroidMain.class);
                startActivity(nextScreen);
            }
        });


    }
}

