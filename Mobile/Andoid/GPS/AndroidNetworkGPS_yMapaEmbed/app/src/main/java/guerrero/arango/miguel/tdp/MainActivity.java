package guerrero.arango.miguel.tdp;

import android.Manifest;
import android.content.Context;
import android.content.pm.PackageManager;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.TimeZone;

public class MainActivity extends AppCompatActivity implements OnMapReadyCallback{

    private final String TAG = this.getClass().getName();


    private GoogleMap mMap;


    private static final int MY_PERMISSIONS_REQUEST_FINE_LOCATION = 1;
    private static final int MY_PERMISSIONS_REQUEST_COARSE_LOCATION = 2;
    private static final int INTERVALO_LOCALIZACION = 1000;
    private static final float DISTANCIA_LOCALIZACION = 10f;


    Location ultimaUbicacion;

    private LocationManager locationManager = null;
    LocationListener locationListener;

    LocationListener[] mLocationListeners = new LocationListener[] {
            new MyLocationListener(LocationManager.GPS_PROVIDER),
            new MyLocationListener(LocationManager.NETWORK_PROVIDER)
    };

    TextView tvLatitud,tvLongitud;
    Button bLocalizar;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        tvLatitud = (TextView) findViewById(R.id.tvLatitud);
        tvLongitud = (TextView) findViewById(R.id.tvLongitud);
        bLocalizar = (Button) findViewById(R.id.bLocalizar);
        bLocalizar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                tvLatitud.setText(""+ultimaUbicacion.getLatitude());
                tvLongitud.setText(""+ultimaUbicacion.getLongitude());

            }
        });

        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);


        if (locationManager == null) {
            locationManager = (LocationManager) getApplicationContext().getSystemService(Context.LOCATION_SERVICE);
        }

        try {
            locationManager.requestLocationUpdates(
                    LocationManager.NETWORK_PROVIDER, INTERVALO_LOCALIZACION, DISTANCIA_LOCALIZACION,
                    mLocationListeners[1]);
        } catch (java.lang.SecurityException ex) {
            Log.i(TAG, "fail to request location update, ignore", ex);
        } catch (IllegalArgumentException ex) {
            Log.d(TAG, "network provider does not exist, " + ex.getMessage());
        }
        try {
            locationManager.requestLocationUpdates(
                    LocationManager.GPS_PROVIDER, INTERVALO_LOCALIZACION, DISTANCIA_LOCALIZACION,
                    mLocationListeners[0]);
        } catch (java.lang.SecurityException ex) {
            Log.i(TAG, "fail to request location update, ignore", ex);
        } catch (IllegalArgumentException ex) {
            Log.d(TAG, "gps provider does not exist " + ex.getMessage());
        }




        RevisarPermisosDeUbicacion();
    }


    void RevisarPermisosDeUbicacion(){
        int permisosAccessFine = MainActivity.this.checkCallingOrSelfPermission(Manifest.permission.ACCESS_FINE_LOCATION);
        if(permisosAccessFine == PackageManager.PERMISSION_DENIED){
            ActivityCompat.requestPermissions(MainActivity.this,
                    new String[]{Manifest.permission.ACCESS_FINE_LOCATION},
                    MY_PERMISSIONS_REQUEST_FINE_LOCATION);
        }   else{

            //mMap.setMyLocationEnabled(true);
            //ServicioLocalizacion();
        }
    }
    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);

        switch (requestCode) {
            case MY_PERMISSIONS_REQUEST_FINE_LOCATION: {
                // If request is cancelled, the result arrays are empty.
                if (grantResults.length > 0
                        && grantResults[0] == PackageManager.PERMISSION_GRANTED) {


                    // permission was granted, yay! Do the
                    // contacts-related task you need to do.

                } else {

                    Toast.makeText(MainActivity.this,"El servicio requiere los permisos de localización", Toast.LENGTH_LONG).show();

                    //Oculto para no ser Insistente
                    //RevisarPermisosDeUbicacion();


                    // permission denied, boo! Disable the
                    // functionality that depends on this permission.
                }
                return;
            }

            case MY_PERMISSIONS_REQUEST_COARSE_LOCATION: {
                // If request is cancelled, the result arrays are empty.
                if (grantResults.length > 0
                        && grantResults[0] == PackageManager.PERMISSION_GRANTED) {

                    // permission was granted, yay! Do the
                    // contacts-related task you need to do.

                } else {

                    // permission denied, boo! Disable the
                    // functionality that depends on this permission.
                }
                return;
            }

            // other 'case' lines to check for other
            // permissions this app might request
        }

    }

    @Override
    public void onMapReady(GoogleMap googleMap) {

        mMap = googleMap;


    }

    private class MyLocationListener implements LocationListener{




        public MyLocationListener(String provider)
        {
            Log.e(TAG, "LocationListener " + provider);
            ultimaUbicacion = new Location(provider);
        }

        @Override
        public void onLocationChanged(Location location) {
            Log.e(TAG, "onLocationChanged: " + location);
            ultimaUbicacion.set(location);

            DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
            dateFormat.setTimeZone(TimeZone.getTimeZone("UTC"));
            Date date = new Date();
            //ultimaActualizacionTiempo = dateFormat.format(date).toString();

            //drawlocation


            //mMap.clear();
            //LatLng positionActual = new LatLng(location.getLatitude(), location.getLongitude());
            //mMap.addMarker(new MarkerOptions().position(positionActual));
            //mMap.moveCamera(CameraUpdateFactory.newLatLng(positionActual));

        }

        @Override
        public void onStatusChanged(String s, int i, Bundle bundle) {
            Log.e(TAG, "onStatusChanged: " + s);

        }

        @Override
        public void onProviderEnabled(String s) {
            Log.e(TAG, "onProviderEnabled: " + s);

        }

        @Override
        public void onProviderDisabled(String s) {
            Log.e(TAG, "onProviderDisabled: " + s);

        }


    }
}
