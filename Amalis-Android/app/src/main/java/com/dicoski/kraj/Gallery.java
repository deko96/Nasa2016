package com.dicoski.kraj;

import android.app.Activity;
import android.content.Context;
import android.os.Bundle;

import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.GridView;
import android.widget.ImageView;

public class Gallery extends Activity {
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_gallery);
        GridView gridview = (GridView) findViewById(R.id.gridview);
        gridview.setAdapter(new ImageAdapter(this));


    }
    public class ImageAdapter extends BaseAdapter{
        private Context mContext;
        public int getCount() {
            return mThumbIds.length;
        }
        public Object getItem(int position) {
            return mThumbIds[position];
        }
        public long getItemId(int position) {
            return 0;
        }
        public ImageAdapter(Context c) {
            mContext = c;
        }

        public View getView(int position, View convertView, ViewGroup parent) {
            ImageView imageView;
            if (convertView == null){
                imageView = new ImageView(mContext);
                imageView.setLayoutParams(new GridView.LayoutParams(85, 85));
                imageView.setScaleType(ImageView.ScaleType.CENTER_CROP);
                imageView.setPadding(8, 8, 8, 8);
            }
            else{
                imageView = (ImageView) convertView;
            }
            imageView.setImageResource(mThumbIds[position]);
            return imageView;
        }

        private Integer[] mThumbIds = {
                R.drawable.sample1, R.drawable.sample2,
                R.drawable.sample3, R.drawable.sample4,
                R.drawable.sample5, R.drawable.sample6,
                R.drawable.sample7,R.drawable.sample8,
                R.drawable.sample9,R.drawable.sample10,
                R.drawable.sample11,R.drawable.sample12,
                R.drawable.sample13,R.drawable.sample14,
                R.drawable.sample15,R.drawable.sample16,
                R.drawable.sample17,R.drawable.sample18,
                R.drawable.sample19,R.drawable.sample20,
                R.drawable.sample21
        };
    }

}
