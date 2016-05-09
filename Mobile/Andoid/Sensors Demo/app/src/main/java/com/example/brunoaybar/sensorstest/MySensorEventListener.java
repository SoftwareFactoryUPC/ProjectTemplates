package com.example.brunoaybar.sensorstest;

import android.hardware.SensorEvent;

/**
 * Created by brunoaybar on 5/7/16.
 */
public interface MySensorEventListener {
    void detectedSensorChange(SensorEvent event);
}
