package com.negrito.mac.negritojose;

import android.content.Intent;

import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class ListaActivity extends AppCompatActivity {

    EditText ed1, ed2, ed3, ed4, ed5;
    Button btn;
    int price = 0, nro = 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lista);

        ed1 = findViewById(R.id.et_sajta);
        ed2 = findViewById(R.id.et_chicharron);
        ed3 = findViewById(R.id.et_pique);
        ed4 = findViewById(R.id.et_lechon);
        ed5 = findViewById(R.id.et_pollo);

        btn = findViewById(R.id.btn_factura);


        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                String sajta = ed1.getText().toString();
                int priceSajta = Integer.parseInt(sajta);

                String chicharron = ed2.getText().toString();
                final int priceChicharron = Integer.parseInt(chicharron);

                String pique = ed2.getText().toString();
                int pricePique = Integer.parseInt(pique);

                String lechon = ed2.getText().toString();
                int priceLechon = Integer.parseInt(lechon);

                String pollo = ed2.getText().toString();
                int pricePollo = Integer.parseInt(pollo);

                price = (priceSajta*10) + (priceChicharron*20) + (pricePique*15) + (priceLechon*20) + (pricePollo*10);

                nro = priceSajta + priceChicharron + pricePique + priceLechon + pricePollo;

                Log.i("precio:", price+"");

                Intent intent = new Intent(getApplicationContext(), FacturaActivity.class);
                intent.putExtra("nro", nro);
                intent.putExtra("price", price);

                startActivity(intent);
            }
        });


    }
}
