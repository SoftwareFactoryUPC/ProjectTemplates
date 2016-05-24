package com.example.brunoaybar.sociallogin;


import android.graphics.Bitmap;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.graphics.drawable.RoundedBitmapDrawable;
import android.support.v4.graphics.drawable.RoundedBitmapDrawableFactory;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.bumptech.glide.BitmapRequestBuilder;
import com.bumptech.glide.Glide;
import com.bumptech.glide.request.target.BitmapImageViewTarget;
import com.facebook.login.LoginManager;
import com.facebook.login.widget.LoginButton;
import com.google.android.gms.auth.api.Auth;
import com.google.android.gms.common.SignInButton;

import org.w3c.dom.Text;

import jp.wasabeef.glide.transformations.BlurTransformation;

public class LoginFragment extends SocialFragment {


    LoginButton butFacebook;
    SignInButton butGoogle;
    TextView tviName,tviMail,tviGender,tviId,tviToken;
    Button butLogout;
    ImageView iviPhoto,iviCover;

    public LoginFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View v = inflater.inflate(R.layout.fragment_login, container, false);
        //Find views by id
        butFacebook = (LoginButton) v.findViewById(R.id.butFacebook);
        butGoogle = (SignInButton) v.findViewById(R.id.butGoogle);
        butLogout = (Button) v.findViewById(R.id.butLogout);

        tviName = (TextView) v.findViewById(R.id.tviName);
        tviMail = (TextView) v.findViewById(R.id.tviMail);
        tviGender = (TextView) v.findViewById(R.id.tviGender);
        tviId = (TextView) v.findViewById(R.id.tviId);
        tviToken = (TextView) v.findViewById(R.id.tviToken);

        iviPhoto = (ImageView) v.findViewById(R.id.iviPhoto);
        iviCover = (ImageView) v.findViewById(R.id.iviCover);

        //Assign actions to buttons
        butFacebook.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startFacebookLogin();
            }
        });
        butGoogle.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startGoogleLogin();
            }
        });
        butLogout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                PreferencesManager.get().removeUserInfo();
                LoginManager.getInstance().logOut();
                signOutFromGplus();
                bindData();
            }
        });

        bindData();

        return v;
    }

    @Override
    protected void socialLoginCompleted() {
        bindData();
    }

    public void bindData(){
        String name = PreferencesManager.get().getString(PreferencesManager.TAG_NAME);
        String lastname = PreferencesManager.get().getString(PreferencesManager.TAG_LASTNAME);
        String email = PreferencesManager.get().getString(PreferencesManager.TAG_EMAIL);
        String gender = PreferencesManager.get().getString(PreferencesManager.TAG_GENDER);

        String id = PreferencesManager.get().getString(PreferencesManager.TAG_SOCIAL_ID);
        String token = PreferencesManager.get().getString(PreferencesManager.TAG_SOCIAL_TOKEN);
        String cover = PreferencesManager.get().getString(PreferencesManager.TAG_COVER);
        String photo = PreferencesManager.get().getString(PreferencesManager.TAG_PROFILE);

        //Show information on labels and views

        String displayName = (name==null ? "":name) + (lastname==null?"":lastname);
        tviName.setText(displayName);
        tviMail.setText( email==null ? "" : email );
        tviGender.setText( gender==null ? "" : gender);
        tviId.setText( id==null ? "" : id );
        tviToken.setText( token==null ? "" : token );

        if(cover!=null) {
            iviCover.setVisibility(View.VISIBLE);
            Glide.with(getContext()).load(cover)
                    .bitmapTransform(new BlurTransformation(getContext()))
                    .into(iviCover);
        }else
            iviCover.setVisibility(View.GONE);
        loadImage(photo,R.drawable.icon_avatar,iviPhoto);
    }

    private void loadImage(String url, int placeholder,final ImageView ivi){
        try
        {
            BitmapRequestBuilder request = Glide.with(this).load(url).asBitmap()
                    .centerCrop();
            if(placeholder!=-1)
                request.placeholder(placeholder);
            request.into(new BitmapImageViewTarget(ivi) {
                @Override
                protected void setResource(Bitmap resource) {
                    RoundedBitmapDrawable circularBitmapDrawable =
                            RoundedBitmapDrawableFactory.create(getContext().getResources(),
                                    resource);
                    circularBitmapDrawable.setCircular(true);
                    ivi.setImageDrawable(circularBitmapDrawable);
                    RelativeLayout rl;
                }
            });
        }catch (Exception ex)
        {
            ivi.setVisibility(View.GONE);
            Glide.with(this).load(url).placeholder(placeholder).centerCrop();
        }
    }
}
