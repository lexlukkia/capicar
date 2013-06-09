package com.calendar.picture;

import java.io.File;
import java.text.SimpleDateFormat;

import com.calendar.picture.R;

import android.app.Activity;
import android.content.ActivityNotFoundException;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.CalendarView;
import android.widget.CalendarView.OnDateChangeListener;
import android.widget.Toast;

public class Calendar extends Activity implements OnClickListener {

  Button btnOpenCamera;
	CalendarView cView;
	final int CAPTURE = 1;
	final int CROP = 2;
	String eMessage = "", path;
	private Uri picUri;
	SimpleDateFormat sdf;
	int flag = 1;
	String date1;
	String sample = "";
	GetDateTime cDir = new GetDateTime();

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_calendar);

		path = Environment.getExternalStorageDirectory().getAbsolutePath()
				+ "/CaPicar/" + cDir.getYear() + "/" + cDir.getMonth() + "/"
				+ cDir.getDay();
		cView = (CalendarView) findViewById(R.id.btnCalendar);
		
		cView.setOnDateChangeListener(new OnDateChangeListener() {

			@Override
			public void onSelectedDayChange(CalendarView view, int year,
					int month, int dayOfMonth) {
				
				if (month < 10){
					date1 = "/" + year + "/0" + (month + 1) + "/" + dayOfMonth;
				}
				if (dayOfMonth < 10){
					date1 = "/" + year + "/" + (month + 1) + "/0" + dayOfMonth;
				}
				else{
					date1 = "/" + year + "/" + (month + 1) + "/" + dayOfMonth;
				}

				Intent intent = new Intent(Calendar.this, GalleryImage.class);
				intent.putExtra("date1", date1);
				Calendar.this.startActivity(intent);
			}
		});

		btnOpenCamera = (Button) findViewById(R.id.btnOpenCamera);
		btnOpenCamera.setOnClickListener(this);
	}

	@Override
	public void onClick(View v) {
		if (v.getId() == R.id.btnOpenCamera) {
			try {
				Toast toast = Toast.makeText(this, date1, Toast.LENGTH_LONG);
				toast.show();
				Intent intent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
				File file = new File(path);
				if (!file.exists()) {
					file.mkdirs();
				}
				File image = new File(file, cDir.getYear() + cDir.getMonth()
						+ cDir.getDay() + cDir.getHour() + cDir.getMinute()
						+ cDir.getSecond() + ".png");
				picUri = Uri.fromFile(image);
				intent.putExtra(MediaStore.EXTRA_OUTPUT, picUri);
				startActivityForResult(intent, CAPTURE);
			} catch (ActivityNotFoundException e) {
				String eMessage = "Your device doesn't support camera action!";
				Toast.makeText(this, eMessage, Toast.LENGTH_SHORT).show();
			}
		}
	}

	protected void onActivityResult(final int requestCode,
			final int resultCode, final Intent data) {

		if (resultCode == RESULT_OK) {
			if (requestCode == CAPTURE) {
				Toast toast = Toast.makeText(this, "Saved", Toast.LENGTH_SHORT);
				toast.show();
				finish();
				startActivity(getIntent());
			}
		}
	};
}
