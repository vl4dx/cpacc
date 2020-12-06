<?php

use Illuminate\Database\Seeder;
use App\Estado;
use App\User;
use App\Cpacc;
use App\Station;
use App\Channeltv;
use App\Frecuencyfm;
use App\Color;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(array('nombre' => 'Operativo','color'=>'success',));
        Estado::create(array('nombre' => 'Inoperativo','color'=> 'danger', ));
        Estado::create(array('nombre'=>'Pendiente','color'=>'secondary'));
        

        User::create(array(
        'name' => 'User',
        'email' => 'user@gmail.com',
        'password' => Hash::make('11111111'),
        ));

         User::create(array(
        'name' => 'Admin',
        'email' => 'Admin@gmail.com',
        'password' => Hash::make('11111111'),
        'cargo' => 'admin'
        ));

        Cpacc::create(array('nombre' => 'TV')); //1
        Cpacc::create(array('nombre' => 'FM')); //2
        Cpacc::create(array('nombre' => 'TV-FM')); //3

        for ($i = 1; $i <= 13; $i++) {
            Channeltv::create(array('canal'=>$i,'color'=>'success'));
        }

        Color::create(array('nombre'=>'primary'));
        Color::create(array('nombre'=>'secondary'));
        Color::create(array('nombre'=>'success'));
        Color::create(array('nombre'=>'info'));
        Color::create(array('nombre'=>'warning'));
        Color::create(array('nombre'=>'danger'));
        Color::create(array('nombre'=>'light'));
        Color::create(array('nombre'=>'dark'));



 // ID REGION  PROVINCIA   DISTRITO    LOCALIDAD   CANAL_TV    PONTENCIA_TV    FRECUENCIA_FM   POTENCIA_FM INSTALACION X_COORD Y_COORD ESTADO  OBSERVACION COMENTARIO_POR_LOCALIDAD    REQUERIMIENTO_DE_MANTENIMIENTO
       
        $json = File::get("database/data/puno4.json");
        
        $data = json_decode($json);


        foreach ($data as $obj) 
        {
            if($obj->ESTADO=='OPERATIVO')
            {
                $obj->ESTADO=1;
            }
            else
            {
                $obj->ESTADO=2;
            }
            $vladimir=0;

            if($obj->FRECUENCIA_FM==null){$obj->FRECUENCIA_FM=0;
            }
            if($obj->CANAL_TV>=1 and $obj->FRECUENCIA_FM>=1){
                $vladimir=3;
            }
            else
            {
                $vladimir=1;
            }
            
            $obj->ESTADO=3;
            Station::create(array(
            'region' => $obj->REGION ,
            'provincia' => $obj->PROVINCIA,
            'distrito' => $obj->DISTRITO,
            'localidad' => $obj->LOCALIDAD,
            'channeltv_id' => $obj->CANAL_TV,
            'frecuencyfm_id' => $obj->FRECUENCIA_FM,
            'estado_id' => $obj->ESTADO,
            'cpacc_id' => $vladimir,
            'latitud' => $obj->X_COORD,
            'longitud' => $obj->Y_COORD

          ));
        
        }
    }
}



     