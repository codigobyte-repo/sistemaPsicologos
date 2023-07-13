<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\DistritoMatricula;
use App\Models\DistritoRevista;
use App\Models\Location;
use App\Models\Nationality;
use App\Models\SituacionRevista;
use App\Models\SituacionRevistaMotivo;
use App\Models\TituloUniversitario;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SelectController extends Controller
{

    public function distritosMatriculas(Request $request)
    {
        $search = $request->search;

        $distritosMatriculas = Cache::remember('distritosMatriculas:' . $search, 60, function () use ($search) {
            return DistritoMatricula::where(function ($query) use ($search) {
                $query->where('nombre', 'like', "%{$search}%")
                    ->orWhere('codigo', 'like', "%{$search}%");
            })->get();
        });

        return response()->json($distritosMatriculas);
    }

    public function distritosRevistas(Request $request)
    {
        $search = $request->search;

        $distritosRevistas = Cache::remember('distritosRevistas:' . $search, 60, function () use ($search) {
            return DistritoRevista::where(function ($query) use ($search) {
                $query->where('nombre', 'like', "%{$search}%")
                    ->orWhere('codigo', 'like', "%{$search}%");
            })->get();
        });

        return response()->json($distritosRevistas);
    }

    public function situacionesRevistas(Request $request)
    {
        $search = $request->search;

        $situacionesRevistas = Cache::remember('situacionesRevistas:' . $search, 60, function () use ($search) {
            return SituacionRevista::where('nombre', 'like', "%{$search}%")->get();
        });

        return response()->json($situacionesRevistas);
    }

    public function motivosSituacionRevista(Request $request)
    {
        $search = $request->search;

        $motivosSituacionRevista = Cache::remember('motivosSituacionRevista:' . $search, 60, function () use ($search) {
            return SituacionRevistaMotivo::where('nombre', 'like', "%{$search}%")->get();
        });

        return response()->json($motivosSituacionRevista);
    }

    public function nationalities(Request $request, $id = null)
    {
        $search = $request->search;

        $nationalities = Cache::remember('nationalities:' . $search, 60, function () use ($search) {
            return Nationality::where('pais', 'like', "%{$search}%")->get();
        });

        return response()->json($nationalities);     
    }

    public function titulosUniversitarios(Request $request)
    {
        $search = $request->search;
        
        $titulosUniversitarios = Cache::remember('titulosUniversitarios:' . $search, 60, function () use ($search) {
            return TituloUniversitario::where('nombre', 'like', "%{$search}%")->get();
        });

        return response()->json($titulosUniversitarios);
    }

    public function universities(Request $request)
    {
        $search = $request->search;
        $universities = Cache::remember('universities:' . $search, 60, function () use ($search) {
            return University::where('nombre', 'like', "%{$search}%")->get();
        });

        return response()->json($universities);
    }

    public function localidades(Request $request)
    {
        /* $search = $request->search;
        $localidades = Location::where('location', 'like', "%{$search}%")->get();

        return response()->json($localidades); */
        $search = $request->search;

        $localidades = Cache::remember('localidades:' . $search, 60, function () use ($search) {
            return Location::where('location', 'like', "%{$search}%")->get();
        });

        return response()->json($localidades);
    }

    public function municipios(Request $request)
    {
        /* $search = $request->search;
        $municipios = Area::where('name', 'like', "%{$search}%")->get();

        return response()->json($municipios); */
        $search = $request->search;
        $municipios = Cache::remember('municipios:' . $search, 60, function () use ($search) {
            return Area::whereHas('location', function ($query) use ($search) {
                $query->where('location', 'like', "%{$search}%");
            })->get();
        });

        return response()->json($municipios);
    }

    public function getUsers(Request $request)
    {
        $search = $request->search;

        $users = Cache::remember('users:' . $search, 60, function () use ($search) {
            return User::where('name', 'like', "%{$search}%")
                    ->orWhere('lastname', 'like', "%{$search}%")
                    ->orWhere('matricula', 'like', "%{$search}%")
                    ->orWhere('dni', 'like', "%{$search}%")
                    ->get();
        });

        return response()->json($users);     
    }
}
