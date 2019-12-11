package com.negrito.mac.negritojose;


import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class FacturaActivity extends AppCompatActivity {

    EditText ed1, ed2, ed3;
  TextView tex1,tx2,tx3,tx4,tx5;
  Button btn;
  int nro = 0, price = 0;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_factura);

        tex1 = findViewById(R.id.tvnom);
        tx2 = findViewById(R.id.tvtel);
        tx3 = findViewById(R.id.tvdir);
        tx4 = findViewById(R.id.tvplato);
        tx5 = findViewById(R.id.tvprecio);

        ed1 = findViewById(R.id.et_nombre);
        ed2 = findViewById(R.id.et_telefono);
        ed3 = findViewById(R.id.et_direccion);

        btn = findViewById(R.id.btn_facturaa);

        Bundle bundle = getIntent().getExtras();
        nro = bundle.getInt("nro");
        price = bundle.getInt("price");

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                tex1.setText(ed1.getText().toString());
                tx2.setText(ed2.getText().toString());
                tx3.setText(ed3.getText().toString());

                tx4.setText(nro+"");
                tx5.setText(price+"");

            }
        });

    }
}
