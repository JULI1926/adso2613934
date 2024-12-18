<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Exports\GameExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::paginate(20);
        return view('games.index', compact('games'));
    }

    public function create()
    {
        $cats = Category::all();
        return view('games.create')->with('cats', $cats);
    }

    public function store(GameRequest $request)
    {
        // Upload file
        if ($request->hasFile('image')) {
            Log::info('Archivo de foto recibido.');
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $imagePath = "image/" . $imageName;
            Log::info('Foto guardada en:', ['path' => $imagePath]);
        } else {
            $imagePath = 'image/default.png'; // Valor predeterminado
            Log::info('No se recibió archivo de foto. Usando imagen predeterminada.');
        }

        // New Game
        $game = new Game();
        $game->title        = $request->title;
        $game->image        = $imagePath;
        $game->developer    = $request->developer;
        $game->releasedate  = $request->releasedate;
        $game->category_id  = $request->category_id;
        $game->user_id      = Auth::user()->id;
        $game->price        = $request->price;
        $game->genre        = $request->genre;
        $game->slider       = $request->slider;
        $game->description  = $request->description;

        if ($game->save()) {
            return redirect('games')
                ->with('message', 'The game: ' . $game->title . ' was successfully added!');
        }
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('games.show', compact('game'));
    }

        
    public function edit($id)
    {
        $game = Game::findOrFail($id);
        $cats = Category::all(); // Obtener todas las categorías
        return view('games.edit', compact('game', 'cats'));
    }

    public function update(GameRequest $request, Game $game)
    {
        //dd($request->all(), $request->file('image'));

        //dd($request->all());

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $imagePath = "image/" . $imageName; // Construir la ruta de acceso
        } else {
            $imagePath = $game->image; // Mantener la imagen existente
        }
        //dd($imagePath);

        // Actualizar los campos de game
        $game->update([
            'title' => $request->title,
            'image' => $imagePath,
            'developer' => $request->developer,
            'releasedate' => $request->releasedate,
            'price' => $request->price,
            'genre' => $request->genre,
            'slider' => $request->slider,
            'description' => $request->description
        ]);

        // Redirigir o devolver una respuesta
        return redirect()->route('games.index')->with('messages', 'The category: ' . $game->title . ' was successfully updated!');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect()->route('games.index');
    }

    public function pdf(){
        $games = Game::all();
        $pdf = PDF::loadView('games.pdf',compact('games')); 
        return $pdf->download('games.pdf');
        
     }
 
     public function excel(){
        return \Excel::download(new GameExport, 'games.xlsx');
     }

     public function search(Request $request){
        try {
            // Registro de depuración
            Log::info('Search query: ' . $request->q);
    
            // Llamada correcta al query scope 'names'
            $games = Game::names($request->q)->paginate(4);
            
            // Registro de depuración
            Log::info('Games found: ' . $games->count());
    
            // Asegúrate de que la vista 'games.search' exista y esté configurada correctamente
            return view('games.search')->with('games', $games);
        } catch (\Exception $e) {
            // Registra el error para depuración
            Log::error($e->getMessage());
            
            // Devuelve una respuesta JSON con el mensaje de error y un código de estado 500
            return response()->json(['error' => $e->getMessage()], 500);
        }    
    }
}
