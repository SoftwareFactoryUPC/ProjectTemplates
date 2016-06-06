package com.example.brunoaybar.analyticsdemo;

import android.app.Application;
import android.content.Context;

import com.crashlytics.android.Crashlytics;

import io.fabric.sdk.android.Fabric;

/**
 * Created by brunoaybar on 6/5/16.
 */
public class AnalyticsApplication extends Application {

    private static AnalyticsApplication INSTANCE;
    public static AnalyticsApplication get() {
        return INSTANCE;
    }

    @Override
    public void onCreate(){
        super.onCreate();
        INSTANCE = this;
        Fabric.with(this, new Crashlytics());
        AnalyticsManager.init(this);
    }

}
