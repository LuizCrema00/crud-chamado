<x-layout title="Listagem Chamados">
    

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <div class="mt-4 mb-4">
        <h2 style="font-size: 24px;">Métricas do Mês</h2>
        <p style="font-size: 18px;">Percentual de chamados resolvidos dentro do prazo no mês atual: {{ $percentualSLA }}%</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">Titulo</th>
                <th scope="col" class="text-center">Categoria</th>
                <th scope="col" class="text-center">Descrição</th>
                <th scope="col" class="text-center">Situação</th>
                <th scope="col" class="text-center">Data de criação</th>
                <th scope="col" class="text-center">Prazo de solução</th>
                <th scope="col" class="text-center">Data de solução</th>
                <th scope="col" class="text-center">Editar</th>
                <th scope="col" class="text-center">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chamados as $chamado)
            <tr>
                <th class="text-center">{{ $chamado->titulo }}</th>
                <th class="text-center">{{ $chamado->categoria->nome }}</th>
                <th class="text-center">{{ $chamado->descricao }}</th>
                <th class="text-center">{{ $chamado->situacao->nome }}</th>
                <th class="text-center">{{ $chamado->data_criacao }}</th>
                <th class="text-center">{{ $chamado->data_prazo }}</th>
                <th class="text-center">{{ $chamado->data_solucao }}</th>
                <th>
                    <a href="{{ route('chamados.edit', $chamado->id) }}" class="btn btn-primary btn-sm">E</a>
                </th>
                <th>
                    <form action="{{ route('chamados.destroy', $chamado->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('chamados.create') }}" class="btn btn-dark mb-2">Adicionar novo chamado</a>
</x-layout>
