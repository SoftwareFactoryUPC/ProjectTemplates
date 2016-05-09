package com.example.brunoaybar.sensorstest;

import android.content.pm.PackageManager;
import android.hardware.Sensor;
import android.hardware.SensorEvent;
import android.hardware.SensorEventListener;
import android.hardware.SensorManager;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;

/**
 * Created by brunoaybar on 5/7/16.
 */
public abstract class SensorActivity extends AppCompatActivity implements SensorEventListener,MySensorEventListener {

    protected SensorManager mSensorManager;
    protected Sensor mSensor;
    private long mLastUpdate;
    protected int UPDATE_THRESHOLD = 300;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        mSensorManager = (SensorManager) getSystemService(SENSOR_SERVICE);
        //validate that sensor is available, before showing the activity
        if(null == (mSensor = mSensorManager.getDefaultSensor(getSensorType())))
            finish();
    }

    //<editor-fold desc="Setting up the sensor activity">

    //Checks if this activity's sensor feature is available
    public boolean isAvailable(){
        PackageManager manager = getPackageManager();
        return manager.hasSystemFeature(getSensorFeature());
    }
    abstract protected int getSensorType(); //This method will be implemented descendant class
    abstract protected String getSensorFeature(); //This method will be implemented descendant class

    //</editor-fold>

    //<editor-fold desc="Detecting sensor change and apply custom logic">
    @Override
    public void onSensorChanged(SensorEvent event) {
        //We check the detected event change corresponds to this activity sensor type
        if(event.sensor.getType() == getSensorType()){
            //We determine if enough time has elapsed since last update
            long actualTime = System.currentTimeMillis();
            if(actualTime > mLastUpdate - UPDATE_THRESHOLD){
                //Call the custom interface method, to notify the descendant class
                // that a sensor changed has ocurred.
                this.detectedSensorChange(event);
            }
        }
    }

    @Override
    public void onAccuracyChanged(Sensor sensor, int accuracy) {

    }

    //<</editor-fold>

    //<editor-fold desc="Register and unregister the sensor listener, to optimize battery usage">
    @Override
    protected void onResume(){
        super.onResume();
        mSensorManager.registerListener(this,mSensor, SensorManager.SENSOR_DELAY_UI);
        mLastUpdate = System.currentTimeMillis();
    }

    @Override
    protected void onPause(){
        super.onPause();
        mSensorManager.unregisterListener(this);
    }
    //</editor-fold>

}
