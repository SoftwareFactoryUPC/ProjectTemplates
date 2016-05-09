package com.example.brunoaybar.sensorstest;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import butterknife.BindView;
import butterknife.ButterKnife;

/**
 * Created by brunoaybar on 5/7/16.
 */
public class SensorListAdapter extends RecyclerView.Adapter<SensorListAdapter.ViewHolder> {

    private enum SupportedSensors{
        ACCELERATION(AccelerometerActivity.class,R.string.title_sensor_accelerometer,R.string.desc_sensor_accelerometer),
        GYROSCOPE(GyroscopeActivity.class,R.string.title_sensor_gyroscope,R.string.desc_sensor_gyroscope),
        GRAVITY(GravityActivity.class,R.string.title_sensor_gravity,R.string.desc_sensor_gravity),
        SHAKE(ShakeActivity.class,R.string.title_sensor_shake,R.string.desc_sensor_shake);

        private Class mClass;
        private int title,description;
        SupportedSensors(Class<? extends SensorActivity> activityClass,int title,int description){
            mClass = activityClass;
            this.title = title;
            this.description = description;
        }

        public Class getActivityClass(){
            return mClass;
        }

        public String getTitle(Context context){
            return context.getString(title);
        }

        public String getDescription(Context context){
            return context.getString(description);
        }

        public static SupportedSensors get(int position){
            return values()[position];
        }
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        return new ViewHolder(LayoutInflater.from(mContext).inflate(R.layout.item_config_option,parent,false));
    }

    private Activity mContext;
    public SensorListAdapter(Activity context){
        mContext = context;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {
        final SupportedSensors option = SupportedSensors.get(position);
        holder.tviTitle.setText(option.getTitle(mContext));
        holder.tviDesc.setText(option.getDescription(mContext));
        holder.container.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(mContext,option.getActivityClass());
                mContext.startActivity(i);
            }
        });

    }

    @Override
    public int getItemCount() {
        return SupportedSensors.values().length;
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        @BindView(R.id.tviTitle) TextView tviTitle;
        @BindView(R.id.tviDesc) TextView tviDesc;
        View container;
        public ViewHolder(View v) {
            super(v);
            container = v;
            ButterKnife.bind(this,v);
        }

    }
}
