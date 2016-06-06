package com.example.brunoaybar.analyticsdemo;

/**
 * Created by brunoaybar on 5/31/16.
 */
public enum AnalyticsScreens {
    ScreenA("Screen A"),
    ScreenB("Screen B"),
    ScreenC("Screen C"),
    ScreenD("Screen D"),
    ScreenE("Screen E");
    private String mScreen;
    AnalyticsScreens(String screenName){
        mScreen = screenName;
    }
    public String getScreen(){
        return mScreen;
    }
}
