package com.example.josuecadillo.loginfacebook;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.support.v4.app.Fragment;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.facebook.AccessToken;
import com.facebook.AccessTokenTracker;
import com.facebook.CallbackManager;
import com.facebook.FacebookCallback;
import com.facebook.FacebookException;
import com.facebook.Profile;
import com.facebook.ProfileTracker;
import com.facebook.login.LoginResult;
import com.facebook.login.widget.LoginButton;
import com.facebook.share.Sharer;
import com.facebook.share.model.ShareLinkContent;
import com.facebook.share.model.SharePhoto;
import com.facebook.share.model.SharePhotoContent;
import com.facebook.share.widget.ShareButton;

public class MainActivityFragment extends Fragment {


    private TextView userTextView;
    private CallbackManager callbackManager;
    private AccessTokenTracker tokenTracker;
    private ProfileTracker profileTracker;
    private ShareButton shareLinkButton;
    private ShareButton shareImageButton;

    private FacebookCallback<LoginResult> facebookCallback = new FacebookCallback<LoginResult>() {
        @Override
        public void onSuccess(LoginResult loginResult) {
            Log.d("Franco", "onSuccess");
            AccessToken accessToken = loginResult.getAccessToken();
            Profile profile = Profile.getCurrentProfile();
            userTextView.setText(welcomeUserTextView(profile));
            shareLinkButton.setVisibility(View.VISIBLE);
            shareImageButton.setVisibility(View.VISIBLE);

        }
        
        @Override
        public void onCancel() {
            Log.d("Mensaje", "onCancel");
        }

        @Override
        public void onError(FacebookException e) {
            Log.d("Mensaje", "onError " + e);
        }

    };


    public MainActivityFragment() {
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        callbackManager = CallbackManager.Factory.create();
        setupTokenTracker();
        setupProfileTracker();
        tokenTracker.startTracking();
        profileTracker.startTracking();
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        return inflater.inflate(R.layout.fragment_main, container, false);
    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {

        userTextView = (TextView) view.findViewById(R.id.userTextView);
        LoginButton mButtonLogin = (LoginButton) view.findViewById(R.id.connectWithFbButton);
        mButtonLogin.setFragment(this);
        mButtonLogin.setCompoundDrawables(null, null, null, null);
        mButtonLogin.setReadPermissions("user_friends");
        mButtonLogin.registerCallback(callbackManager, facebookCallback);

        //shareLinkButton
        shareLinkButton = (ShareButton) view.findViewById(R.id.shareLinkButton);
        ShareLinkContent contentLink = new ShareLinkContent.Builder()
                .setContentUrl(Uri.parse("https://developers.facebook.com"))
                .build();

        shareLinkButton.setShareContent(contentLink);
        shareLinkButton.registerCallback(callbackManager, new FacebookCallback<Sharer.Result>() {
            @Override
            public void onSuccess(Sharer.Result result) {
                Toast.makeText(getActivity(),"Se compartio el link",Toast.LENGTH_SHORT);
            }

            @Override
            public void onCancel() {

            }

            @Override
            public void onError(FacebookException e) {
                Toast.makeText(getActivity(),"Ocurrio un error",Toast.LENGTH_SHORT);

            }
        });

        shareLinkButton.setVisibility(View.GONE);

        Bitmap shareImage = BitmapFactory.decodeResource(getActivity().getApplicationContext().getResources(),
                R.drawable.imagen_noticia_upc);

        SharePhoto photo = new SharePhoto.Builder()
                .setBitmap(shareImage)
                .build();
        SharePhotoContent contentImage = new SharePhotoContent.Builder()
                .addPhoto(photo)
                .build();

        shareImageButton = (ShareButton) view.findViewById(R.id.shareImageButton);

        shareImageButton.setShareContent(contentImage);
        shareImageButton.registerCallback(callbackManager, new FacebookCallback<Sharer.Result>() {
            @Override
            public void onSuccess(Sharer.Result result) {
                Toast.makeText(getActivity(),"Se compartio la imagen",Toast.LENGTH_SHORT);
            }

            @Override
            public void onCancel() {

            }

            @Override
            public void onError(FacebookException e) {
                Toast.makeText(getActivity(),"Ocurrio un error",Toast.LENGTH_SHORT);

            }
        });

        shareImageButton.setVisibility(View.GONE);



    }

    @Override
    public void onResume() {
        super.onResume();
        Profile profile = Profile.getCurrentProfile();
        userTextView.setText(welcomeUserTextView(profile));
    }

    @Override
    public void onStop() {
        super.onStop();
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        callbackManager.onActivityResult(requestCode, resultCode, data);
    }

    private void setupTokenTracker() {
        tokenTracker = new AccessTokenTracker() {
            @Override
            protected void onCurrentAccessTokenChanged(AccessToken oldAccessToken, AccessToken currentAccessToken) {
                Log.d("Mensaje", "" + currentAccessToken);
            }

        };
    }

    private void setupProfileTracker() {
        profileTracker = new ProfileTracker() {
            @Override
            protected void onCurrentProfileChanged(Profile oldProfile, Profile currentProfile) {
                userTextView.setText(welcomeUserTextView(currentProfile));
                if (currentProfile!=null){
                    shareLinkButton.setVisibility(View.VISIBLE);
                    shareImageButton.setVisibility(View.VISIBLE);
                }
                else {
                    shareLinkButton.setVisibility(View.GONE);
                    shareImageButton.setVisibility(View.GONE);
                }

            }

        };
    }

    private String welcomeUserTextView(Profile profile) {
        StringBuffer stringBuffer = new StringBuffer();
        if (profile != null) {
            stringBuffer.append("Hola, " + profile.getName());
        }
        return stringBuffer.toString();
    }


}
