<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Restaurante;
use Illuminate\Support\Facades\Log;

class RestauranteService
{
    public function apiConexion()
    {
        $respuesta = Http::withHeaders([
            'User-Agent' => 'Mi servicio',
            'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
        ])->asForm()->post('https://overpass-api.de/api/interpreter', [
            'data' => '[out:json][timeout:25]; area(id:3600349053)->.searchArea; nwr["amenity"="fast_food"]["name"="McDonald\'s"](area.searchArea); out geom;'
        ]);
        if($respuesta->successful()){
            $datos = $respuesta->json();
            $restaurantes = $datos['elements'];
            foreach($restaurantes as $restaurante){
                Restaurante::updateOrCreate([
                    'id_openstreet' => $restaurante['id'],
                    'nombre' => $restaurante['tags']['name'] ?? 'McDonald\'s',
                    'latitud' => $restaurante['lat'],
                    'longitud' => $restaurante['lon']
                ]);
            }
        }
        else{
            $estatus = $respuesta->status();
            $error = $respuesta->json();
            dd($estatus, $error);
            Log::error("Mensaje de error: {$error} Estatus: {$estatus}");
        }
    }

    public function getRestaurantes()
    {
        return Restaurante::all();
    }

    public function getRestaurante($id)
    {
        return Restaurante::find($id);
    }
}
