<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Categoria::updateOrCreate(['nome' => 'Problema Técnico']);
        Categoria::updateOrCreate(['nome' => 'Solicitação de Serviço']);
        Categoria::updateOrCreate(['nome' => 'Bug']);
    }
}
