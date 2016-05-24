package com.example.brunoaybar.sociallogin;

import android.content.Context;
import android.content.SharedPreferences;
import android.support.annotation.NonNull;

/**
 * Created by brunoaybar on 5/24/16.
 */
public class PreferencesManager {


    private static final String TAG_PREFERENCES="MisPreferencias";
    private static PreferencesManager INSTANCE;
    private Context context;

    public static PreferencesManager get(){
        if(INSTANCE==null)
            INSTANCE = new PreferencesManager();
        return INSTANCE;
    }

    public static void init(Context context){
        get().context = context;
    }



    public static final String TAG_NAME = "nombre";
    public static final String TAG_LASTNAME = "apellido";
    public static final String TAG_EMAIL = "correo";
    public static final String TAG_GENDER = "genero";
    public static final String TAG_COVER = "url_cover";
    public static final String TAG_PROFILE = "url_profile";
    public static final String TAG_PROVIDER = "social_provider";
    public static final String TAG_SOCIAL_TOKEN = "social_token";
    public static final String TAG_SOCIAL_ID = "social_id";

    public enum Social{
        NONE(null),
        FACEBOOK("facebook"),
        GOOGLE("google");
        private String mProvider;
        Social(String provider){
            mProvider = provider;
        }
        public String getProvider(){
            return mProvider;
        }
    }


    public void saveBasicInfo(String name, String lastname, String email, String gender){
        saveString(TAG_EMAIL,email);
        saveString(TAG_NAME,name);
        saveString(TAG_LASTNAME,lastname);
        saveString(TAG_GENDER,gender);
    }

    public void saveSocialInfo(@NonNull Social provider, String token, String socialId, String urlCover, String urlProfile){
        saveString(TAG_PROVIDER,provider.getProvider());
        saveString(TAG_SOCIAL_TOKEN,token);
        saveString(TAG_SOCIAL_ID,socialId);
        saveString(TAG_COVER,urlCover);
        saveString(TAG_PROFILE,urlProfile);
    }
    public void removeUserInfo(){
        saveSocialInfo(Social.NONE,null,null,null,null);
        saveBasicInfo(null,null,null,null);
    }

    private void saveString(String key, String value){
        SharedPreferences prefs = context.getSharedPreferences(TAG_PREFERENCES, Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = prefs.edit();
        editor.putString(key, value);
        editor.commit();
    }

    public String getString(String key){
        SharedPreferences prefs = context.getSharedPreferences(TAG_PREFERENCES,Context.MODE_PRIVATE);
        return prefs.getString(key,null);
    }

}
