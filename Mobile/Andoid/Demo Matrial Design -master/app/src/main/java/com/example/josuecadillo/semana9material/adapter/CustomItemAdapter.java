package com.example.josuecadillo.semana9material.adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.josuecadillo.semana9material.CustomItem;
import com.example.josuecadillo.semana9material.R;

import java.util.Collections;
import java.util.List;

public class CustomItemAdapter extends RecyclerView.Adapter<CustomItemAdapter.CustomItemViewHolder>  {

    private final LayoutInflater layouInflater;
    List<CustomItem> data = Collections.emptyList();

    public CustomItemAdapter(Context context,List<CustomItem> data){
        
        layouInflater = LayoutInflater.from(context);
        this.data = data;

    }

    @Override
    public CustomItemViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = layouInflater.inflate(R.layout.custom_row,parent,false);
        CustomItemViewHolder holder = new CustomItemViewHolder(view);
        return holder;
    }

    @Override
    public void onBindViewHolder(CustomItemViewHolder viewHolder, int position) {
        CustomItem current = data.get(position);
        viewHolder.title.setText(current.getTitle());
        viewHolder.icon.setImageResource(current.getIconId());
    }

    @Override
    public int getItemCount() {
        return data.size();
    }

    class CustomItemViewHolder extends RecyclerView.ViewHolder{
        ImageView icon;
        TextView title;
        public CustomItemViewHolder(View itemView) {
            super(itemView);
            title = (TextView) itemView.findViewById(R.id.custom_row_text);
            icon = (ImageView) itemView.findViewById(R.id.custom_row_image);

        }
    }
}
