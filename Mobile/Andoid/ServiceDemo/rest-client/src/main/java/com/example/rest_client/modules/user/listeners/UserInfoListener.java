package com.example.rest_client.modules.user.listeners;

import com.example.rest_client.modules.user.models.User;

/**
 * Created by brunoaybar on 4/22/16.
 */
public interface UserInfoListener {
    void onUserInfoStart();
    void onUserInfoCompleted(User user);
    void onUserInfoError(String message);

}
