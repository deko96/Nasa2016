package com.dicoski.kraj;

import android.app.Activity;
import android.os.Bundle;
import android.webkit.WebView;
import android.view.KeyEvent;
import android.view.Menu;
import com.google.android.gms.common.api.GoogleApiClient;

public class MainActivityVR extends Activity {

    private WebView browser;
    /**
     * ATTENTION: This was auto-generated to implement the App Indexing API.
     * See https://g.co/AppIndexing/AndroidStudio for more information.
     */
    private GoogleApiClient client;



    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        browser = new WebView(this);

        setContentView(browser);
        browser.loadUrl(getIntent().getStringExtra("http://172.16.40.18/VR/123"));

//        setContentView(R.layout.activity_main);
//        wv = setWebChromeClient(new WebChromeClient());
//        String customHtml = "<iframe src='http://docs.google.com/viewer?url=http://www.iasted.org/conferences/formatting/presentations-tips.ppt&embedded=true' width='100%' height='100%' style='border: none;'></iframe>";
//        wv = (WebView) findViewById(R.id.webView);
//        wv.getSettings().setJavaScriptEnabled(true);
//        wv.loadDataWithBaseURL("", customHtml, "text/html", "UTF-8", "");
//        // ATTENTION: This was auto-generated to implement the App Indexing API.
//        // See https://g.co/AppIndexing/AndroidStudio for more information.
//        client = new GoogleApiClient.Builder(this).addApi(AppIndex.API).build();
    }

    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {
        // Check if the key event was the Back button and if there's history
        if ((keyCode == KeyEvent.KEYCODE_BACK) && browser.canGoBack()) {
            browser.goBack();
            return true;
        }
        // If it wasn't the Back key or there's no web page history, bubble up to the default
        // system behavior (probably exit the activity)
        return super.onKeyDown(keyCode, event);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.

        return true;
    }


}