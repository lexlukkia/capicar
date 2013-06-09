package com.calendar.picture;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;

public class ViewImage extends Activity {
  // Declare Variable
	TextView text;

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.view_image);
		Intent i = getIntent();
		int position = i.getExtras().getInt("position");
		String[] d = i.getStringArrayExtra("filepath");
		String[] n = i.getStringArrayExtra("filename");
		ImageLoader imageLoader = new ImageLoader(getApplication());
		ImageView imageView = (ImageView) findViewById(R.id.full_image_view);
		imageLoader.DisplayImage(d[position], imageView);
		text = (TextView) findViewById(R.id.imagetext);
		text.setText(n[position]);
	}
}
