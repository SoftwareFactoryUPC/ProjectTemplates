package com.example.brunoaybar.sensorstest;

import android.content.pm.PackageManager;
import android.hardware.Sensor;
import android.hardware.SensorEvent;
import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;
import android.widget.Toast;

import java.util.concurrent.Executors;
import java.util.concurrent.ScheduledExecutorService;
import java.util.concurrent.ScheduledFuture;
import java.util.concurrent.TimeUnit;

import butterknife.BindView;
import butterknife.ButterKnife;

public class GyroscopeActivity extends SensorActivity{

    @BindView(R.id.tviX) TextView tviX;
    @BindView(R.id.tviY) TextView tviY;
    @BindView(R.id.tviZ) TextView tviZ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_base_axis);
        ButterKnife.bind(this);
        //UPDATE_THRESHOLD = 5000;
    }

    //<editor-fold desc="Gyroscope Sensor configuration">
    @Override
    protected int getSensorType() {
        return Sensor.TYPE_GYROSCOPE;
    }
    @Override
    protected String getSensorFeature() {
        return PackageManager.FEATURE_SENSOR_GYROSCOPE;
    }
    //</editor-fold>

    private static final ScheduledExecutorService worker =
            Executors.newSingleThreadScheduledExecutor();
    ScheduledFuture mTask;
    private boolean positiveSpin = false;
    private int negativeSpinCount = 0;
    private int c=0;
    @Override
    public void detectedSensorChange(SensorEvent event) {
        //Display sensor event values
        setText("X:",tviX,event.values[0]);
        setText("Y:",tviY,event.values[1]);
        setText("Z:",tviZ,event.values[2]);

        double var = Math.toDegrees(event.values[2]);
        if(var>400){
            positiveSpin = true;
            if(mTask!=null)
                mTask.cancel(true);
            Runnable task = new Runnable() {
                public void run() {
                    positiveSpin = false;
                    negativeSpinCount = 0;
                    mTask = null;
                }
            };
            mTask = worker.schedule(task, 500, TimeUnit.MILLISECONDS);
        }else if(positiveSpin && var<-400) {
            if(negativeSpinCount==0)
                negativeSpinCount++;
            else{
                positiveSpin = false;
                negativeSpinCount = 0;
                if(mTask!=null)
                    mTask = null;
                else
                    mTask.cancel(true);
                Toast.makeText(this,"YEEEEY",Toast.LENGTH_SHORT).show();
                Log.i("GYROSCOPE","YEEEEEEEEAAHHHHHHHH");
            }
        }


        Log.i("GYROSCOPE",c++ + ","+round(event.values[0])+","+round(event.values[1]) + ","+round(event.values[2]));
    }

    private double round(double value){
        value = Math.toDegrees(value);
        return Math.floor(value* 10000) / 10000;
    }

    public void setText(String pre,TextView view, double value){
        value = round(value);
        String text = pre + value +"º";
        view.setText(text);
    }



}
