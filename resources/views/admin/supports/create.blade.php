<h1>Nova Dúvida</h1>

@if ($errors->any()) //tratamento de erros para o usuario
    @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
    @endforeach
@endif

<form action="{{ route('supports.store') }}" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> // token de segurança, necessario para a validação do formulario --}}
    @csrf
    <input type="text" placeholder="Assunto" name="subject" value="{{ old('subject') }}"> {{-- "old" para persistir como os meus dados preenchidos, mesmo com erro --}}
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>
