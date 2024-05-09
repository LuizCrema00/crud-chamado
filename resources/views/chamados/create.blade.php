<x-layout title="Novo chamado">

    <form action="{{ route('chamados.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control">
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select class="form-select" id="categoria_id" name="categoria_id">
                <option selected disabled>Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="situacao_id" class="form-label">Situação</label>
            <select class="form-select" id="situacao_id" name="situacao_id">
                @foreach ($situacoes as $situacao)
                    <option value="{{ $situacao->id }}" {{ $situacao->id === $situacaoPadrao->id ? 'selected' : '' }}>
                        {{ $situacao->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="data_criacao" class="form-label">Data de Criação</label>
            <input type="text" id="data_criacao" name="data_criacao" class="form-control" value="{{ $dataCriacao }}">
        </div>

        <div class="mb-3">
            <label for="data_prazo" class="form-label">Data de Prazo</label>
            <input type="text" id="data_prazo" name="data_prazo" class="form-control" value="{{ $dataPrazo }}">
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
       
    </form>
</x-layout>