<h1>Dúvida {{ $support->id }}</h1>

@if ($errors->any()) {{-- tratamento de erros para o usuario --}}
    @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
    @endforeach
@endif

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>
