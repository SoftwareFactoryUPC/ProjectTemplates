package com.example.brunoaybar.sociallogin;

import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.annotation.NonNull;

import com.facebook.CallbackManager;
import com.facebook.FacebookCallback;
import com.facebook.FacebookException;
import com.facebook.FacebookSdk;
import com.facebook.GraphRequest;
import com.facebook.GraphResponse;
import com.facebook.login.LoginManager;
import com.facebook.login.LoginResult;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.Arrays;
import java.util.List;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v4.app.Fragment;

import com.google.android.gms.auth.api.Auth;
import com.google.android.gms.auth.api.signin.GoogleSignInAccount;
import com.google.android.gms.auth.api.signin.GoogleSignInOptions;
import com.google.android.gms.auth.api.signin.GoogleSignInResult;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.Scopes;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.common.api.ResultCallback;
import com.google.android.gms.common.api.Scope;
import com.google.android.gms.common.api.Status;
import com.google.android.gms.plus.People;
import com.google.android.gms.plus.Plus;
import com.google.android.gms.plus.model.people.Person;

/**
 * Created by brunoaybar on 3/5/16.
 */
public abstract class SocialFragment extends Fragment {

    public static final List<String> LOGIN_PERMISSIONS = Arrays.asList("email","public_profile");
    public static final String BASE_URL_PROFILE = "https://graph.facebook.com/%1$s/picture?type=large";

    private static final int RC_SIGN_IN = 0;

    CallbackManager mCallbackManager;
    private static GoogleApiClient mPlusClient;

    //This method should be implemented on which ever class that extends from this class, in order to handle social login results
    protected abstract void socialLoginCompleted();

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        //Init facebook
        FacebookSdk.sdkInitialize(getContext());

        //Init google
        GoogleSignInOptions gso = new GoogleSignInOptions.Builder(GoogleSignInOptions.DEFAULT_SIGN_IN)
                .requestScopes(new Scope(Scopes.PROFILE))
                .requestEmail()
                .requestProfile()
                .build();

        if(mPlusClient==null) {
            mGoogleListener = new GoogleListener();
            mPlusClient = new GoogleApiClient.Builder(getContext())
                    .enableAutoManage(getActivity(), mGoogleListener)
                    .addApi(Auth.GOOGLE_SIGN_IN_API, gso)
                    .addApi(Plus.API)
                    .build();
        }
    }

    //<editor-fold desc="Setting loggin with Facebook">
    public void startFacebookLogin(){
        mCallbackManager = CallbackManager.Factory.create();
        LoginManager.getInstance().registerCallback(mCallbackManager,
                new FacebookCallback<LoginResult>() {
                    @Override
                    public void onSuccess(final LoginResult loginResults) {
                        GraphRequest request = GraphRequest.newMeRequest(
                                loginResults.getAccessToken(),
                                new GraphRequest.GraphJSONObjectCallback() {
                                    @Override
                                    public void onCompleted(
                                            JSONObject object,
                                            GraphResponse response) {
                                        try {
                                            //Save social info in preferences
                                            String token = loginResults.getAccessToken().getToken();
                                            String id = object.getString("id");
                                            String profile = String.format(BASE_URL_PROFILE,id);
                                            String cover = object.getJSONObject("cover").getString("source");

                                            String firstname = object.getString("first_name");
                                            String lastname = object.getString("last_name");
                                            String email = object.getString("email");
                                            String gender = object.getString("gender");

                                            //Persist information
                                            PreferencesManager.get().saveBasicInfo(firstname,lastname,email,gender);
                                            PreferencesManager.get().saveSocialInfo(PreferencesManager.Social.FACEBOOK,token,id,cover,profile);

                                            //Finished
                                            socialLoginCompleted();
                                        } catch (JSONException e) {}

                                    }
                                });
                        Bundle parameters = new Bundle();
                        parameters.putString("fields", "id,first_name,last_name,email,gender,birthday,cover");
                        request.setParameters(parameters);
                        request.executeAsync();

                    }
                    @Override
                    public void onCancel() {
                        //do nothing
                    }
                    @Override
                    public void onError(FacebookException e) {
                        //show error
                    }
                });
        LoginManager.getInstance().logInWithReadPermissions(this, LOGIN_PERMISSIONS);
    }
    //</editor-fold>

    //<editor-fold desc="Setting loggin with Google Plus">
    public void startGoogleLogin()
    {
        //PapayaUiUtils.showToast(getContext(),"IN PROGRESS");
        googleSignInSuccessful = false;
        if(!mPlusClient.isConnected()){
            mPlusClient.connect();
        }
        Intent signInIntent = Auth.GoogleSignInApi.getSignInIntent(mPlusClient);
        startActivityForResult(signInIntent, RC_SIGN_IN);
    }

    private static GoogleListener mGoogleListener;
    private String personId,personPhotoUrl,coverUrl;
    class GoogleListener implements GoogleApiClient.OnConnectionFailedListener{

        @Override
        public void onConnectionFailed(@NonNull ConnectionResult connectionResult) {
        }

        void handleSignInResult(GoogleSignInResult result) {
            if (!result.isSuccess())
                return;
            try
            {
                final GoogleSignInAccount acct = result.getSignInAccount();
                personId = acct.getId();
                //Get user photo and cover image
                if(Plus.PeopleApi.getCurrentPerson(mPlusClient) != null)
                {
                    Person currentPerson = Plus.PeopleApi
                            .getCurrentPerson(mPlusClient);
                    if(currentPerson.getImage()!= null && currentPerson.getImage().hasUrl()&&
                            currentPerson.getImage().getUrl()!=null)
                    {
                        personPhotoUrl = currentPerson.getImage().getUrl();
                        personPhotoUrl = personPhotoUrl.substring(0, personPhotoUrl.length() - 2) + 100;
                    }
                    try{
                        coverUrl = currentPerson.getCover().getCoverPhoto().getUrl();
                    }catch (Exception e){ coverUrl="";}
                }

                socialLoginCompleted();
            }catch(Exception e)
            {
            }
        }

    }

    void handleSignInResult(GoogleSignInResult result) {
        if (!result.isSuccess())
            return;
        try
        {
            GoogleSignInAccount acct = result.getSignInAccount();
            final String personEmail = acct.getEmail();
            final String personId = acct.getId();

            //Get user info
            Plus.PeopleApi.load(mPlusClient, personId).setResultCallback(new ResultCallback<People.LoadPeopleResult>() {
                @Override
                public void onResult(@NonNull People.LoadPeopleResult loadPeopleResult) {
                    //Get values from user
                    Person person = loadPeopleResult.getPersonBuffer().get(0);
                    String firstname = person.getName().getGivenName();
                    String lastname = person.getName().getFamilyName();
                    String displayname = person.getDisplayName();
                    int gender = person.getGender(); String genderText = gender==1 ? "Mujer" : "Hombre";
                    String photo = person.getImage().getUrl();

                    String cover = null;
                    if(person.getCover()!=null && person.getCover().getCoverPhoto()!=null)
                        cover = person.getCover().getCoverPhoto().getUrl();

                    //Persist information
                    PreferencesManager.get().saveBasicInfo(firstname,lastname,personEmail,genderText);
                    PreferencesManager.get().saveSocialInfo(PreferencesManager.Social.GOOGLE,null,personId,cover,photo);

                    //Finish
                    socialLoginCompleted();
                }
            });


        }catch(Exception e)
        {
        }
    }

    @Override
    public void onStop()
    {
        if (mPlusClient != null && mPlusClient.isConnected()) {
            mPlusClient.disconnect();
            mPlusClient.stopAutoManage(getActivity());
        }
        super.onStop();
    }

    @Override
    public void onStart()
    {
        super.onStart();
        if (mPlusClient != null)
            mPlusClient.connect();
    }

    public void signOutFromGplus()
    {
        if (mPlusClient.isConnected())
        {
            Auth.GoogleSignInApi.signOut(mPlusClient).setResultCallback(
                    new ResultCallback<Status>() {
                        @Override
                        public void onResult(Status status) {
                        }
                    });
        }
    }

    //</editor-fold>

    boolean googleSignInSuccessful = false;
    Intent googleData;
    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(mCallbackManager!=null)
            mCallbackManager.onActivityResult(requestCode,resultCode,data);

        // Result returned from launching the Intent from GoogleSignInApi.getSignInIntent(...);
        if (requestCode == RC_SIGN_IN) {
            GoogleSignInResult result = Auth.GoogleSignInApi.getSignInResultFromIntent(data);
            handleSignInResult(result);
        }
    }
}
