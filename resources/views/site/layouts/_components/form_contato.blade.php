<form action="{{ route('site.contato') }}" method="POST">
    {{ $slot }}
    @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{ $classe ?? 'borda-branca' }}"
        value="{{ old('nome') }}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{ $classe ?? 'borda-branca' }}"
        value="{{ old('telefone') }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $classe ?? 'borda-branca' }}"
        value="{{ old('email') }}">
    <br>
    <select name="motivo_contato" class="{{ $classe ?? 'borda-branca' }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}"
                {{ old('motivo_contato') == $motivo_contato->id ? 'selected' : '' }}>
                {{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe ?? 'borda-branca' }}">{{ old('mensagem') ?? 'Preencha aqui a sua mensagem' }}</textarea>
    <br>
    <button type="submit" class="{{ $classe ?? 'borda-branca' }}">ENVIAR</button>
</form>