<?php

namespace App\Console\Commands;

use App\Gasoline;
use App\Town;
use GuzzleHttp\Client as guzzleClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class getGasolineras extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getGasolineras';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public $url = "https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/";

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $this->_call();

        $this->readFile();

        $this->info("finalizo");
    }
    

    public function  _call ()
    {
        

        $client = new guzzleClient([
            'timeout'  => 5.0,
        ]);

        $res = $client->request('GET', $this->url, []);

        $res = $res->getBody()->getcontents();

        Storage::disk('local')->put('file.json', $res);
    }

    private function readFile() 
    {
        Gasoline::truncate();
        $file = Storage::disk('local')->get('file.json');
        $objects = json_decode($file, true);


        foreach ($objects['ListaEESSPrecio'] as $key => $value) {
            $town = Town::where(['cod' => $value['IDMunicipio'], "province_id" => $value['IDProvincia']])
                    // ->orWhere("name","like" , "%" . $value['Municipio'] . "%")
                    ->first();
            if( $town == null ){
                $town = Town::where("name","like" , "%" . $value['Municipio'] . "%")->first();
            }

            /* Gasolines */
            $gasoleo_A = str_replace(',', '.', $value['Precio Gasoleo A']);
            $gasoleo_A = $gasoleo_A == "" ? null : $gasoleo_A;

            $gasoleo_B = str_replace(',', '.', $value['Precio Gasoleo B']);
            $gasoleo_B = $gasoleo_B == "" ? null : $gasoleo_B;

            $gasolina_95_proteccion = str_replace(',', '.', $value['Precio Gasolina 95 Protección']);
            $gasolina_95_proteccion = $gasolina_95_proteccion == "" ? null : $gasolina_95_proteccion;

            $gasolina_98 = str_replace(',', '.', $value['Precio Gasolina  98']);
            $gasolina_98 = $gasolina_98 == "" ? null : $gasolina_98;

            $nuevo_gasoleo_A = str_replace(',', '.', $value['Precio Nuevo Gasoleo A']);
            $nuevo_gasoleo_A = $nuevo_gasoleo_A == "" ? null : $nuevo_gasoleo_A;

            $latitude = str_replace(',', '.', $value['Latitud']);
            $longitude = str_replace(',', '.', $value['Longitud (WGS84)']);




            $gasoline = new Gasoline;
            $gasoline->location = $value['Dirección'];
            $gasoline->cp = $value['C.P.'];
            $gasoline->schedule = $value['Horario'];
            $gasoline->latitude = $latitude;
            $gasoline->longitude = $longitude;
            $gasoline->gasoleo_A = $gasoleo_A ;
            $gasoline->gasoleo_B = $gasoleo_B;
            $gasoline->gasolina_95_proteccion = $gasolina_95_proteccion;
            $gasoline->gasolina_98 = $gasolina_98;
            $gasoline->nuevo_gasoleo_A = $nuevo_gasoleo_A;

            if ( $town == null )
                continue;
            $gasoline->town_id = $town->id;
            $gasoline->province_id = $town->province_id;

            $gasoline->save();

        }

    }
}
