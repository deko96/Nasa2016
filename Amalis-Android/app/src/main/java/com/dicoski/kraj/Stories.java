package com.dicoski.kraj;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class Stories extends AppCompatActivity {
    Button btn;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_stories);
        btn= (Button) findViewById(R.id.But);
        Intent i  = getIntent();
        btn.setOnClickListener(new View.OnClickListener()
        {
            public void onClick(View arg0) {
                finish();
            }
        });
    }
}