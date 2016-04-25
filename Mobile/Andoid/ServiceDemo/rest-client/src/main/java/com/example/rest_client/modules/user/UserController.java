package com.example.rest_client.modules.user;

import android.content.Context;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.example.rest_client.BuildConfig;
import com.example.rest_client.R;
import com.example.rest_client.modules.BaseService;
import com.example.rest_client.modules.user.listeners.LoginListener;
import com.example.rest_client.modules.user.listeners.UserInfoListener;
import com.example.rest_client.modules.user.models.User;
import com.google.gson.Gson;
import com.google.gson.JsonObject;

import org.json.JSONException;
import org.json.JSONObject;

/**
 * Created by brunoaybar on 4/22/16.
 */
public class UserController extends BaseService {

    private static UserController INSTANCE = new UserController();
    private UserController(){}

    public static UserController getInstance(){
        return INSTANCE;
    }

    public void login(Context context, String username, String password, final LoginListener listener){
        if(listener==null)
            return;
        listener.onLoginStart();
        String url = BuildConfig.REST_URL.concat(context.getString(R.string.uri_login));

        JSONObject parameters = new JSONObject();
        try {
            parameters.put("username",username);
            parameters.put("password",password);
        } catch (JSONException e) {
            e.printStackTrace();
        }

        JsonObjectRequest request = getDefaultRequest(Request.Method.POST, url, parameters, false, new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                try {
                    String id = response.getString("id");
                    String token = response.getString("token");

                    listener.onLoginCompleted(id,token);
                } catch (JSONException e) {
                    listener.onLoginError("Ocurrió un error al interpretar la información");
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                listener.onLoginError("Ocurrió un error al realizar la petición");
            }
        });

        getDefaultQueue(context).add(request);
    }

    public void getUserInfo(Context context, String token, String userId, final UserInfoListener listener){
        if(listener==null)
            return;
        listener.onUserInfoStart();

        String url = BuildConfig.REST_URL.concat(String.format(context.getString(R.string.uri_user_info),userId,token));

        JsonObjectRequest request = getDefaultRequest(Request.Method.GET, url, null, true, new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                try{
                    User user = new Gson().fromJson(response.toString(),User.class);
                    listener.onUserInfoCompleted(user);
                }catch (Exception e){
                    listener.onUserInfoError("Ocurrió un error al interpretar la información");
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                listener.onUserInfoError("Ocurrió un error al realizar la petición");
            }
        });

        getDefaultQueue(context).add(request);
    }

}
