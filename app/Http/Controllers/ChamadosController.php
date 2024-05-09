<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChamadosFormRequest;
use App\Models\Chamado;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Situacao;
use App\Repositories\SLARepository;

class ChamadosController extends Controller
{
    private $slaRepository;


    public function __construct(SLARepository $slaRepository)
    {
        $this->slaRepository = $slaRepository;

    }
    //
    public function index(Request $request)
    {
        
        $percentualSLA = $this->slaRepository->calcularPercentualSLA();
        $chamados = Chamado::orderBy('titulo')->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        foreach ($chamados as $chamado) {
            $chamado->data_criacao = date('d/m/Y', strtotime($chamado->data_criacao));
            $chamado->data_prazo = date('d/m/Y', strtotime($chamado->data_prazo));
            if ($chamado->data_solucao) {
                $chamado->data_solucao = date('d/m/Y', strtotime($chamado->data_solucao));
            }
        }

        return view('chamados.index', compact('chamados', 'mensagemSucesso', 'percentualSLA'));
    }


    public function create() {
        $categorias = Categoria::all();
        $situacoes = Situacao::all();
        $situacaoPadrao = Situacao::where('nome', 'Novo')->first();
        
        $dataCriacao = now()->format('d/m/Y');

        $dataPrazo = now()->addDays(3)->format('d/m/Y');

        return view('chamados.create', compact('categorias', 'situacoes', 'situacaoPadrao', 'dataCriacao', 'dataPrazo'));
    }

    public function store(ChamadosFormRequest $request) {
        
        $chamado = Chamado::create($request->all());

        return redirect()->route('chamados.index')->with('mensagem.sucesso', "Chamado '{$chamado->titulo}' adicionado com sucesso");
    }

    public function edit(Chamado $chamado) {
        $categorias = Categoria::all();
        $situacoes = Situacao::all();

        return view('chamados.edit', compact('chamado', 'categorias', 'situacoes'));
    }

    public function update(Chamado $chamado, ChamadosFormRequest $request) {

        if ($request->input('situacao_id') == Situacao::where('nome', 'Resolvido')->first()->id) {
            $chamado->data_solucao = now()->format('Y-m-d');
        }
    
        $chamado->fill($request->all());
        $chamado->save();
    
        return redirect()->route('chamados.index')->with('mensagem.sucesso', "Chamado '{$chamado->titulo}' atualizado com sucesso");
    }
    

    public function destroy(Chamado $chamado) {

        $chamado->delete();

        return redirect()->route('chamados.index')->with('mensagem.sucesso', "Chamado '{$chamado->titulo}' removido com sucesso");
    }
}
