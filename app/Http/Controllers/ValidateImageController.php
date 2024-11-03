<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ValidateImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $images = Image::all();

        return view('dashboard.validate.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //
        $image = Image::findOrFail($id);
        return view('dashboard.validate.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $image = Image::findOrFail($id);
        $image->is_validated = $request->input('is_validated');
        $image->save();

        return redirect()->route('validate.index', $id)->with('success', 'Estado de validación actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encuentra el registro de la imagen en la base de datos
        $image = Image::findOrFail($id);
    
        // Define la ruta del archivo en storage
        $filePath = 'images/' . $image->path;
    
        // Elimina el archivo si existe en storage
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    
        // Elimina el registro de la base de datos
        $image->delete();
    
        // Redirecciona a la página principal con un mensaje de éxito
        return redirect()->route('validate.index')->with('success', 'Imagen y registro eliminados correctamente.');
    }
}
