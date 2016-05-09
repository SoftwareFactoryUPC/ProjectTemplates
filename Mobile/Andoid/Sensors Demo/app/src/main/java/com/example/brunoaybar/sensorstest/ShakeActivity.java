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

public class ShakeActivity extends SensorActivity {

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
        return Sensor.TYPE_ACCELEROMETER;
    }
    @Override
    protected String getSensorFeature() {
        return PackageManager.FEATURE_SENSOR_ACCELEROMETER;
    }
    //</editor-fold>

    private int countPos=0,countNeg = 0;

    private static final ScheduledExecutorService worker =
            Executors.newSingleThreadScheduledExecutor();
    ScheduledFuture mTask;
    @Override
    public void detectedSensorChange(SensorEvent event) {
        //Display sensor event values
        tviX.setText(String.valueOf(event.values[0]));
        tviY.setText(String.valueOf(event.values[1]));
        tviZ.setText(String.valueOf(event.values[2]));

        //Shake logic
        if(Math.abs(event.values[2])>=13){
            Log.i("SHAKE","Pass");
            if(countPos==0){
                if(mTask!=null)
                    mTask.cancel(true);
                Runnable task = new Runnable() {
                    public void run() {
                        countPos = countNeg = 0;
                        mTask = null;
                    }
                };
                mTask = worker.schedule(task, 1500, TimeUnit.MILLISECONDS);
            }

            if(event.values[2]>0)
                countPos++;
            else
                countNeg++;
            if((countPos>=3 && countNeg>2) || (countPos>=2 && countNeg>3)){
                Log.i("SHAKE","Four times");
                countPos = countNeg = 0;
                Toast.makeText(this,"SHAKKIININGGG",Toast.LENGTH_SHORT).show();

            }

        }else{
            Log.i("SHAKE","Not good enough:" + event.values[2]);
        }


    }
}
