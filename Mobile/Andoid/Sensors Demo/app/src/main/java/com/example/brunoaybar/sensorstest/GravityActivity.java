package com.example.brunoaybar.sensorstest;

import android.content.pm.PackageManager;
import android.hardware.Sensor;
import android.hardware.SensorEvent;
import android.os.Bundle;
import android.widget.TextView;

import butterknife.BindView;
import butterknife.ButterKnife;

public class GravityActivity extends SensorActivity {

    @BindView(R.id.tviX) TextView tviX;
    @BindView(R.id.tviY) TextView tviY;
    @BindView(R.id.tviZ) TextView tviZ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_base_axis);
        ButterKnife.bind(this);
    }

    //<editor-fold desc="Gyroscope Sensor configuration">
    @Override
    protected int getSensorType() {
        return Sensor.TYPE_GRAVITY;
    }
    @Override
    protected String getSensorFeature() {
        return PackageManager.FEATURE_SENSOR_ACCELEROMETER;
    }
    //</editor-fold>

    @Override
    public void detectedSensorChange(SensorEvent event) {
        //Display sensor event values
        tviX.setText(String.valueOf(event.values[0]));
        tviY.setText(String.valueOf(event.values[1]));
        tviZ.setText(String.valueOf(event.values[2]));
    }

}
