package com.example.diego.apptest1;

import android.app.Activity;
import android.content.Context;
import android.graphics.Color;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.location.LocationProvider;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    TextView textoLat;
    TextView textoLong;
    TextView textoPrecision;

    TextView estadoProveedor;
    TextView estadoLocalizacion;
    TextView proveedor;

    Activity act;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        act = this;

        textoLat = (TextView) findViewById( R.id.txtLat );
        textoLong = (TextView) findViewById( R.id.txtLong );
        textoPrecision = (TextView) findViewById( R.id.txtPrecision );

        estadoProveedor = (TextView) findViewById( R.id.txtEstadoLoc);
        estadoLocalizacion = (TextView) findViewById( R.id.txtEstadoProveedor);

        proveedor = (TextView) findViewById( R.id.txtProveedor);

        LocationManager locationManager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);

        LocationListener locationListener = new LocationListener() {

            @Override
            public void onLocationChanged(Location location) {
                if(location!=null) {
                    textoLong.setText("" + location.getLongitude());
                    textoLat.setText("" + location.getLatitude());
                    textoPrecision.setText("Precision: " + location.getAccuracy());
                    proveedor.setText("Proveedor: " + location.getProvider());

                }
            }

            @Override
            public void onProviderEnabled(String s) {
                Toast.makeText( act ,"GPS activado: "+s, Toast.LENGTH_SHORT ).show();
                estadoLocalizacion.setText("Estado de localizacion: ACTIVADO");
                estadoLocalizacion.setTextColor(Color.GREEN);
            }

            @Override
            public void onProviderDisabled(String s) {
                Toast.makeText( act ,"GPS desactivado: "+s, Toast.LENGTH_LONG ).show();
                estadoLocalizacion.setText("Estado de localizacion: DESACTIVADO");
                estadoLocalizacion.setTextColor(Color.RED);
            }

            @Override
            public void onStatusChanged(String s, int i, Bundle bundle) {
                switch (i){
                    case LocationProvider.AVAILABLE:
                        estadoProveedor.setText("Estado de Proveedor: DISPONIBLE");
                        break;

                    case LocationProvider.OUT_OF_SERVICE:
                        estadoProveedor.setText("Estado de Proveedor: FUERA DE SERVICIO");
                        break;

                    case LocationProvider.TEMPORARILY_UNAVAILABLE:
                        estadoProveedor.setText("Estado de Proveedor: NO DISPONIBLE");
                        break;
                }
            }

        };

        locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 0 ,0 ,locationListener);

    }
}
