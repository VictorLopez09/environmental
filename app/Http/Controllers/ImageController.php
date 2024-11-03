<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::where('user_id', auth()->id())->paginate(9);

        return view('dashboard.images.index', compact('images'));
    }

    public function create()
    {
        return view('dashboard.images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put('images/' . $fileName, file_get_contents($file));

            Image::create([
                'title' => $request->title,
                'path' => $fileName,
                'user_id' => Auth::user()->id,
                'is_validated' => false,
            ]);

            return redirect()->route('images.index')->with('success', 'Imagen subida con éxito.');
        } else {
            return redirect()->back()->with('error', 'Error al subir la imagen.');
        }
    }

    public function show(Image $image)
    {
        return  redirect()->route('images.index');
    }

    public function edit(Image $image)
    {
        return view('dashboard.images.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $image->title = $request->input('title');
        $image->save();

        return redirect()->route('images.index')->with('success', 'Título actualizado correctamente.');
    }

    public function destroy(Image $image)
    {
        // Eliminar la imagen del almacenamiento
        Storage::disk('public')->delete('images/' . $image->path);

        // Eliminar el registro de la base de datos
        $image->delete();

        return redirect()->route('images.index')->with('success', 'Imagen eliminada correctamente.');
    }
}
