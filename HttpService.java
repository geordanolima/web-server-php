package com.example.geordano.xxxxxxx;

import android.Manifest;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Color;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.CircleOptions;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.gson.Gson;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.Random;


public class    HttpService extends AsyncTask<Void, Integer, Void> {

    private Context context;
    private int quantidade;
    private LatLng ponto;

    public int getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(int quantidade) {
        this.quantidade = quantidade;
    }



    private ArrayList<Pokemon> dados = new ArrayList();

    public HttpService(Context context, ArrayList<Pokemon> dados, int quantidade) {
        this.dados = dados;
        this.context = context;
        this.quantidade = quantidade;
    }

    @Override
    protected void onPreExecute(){
//        textoCarregando.setText("Procurando...");
    }

    @Override
    protected Void doInBackground(Void... params) {
        int c = 1;
        pausa(5000);

        while(c < quantidade){
            pausa(1000);
            dados.add(carregaPokemon());
     //       Log.e("Teste recebimento",dados.get(0).getNome());
//            publishProgress(c);
            c++;
        }
        return null;
    }

    @Override
    protected void onProgressUpdate(Integer... values) {
//        textoCarregando.setText(values[0] + " itens caregados...");
    }

    protected void onPostExecute(Void value) {
        Intent mapa = new Intent(context, MapsActivity.class);


        mapa.putParcelableArrayListExtra("bixo", dados);
        context.startActivity(mapa);

    }

    private double Randomizaposicao(){
        Random valor = new Random();
        int resposta = valor.nextInt(5);
        Double valorfinal = 0.0;
        if (resposta % 2 == 0){
            valorfinal = resposta * 0.0001;
        } else {
            valorfinal = resposta * -0.0001;
        }
        return valorfinal;
    }

    private void configuraMapinha() {
        try {
            LocationManager locationManager =
                    (LocationManager) context.getSystemService(Context.LOCATION_SERVICE);
            if (ActivityCompat.checkSelfPermission(context, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(context, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
                return;
            }
            locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER,
                    0, 0, locationListener);

        }
        catch (SecurityException ex) {
//            Toast.makeText(this, "Deu erro nessa treta de gépis", Toast.LENGTH_LONG).show();
        }
    }

    public LocationListener locationListener = new LocationListener() {
        @Override
        public void onLocationChanged(Location location) {
            double lati = location.getLatitude();
            double longi = location.getLongitude();
            ponto = new LatLng(lati, longi);
        }

        @Override
        public void onStatusChanged(String s, int i, Bundle bundle) {

        }

        @Override
        public void onProviderEnabled(String s) {

        }

        @Override
        public void onProviderDisabled(String s) {

        }
    };

    public void pausa(int tempo) {
        try{
            Thread.sleep(tempo);
        } catch(InterruptedException e){
            e.printStackTrace();
        }
    }

    public Pokemon carregaPokemon() {

        Pokemon pokemon = null;

        HttpURLConnection urlConexao = null;
        BufferedReader leitor = null;

        try {
           // URL url = new URL("https://pokeapi.co/api/v2/pokemon/"+ quantidade);
            URL url = new URL("http://10.6.30.72:8000/pokemon/5/json/");
            urlConexao = (HttpURLConnection) url.openConnection();
            urlConexao.setRequestMethod("GET");
            urlConexao.setRequestProperty("X-Authorization","$2a$10$vVMu7pBlWKwmlgvroMJD4eCyQC8f9gop4hEDw4/gFW4.4JsG08rNe");
            urlConexao.connect();
           InputStream inputStream = urlConexao.getInputStream();
            leitor = new BufferedReader(new InputStreamReader(inputStream));

            Gson gson = new Gson();
            pokemon = gson.fromJson(leitor, Pokemon.class);
            Log.e("Teste recebimento",inputStream.toString());

          //  pokemon.setImg(carregaImagem(id));

        } catch (Exception e) {
            e.printStackTrace();
        }
        return pokemon;
    }

  /*  public Bitmap carregaImagem(int id) {
        //String url = "https://pokeres.bastionbot.org/images/pokemon/"+id+".png";
        String url = "https://pokeres.bastionbot.org/images/pokemon/"+id+".png";
        InputStream in = null;
        try {
            in = new URL(url).openStream();
        } catch (IOException e) {
            e.printStackTrace();
        }
        Bitmap bmp = BitmapFactory.decodeStream(in);
        return bmp;
    }*/
}