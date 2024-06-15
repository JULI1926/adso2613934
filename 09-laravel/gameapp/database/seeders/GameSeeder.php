<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $game = new Game;
        $game->title = 'Mario Oddysey';
        $game->developer = 'Nintendo';
        $game->releasedate = '2017-10-27';
        $game->category_id = 1;
        $game->user_id = 1;
        $game->price=59;
        $game->genre = '3D Adventure';
        $game->description = 'Lorem ipsum dolor sit amet';
        $game->save();

        $game = new Game;
        $game->title = 'God of War Ragnarok';
        $game->developer = 'Santa Monica';
        $game->releasedate = '2022-11-01';
        $game->category_id = 3;
        $game->user_id = 1;
        $game->price=59;
        $game->genre = '3D Adventure';
        $game->description = 'Lorem ipsum dolor sit amet';
        $game->save();
    }
}
