package com.example.brunoaybar.analyticsdemo;

import android.app.Application;
import android.content.Context;
import android.os.Bundle;

import com.facebook.FacebookSdk;
import com.facebook.appevents.AppEventsLogger;
import com.google.android.gms.analytics.GoogleAnalytics;
import com.google.android.gms.analytics.HitBuilders;
import com.google.android.gms.analytics.Tracker;
import com.google.firebase.analytics.FirebaseAnalytics;

/**
 * Created by brunoaybar on 5/31/16.
 */
public class AnalyticsManager {

    private static AnalyticsManager INSTANCE = new AnalyticsManager();
    private AnalyticsManager() {}
    public static AnalyticsManager get(){return INSTANCE;}

    private FirebaseAnalytics mFirebaseAnalytics;
    private Tracker mTracker;

    //Init the different analytics tools used in the application
    public static void init(Application context){
        //Facebook
        FacebookSdk.sdkInitialize(context);
        AppEventsLogger.activateApp(context);
        //Google analytics
        get().mTracker = GoogleAnalytics.getInstance(context).newTracker(R.xml.app_tracker);
        get().mTracker.enableAdvertisingIdCollection(true);// Habilitar las funciones de display.
        //Firebase
        get().mFirebaseAnalytics = FirebaseAnalytics.getInstance(context);
    }
    //Test event that will fire events on the multiple tracking tools
    public static void sendTestEvent(Context context,String param1, boolean param2, int param3){
        //Firebase
        Bundle bundle = new Bundle();
        bundle.putString("Param 1", param1);
        bundle.putBoolean("Param 2", param2);
        bundle.putInt("Param 3",param3);
        get().mFirebaseAnalytics.logEvent(AnalyticsConstants.EVENT_A , bundle);
        sendGoogleAnalyticsEvent(context,param1,String.valueOf(param2),String.valueOf(param3));
    }
    //Send screen visit to analytics tracking tools
    public static void sendScreen(Context contex, AnalyticsScreens screen){
        //Google analytics
        get().mTracker.setScreenName(screen.getScreen());
        get().mTracker.send(new HitBuilders.ScreenViewBuilder().build());
    }
    //Send event to Google Analytics
    public static void sendGoogleAnalyticsEvent(Context context, String category, String action, String label){
        get().mTracker.send(new HitBuilders.EventBuilder()
                .setCategory(category)
                .setAction(action)
                .setLabel(label)
                .build());
    }

}
