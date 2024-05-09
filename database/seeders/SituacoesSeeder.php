<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Situacao;

class SituacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Situacao::updateOrCreate(['nome' => 'Novo']);
        Situacao::updateOrCreate(['nome' => 'Pendente']);
        Situacao::updateOrCreate(['nome' => 'Resolvido']);
    }
}
