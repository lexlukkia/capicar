package com.calendar.picture;

import java.text.SimpleDateFormat;

public class GetDateTime {

  public String fileYear, fileMonth, fileDay, fileHour, fileMinute, fileSecond;
	public long date = System.currentTimeMillis();
	private SimpleDateFormat sdf;

	
	public String getYear() {
		sdf = new SimpleDateFormat("yyyy");
		fileYear = sdf.format(date).toString();
		
		return fileYear;
	}
	
	public String getMonth(){
		sdf = new SimpleDateFormat("M");
		fileMonth = sdf.format(date).toString();
		
		return fileMonth;
	}

	public String getDay(){
		sdf = new SimpleDateFormat("dd");
		fileDay = sdf.format(date).toString();
		
		return fileDay;
	}
	
	public String getHour(){
		sdf = new SimpleDateFormat("HH");
		fileHour = sdf.format(date).toString();
		
		return fileHour;
	}
	
	public String getMinute(){
		sdf = new SimpleDateFormat("mm");
		fileMinute = sdf.format(date).toString();
		
		return fileMinute;
	}
	
	public String getSecond(){
		sdf = new SimpleDateFormat("ss");
		fileSecond = sdf.format(date).toString();
		
		return fileSecond;
	}
	
}
