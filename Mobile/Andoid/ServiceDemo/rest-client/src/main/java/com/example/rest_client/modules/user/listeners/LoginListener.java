package com.example.rest_client.modules.user.listeners;

/**
 * Created by brunoaybar on 4/22/16.
 */
public interface LoginListener {
    void onLoginStart();
    void onLoginCompleted(String userId, String token);
    void onLoginError(String message);
}
