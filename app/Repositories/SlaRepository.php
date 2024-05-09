<?php 

namespace App\Repositories;

use App\Models\Chamado;
use Carbon\Carbon;

class SlaRepository {

    public function calcularPercentualSLA()
    {
        $inicioMes = Carbon::now()->startOfMonth();
        $fimMes = Carbon::now()->endOfMonth();

        $chamadosResolvidos = Chamado::whereNotNull('data_solucao')
            ->whereBetween('data_solucao', [$inicioMes, $fimMes])
            ->get();

        $chamadosNoMes = Chamado::whereBetween('data_criacao', [$inicioMes, $fimMes])->get();

        $chamadosDentroDoPrazo = $chamadosResolvidos->filter(function ($chamado) {
            return $chamado->data_solucao <= $chamado->data_prazo;
        });

        $totalChamadosNoMes = $chamadosNoMes->count();

        return ($totalChamadosNoMes > 0) ? number_format(($chamadosDentroDoPrazo->count() / $totalChamadosNoMes) * 100, 2) : 0;
    }
}