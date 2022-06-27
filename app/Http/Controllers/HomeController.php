<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.envios');
        //return view('/home');
    }
    public function mapa()
    {
        return view('pages.mapa');
        //return view('/home');
    }

    public function direccion(Request $request)
    {

        $direccion = new Cliente();

        $direccion->nombre = $request->input('nombre');
        $direccion->email =  $request->input('email');
        $direccion->telefono = $request->input('telefono');

        $direccion->calle = $request->input('calle');
        $direccion->numero = $request->input('numero');
        $direccion->colonia = $request->input('colonia');
        $direccion->ciudad = $request->input('ciudad');
        $direccion->municipio = $request->input('municipio');
        $direccion->estado = $request->input('estado');
        $direccion->cp = $request->input('cp');
        //return $direccion;

        $dir = $direccion->calle.", ".  $direccion->numero.", ". $direccion->colonia." ".$direccion->ciudad.", ". $direccion->cp.", ".$direccion->municipio.", ". $direccion->estado;

        $apiKey = 'AIzaSyCVH2nGlz9tIuQnw8MyDhLv7Nj-jDoY2d0';

        // Change address format
        $formattedAddrTo = str_replace(' ', '+', $dir);

        // Geocoding API request with end address
        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
        $outputTo = json_decode($geocodeTo);
        //return $outputTo;
        if ($outputTo->status != 'OK'){
            return 'No se logro encontrar la direccion ingresada, volver a intentarlo.';
        }
        if(!empty($outputTo->error_message)){
            return $outputTo->error_message;
        }

        // Get latitude and longitude from the geodata
        $latitudeFrom   = '16.8959266';
        $longitudeFrom  = '-92.0676581';
        $latitudeTo     = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;

        // Calculate distance between latitude and longitude
        $theta    = $longitudeFrom - $longitudeTo;
        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;

        $kilometraje =  round($miles * 1.609344, 2);
        if ($kilometraje > 0 & $kilometraje <= 100) {
            $precio = '100';
        } else if ($kilometraje > 100 & $kilometraje <= 200) {
            $precio = '130';
        }else if ($kilometraje > 200 & $kilometraje <= 400) {
            $precio = '170';
        }else if ($kilometraje > 400 & $kilometraje <= 700) {
            $precio = '210';
        } else if ($kilometraje > 700 & $kilometraje <= 1000) {
            $precio = '250';
        } else if ($kilometraje > 1000) {
            $precio = '350';
        }

        //return $direccion. $kilometraje. $precio;

        //return redirect()->route('pages.mapa', $direccion);
        return view('pages.mapa', compact('dir', 'direccion','kilometraje','precio','latitudeTo','longitudeTo'));
    }



    function maps($addressTo = 'Prol. Manuel Velasco Suárez, Maya Tucan, 29960 Palenque, Chis.'){
        //Google API KEY
        $apiKey = 'AIzaSyCVH2nGlz9tIuQnw8MyDhLv7Nj-jDoY2d0';

        // Change address format
        $formattedAddrTo     = str_replace(' ', '+', $addressTo);

        // Geocoding API request with end address
        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
        $outputTo = json_decode($geocodeTo);
        if(!empty($outputTo->error_message)){
            return $outputTo->error_message;
        }

        // Get latitude and longitude from the geodata
        $latitudeFrom   = '16.8959266';
        $longitudeFrom  = '-92.0676581';
        $latitudeTo     = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;

        // Calculate distance between latitude and longitude
        $theta    = $longitudeFrom - $longitudeTo;
        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;

        return round($miles * 1.609344, 2).' km';

        /*/ Convert unit and return distance
        $unit = strtoupper($unit);
        if($unit == "K"){
            return round($miles * 1.609344, 2).' km';
        }elseif($unit == "M"){
            return round($miles * 1609.344, 2).' meters';
        }else{
            return round($miles, 2).' miles';
        }
        return "hola mundo";
        */
    }
}
