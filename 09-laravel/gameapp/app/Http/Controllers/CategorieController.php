<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);
        return view('categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        //dd($request->all());


        if ($request->hasFile('photo')) {
            Log::info('Archivo de foto recibido.');
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('image'), $imageName);
            $imagePath = "image/" . $imageName;
            Log::info('Foto guardada en:', ['path' => $imagePath]);
        } else {
            $imagePath = null;
            Log::info('No se recibió archivo de foto.');
        }

        try {
            $category = Category::create([
                'photo' => $imagePath,
                'name' => $request->name,
                'description' => $request->description,
                'manufacturer' => $request->manufacturer,
                'releasedate' => $request->releasedate
            ]);

            Log::info('Categoría creada exitosamente:', ['category' => $category]);
            return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al crear la categoría:', ['exception' => $e]);
            return redirect()->back()->withErrors('Error al crear la categoría. Por favor, inténtelo de nuevo.');
        }
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show')->with('category', $category);
    }


    public function search(Request $request)
    {
        $categories = Category::names($request->q)->paginate(20);
        return view('categories.search')->with('categories', $categories);
        //return "Hola";
    }
}
