package com.example.josuecadillo.semana6xml;

import android.net.Uri;
import android.os.Environment;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.InputSource;
import org.xml.sax.SAXException;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import javax.xml.transform.stream.StreamSource;


public class MainActivity extends ActionBarActivity {

    TextView tv;

    String file = "demo.xml";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        tv = (TextView)findViewById(R.id.texto1);

        Button buttonOne = (Button) findViewById(R.id.button1);
        buttonOne.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                try
                {
                    InputStream fin = openFileInput(file);
                    int c;
                    String temp="";
                    while( (c = fin.read()) != -1){
                        temp = temp + Character.toString((char)c);
                    }
                    tv.setText(temp);
                    Toast.makeText(getBaseContext(),"file read",
                             Toast.LENGTH_SHORT).show();
                }
                catch(Exception e)
                {

                }



            }
        });

        Button buttonTwo = (Button) findViewById(R.id.button2);
        buttonTwo.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {

                try
                {
                    InputStream fin = openFileInput(file);

                    DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
                    DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
                    Document doc = docBuilder.parse(fin);

                    Toast.makeText(getBaseContext(),"sdada",Toast.LENGTH_LONG).show();
                    Node nodes = doc.getElementsByTagName("RouteName").item(0);

                    nodes.getChildNodes().item(0).setNodeValue("otro valor");


                    TransformerFactory factory = TransformerFactory.newInstance();
                    Transformer transformer = factory.newTransformer();

                    DOMSource source = new DOMSource(doc);
                    //StreamSource s = new StreamSource(fin);

                    FileOutputStream fOut = openFileOutput(file,MODE_WORLD_READABLE);
                    StreamResult result = new StreamResult(fOut);
                    transformer.transform(source, result);
                } catch (Exception e) {
                    e.printStackTrace();
                }


            }
        });


        try {

            //InputStream is = getAssets().open("empleados.xml");
            /*
            InputStream is = getResources().openRawResource(getResources().getIdentifier("empleados","raw",getPackageName()));

            DocumentBuilderFactory docFactory = DocumentBuilderFactory.newInstance();
            DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
            Document doc = docBuilder.parse(is);

            Toast.makeText(this,"sdada",Toast.LENGTH_LONG);
            Node nodes = doc.getElementsByTagName("RouteName").item(0);
            // newname is String variable which retrives value from edittext
            nodes.setNodeValue("otro valor");


            TransformerFactory factory = TransformerFactory.newInstance();
            Transformer transformer = factory.newTransformer();

            DOMSource source = new DOMSource(doc);
            StreamSource s = new StreamSource(is);

            FileOutputStream fos = new FileOutputStream(Uri.parse("android.resource://com.cpt.sample/raw/filename"));
            StreamResult result = new StreamResult(fos);
            transformer.transform(source, result);
            */
            /*
            String FILENAME = "hello_file";
            String string = "hello world!";

            FileOutputStream fos = openFileOutput(FILENAME, this.MODE_WORLD_WRITEABLE);
            fos.write(string.getBytes());
            fos.close();
            */

            String data =
            "<Trip> "+
                "<RouteID>12345</RouteID>  "+
                "<RouteName>Mountain Trip</RouteName>  "+
            "</Trip>   ";

            try {
                FileOutputStream fOut = openFileOutput(file,MODE_WORLD_READABLE);
                fOut.write(data.getBytes());
                fOut.close();
                Toast.makeText(getBaseContext(),"file saved",
                        Toast.LENGTH_SHORT).show();
            } catch (Exception e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }


        } catch (Exception e) {
            e.printStackTrace();
        }


    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
