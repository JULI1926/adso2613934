<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use Illuminate\Support\Facades\Auth; 

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
        
        Game::create($request->all());
        return redirect()->route('games.index');
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('games.show', compact('game'));
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Otras validaciones
        ]);

        $game = Game::findOrFail($id);
        $game->update($request->all());
        return redirect()->route('games.index');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect()->route('games.index');
    }
}
