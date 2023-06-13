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
use Illuminate\Http\Request;

class SelectController extends Controller
{

    public function distritosMatriculas(Request $request)
    {
        $search = $request->search;

        $distritosMatriculas = DistritoMatricula::where('nombre', 'like', "%{$search}%")
                                                ->orWhere('codigo', 'like', "%{$search}%")
                                                ->get();

        return response()->json($distritosMatriculas);
    }

    public function distritosRevistas(Request $request)
    {
        $search = $request->search;
        $distritosRevistas = DistritoRevista::where('nombre', 'like', "%{$search}%")
                                            ->orWhere('codigo', 'like', "%{$search}%")
                                            ->get();

        return response()->json($distritosRevistas);
    }

    public function situacionesRevistas(Request $request)
    {
        $search = $request->search;
        $situacionesRevistas = SituacionRevista::where('nombre', 'like', "%{$search}%")->get();

        return response()->json($situacionesRevistas);
    }

    public function motivosSituacionRevista(Request $request)
    {
        $search = $request->search;
        $motivosSituacionRevista = SituacionRevistaMotivo::where('nombre', 'like', "%{$search}%")->get();

        return response()->json($motivosSituacionRevista);
    }

    public function nationalities(Request $request)
    {
        $search = $request->search;
        $nationalities = Nationality::where('pais', 'like', "%{$search}%")->get();

        return response()->json($nationalities);
    }

    public function titulosUniversitarios(Request $request)
    {
        $search = $request->search;
        $titulosUniversitarios = TituloUniversitario::where('nombre', 'like', "%{$search}%")->get();

        return response()->json($titulosUniversitarios);
    }

    public function universities(Request $request)
    {
        $search = $request->search;
        $universities = University::where('nombre', 'like', "%{$search}%")->get();

        return response()->json($universities);
    }

    public function localidades(Request $request)
    {
        $search = $request->search;
        $localidades = Location::where('location', 'like', "%{$search}%")->get();

        return response()->json($localidades);
    }

    public function municipios(Request $request)
    {
        $search = $request->search;
        $municipios = Area::where('name', 'like', "%{$search}%")->get();

        return response()->json($municipios);
    }
}
