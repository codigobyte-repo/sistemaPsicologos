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
            'comprobante' => 'required|array',
            'comprobante.*' => 'file|mimes:jpeg,jpg,png,gif,pdf|max:4096',
        ]);

        $uploadedFiles = [];

        foreach ($request->file('comprobante') as $file) {
            $path = $file->store('comprobantes', 'spaces', 'public');

            // Configuramos la visibilidad del archivo como público
            Storage::disk('spaces')->setVisibility($path, 'public');

            $uploadedFiles[] = $path;

            // Guardamos en la tabla remove_images el estado
            $controlEliminado = new RemoveImages();
            $controlEliminado->ruta = $path;
            $controlEliminado->estado = 'sin_asociar';
            $controlEliminado->save();
        }

        // Guardar los paths de las imágenes en la sesión
        Session::put('uploaded_files', $uploadedFiles);
        
        return redirect()->route('mis-pagos');
    }

    /* public function cargarComprobante(Request $request)
    {
        $request->validate([
            'comprobante' => 'required|image|max:4096'
        ]);

        $imagePaths = [];

        foreach ($request->file('comprobante') as $file) {
            $image = Image::make($file)->encode('jpg', 75);
            $imagePath = 'comprobantes/' . time() . '.' . $file->getClientOriginalExtension();
    
            
            Storage::disk('public')->put($imagePath, (string) $image->encode());
    
            
            Storage::disk('spaces')->put($imagePath, Storage::disk('public')->get($imagePath), 'public');
    
            
            Storage::disk('public')->delete($imagePath);
    
            
            $imagePaths[] = $imagePath;
    
            
            $controlEliminado = new RemoveImages();
            $controlEliminado->ruta = $imagePath;
            $controlEliminado->estado = 'sin_asociar';
            $controlEliminado->save();
        }
    
        
        Session::put('image_paths', $imagePaths);
    
        return redirect()->route('mis-pagos');

    } */
}
