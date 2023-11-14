<?php

namespace App\Http\Controllers;

use App\Models\RemoveImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
/* use Intervention\Image\Facades\Image; */
use Intervention\Image\ImageManagerStatic as Image;

class AnuncioPagos extends Controller
{
    public function index()
    {
        return view('matriculados/anuncios-pagos/index');
    }

    public function cargarComprobante(Request $request)
    {
        $request->validate([
            'comprobante' => 'required|image|max:4096'
        ]);

        if ($request->file('comprobante')) {
            $image = Image::make($request->file('comprobante'))->encode('jpg', 75);
            $image_path = 'comprobantes/' . time() . '.' . $request->file('comprobante')->getClientOriginalExtension();
        
            // Guardar en disco public
            Storage::disk('public')->put($image_path, (string) $image->encode());
        
            // Mover la imagen al disco de Spaces
            Storage::disk('spaces')->put($image_path, Storage::disk('public')->get($image_path), 'public');
        
            // Eliminar la imagen public
            Storage::disk('public')->delete($image_path);
        
            // Guardar la ruta de la imagen en la sesión
            Session::put('image_path', $image_path);

            // Guardamos en la tabla remove_images el estado, en este paso controlamos si la imagen se asocia al siguiente formulario
            $controlEliminado = new RemoveImages();
            $controlEliminado->ruta = $image_path;
            $controlEliminado->estado = 'sin_asociar';
            $controlEliminado->save(); 
        
            return redirect()->route('mis-pagos');
        }

    }
}
