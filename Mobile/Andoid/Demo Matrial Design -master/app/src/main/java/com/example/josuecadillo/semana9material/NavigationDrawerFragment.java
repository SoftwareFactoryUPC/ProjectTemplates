package com.example.josuecadillo.semana9material;

import android.app.Activity;
import android.content.Context;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.GestureDetector;
import android.view.LayoutInflater;
import android.view.MotionEvent;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import com.example.josuecadillo.semana9material.adapter.CustomItemAdapter;

import java.util.ArrayList;
import java.util.List;

public class NavigationDrawerFragment extends Fragment {

    private RecyclerView recyclerView;
    private CustomItemAdapter adapter;

    public static final String PREF_FILE_NAME = "textpref";
    public static final String KEY_USER_LEARNED_DRAWER = "user_learned_drawer";
    ActionBarDrawerToggle mDrawerToggle;
    DrawerLayout mDrawerLayout;

    private boolean mUserLearnedDrawer;
    private boolean mFromSaveInstanceState;
    private View containerView;


    public NavigationDrawerFragment() {

    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        mUserLearnedDrawer = Boolean.valueOf(readFromPreferences(getActivity(),KEY_USER_LEARNED_DRAWER,"false"));
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View layout = inflater.inflate(R.layout.fragment_navigation_drawer, container, false);
        recyclerView = (RecyclerView) layout.findViewById(R.id.drawerList);

        adapter = new CustomItemAdapter(getActivity(),getData());
        recyclerView.setAdapter(adapter);
        recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
        recyclerView.addOnItemTouchListener(new RecyclerViewTouchListener(getActivity(),recyclerView,new ClickListener() {
            @Override
            public void onClick(View view, int position) {
                Toast.makeText(getActivity(),"onClick"+position,Toast.LENGTH_SHORT).show();
            }

            @Override
            public void onLongClick(View view, int position) {
                Toast.makeText(getActivity(),"onLongClick"+position,Toast.LENGTH_SHORT).show();

            }
        }));
        return layout;
    }

    public void setUp(int fragmentID,DrawerLayout drawerLayout, final Toolbar toolbar) {
        containerView = getActivity().findViewById(fragmentID);
        mDrawerLayout = drawerLayout;
        mDrawerToggle = new ActionBarDrawerToggle(getActivity(),drawerLayout,toolbar,R.string.drawer_open,R.string.drawer_open){
            @Override
            public void onDrawerOpened(View drawerView) {
                super.onDrawerOpened(drawerView);
                if (!mUserLearnedDrawer){
                    mUserLearnedDrawer = true;
                    saveToPreferences(getActivity(),KEY_USER_LEARNED_DRAWER,mUserLearnedDrawer+"");
                }
                getActivity().invalidateOptionsMenu();
            }

            @Override
            public void onDrawerClosed(View drawerView) {
                super.onDrawerClosed(drawerView);
                getActivity().invalidateOptionsMenu();
            }

            @Override
            public void onDrawerSlide(View drawerView, float slideOffset) {
                if (slideOffset<0.5){
                    toolbar.setAlpha(1-slideOffset);
                }
            }
        };

        if (!mUserLearnedDrawer && !mFromSaveInstanceState){
            mDrawerLayout.openDrawer(containerView);
        }

        mDrawerLayout.setDrawerListener(mDrawerToggle);
        mDrawerLayout.post(new Runnable() {
            @Override
            public void run() {
                mDrawerToggle.syncState();
            }
        });

    }

    public static List<CustomItem> getData(){
        List<CustomItem> data = new ArrayList<>();
        int[] iconList = {R.drawable.ic_number1,R.drawable.ic_number2,R.drawable.ic_number3,R.drawable.ic_number4,
                R.drawable.ic_number1,R.drawable.ic_number2,R.drawable.ic_number3,R.drawable.ic_number4,
                R.drawable.ic_number1,R.drawable.ic_number2,R.drawable.ic_number3,R.drawable.ic_number4};
        String[] stringList = {"Opcion 1","Opcion 2","Opcion 3","Opcion 4","Opcion 5","Opcion 6","Opcion 7","Opcion 8","Opcion 9","Opcion 10","Opcion 11","Opcion 12"};
        for (int i = 0; i < iconList.length && i< stringList.length; i++) {
            CustomItem current = new CustomItem();
            current.setTitle(stringList[i]);
            current.setIconId(iconList[i]);
            data.add(current);
        }

        return data;

    }
    public static void saveToPreferences(Context context,String preferenceName,String preferenceValue){
        SharedPreferences sharedPrefences = context.getSharedPreferences(PREF_FILE_NAME,context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefences.edit();
        editor.putString(preferenceName,preferenceValue);
        editor.commit();
    }
    public static String readFromPreferences(Context context,String preferenceName,String defaultValue){
        SharedPreferences sharedPrefences = context.getSharedPreferences(PREF_FILE_NAME,context.MODE_PRIVATE);
        return sharedPrefences.getString(preferenceName,defaultValue);
    }



    class RecyclerViewTouchListener implements RecyclerView.OnItemTouchListener{

        private GestureDetector gestureDetector;
        private ClickListener clickListener;

        public RecyclerViewTouchListener(Context context, final RecyclerView recyclerView, final ClickListener clickListener) {
            Log.d("Out", "constructor de RecyclerViewTouchListener");
            this.clickListener = clickListener;
            gestureDetector = new GestureDetector(context, new GestureDetector.SimpleOnGestureListener(){

                @Override
                public boolean onSingleTapUp(MotionEvent e) {//TouchUp normal
                    Log.d("Franco","onSingleTapUp"+e);
                    return true;
                }

                @Override
                public void onLongPress(MotionEvent e) {//Long press
                    Log.d("Franco","onLongPress"+e);
                    View child = recyclerView.findChildViewUnder(e.getX(),e.getY());
                    if (child != null && clickListener!=null){
                        clickListener.onLongClick(child,recyclerView.getChildLayoutPosition(child));//recyclerView.getChildPosition(child));
                    }
                    //super.onLongPress(e);
                }
            });


        }

        @Override
        public boolean onInterceptTouchEvent(RecyclerView rv, MotionEvent e) {

            View child = rv.findChildViewUnder(e.getX(),e.getY());
            if (child != null && clickListener != null && gestureDetector.onTouchEvent(e))
            {
                clickListener.onClick(child,rv.getChildLayoutPosition(child)); //rv.getChildPosition(child));
            }
            Log.d("Out", "onInterceptTouchEvent " + gestureDetector.onTouchEvent(e));

            return false;
        }

        @Override
        public void onTouchEvent(RecyclerView rv, MotionEvent e) {

        }
    }
    public static interface ClickListener{
        public void onClick(View view,int position);
        public void onLongClick(View view,int position);
    }
}
